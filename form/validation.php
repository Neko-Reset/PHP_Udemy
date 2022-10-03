<?php

function validation( $request ) { //$_POST連想配列が入ってくる
  $errors = [];

  // 中身がなかったら 文字が20文字以内の制限
  if ( empty( $request[ "your_name" ] ) || 20 > mb_strlen( $request[ "your_name" ] ) ) {
    // エラーをまとめて保管するために空の配列を作る
    $errors[] = "氏名は必須です";
  }

  // 年齢はチェックを押している仕様なのでissetで設定していなかったらの条件
  if ( isset( $request[ "gender" ] ) ) {
    $errors[] = "性別は必須です";
  }

  //設定している数字が6までなので6以上の値が来たらの制限
  if ( empty( $request[ "age" ] || 6 < $request[ "age" ] ) ) {
    $errors[] = "年齢は必須です";
  }

  if ( empty( $request[ "contact" ] ) || 200 > mb_strlen( $request[ "contact" ] ) ) {
    $errors[] = "お問合せ内容は必須です。200文字以内にしてください";
  }

  if (empty( $request[ "caution" ] ) ) {
    echo "注意事項にチェックをつけてください";
  }

  // 関数のreturnはifの外
  return $errors;
}





?>
