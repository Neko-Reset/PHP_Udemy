<?php
// 定数に格納
const DB_HOST = "mysql:dbname=udemy_php;host=127.0.0.1;charset=utf8";
const DB_USER = "php_user";
const DB_PASSWORD = "1234";
// ユーザーとパスは権限作成で作ったやつ
// $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD);

// 例外処理
// catchの後は決まっている
// new PDOの後に[]を入れるとオプションがつけれる
// よく使うオプション
try {
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //データベースに接続して返ってくる値を連想配列にする指定
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外を表示する 必須オプション
    PDO::ATTR_EMULATE_PREPARES => false //フォームにSQL文を入れるとデータベースが改ざんされるのを防ぐ 必須オプション
  ]);
  echo "接続成功";
} catch (PDOexception $e) {
  echo "Error: " . $e->getMessage() . "\n";
  exit();
}

?>
