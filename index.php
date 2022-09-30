
<?php
  // 配列
  // $array = [ ["青", "赤", 123], ["白", "黄色"] ];

  // echo "<pre>";
  // var_dump($array);
  // echo "<pre>";

  // echo $array[0][0];

  // echo $array[0];
  // echo $array[1];
  
  // var_dump($test);
  // echo $test;

  // 連想配列
  // $hash = [ name => "田中", name1 => "鈴木", high => 123 ];
  // echo "<pre>";
  // var_dump($hash);
  // echo "<pre>";

  // echo $hash[high];

  // 連想配列の中に連想配列
//   $hash = [ 神奈川 => [ 田中 => [ high => 123, age => 29 ] ],
//             埼玉 => [ 鈴木 => [ high => 170, age => 30 ] ]

// ];

//   echo "<pre>";
//   var_dump($hash);
//   echo "<pre>";

//   echo $hash[神奈川][田中][high];

// 条件分岐
// $number = 100;

// if ( $number === 10 ) {
//   echo "身長は".$number;
// } else {
//   echo "身長は".$number."ではありません";
// }

// 条件分岐はネストできる

// if ( $number === 100 ) {
//   if ( $number > 10 ) {
//     echo " スピード違反です";
//   }
// }

// データが入っているかどうか
// isset empty is_null

// $number = 11;

// emptyは変数が空だったらtrue elseが必要になるから非推奨
// !emptyにすると変数に値が入っていたらになる こちらだとコードが短くなる
// if ( !empty( $number ) ) { 
//   echo "入っているよ";
// }

// AND と OR

// && はどちらも当てはまっていたら ||片方が一致していたら

// $number = 100;

// if ( $number === 100 && !empty( $number ) ) {
//   echo "入っているよ";
// }

// echo "<br>";

// if ( $number === 100 && $number >= 10 ) {
//   echo "10以上";
// }

// 三項演算子
// true false
// ? が真 :が偽

// $number = 9;

// $number  = $number >= 10 ? "10超えてる" : "10以下";

// echo $number;

// foreachの使い方
// バリューのみ出力
// $numbers = [ high => 170, age => 30, name => "田中" ];
// foreach ( $numbers as $number ) {
//   echo $number. " ";
// }

// key と 値 の出力
// foreach ( $numbers as $key => $value ) {
//   echo "値は" . $key . "中身は" . $value . "<br>";
// }

// 多段構造の取り出し方
// foreachを必要な分使う

// $hashs = [ 神奈川 => [ 本田くん => [ high => 170, age => 30, hobby => "サッカー" ] ],
//           埼玉 => [ 鈴木 => [ high => 170, age => 40, hobby => "プログラミング" ] ]
// ];

// foreach ($hashs as $hash) {
//   foreach ( $hash as $name ) {
//     foreach ( $name as $key => $value ) {
//       echo $key . $value . "<br>";
//     }
//   }
// }

// for文 break continue
// break と continueはコードが読みづらくなるからなるべく使わない方がいいらしい
// echoの場所がif{}の外
// 繰り返す数が決まっている場合はfor

// for ( $i = 1; $i < 10; $i++ ) {
//   if ( $i === 5 ) {
//     // break;
//     continue;
//   }
//   echo $i . " ";
// }

// for ( $i = 1; $i < 100; $i++) {
//   if ( $i % 15 === 0 ) {
//     echo "Fizzbuzz";
//   } elseif ( $i % 5 === 0 ) { 
//     echo "Fizz";
//   } elseif ( $i % 3 === 0 ) {
//     echo "Buzz";
//   } else {
//   echo $i;
//   }
//   echo "<br>";
// }

// echo "<br>";
// while文 Rubyと一緒で外に変数の値を設定
// 繰り返す数が決まっていない場合はwhile

// $sum = 1;

// while ( $sum < 10 ) {
//   if ( $sum  )
//   echo $sum . " ";
//   $sum++;
// }

// $sum = 1;

// while ( $sum < 100 ) {
//   $sum++;
//   if ( $sum % 15 === 0 ) {
//     echo "FizzBuzz";
//   } elseif ( $sum % 5 === 0 ) {
//     echo "Fizz";
//     // break;
//   } elseif ( $sum % 3 === 0 ) {
//     echo "Buzz";
//   } else {
//     echo $sum;
//   }
//   echo "<br>";
// }

// switch
// なるべく使わない方がいい
// ifの方が読みやすい
// 全てにbreakを入れてあげる必要がある(次の処理に行ってしまうため)
// switch だと == の判定になる
// case $sum === 10 とやればいいけれども複雑になるからswitchは非推奨

// $sum = 10;
// switch ( $sum ) {
//   case 12:
//   echo "10です";
//   break;

//   case 20:
//   echo "20です";
//   break;

//   default:
//   echo "10ではありません";
// }

// 関数

// インプットなし
// アウトプットなし

// function test() {
//   // 処理
//   echo "hello";
// }

// test();

// インプットあり
// アウトプットなし
// 引数の中に入れたやつが出てくる


// function test($n) {
//   echo $n;
// }

// test("ウエーい");

// $n を使わなくても動く
// 関数に入れた引数の名前と処理の名前は一緒じゃないとだめ

// function test( $n ) {
//   echo $n;
// }

// $s = "hello";

// test($s);

// インプット無し
// アウトプット戻り値あり

// function getNumber() {
//   return 5;
// }

// echoがないためvar_dump(getNumber());で見ると値が確認できる
// echoでも出来た
// var_dump(getNumber());
// echo getNumber();

// 変数に格納できる
// $test = getNumber();

// echo $test;

// 引数2つ
// 返り値あり

// function total_price( $price, $price2 ) {
//   $total = $price + $price2;
//   return $total;
// }

// echo total_price(2, 2);

// よく使う組み込み関数 文字列

// 文字列の長さを返す
// Rubyの変数名.sizeと一緒

// $test = "test";

// echo strlen($test);

// 日本語 UTF-8 だと期待された値が返ってこない
// マルチバイト数が３~6 * で返ってくる 1文字3で計算されるってこと
// マルチバイトの関数を使う

// $test = "プログラミング";
// echo mb_strlen($test);

// 文字列の置換
// 一致する文字列を置換する

// $n = "文字列を置換します";
// str_replace( "変えたい文字列", "変換したい文字列", 変数 );
// echo str_replace( "置換", "変換", $n );

// 指定文字列の分割
// 配列で返ってくる
// Rubyの変数.split("、")と一緒

// $n = "文字を、分けます、はにゃ？";

// 配列にecho使うとarrayで返ってくる
// echo explode( "、", $n );

// echo "<pre>";
// var_dump( explode("、", $n) );
// echo "</pre>";

// 配列を文字列に返す
// Rubyの変数.joinと似てる
// implode

// $n = [ "赤", "青", "黄色" ];

// echo "<pre>";
// var_dump(implode($n));
// echo "</pre>";

// 高度な文字検索の関数
// 正規表現
// 主に使うとき
// 文字かどうか、郵便番号、メールアドレス test@gamil.com の @ . が入っているかどうか

// $n = "特定の文字";

// echo preg_match("/特定/", $n);

// 指定文字列から文字を取得する
// 指定した数字の数が切り取られる
// 0番目はないみたい
//これもmbでマルチバイトに変える必要がある


// $n = "aいうえお";

// echo substr( $n, 1 );
// echo mb_substr( $n, 0 );

// 関数 配列
// 配列に配列を追加する

// $array = [ "りんご", "バナナ", "みかん" ];

// array_push( $array, "メロン", "なし" );

// echo "<pre>";
// var_dump( $array);
// echo "</pre>";

// 組み込み関数 in ユーザー定義関数
// 例郵便番号チェック(本来は正規表現)
// -全角を半角に
// -ハイフン削除
// -数字かどうか
// -7文字かどうか

// 関数名の付け方

// camelCase
// 頭文字は小文字、英単語の頭文字を大文字
// checkPostalCode();

// snakeCase
// 繋ぎは_でつなげる
// check_postal_code();

// 中身は途中でvar_dump();で確認できる ちょっと使いづらい
// echoで見れなかった

// $postal_code = "123-4567";

// function check_postal_code($postal_code) {
//   $check_str = str_replace( "-", "", $postal_code);
//   // var_dump($check_str);
//   $size = strlen($check_str);
//   var_dump($size);

//   if ( $size === 7 ) {
//     echo "true";
//     return true;
//   } else {
//     echo "false";
//     return false;
//   }
// }

// check_postal_code($postal_code);

// 簡易的に正規表現で作ってみる
$postal_code = "123-4567";

function check_postal_code($postal_code) {
  if (preg_match("/^[0-9]{3}-[0-9]{4}$/", $postal_code)) {
    echo "成功";
    return true;
  } else {
    echo "だめ";
  }
}

check_postal_code($postal_code);

?>
