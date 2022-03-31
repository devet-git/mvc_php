<?php

declare(strict_types=1);

namespace Src\Controllers;

use Src\Core\Controller;

class UserController extends Controller
{
   public static function create()
   {
      parent::model('User')->create();
      parent::view('pages.Home', ['text' => 'home']);
   }
}
