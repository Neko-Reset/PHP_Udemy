<?php
session_start();
?>

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
  if ( !isset( $_SESSION[ "visited" ] ) ){
    echo "初回訪問";
    $_SESSION[ "visited" ] = 1;
    $_SESSION[ "date" ] = date( "c" ); 
  } else {
    $visited = $_SESSION[ "visited" ]; 
    $visited++;
    $_SESSION[ "visited" ] = $visited;
    echo $_SESSION[ "visited" ] . "回目の訪問";

    if ( isset( $_SESSION[ "date" ] ) ) {
    echo "前回の訪問は" . $_SESSION[ "date" ] . "です";
    $_SESSION[ "date" ] = date( "c" ); 
    }
  }

  // セッションを作ったタイミングで自動的にcookieも作成される
  echo "<pre>";
  var_dump( $_SESSION );
  echo "</pre>";

  echo "<pre>";
  var_dump( $_COOKIE );
  echo "</pre>";

  
  ?>
</body>
</html>
