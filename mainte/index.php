<?php
require ("db_connection.php");

// ユーザー入力なし
$sql = "select * from users where id = 2"; //SQL文
$stmt = $pdo -> query( $sql ); //$pdoは接続しているデータベース stmtはステーメント
// $result = $stmt->fetchAll(); //fetchAll(); でSQLの結果を返してくれる

// echo "<pre>";
// var_dump( $result );
// echo "</pre>";

// ユーザー入力あり prepare bind, execute
// 悪意のあるユーザーがdelete文などを入れるなどの対策をしないといけない
// SQLインジェクションと言う

$sql = "select * from users where id = :id"; //ユーザーが入力する場合 =の後は ? か :名前の2択 プレースホルダと呼ぶ
$stmt = $pdo -> prepare( $sql ); //プリペアードステーメント
// 数字のところはユーザー入力なので変数になる 今回は数字
$stmt -> bindValue( "id", 2, PDO::PARAM_INT ); //:名前の方で作った場合 紐付ける必要がある bindValueが紐付け("指定した名前", 数値, 数値の型を受け入れるPDO文)
$stmt -> execute(); //実行

$result = $stmt->fetchAll(); //fetchAll(); でSQLの結果を返してくれる

echo "<pre>";
var_dump( $result );
echo "</pre>";
?>
