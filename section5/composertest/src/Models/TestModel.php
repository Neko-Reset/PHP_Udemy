<?php

namespace src\Models;

// クラス名とファイル名は同じでなきゃだめ
class TestModel
{

  private $text = "hello world";

  public function getHello() {
    return $this -> text;
  }
}
