<?php

function insertContacts($request) {
    //DB接続
    require("db_connection.php");

    //入力 DB保存 prepare execute(配列(全て文字列))
    $params = [
    "id" => null,
    "name" => $request[ "your_name" ],
    "email" => $request[ "email" ],
    "url" => $request[ "url" ],
    "gender" => $request[ "gender" ],
    "age" => $request[ "age" ],
    "contact" => $request[ "contact" ],
    "created_at" => null //nullで自動で時間が入る
    ];

    $count = 0;
    $columns = '';
    $values = '';

    // array_keysを使うと連想配列の左側のkeyを持っていくことができる
    foreach (array_keys($params) as $key) {
        if ($count++ > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' . $key;
    }

    //sql処理
    $sql = 'insert into users ('. $columns .')values('. $values .')';

    // var_dump( $sql );
    // string(130) "insert into users (id,name,email,url,gender,age,contact,created_at)values(:id,:name,:email,:url,:gender,:age,:contact,:created_at)"
    // exit();
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute($params); //実行
}
?>
