<?php

// 一度だけ読み込む必要があるから読み込む
require_once __DIR__ . "/vendor/autoload.php";

use src\Controllers\TestController;

// インスタンス化
$app = new TestController;

// TestControllerの関数を読んでいる
$app -> run();
