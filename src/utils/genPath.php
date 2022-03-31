<?php

function genPath($filename)
{
   $extension = explode('.', $filename)[1];

   if (preg_match("/[css|scss|sass]/", $extension))
      return "./src/assets/styles/$filename";

   if (preg_match("/[jpg|png|jpeg]/", $extension))
      return "./src/assets/imgs/$filename";
}
