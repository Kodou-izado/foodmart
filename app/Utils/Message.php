<?php

namespace App\Utils;

class Message
{
  public function jsonError(string $message): string
  {
    return json_encode(
      array(
        'type' => 'error',
        'message' => $message
      )
    );
  }

  public function jsonSuccess(string $message): string
  {
    return json_encode(
      array(
        'type' => 'success',
        'message' => $message
      )
    );
  }
}