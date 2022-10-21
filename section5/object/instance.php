<?php

class Product{

  // アクセス装飾, private(外からアクセスできない), protected(自分/継承したクラスのみ), public(公開)

  // 変数
  // クラスの中で使える変数を作っている
  private $product = [];


  // 関数
  // __constructでクラスを呼び出した初回に呼び出される関数
  function __construct( $product ) {
    $this -> product = $product;
  }

  public function getProduct() {
    echo $this -> product;
}

public function addProduct( $item ) {
  $this -> product .= $item;
}

public static function getStaticProduct( $str ) {
  echo $str;
}

}

// 引数を入れると上の__constructが動いて関数が動く
// インスタンス変数から矢印を使うことで関数を呼び出すことができる
$instance = new Product( "テスト" );

$instance -> getProduct();
echo "<br>";
var_dump( $instance );

$instance -> addProduct( "追加文" );

$instance -> getProduct();

// 静的(static) クラス名::getStaticProduct
Product::getStaticProduct( "静的" );
echo "<br>";
