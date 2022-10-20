<?php
// 可変引数(ドット3つ)
// 引数が複数必要な時に省略できる書き方
// : stringで返り値の型も指定している
function combine( string ...$name ): string
{
  $combine_name = "";
  for ( $i = 0; $i < count($name); $i++ ) {
    $combine_name .= $name[$i];
    if ( $i != count( $name ) -1 ) {
      $combine_name .= ",";
    }
  }
  return $combine_name;
}

$f_name = "苗字";
$l_name = "名前";
$name1 = combine( $f_name, $l_name );

echo "結合結果:" . $name1;
echo "<br>";

$variable_name = combine( "テスト1です", "テスト2です", "テスト3です" );
echo $variable_name;

?>
