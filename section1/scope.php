<?php 
  $global_variable = "グローバル";

  // function check_scope( ) {
  //   $local_variable = "ローカルです";
  //   echo $local_variable;
    // 関数の中では外で作った変数が使えない
    // echo $global_variable;
  // }

  // echo $global_variable;
  // 関数の中の変数は関数の外では使えない
  // echo $local_variable;

  // globalを使用することで使えるようになるがコードが複雑になるため非推奨
  // function check_scope( ) {
  //   $local_variable = "ローカルです";
  //   echo $local_variable;
  //   global $global_variable;
  //   echo $global_variable;
  // }

  // 引数で使ってあげる

  function check_scope( $str ) {
    $local_variable = "ローカルです";
    echo $str;
  }

  check_scope( $global_variable );





?>
