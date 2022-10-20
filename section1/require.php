<?php
  // 他のファイルの読み込み方法
  // そのファイルの変数が使える
  // 階層は/で common/common.php

  // エラーが出て処理が止まる
  // require

  // エラーではなく警告が出る
  // include

  require "common.php";

  echo $require;
  require_variable();

  // マジック定数
  // 絶対pathの表示
  echo __DIR__;

  echo "<br>";

  // 現在のファイルの在りか
  echo __File__;

?>
