<?php

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

// インターフェイス
interface ProductInterface {
  // 変数 関数
  // final publicと書くとこのクラスからはもう継承できないとなる
  
  // インターフェイスにするとメソッドしか作れない
  // 子クラスで呼び出さないとエラーになる
  public function get();
}

interface ProductInterface2 {
}

// 親クラス 基礎クラス

class BaseProduct {
  // 変数 関数
  // final publicと書くとこのクラスからはもう継承できないとなる

  public function echoProduct() {
    echo "親クラス";
  }

  // オーバーライド 上書き
  // 名前が一緒だと子クラスの方が優先される
  public function getProduct() {
    echo "オーバーライドしました";
  }
}

// 具象クラス 子クラス サブクラス 継承の書き方extends
// class 子クラス extends 親クラス
//インターフェイスの場合はimplements 複数子クラスを継承できる
class Product implements ProductInterface, ProductInterface2 {

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

  public function get() {
    echo "インターフェイス";
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

$instance -> get();

// $instance -> echoProduct();

$instance -> getProduct();

// 静的(static) クラス名::getStaticProduct
Product::getStaticProduct( "静的" );
echo "<br>";
