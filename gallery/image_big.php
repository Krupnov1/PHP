<?php

include "db.php";

$id = (int)$_GET['id'];

$result = mysqli_query($link, "SELECT * FROM `images` WHERE id = {$id}");


$image = mysqli_fetch_assoc($result);

//var_dump($image);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
		<title>Галерея</title>
	</head>
	<body>
		<div class="container">
			<header>
				<button class="butHead">Корзина<i class="fas fa-caret-down"></i></button>
				<div class="basketBlock blockNone">
					<table>
						<thead>
							<tr class="row">
								<th>ID</th>
								<th>Наименование</th>
								<th>Цена</th>
								<th>Количество</th>
								<th></th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr class="rowFoot">
								<th colspan="2">Итого:</th>
								<td colspan="3"><span class="total">0</span><i class="fas fa-ruble-sign"></td>
							</tr>
						</tfoot>
						
					</table>
				</div>
			</header>
			<div class="catalog">
				<section class="product">

					<img src="img/<?= $image['image_name'] ?>" alt="<?= $image['image_alt'] ?>">

				</section>
			</div>
		</div>
	</body>
</html>