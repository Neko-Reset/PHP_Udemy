<?php
// トレイトの書き方
trait ProductTrait {
  public function getProduct() {
    echo "トレイト";
  }
}

trait NewTrait {
  public function newProduct() {
    echo "セカンド";
  }
}

class Product {
  use ProductTrait; // useを使うことでトレイトを持っていくことができる
  use NewTrait;

  public function getInfo() {
    echo "インフォメーション";
  }
}

$product = new Product();
$product -> getInfo();
echo "<br>";
$product -> newProduct();
