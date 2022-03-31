<?php

use Src\Core\Route;
use Src\Controllers\UserController;


// TODO: ADD YOUR ROUTES HERE

Route::get('/user/create', [UserController::class, 'create']);

Route::get('/', function ($res) {
   $res::view('pages.Welcome', ['text' => 'WELCOME TO MY HOME PAGE']);
});



// ! DON'T REMOVE
Route::run();
