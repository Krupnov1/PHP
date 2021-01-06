<?php
include "modules/authorization.php";
if (isAdmin()) {
	
} else {
	header("Location: /index.php");
}

include "modules/db.php";
include "modules/menu.php";

$result = mysqli_query($link, "SELECT `name`, `phone`, `status`, ROW_NUMBER() over (order by name) FROM `orders`");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Админ</title>
</head>


<body>
	<div class="container">
		
		<? include "modules/header.php" ?>
		<? include "modules/form.php" ?>
		
		<h2>Заказы</h2>
	<table>
		<tr>
			<td>№</td>
			<td>Имя</td>
			<td>Телефон</td>
			<td>Статус</td>
		</tr>
		<?php foreach($result as $item):?>

			<tr>
				<td><?=$item['ROW_NUMBER() over (order by name)'] ?></td>
				<td><?= $item['name'] ?></td>
				<td><?= $item['phone'] ?></td>
				<td><?= $item['status'] ?></td>
			</tr>

		<?php endforeach; ?>
		
	</table>
	</div>
</body>


















</html>