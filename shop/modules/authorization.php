<?php
include "session.php";

$error = [
	'ERROR' => 'Неверный логин пароль',
];

$authorization = false;

if (!empty($_SESSION['login'])) {
	$name = $_SESSION['login'];
	$authorization = true;
}

function isAdmin() {
	return $_SESSION['login'] == 'admin'; 
}

if ($_GET['action'] == 'auth') {
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$results = mysqli_query($link, "SELECT * FROM users WHERE login = '{$login}'");
	$rows = mysqli_fetch_assoc($results);
	if (password_verify($pass, $rows['password'])) {
		$_SESSION['login'] = $login;
		header("Location: /index.php");
		die();
	} else {
		header("Location: /index.php?message=ERROR");
		die();
	}
}

if (isset($_GET['message'])) {
	$errors = $error[$_GET['message']];
}

if (isset($_GET['logout'])) {
	session_destroy();
	header("Location: /index.php");
	die();
}
