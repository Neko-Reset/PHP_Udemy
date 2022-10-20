<?php
// 関数のデフォルト値を設定

// $n = null でデフォルトの値を設定できる
// 初期値を設定しないと引数を入れなかった時にエラーになる
function default_value( $n = null ){
  echo $n . "です";
}

// 引数なし
default_value();

echo "<br>";
// 引数あり
default_value("マジ卍");
?>
