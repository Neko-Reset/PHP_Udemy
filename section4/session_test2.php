<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  echo "セッションを破棄しました";
  // セッションを空にして上書き
  $_SESSION = [];

  if ( isset( $_COOKIE[ "PHPSESSID" ] ) ) {
    setcookie( "PHPSESSID", "", time() -1800, "/" );
  }

  // セッションを削除
  session_destroy();

  echo "セッション" . "<br>";
  echo "<pre>";
  var_dump( $_SESSION );
  echo "</pre>";

  echo "クッキー" . "<br>";

  echo "<pre>";
  var_dump( $_COOKIE );
  echo "</pre>";

  ?>
</body>
</html>
