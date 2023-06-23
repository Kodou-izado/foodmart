<?php

namespace App\Controller;

use App\Utils\DbHelper;
use App\Utils\Message;

class CategoryController
{
  private $helper;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;
  }

  public function get(): array
  {
    $this->helper->query(
      'SELECT `category_id`, `category_name`, `category_description` FROM `category`'
    );

    return $this->helper->fetchAll();
  }
}