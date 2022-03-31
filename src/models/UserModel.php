<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Database;

class UserModel extends Database
{
   public function create()
   {
      $query = <<<Q
         CREATE TABLE IF NOT EXISTS user(
            id int(10) auto_increment PRIMARY KEY,
            name varchar(16) not null
         )
      Q;

      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
}
