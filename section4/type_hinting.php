<?php
// declare( strict_types = 1 ); //強い型の指定 チーム開発などの時に
// 少し高度な関数 タイプヒンティング
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

echo "タイプヒンティング";

function notype_hinting( $n ) {
  var_dump( $n );
}

notype_hinting([ "テスト" ]); // 引数が文字列予定に配列 -> エラーは出ない

echo "<br>";

// タイプヒンティング 引数1で型を指定,型が違うとエラーになる
// 型の種類はめっちゃある
function type_hinting( string $n ) {
  var_dump( $n );
}

// stringに配列を入れてるからエラー
type_hinting([ "配列エラー" ]);

?>
