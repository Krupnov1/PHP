<?php

include "modules/db.php";
include "modules/menu.php";
include "modules/session.php";
include "modules/authorization.php";

$product = "Товар";

$id = (int)$_GET['id'];

mysqli_query($link, "UPDATE `products` SET likes = likes + 1 WHERE id = {$id}");

$result = mysqli_query($link, "SELECT * FROM `products` WHERE id = {$id}");
//var_dump($result);
$image = mysqli_fetch_assoc($result);
//var_dump($image);


if(!empty($_POST)) {
	$id_product = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_product'])));
	$quantity = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['quantity'])));
	$basket_id = mysqli_query($link, "SELECT * FROM `basket` WHERE id_product = '{$id_product}' ");
	$bas_id = mysqli_fetch_assoc($basket_id);
	//var_dump($bas_id);

	if($bas_id == NULL) { 
	$sql = "INSERT INTO basket (id_session, id_product, quantity) VALUES ('{$session}','{$id_product}','{$quantity}')";
	mysqli_query($link, $sql);
	header("Location: /product.php?id=$id_product");
	die();
	} else  {
		$quantitys = $quantity + $bas_id['quantity'];
		$sql = "UPDATE basket SET quantity = '{$quantitys}' WHERE id_product = '{$id_product}'";
		mysqli_query($link, $sql);
		header("Location: /product.php?id=$id_product");
		die();
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
		<title><?=$product?></title>
	</head>
	<body>
		<div class="container">

			<? include "modules/header.php" ?>
			<? include "modules/form.php" ?>

			<div class="catalog">
				<div class="product">
					<img src="img/<?= $image['image_file'] ?>" alt="<?= $image['image_alt'] ?>">
					<div class="like">(<?= $image['likes'] ?>)</div>
				</div>
				<div class="moschino">
					<h5>PRODUCT COLLECTION</h5>
					<div class="bordMosch brdMoschLeft"></div>
					<div class="activBord"></div>
					<div class="bordMosch brdMoschRight"></div>
					<h4><?= $image['name'] ?></h4>
					<p><?= $image['description'] ?>
					<div class="matMosch">
						<div class="matCott">MATERIAL:<span>COTTON</span></div> 
						<div class="desBin">DESIGNER: <span>BINBURHAN</span></div>
					</div>
					<div class="price"><?= $image['price'] ?><i class="fas fa-ruble-sign"></i></div> 
					<div class="matMoschBord"></div>
					<form class="contWomForm" action="#" method="post">
						<div>
							<h5>CHOOSE COLOR</h5>
							<div class="colorRedCh">
								<div class="redChoose"></div>
								<select class="redSel" name="#">
									<option value="red">Red</option>
									<option value="green">Green</option>
									<option value="black">Black</option>
								</select>
							</div>
						</div>
						<div>
							<h5>CHOOSE SIZE</h5>
							<select name="#">
								<option value="XXL">XXL</option>
								<option value="XXL">XXL</option>
								<option value="XXL">XXL</option>
							</select>
						</div>
						<div>
							<h5>QUANTITY</h5>
							<input class="quant" type="text" placeholder="Введите количество" name="quantity" value="<?=$row['quantity']?>">
						</div>
						<button class="butSection" name="id_product" value="<?=$image['id']?>">Add to Cart</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>