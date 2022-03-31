<?php

declare(strict_types=1);

namespace Src\Core;

class Route
{
   private static array $routes = [];

   public static function get(string $path, $handler)
   {
      self::addHandler('GET', $path, $handler);
   }

   public static function post(string $path, $handler)
   {
      self::addHandler('POST', $path, $handler);
   }

   private static function addHandler(string $method, string $path, $handler)
   {
      self::$routes[] = [
         'path' => $path,
         'method' => $method,
         'handler' => $handler
      ];
   }

   public static function run()
   {
      $path = $_SERVER['REQUEST_URI'];
      $method = $_SERVER['REQUEST_METHOD'];
      $hasRoute = false;

      foreach (self::$routes as $route) {
         if (($route['path'] === $path) && ($route['method'] === $method)) {
            $hasRoute = true;

            if (is_array($route['handler'])) {
               call_user_func(array($route['handler'][0], $route['handler'][1]));
            }
            if (is_object($route['handler'])) {
               call_user_func_array($route['handler'], [new Controller()]);
            }
         }
      }
      echo !$hasRoute ? '404 not found' : null;
   }
}
