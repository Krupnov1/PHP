<?php

include "modules/authorization.php";
include "modules/db.php";
include "modules/menu.php";
include "modules/session.php";

$titleCalc = "Калькулятор";

if($_GET['action'] == 'one') {
	$number1 = (float)$_POST['number1'];
	$number2 = (float)$_POST['number2'];
	$operation = $_POST['operation'];
	$results_one = mathOperationOne($number1, $number2, $operation);
}

function mathOperationOne($a, $b, $operation) {
    switch($operation) {
        case "1":
            return $a + $b;
        case "2":
            return $a - $b;
        case "3":
            return $a * $b;
        case "4":
            return($b == 0)? "Ошибка!!! На ноль делить нельзя!!!" : ($a / $b);
        default:
            echo "Значение не верно!!!";
    }
}


if($_GET['action'] == 'two') {
	$number1 = (float)$_POST['number3'];
	$number2 = (float)$_POST['number4'];
	$operation = $_POST['operation'];
	$results_two = mathOperationTwo($number1, $number2, $operation);
}

function mathOperationTwo($a, $b, $operation) {
    switch($operation) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            return($b == 0)? "Ошибка!!! На ноль делить нельзя!!!" : ($a / $b);
    	default:
            echo "Значение не верно!!!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<title><?=$titleCalc?></title>
	</head>
	<body>
		<div class="container">
			
			<? include "modules/header.php" ?>
			<? include "modules/form.php" ?>

			<h1>Первый вариант калькулятора</h1>
			<form action="?action=one" method="post">
				<input type="text" name="number1" value="<?=$_POST['number1']?>">
				<select name="operation" id="">
					<option <?php if($operation == 1) echo "selected";?> value="1">+</option>
					<option <?php if($operation == 2) echo "selected";?> value="2">-</option>
					<option <?php if($operation == 3) echo "selected";?> value="3">*</option>
					<option <?php if($operation == 4) echo "selected";?> value="4">/</option>
				</select>
				<input type="text" name="number2" value="<?=$_POST['number2']?>">
				<input type="submit" value="=">
				<input type="text" name="result" readonly value="<?=$results_one?>">
			</form>

			<h1>Второй вариант калькулятора</h1>
    		<form action="?action=two" method="post">
		        <input type="text" name="number3" value="<?=$_POST['number3']?>">
		        <input type="submit" value="+" name="operation">
		        <input type="submit" value="-" name="operation">
		        <input type="submit" value="*" name="operation">
		        <input type="submit" value="/" name="operation">
		        <input type="text" name="number4" value="<?=$_POST['number4']?>"> =
		        <input type="text" name="result" readonly value="<?=$results_two?>">
    		</form>

		</div>
	</body>
</html>