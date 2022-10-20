<?php
// 流れ
// 1 開く fopen(r, w, a)
// 2 flock(場合によって)
// 3 読み込み/書き込み/追記 fgets/fwrite
// 4 閉める fclose
// ファイル名を変数に格納
$file_contact = ".contact.dat";

// 関数を変数に格納
// モードを選択する必要がある
// a+で書き足モード

$open_file = fopen($file_contact, 'a+');

// 改行つきで追加したい内容を変数に
$add_text = "追加したいです" . "\n";

// 書き込むコード
fwrite($open_file, $add_text);

// クローズで閉める必要がある
fclose($open_file);

?>
