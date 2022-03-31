<?php

declare(strict_types=1);

namespace Src\Core;

require './src/configs/db.php';

use PDO;

class Database
{
   protected $conn;
   public function __construct()
   {
      $this->conn = new PDO(
         "mysql:host=" . HOST . ";dbname=" . DB_NAME,
         USER_NAME,
         PASSWORD
      );
   }
}
