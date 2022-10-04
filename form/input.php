<?php 

// トークン(合言葉)を作れるようになるためのコード
// CSRF対策
// ロジック 入力でランダムにトークンを生成 確認で生成されたトークンと一緒であるかの判定を作る
// 合言葉が残ってると良くないから最後の処理で消す
session_start();

// サニタイズ クッリクジャッキング対策 (透明ボタンで他サイトに飛ばす行為)
header( "X-FRAME-OPTIONS:DENY" );

// get通信の中身の確認
// パラメータの中身の確認
// $_GET 
// 値が入っていないとエラーが出るからifで中身が入っていたらの条件を作る

// ピンポイントでパラメータを指定したい時
// if ( !empty( $_GET[ "your_name" ] ) ) {
//   // echo $_GET[ "your_name" ];
//   var_dump($_GET[ "your_name" ]);
// }

// 全部のパラメータをみたい時
if ( !empty( $_POST ) ) {
  echo "<pre>";
  var_dump( $_POST );
  echo "</pre>";
}

// セッションの中身確認
// if ( !empty( $_SESSION ) ) {
//   echo "<pre>";
//   var_dump($_SESSION);
//   echo "</pre>";
// }

// ↑スーパーグローバル変数 と呼ばれる
// phpには9種類ある
// 連想配列になる

// お問合せフォームの3つセット
// 入力 確認 完了 input.php confirm.php thanks.phpに本来は分ける
// 今回は1つでまとめる
// やり方
// 変数に0を入れてあげる
// 0入力
// 1確認
// 2完了

// if ( !empty( $_POST ) ) {
//   echo "<pre>";
//   var_dump( $_POST );
//   echo "</pre>";
// }

// xss対策 jsでなんかしてくるのを無効化
function h( $str ) {
  return htmlspecialchars( $str, ENT_QUOTES, "UTF-8" );
}

$page_flag = 0;

if ( !empty($_POST[ "btn_confirm" ] ) ) {
  $page_flag = 1;
}

if ( !empty($_POST[ "btn_submit" ] ) ) {
  $page_flag = 2;
}

?>

<!DOCTYPE html>
<meta charset = "utf-8">
<head></head>
<body>

  <?php if ( $page_flag === 0 ) : ?>

    <?php
    // session_start();を記述した後に書いたコード
     // 安全なトークンをランダムで生成してる
     // echo bin2hex(random_bytes(32));で中身が見れる
      // echo bin2hex(random_bytes(32));
      
     // issetはemptyと似てるが設定していなかったらの使い方
    if (!isset( $_SESSION[ "csrf_token" ] ) ) {
      $csrf_token = bin2hex(random_bytes(32));
      $_SESSION[ "csrf_token" ] = $csrf_token;
  }

  $token = $_SESSION[ "csrf_token" ];
    ?>


    <form method = "POST" action = "input.php">
      氏名
      <!-- "戻る"をしたときに値を保持して出力したい場合 valueの中身がこうなる -->
      <input type= "text" name= "your_name" value= "<?php if( !empty( $_POST[ 'your_name' ] ) ){ echo h( $_POST[ 'your_name' ] ); } ?>">
      <br>
      メール
      <!-- inputのtypeをemailにすると@が必要との判定をしてくれる -->
      <!-- バリデーションがあるようなイメージ -->
      <input type = "email" name = "email" value = "<?php if ( !empty( $_POST[ "email" ] ) ) { echo h( $_POST[ "email" ] ); }?>">
      <br>
      
      <input type = "submit" name = "btn_confirm" value = "確認する">
      <!-- トークン確認コード -->
      <!-- <?php echo $token; ?> -->
      <input type = "hidden" name = "csrf" value = "<?php echo $token; ?>">
    </form>
  <?php endif; ?>


  <?php if ( $page_flag === 1 ) : ?>
    <?php if ( $_POST[ "csrf" ] === $_SESSION[ "csrf_token" ] ) : ?>
      <form method = "POST" action = "input.php">
        氏名
        <?php echo h( $_POST[ "your_name" ] ); ?>
        <br>
        <?php echo h( $_POST[ "email" ] ); ?>
        <br>
        <input type = "submit" name = "back_submit" value = "戻る">
        <input type = "submit" name = "btn_submit" value = "送信する">

        <!-- get,postは通信すると値を保持できないから保持するためのコードを書く必要がある-->
        <input type = "hidden" name = "your_name" value = "<?php echo h( $_POST[ "your_name" ] ); ?>">
        <input type = "hidden" name = "email" value = "<?php echo h( $_POST[ "email" ]); ?>">
        <input type = "hidden" name = "csrf" value = "<?php echo h( $_POST[ "csrf" ]); ?>">
      </form>
    <?php endif; ?>
  <?php endif; ?>


  <?php if ( $page_flag === 2 ) : ?>
    <?php if ($_POST['csrf'] === $_SESSION['csrf_token']) : ?>
    送信完了
    <!-- トークン削除 -->
    <?php unset( $_SESSION[ "csrf_token" ] )?>
    <?php endif; ?>
  <?php endif; ?>


  
  <!-- formの型枠 -->
  <!-- ここでget, post通信を選択 action はファイル名 -->
  <!-- getはurlのクエリにパラメータがくっつく -->
  <!-- postは表示したくない情報のとき -->
  <!-- <form method = "POST" action = "input.php">
  氏名 -->
  <!-- inputのタイプを指定 パラメータを受け取るためにinputに名前をつける必要がある -->
  <!-- <input type = "text" name = "your_name">
  <br>
  <input type = "email" name = "email">
  <br> -->
  <!-- 複数のテックボックスの作り方 -->
  <!-- <input type = "checkbox" name = "sports[]" value = "野球">野球
  <input type = "checkbox" name = "sports[]" value = "サッカー">サッカー 
  <input type = "checkbox" name = "sports[]" value = "テニス">テニス
  <br> -->
  <!-- <input type = "submit" name = "btn_confirm" value = "確認する"> -->
  <!-- </form> -->


</body>
</html>
