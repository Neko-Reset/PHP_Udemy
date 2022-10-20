<?php
// パスワードを記録した場所
echo __DIR__;
// /Applications/MAMP/htdocs/php_test/mainte

echo "<br>";

// パスワード暗号化
// php7からpassword_hash();が推奨されている
echo password_hash( "1234", PASSWORD_BCRYPT );
// 中身が暗号化される
// $2y$10$sMB7CkRT7xnL4L.cJe5V5e0HXDKZdsJBTOweAQYvp/q4PiiPzlvlW

?>
