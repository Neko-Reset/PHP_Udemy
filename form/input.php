<?php 

// トークン(合言葉)を作れるようになるためのコード
// CSRF対策
// ロジック 入力でランダムにトークンを生成 確認で生成されたトークンと一緒であるかの判定を作る
// 合言葉が残ってると良くないから最後の処理で消す
session_start();

require "validation.php";

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

// バリデーションの関数を変数に格納
$errors = validation( $_POST );

if ( !empty($_POST[ "btn_confirm" ] ) && empty( $errors ) ) {
  $page_flag = 1;
}

if ( !empty($_POST[ "btn_submit" ] ) ) {
  $page_flag = 2;
}

?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
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

      <!-- 変数の中身と確認ボタンの中身があったらエラーを表示するようにする -->
      <!-- 配列を表示するのでforeachを使う -->
      <!-- liを使ってリストで表示 -->
      <?php if ( !empty( $errors ) && !empty( $_POST[ "btn_confirm" ] )) : ?>
        <?php echo "</ul>"; ?>
          <?php foreach( $errors as $error ) : ?>
            <?php echo "<li>" . $error . "</li>"; ?>
          <?php endforeach ; ?>
        <?php echo "</ul>"; ?>
      <?php endif ; ?>

      <!-- bootstrap -->
      <!-- フォーム一つにdivに入れる -->
      <!-- labelで見やすくする forで命名 -->
      <!-- inputにclass名,id名(forと名前が一緒でなければならない)をつける -->
      <!-- inputのクラス名はドキュメント通りじゃないとだめ -->
      <!-- requiredをinputの最後に入れると必須属性になる -->
      <form method = "POST" action = "input.php">
      <!-- container,row,col-md-6でinputの長さを調整している -->
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class = "from-group">
                <label for = "your_name">氏名</label>
                <!-- "戻る"をしたときに値を保持して出力したい場合 valueの中身がこうなる -->
                <input type= "text" class = "form-control" id = "your_name" name= "your_name" value= "<?php if( !empty( $_POST[ 'your_name' ] ) ){ echo h( $_POST[ 'your_name' ] ); } ?>"required>
              </div>
              <div class = "form-group">
                <label for = "email">メール</label>
                <!-- inputのtypeをemailにすると@が必要との判定をしてくれる -->
                <!-- バリデーションがあるようなイメージ -->
                <input type = "email" class = "form-control" id = "email" name = "email" value = "<?php if ( !empty( $_POST[ "email" ] ) ) { echo h( $_POST[ "email" ] ); }?>"required>
              </div>
              <div class = "form-control">
                <label for="url">ホームページ</label>
                <input type = "url" class = "form-control" id = "url" name = "url" value = "<?php if ( !empty( $_POST[ "url" ] ) ) { echo h( $_POST[ "url" ] ); }?>">
              </div>
              
              性別
              <!-- チェックボックスにチェックを入れておきたい場合 -->
              <!-- 最後にcheckedをつける -->
              <!-- <input type = "radio" name = "gender" value = "0" checked > -->
              <!-- 保持をしたい場合、中身があるかの判定と===0を使う -->
              <!-- bootstrap -->
              <!-- ラジオボタンの操作 -->
              <!-- div class="form-check form-check-inline"を作る-->
              <!-- inputにclass = "form-check-inline"追加 idも追加,今回はgender1-->
              <!-- labelにclass = "form-check-label" for = "gender1"を追加 -->
              <div class="form-check form-check-inline">
                <input type = "radio" class = "form-check-inline" name = "gender" id = "gender1" value = "0" checked
                <?php if (!empty( $_POST[ "gender" ] ) && $_POST[ "gender" ] === "0" ) { echo "checked"; } ?>>
                <label class = "form-check-label" for = "gender1">男性</label>
                <input type = "radio" class = "form-check-inline" name = "gender" id = "gender2" value = "1" 
                <?php if (!empty( $_POST[ "gender" ] ) && $_POST[ "gender" ] === "1" ) { echo "checked"; } ?>>
                <label class = "form-check-label" for = "gender2">女性</label>
              </div>
        <input type = "radio" name = "gender" value = "0" checked
        <?php if (!empty( $_POST[ "gender" ] ) && $_POST[ "gender" ] === "0" ) { echo "checked"; } ?>>男性
        <input type = "radio" name = "gender" value = "1" 
        <?php if (!empty( $_POST[ "gender" ] ) && $_POST[ "gender" ] === "1" ) { echo "checked"; } ?>>女性
        <br>
        年齢
        <!-- selectタグにチェックをしときたい場合 -->
        <!-- 最後にselectedをつける -->
        <!-- <option value = "1" selected>~19歳</option> -->
        <select name = "age">
          <option value = "">選択してください</option>
          <option value = "1"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "1" ) { echo "selected"; }?>>~19歳</option>
          <option value = "2"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "2" ) { echo "selected"; }?>>20~29</option>
          <option value = "3"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "3" ) { echo "selected"; }?>>30~39</option>
          <option value = "4"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "4" ) { echo "selected"; }?>>40~49</option>
          <option value = "5"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "5" ) { echo "selected"; }?>>50~59</option>
          <option value = "6"
          <?php if (!empty( $_POST[ "gender" ]) && $_POST[ "age" ] === "6" ) { echo "selected"; }?>>60~</option>
        </select>
        <br>
        お問合せ内容
        <br>
        <textarea name = "contact">
          <?php if ( !empty( $_POST[ "contact" ] ) ) { echo h( $_POST[ "contact" ] ); }?>
        </textarea>
        <br>
        <input type = "checkbox" name = "caution" value = "1">注意事項のチェック
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
          メールアドレス
          <?php echo h( $_POST[ "email" ] ); ?>
          <br>
          ホームページ
          <?php echo h( $_POST[ "url" ] )?>
          <br>
          <性別>
            <?php
            if ( $_POST[ "gender" ] === "0" ) { echo "男性"; }
            if ( $_POST[ "gender" ] === "1" ) { echo "女性"; }
            ?>
          <br>
          <年齢>
            <?php
            if ( $_POST[ "age" ] === "1" ) { echo "~19"; }
            if ( $_POST[ "age" ] === "2" ) { echo "20~29"; }
            if ( $_POST[ "age" ] === "3" )  { echo "30~39"; }
            if ( $_POST[ "age" ] === "4" ) { echo "40~49"; }
            if ( $_POST[ "age" ] === "5" ) { echo "50~59"; }
            if ( $_POST[ "age" ] === "6" ) { echo "60"; }
            ?>
          <br>
          お問合せ
          <?php echo h( $_POST[ "contact" ] )?>
          <br>
          <input type = "submit" name = "back_submit" value = "戻る">
          <input type = "submit" name = "btn_submit" value = "送信する">

          <!-- get,postは通信すると値を保持できないから保持するためのコードを書く必要がある-->
          <input type = "hidden" name = "your_name" value = "<?php echo h( $_POST[ "your_name" ] ); ?>">
          <input type = "hidden" name = "email" value = "<?php echo h( $_POST[ "email" ]); ?>">
          <input type = "hidden" name = "url" value = "<?php echo h( $_POST[ "url" ]); ?>">
          <input type = "hidden" name = "gender" value = "<?php echo h( $_POST[ "gender" ]); ?>">
          <input type = "hidden" name = "age" value = "<?php echo h( $_POST[ "age" ]); ?>">
          <input type = "hidden" name = "contact" value = "<?php echo h( $_POST[ "contact" ]); ?>">
          <input type = "hidden" name = "gender" value = "<?php echo h( $_POST[ "gender" ]); ?>">
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

  <!-- Bootstrapのコード -->
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
