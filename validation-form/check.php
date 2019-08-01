<?php
ini_set('display_errors','On');// - выводить информацию об ошибке
error_reporting(E_ALL|E_STRICT);// - выводить информацию об ошибке

$login_user = filter_var(trim($_POST['login_user']), FILTER_SANITIZE_STRING);
$password_user = filter_var(trim($_POST['password_user']), FILTER_SANITIZE_STRING);
$first_name_user = filter_var(trim($_POST['first_name_user']), FILTER_SANITIZE_STRING);
$second_name_user = filter_var(trim($_POST['second_name_user']), FILTER_SANITIZE_STRING);
$city_user = filter_var(trim($_POST['city_user']), FILTER_SANITIZE_STRING);
$email_user = filter_var(trim($_POST['email_user']), FILTER_SANITIZE_EMAIL);

if (mb_strlen($login_user) < 5 || mb_strlen($login_user) > 32) {
  echo "Login is not correct - number of characters from 5 to 32";
  exit();
} else if(mb_strlen($password_user) < 4 || mb_strlen($password_user) > 10) {
  echo "Password name is not correct - number of characters from 4 to 10";
  exit();
} else if(mb_strlen($first_name_user) < 1 || mb_strlen($first_name_user) > 30) {
  echo "First name is not correct - number of characters from 1 to 32";
  exit();
} else if(mb_strlen($second_name_user) < 1 || mb_strlen($second_name_user) > 30) {
  echo "Second name is not correct - number of characters from 1 to 32";
  exit();
} else if(mb_strlen($city_user) < 1 || mb_strlen($city_user) > 30) {
  echo "City is not correct - number of characters from 1 to 32";
  exit();
} else if(mb_strlen($email_user) < 3 || mb_strlen($email_user) > 30) {
  echo "Email name is not correct - number of characters from 3 to 30";
  exit();
}

$password_user = md5($password_user."utyhrgfrbgf");

require "../blocks/connect.php";
$result_check = $mysql -> query ("SELECT * FROM `users` WHERE `login_user` =
'$login_user' OR `email_user` = '$email_user'");
$user_not_find = $result_check -> fetch_assoc();
if (count ($user_not_find) == 0) {
$mysql->query("INSERT INTO `users` (`creator_user`, `login_user`, `password_user`, `email_user`, `first_name_user`, `second_name_user`, `city_user`)
VALUES ('web', '$login_user', '$password_user', '$email_user', '$first_name_user', '$second_name_user', '$city_user')");
$mysql->close();
}
else {
  echo "такой логин уже занят";
  exit();
}

header ('Location:/')

?>
