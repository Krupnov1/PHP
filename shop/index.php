<?php
include "db.php";
$titleMain = "Каталог";

$result = mysqli_query($link, "SELECT * FROM `products` ORDER BY likes DESC");

$resultMenu = mysqli_query($link, "SELECT * FROM `menu` WHERE 1");

//var_dump($result ->num_rows);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
		<title><?=$titleMain?></title>
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
				<!--<button class="butHead">Корзина<i class="fas fa-caret-down"></i></button>
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
				</div>-->
			</header>
			
			<div class="catalogs">

				<?php foreach($result as $item): ?>

					<section class="product">
						<h3><?= $item['name'] ?></h3>
						<h4>(<?= $item['likes'] ?>)</h4>
						<a href="product.php?id=<?= $item['id'] ?>"><img src="img/<?= $item['image_file'] ?>" 
						alt="<?= $item['image_alt'] ?>" width ='320' height ='341'></a>
						

					</section>

				<?php endforeach; ?>
			</div>
		</div>
		<!--<script src="script.js"></script>-->
	</body>
</html>