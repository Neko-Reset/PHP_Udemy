<?php

function validation( $request ) { //$_POST連想配列が入ってくる
  $errors = [];

  // 中身がなかったら 文字が20文字以内の制限
  if ( empty( $request[ "your_name" ] ) || 20 < mb_strlen( $request[ "your_name" ] ) ) {
    // エラーをまとめて保管するために空の配列を作る
    $errors[] = "氏名は必須です。20文字以内にしてください";
  }

  // メールアドレスとurlはhtmlで検証が入っているのでtypeを変えないとここのバリデーションが動いてるか確認できない
  // 簡易的なバリデーション
  // filter_var( "検証したい値", オプション )
  // !をつけて否定のコードにする

  if ( empty( $request[ "email" ] ) || !filter_var( $request[ "email" ], FILTER_VALIDATE_EMAIL ) ) {
    $errors[] = "メールアドレスは必須です。正しい形式で入力してください";
  }
  
  // ホームページの値が入っていたらの分岐にさらにifでフィルターをかける
  if ( !empty( $request[ "url" ] ) ) {
    if ( !filter_var( $request [ "url" ] , FILTER_VALIDATE_URL  ) ) {
      $errors[] = "urlが正しくありません。正しい形式で入力してください。";
    }
  }

  // 年齢はチェックを押している仕様なのでissetで設定していなかったらの条件
  if ( !isset( $request[ "gender" ] ) ) {
    $errors[] = "性別は必須です";
  }

  //設定している数字が6までなので6以上の値が来たらの制限
  if ( empty( $request[ "age" ] ) || 6 < $request[ "age" ] ) {
    $errors[] = "年齢は必須です";
  }

  if ( empty( $request[ "contact" ] ) || 200 < mb_strlen( $request[ "contact" ] ) ) {
    $errors[] = "お問合せ内容は必須です。200文字以内にしてください";
  }

  if ( empty( $request[ "caution" ] ) ) {
    $errors[] = "注意事項にチェックをつけてください";
  }

  // 関数のreturnはifの外
  return $errors;
}





?>
