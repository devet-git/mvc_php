# The MVC pattern for the PHP language

## 1. Set up
**Required**: In your local environment, you need install and you should have knoewledge of the following tools:

1. [XAMPP](https://www.apachefriends.org/download.html)

2. [Composer](https://getcomposer.org/download/) (a tool for dependency management in PHP)
3. [Git](https://git-scm.com/downloads)

Next, open terminal in any folder, run the following commands: 
```
git clone https://github.com/devet-git/php-mvc.git
```
```
cd php-mvc
```
```
composer install
```
```
php -S localhost:8080
```
Access the address http://localhost:8080 in your browser.

## 2. How to

### Connect to MySQL
Open *db.php* file in *src/configs*, add your MySQL database info:
```php
define("MYSQL_HOST", "<HOST>"); // Ex: define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_DB_NAME", "<DATABASE NAME>");
define("MYSQL_USER_NAME", "<USER NAME"); // root
define("MYSQL_PASSWORD", "<PASSWORD>");
```
---
### Create a model
In *src/models*, create a class extends __Database class__ in *src/core/Database.php*.
**Note:** You should learn about [PDO](https://www.php.net/manual/en/book.pdo.php)

Example:

```php
// src/models/UserModel.php

namespace Src\Models;

use Src\Core\Database;

class UserModel extends Database
{
   public function create(): void
   {
      $query = <<<QUE
         CREATE TABLE IF NOT EXISTS user(
            `id` INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL
         )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
}
```

---
### Create a view
In *src/views/\**, create files follow syntax: __\<name>View.php__. Example: *HomeView.php*

---
### Create a controller
Create a controller in *src/controllers*. Example:
```php
namespace Src\Controllers;

use Src\Core\Controller;

class UserController extends Controller
{
   public static function create()
   {
      //TODO: Call a model with name 'User'(User.php) in src/models directory and execute 'create' method
      parent::model('User')->create();

      //TODO: Call file homeView.php in src/views/pages directory
      parent::view('pages.Home');
   }
}
```
---
### Use route
Use can define new route in src/routes/web.php

*See the following example:*

```php
use Src\Core\Route;

Route::get('/', function ($res) {
   $res::model('User')->create();
   $res::view('pages.home');
});

// TODO: Call to create method of UserController class
Route::get('/', [UserController::class,'create']);

// ! DON'T REMOVE THIS LINE
Route::run();
```

If you want to pass data to the view, for example:
```php
$res::view('pages.home',[
   'username' => 'devet',
   'userage' => 20,
]);
```
After that, to get passed data, in *homeView.php*:
```php
<body>
   <?= $_DATA['username']; ?> // return: devet
   <?= $_DATA['userage']; ?> // return: 20
<body>
```
