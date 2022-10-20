<?php
$array = [ "配列", "空白ありの文字列 " ];

echo "<pre>";
var_dump( $array );
echo "</pre>";

// 引数に関数 配列の値それぞれに関数を適用
// 配列の中身に全部trimを適用させている
$trim_string = array_map( "trim", $array );

echo "<pre>";
var_dump( $trim_string );
echo "</pre>";

?>
