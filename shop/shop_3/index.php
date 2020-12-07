<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
		<?php $title = "Товары"?>
		<title><?=$title?></title>
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
					<?php $product_1 = "Товар 1"?>
					<h3><?=$product_1?></h3>
					<?php $productImg_1 = "img/img_1.jpg"?>
					<img src="<?=$productImg_1?>" alt="product_1">
					<?php $productPrice_1 = 3000?>
					<span class="prodSpan"><?=$productPrice_1?><i class="fas fa-ruble-sign"></i></span>
					<button class="butSection" data-id="1" data-name="Товар 1"data-price="3000" >В корзину</button>
				</section>
				<section class="product">
					<?php $product_2 = "Товар 2"?>
					<h3><?=$product_2?></h3>
					<?php $productImg_2 = "img/img_2.jpg"?>
					<img src="<?=$productImg_2?>" alt="product_2">
					<?php $productPrice_2 = 6000?>
					<span class="prodSpan"><?=$productPrice_2?><i class="fas fa-ruble-sign"></i></span>
					<button class="butSection" data-id="2" data-name="Товар 2"data-price="6000" >В корзину</button>
				</section>
				<section class="product">
					<?php $product_3 = "Товар 3"?>
					<h3><?=$product_3?></h3>
					<?php $productImg_3 = "img/img_3.jpg"?>
					<img src="<?=$productImg_3?>" alt="product_3">
					<?php $productPrice_3 = 14000?>
					<span class="prodSpan"><?=$productPrice_3?><i class="fas fa-ruble-sign"></i></span>
					<button class="butSection" data-id="3" data-name="Товар 3"data-price="14000" >В корзину</button>
				</section>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>