<?php

namespace App\Utils;

use App\Utils\Message;
use \Gumlet\ImageResize;

class FileUpload
{
  private $message;
  private $image;
  private $file;
  private $path;

  public function __construct(string $path)
  {
    $this->message = new Message();

    $this->path = $path;
  }

  public function setFile(array $file): array
  {
    return $this->file = $file;
  }

  public function isUploading(): bool
  {
    return $this->file['size'] > 0 ? true : false;
  }

  public function isValidExtension(array $accepted): bool
  {
    $file_data = explode('.', $this->file['name']);
    $extension = end($file_data);

    return in_array($extension, $accepted) ? true : false;
  }

  public function isUploadSuccess(string $filename): bool
  {
    $this->image = new ImageResize($this->file['tmp_name']);
    $this->image->resizeToWidth(400);

    return $this->image->save($this->path.$filename) ? true : false;
    // return move_uploaded_file($this->file['tmp_name'], $this->path.$filename) ? true : false;
  }

  public function isDeleteSuccess(string $filename): bool
  {
    return unlink($this->path.$filename) ? true : false;
  }
}