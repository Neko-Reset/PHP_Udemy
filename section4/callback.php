<?php
function combine_space( string $f_name, string $l_name): string
{
  return $l_name . " " . $f_name;
}

$name_array = [ "名前", "苗字" ];
// コールバック関数 引数の中に関数
function use_combine( array $name, callable $func ) 
{
  $concat_name = $func( ...$name );
  print( $func . "関数の結合結果:" . $concat_name . "<br>" );
}

use_combine( $name_array, "combine_space" );

?>
