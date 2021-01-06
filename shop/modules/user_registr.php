<?php

$titleCalc = "Регистрация пользователя";

$info = null;

$messages = [
	'OK' => 'Вы зарегистрированы!!!',
];

if(!empty($_POST)) {
	$user_name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
	$user_last_name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['last_name'])));
	$user_email = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['email'])));
	$user_tel = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['tel'])));
	$user_login = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['login'])));
	$pass = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['pass'])));
	$user_pass = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO users (name, last_name, email, telefon, login, password) VALUES ('{$user_name}','{$user_last_name}','{$user_email}','{$user_tel}','{$user_login}','{$user_pass}')";
	mysqli_query($link, $sql);
	header("Location: /registration.php?message=OK");
	die();
}

if (isset($_GET['message'])) {
	$message = $messages[$_GET['message']];
}