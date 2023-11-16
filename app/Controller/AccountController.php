<?php

namespace App\Controller;

use App\Utils\DbHelper;
use App\Utils\Message;
use App\Utils\Utilities;
use App\Utils\FileUpload;

class AccountController
{
  private $helper;
  private $message;
  private $upload;
  private $accepted_extensions = ['png', 'jpg'];
  private $role_id = '73ca4984-0c4b-11ee-a71c-088fc30176f9';
  public $fullname;
  public $gender;
  public $username;
  public $email;
  public $year_section;
  public $password;
  public $confirm_password;
  public $status = 'Unverified';

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;

    $this->message = new Message();

    $this->upload = new FileUpload('../../uploads/valid_id/');
  }

  public function register(): string
  {
    if(
      empty($this->fullname) OR 
      empty($this->gender) OR 
      empty($this->username) OR 
      empty($this->email) OR 
      empty($this->password) OR 
      empty($this->confirm_password)
    )
    {
      return $this->message->jsonError('All fields are required');
    }

    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      return $this->message->jsonError('Invalid email');
    }

    if($this->password != $this->confirm_password){
      return $this->message->jsonError('Password not matched');
    }

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `fullname` = ?',
      [$this->fullname]
    );

    if($this->helper->rowCount() > 0){
      return $this->message->jsonError('Name already exist');
    }

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `username` = ?',
      [$this->username]
    );

    if($this->helper->rowCount() > 0){
      return $this->message->jsonError('Username already exist');
    }

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `email` = ?',
      [$this->email]
    );

    if($this->helper->rowCount() > 0){
      return $this->message->jsonError('Email already exist');
    }

    $this->upload->setFile($_FILES['valid_id']);

    if(!$this->upload->isUploading()){
      return $this->message->jsonError('Upload your id');
    }

    if(!$this->upload->isValidExtension($this->accepted_extensions)){
      return $this->message->jsonError('Accepted extension are png and jpg');
    }

    $this->helper->startTransaction();

    $this->helper->query(
      'INSERT INTO `accounts` (`user_id`, `fullname`, `gender`, `username`, `email`, `year_section`, `password`, `role_id`, `account_status`, `date_created`, `date_updated`) VALUES (UUID(), ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())',
      [$this->fullname, $this->gender, $this->username, $this->email, $this->year_section, Utilities::hashPassword($this->password), $this->role_id, $this->status]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Account creation failed');
    } 

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `id` = ?',
      [$this->helper->getInsertId()]
    );

    $user = $this->helper->fetch();

    if(!$this->upload->isUploadSuccess($user->user_id.'.jpg')){
      $this->helper->rollback();
      return $this->message->jsonError('Account creation failed');
    }

    $this->helper->query(
      'INSERT INTO `notifications` (`origin_id`, `origin_type`, `date_created`) VALUES (?, ?, ?)',
      [$user->user_id, 'New User', Utilities::getCurrentDate()]
    );

    if ($this->helper->rowCount() == 0) {
      $this->helper->rollback();
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->commit();
    return $this->message->jsonSuccess('Account created');
  }

  public function signIn(): string
  {
    if(empty($this->username) OR empty($this->password)){
      return $this->message->jsonError('All fields are required');
    }

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `username` = ?',
      [$this->username]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Incorrect username');
    }
      
    $user = $this->helper->fetch();
    
    if(!password_verify($this->password, $user->password)){
      return $this->message->jsonError('Incorrect password');
    }

    if($user->account_status != "Verified"){
      return $this->message->jsonError('Account is '.strtolower($user->account_status).'');
    }

    $_SESSION['uid'] = $user->user_id;
    $_SESSION['role'] = $user->role_id;

    return $this->message->jsonSuccess('Login success');
  }

  public function updateAccount(): string
  {
    if(
      Utilities::isCustomer() AND
      (empty($this->fullname) OR
      empty($this->username) OR
      empty($this->gender) OR
      empty($this->year_section) OR
      empty($this->email))
    )
    {
      return $this->message->jsonError('All fields are required');
    }

    if(
      Utilities::isAdmin() AND
      (empty($this->fullname) OR
      empty($this->username) OR
      empty($this->gender) OR
      empty($this->email))
    )
    {
      return $this->message->jsonError('All fields are required');
    }

    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      return $this->message->jsonError('Invalid email');
    }

    $this->helper->query(
      'UPDATE `accounts` SET `fullname` = ?, `gender` = ?, `username` = ?, `email` = ?, `year_section` = ?, `date_updated` = current_timestamp() WHERE `user_id` = ?',
      [$this->fullname, $this->gender, $this->username, $this->email, $this->year_section, $_SESSION['uid']]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Saving information failed');
    }

    return $this->message->jsonSuccess('Information saved');
  }

  public function changePassword(string $current): string
  {
    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `user_id` = ? LIMIT 1',
      [$_SESSION['uid']]
    );

    $user = $this->helper->fetch();

    if(!password_verify($current, $user->password)){
      return $this->message->jsonError('Incorrect account password');
    }

    if($this->password != $this->confirm_password){
      return $this->message->jsonError('Password not matched');
    }

    $this->helper->query(
      'UPDATE `accounts` SET `password` = ?, `date_updated` = current_timestamp() WHERE `user_id` = ?',
      [Utilities::hashPassword($this->password), $_SESSION['uid']]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Changing password failed');
    }

    return $this->message->jsonSuccess('New account password was saved');
  }

  public function signOut(): void
  {
    session_destroy();
    echo '<script>window.location.href = "'.SYSTEM_URL.'/"</script>';
  }
}