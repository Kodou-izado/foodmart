<?php

namespace App\Utils;

class Utilities
{
  public static function validate(string $data): string
  {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
  }

  public static function hashPassword(string $password): string
  {
    return password_hash($password, PASSWORD_BCRYPT, [10]);
  }

  public static function generateOrderNo(): string
  {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
  }

  public static function getStatusColor(string $status): string
  {
    if($status == "Pending")
      return 'history-pending';
    elseif($status == "Confirmed")
      return 'history-confirmed';
    elseif($status == "Completed")
      return 'history-completed';
    else
      return 'history-cancelled';
  }

  public static function formatDate(string $date, string $type): string
  {
    if($type == "dt")
      return $date = date('M d, Y h:i A', strtotime($date));
    else
      return $date = date('M d, Y', strtotime($date));
  }

  public static function isCustomer(): bool
  {
    return isset($_SESSION['role']) AND $_SESSION['role'] == "73ca4984-0c4b-11ee-a71c-088fc30176f9" ? true : false;
  }

  public static function isAdmin(): bool
  {
    return isset($_SESSION['role']) AND $_SESSION['role'] == "699dd7be-0c4b-11ee-a71c-088fc30176f9" ? true : false;
  }

  public static function redirectUnauthorize(): void
  {
    if(!isset($_SESSION['uid']) AND !isset($_SESSION['role'])){
      header('Location: '.SYSTEM_URL.'');
      exit();
    }
  }

  public static function redirectAuthorize(): void
  {
    if(isset($_SESSION['uid']) AND isset($_SESSION['role'])){
      header('Location: '.SYSTEM_URL.'/menu');
      exit();
    }
  }
}