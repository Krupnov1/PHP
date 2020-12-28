<?php
include "connect/db.php";
include "connect/menu.php";
include "connect/session.php";

$product = "Товар";

$id = (int)$_GET['id'];

mysqli_query($link, "UPDATE `products` SET likes = likes + 1 WHERE id = {$id}");

$result = mysqli_query($link, "SELECT * FROM `products` WHERE id = {$id}");

$image = mysqli_fetch_assoc($result);
//var_dump($image);

if(!empty($_POST)) {
	$id_product = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_product'])));
	$sql = "INSERT INTO basket (id_session, id_product) VALUES ('{$session_id}','{$id_product}')";
	mysqli_query($link, $sql);	
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
			<div class="catalog">
				<div class="product">
					<form action="" method="post">
						<img src="img/<?= $image['image_file'] ?>" alt="<?= $image['image_alt'] ?>">
						<div class="like">(<?= $image['likes'] ?>)</div>
						<button class="butSection" name="id_product" value="<?=$image['id']?>">Add to Cart</button>
					</form>
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
					<form class="contWomForm" action="#">
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
							<input class="quant" type="text" placeholder="2">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>