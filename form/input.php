<?php 
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
// if ( !empty( $_GET ) ) {
//   echo "<pre>";
//   var_dump($_GET);
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

if ( !empty( $_POST ) ) {
  echo "<pre>";
  var_dump( $_POST );
  echo "</pre>";
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
    <form method = "POST" action = "input.php">
      氏名
      <!-- "戻る"をしたときに値を保持して出力したい場合 valueの中身がこうなる -->
      <input type= "text" name= "your_name" value= "<?php if( !empty($_POST['your_name']) ){ echo $_POST['your_name']; } ?>">
      <br>
      メール
      <!-- inputのtypeをemailにすると@が必要との判定をしてくれる -->
      <!-- バリデーションがあるようなイメージ -->
      <input type = "email" name = "email" value = "<?php if ( !empty( $_POST[ "email" ] ) ) { echo $_POST[ "email" ]; }?>">
      <br>
      <input type = "submit" name = "btn_confirm" value = "確認する">
    </form>
  <?php endif; ?>


  <?php if ( $page_flag === 1 ) : ?>
    <form method = "POST" action = "input.php">
      氏名
      <?php echo $_POST["your_name"]; ?>
      <br>
      <?php echo $_POST["email"]; ?>
      <br>
      <input type = "submit" name = "back_submit" value = "戻る">
      <input type = "submit" name = "btn_submit" value = "送信する">

      <!-- get,postは通信すると値を保持できないから保持するためのコードを書く必要がある-->
      <input type = "hidden"  value = "<?php echo $_POST["your_name"]; ?>">
      <input type = "hidden"  value = "<?php echo $_POST["email"]; ?>">
    </form>
  <?php endif; ?>


  <?php if ( $page_flag === 2 ) : ?>
    送信完了
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
