<?php
ini_set('display_errors','On');// - выводить информацию об ошибке
error_reporting(E_ALL|E_STRICT);// - выводить информацию об ошибке

$login_user = filter_var(trim($_POST['login_user']), FILTER_SANITIZE_STRING);
$password_user = filter_var(trim($_POST['password_user']), FILTER_SANITIZE_STRING);

$password_user = md5($password_user."utyhrgfrbgf");

require "../blocks/connect.php";
$result = $mysql -> query ("SELECT * FROM `users` WHERE `login_user` =
'$login_user' AND `password_user` = '$password_user'");
$user = $result -> fetch_assoc();
if (isset($user) && !empty($user)) {
setcookie ('user', $user['login_user'], time() + 3600, "/");
$mysql->close();
header ("Location: /index.php");
}
else echo "User is not found";
?>
