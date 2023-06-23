<?php

namespace Config;

use PDO;

class Database
{
  protected $conn;
  private $host = 'localhost';
  private $db = 'foodmart';
  private $username = 'root';
  private $password = '';

  public function getConnetion(): PDO
  {
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->username, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
      throw new Exception('Connection failed '. $e->getMessage());
    }

    return $this->conn;
  }
}