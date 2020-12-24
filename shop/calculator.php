<?php

include "db.php";
$titleCalc = "Калькулятор";

$resultMenu = mysqli_query($link, "SELECT * FROM `menu` WHERE 1");


if(!empty($_POST)) {
	$number1 = (float)$_POST['number1'];
	$number2 = (float)$_POST['number2'];
	$operation = $_POST['operation'];
	$result = mathOperation($number1, $number2, $operation);
}

function mathOperation($a, $b, $operation) {
    switch($operation) {
        case "1":
            return($a + $b);
        case "2":
            return($a - $b);
        case "3":
            return($a * $b);
        case "4":
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
			
			<h1>Первый вариант калькулятора</h1>
			<form action="" method="post">
				<input type="text" name="number1" value="<?=$_POST['number1']?>">
				<select name="operation" id="">
					<option <?php if($operation == 1) echo "selected";?> value="1">+</option>
					<option <?php if($operation == 2) echo "selected";?> value="2">-</option>
					<option <?php if($operation == 3) echo "selected";?> value="3">*</option>
					<option <?php if($operation == 4) echo "selected";?> value="4">/</option>
				</select>
				<input type="text" name="number2" value="<?=$_POST['number2']?>">
				<input type="submit" value="=">
				<input type="text" name="result" readonly value="<?=$result?>">
				
			</form>
		</div>
	</body>
</html>