<?php

namespace App\Interfaces;

use stdClass;

interface AppInterface 
{
  public function get(): array;

  public function getOne(string $id): stdClass;

  public function insert(): string;

  public function update(string $id): string;

  public function delete(string $id): string;
}