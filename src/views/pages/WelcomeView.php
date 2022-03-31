<?php
require_once './src/utils/genPath.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
   <link rel="stylesheet" href=<?= genPath('home.css') ?>>
   <title>Devet-Welcome</title>
</head>

<body>
   <h1><?= $_DATA['text'] ?></h1>
   <img src=<?= genPath('img.jpg') ?> alt="haha" style="width: 200px;">
</body>

</html>