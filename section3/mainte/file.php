<?php
// テキストファイルの開き方

// ファイル名を変数に入れる
$contact_file = ".contact.dat";

// ファイルを開く関数を変数に格納
$open_file = file_get_contents($contact_file);

// エコーで出力

// echo $open_file;

// ファイルに書き込み(上書き)
// file_put_contents( $contact_file, "テストです" );

// ファイルに書き込み(追加)
// 改行をつけて追加したい場合は変数に入れてあげる
// $text = "追加できてるよ" . "\n";
// file_put_contents( $contact_file, $text, FILE_APPEND );

// ,毎に区切って表示したい時
$add_test = file( $contact_file );

foreach( $add_test as $value) {
  $line = explode( ",", $value );
  echo $line[0];
  echo "<br>";
  echo $line[1];
  echo "<br>";

}
?>
