<?php

include "db.php";
$titleCalc = "Калькулятор2";

$resultMenu = mysqli_query($link, "SELECT * FROM `menu` WHERE 1");


if(!empty($_POST)) {
	$number1 = (float)$_POST['number1'];
	$number2 = (float)$_POST['number2'];
	$operation = $_POST['operation'];
	$result = mathOperation($number1, $number2, $operation);
}

function mathOperation($a, $b, $operation) {
    switch($operation) {
        case "+":
            return($a + $b);
        case "-":
            return($a - $b);
        case "*":
            return($a * $b);
        case "/":
            return($b == 0)? "Ошибка!!! На ноль делить нельзя!!!" : ($a / $b);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title><?=$titleCalc?></title>
	</head>
	<body>
		<div class="container">
			<header>
				<nav class="navigation">
					<?php foreach($resultMenu as $value): ?>
	        			<a href="<?= $value['route'] ?>"> <?= $value['name'] ?> </a>
					<?php endforeach; ?>
				</nav>
				<div class="logo">
					<a href="#"><span>BRAN</span><span class="headSp">D</span></a>	
				</div>
			</header>
			<h1>Второй вариант калькулятора</h1>
    		<form action="" method="post">
		        <input type="text" name="number1" value="<?=$_POST['number1']?>">
		        <input type="submit" value="+" name="operation">
		        <input type="submit" value="-" name="operation">
		        <input type="submit" value="*" name="operation">
		        <input type="submit" value="/" name="operation">
		        <input type="text" name="number2" value="<?=$_POST['number2']?>"> =
		        <input type="text" name="result" readonly value="<?=$result?>">
    		</form>
		</div>
	</body>
</html>