<?php

declare(strict_types=1);

namespace Src\Core;

use Exception;

class Controller
{
   /**
    * @param string $modelName $modelName is filename in Models directory
    * @return object 
    */
   public static function model(string $modelName)
   {
      $model = "Src\Models\\$modelName" . "Model";
      return new $model();
   }

   /**
    * @param string $viewName $viewName =<A> is filename in Views directory
    */
   public static function view(string $viewName, array $_DATA = [])
   {
      $path = explode('.', $viewName);
      $folder = "./src/Views/$path[0]";
      $viewFile = "./src/Views/$path[0]/$path[1]" . "View.php";
      if (is_dir($folder) && file_exists($viewFile))
         return require_once  $viewFile;
      else echo "Can't find view in $viewFile";
   }
}
