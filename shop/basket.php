<?php
include "modules/db.php";
include "modules/menu.php";
include "modules/session.php";
include "modules/authorization.php";

$titleMain = "Корзина";
$start = "Новый заказ";
$messages = [
'OK' => 'Ваш заказ оформлен!!!',
];

$result = mysqli_query($link, "SELECT * FROM basket INNER JOIN products on basket.id_product = products.id");
$sum = mysqli_query($link, "SELECT sum(price * `quantity`) FROM basket INNER JOIN products on basket.id_product = products.id");

if($_GET['action'] == 'change') {
	$quantity = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['quantity'])));
	$id_product = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_product'])));
	$sql = "UPDATE basket SET quantity = '{$quantity}' WHERE id_product = '{$id_product}'";
	mysqli_query($link, $sql);
	header("Location: /basket.php");
	die();		
}

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $row = mysqli_fetch_assoc($result);
    $quantitys = $row['quantity'];
    if ($session == $row['id_session']);
    	switch ($quantitys) {
    		case $quantitys == 1:
			mysqli_query($link, "DELETE FROM basket WHERE id_product = {$id}");
			header("Location: /basket.php");  
			break;
    		case $quantitys > 1:
			$sql = "UPDATE basket SET quantity = $quantitys - 1 WHERE id_product = '{$id}'";
			mysqli_query($link, $sql);
			header("Location: /basket.php");
			break;
    	}    
}

if ($_GET['action'] == 'order') {
	$name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
	$phone = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['phone'])));
    $sql = "INSERT INTO orders (name, phone, session_id, status) VALUES ('{$name}','{$phone}','{$session}','{$start}')";
    mysqli_query($link, $sql);
	header("Location: /basket.php?message=OK");
	die();
}

if (isset($_GET['message'])) {
	$message = $messages[$_GET['message']];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<title><?=$titleMain?></title>
</head>
<body>
	<div class="container">
		
		<? include "modules/header.php" ?>
		<? include "modules/form.php" ?>
		
		<div class="wrapper arrivalsProduct">
			<div class="productDetails">
				<span>Product Details</span>
				<div class="prodCategor">
					<span class="categor1">unite price</span>
					<span class="categor2">Quantity(Edit)</span>
					<span class="categor3">shipping</span>
					<span class="categor4">Subtotal</span>
					<span class="categor5">Action</span>
				</div>
			</div>

			
			<?php foreach($result as $item): ?>
		
				<section class="productCart">
					<div class="peopleCart">
						<img src="img/<?= $item['image_file']?>" alt="<?= $item['image_alt']?>">
						<div class="peopleTxt">
							<h4><?= $item['name'] ?></h4>
							<span class="peopleSpanOne">Color: </span><span class="peopleSpanTwo"></span><br>
							<span class="peopleSpanOne">Size:</span><span class="peopleSpanTwo"></span>
						</div>
					</div>
					<div class="shirtCart">
						<div class="uni"><span>Р <?= $item['price'] ?></span></div>

						<form action="?action=change" method="post">
							<div class="qua"><input type="text" name="quantity" value="<?= $item['quantity'] ?>">
								<button name="id_product" value="<?=$item['id_product']?>"><i class="fas fa-times-circle"></i></button>
							</div>
						</form>

						<div class="ship"><span>FREE</span></div>
						<div class="sub"><span>P <?= $item['price'] * $item['quantity']?></span></div>

						<a href="?action=delete&id=<?= $item['id'] ?>" class="act">
							<span><i class="color fas fa-times-circle"></i></span></a>

					</div>
				</section>

			<?php endforeach; ?>

			<div class="shopCart">
				<div class="clearShop">

					<span>ОФОРМИТЕ ЗАКАЗ</span>
				</div>
				<div class="contShop">
					<span>CONTINUE SHOPPING</span>
				</div>
			</div>
			<div class="containerForm">
				<div class="adress">
					<p><?=$message?></p>
					<form class="adressOne" action="?action=order" method="post">
						<h4>Ваше имя и телефон</h4>
						<input type="text" placeholder="Имя" name="name">
						<input type="text" placeholder="Телефон" name="phone">
						<button>Оформить</button>
					</form>
				</div>
				<div class="discount">
					<form class="discountOne" action="#">
						<h4>coupon  discount</h4>
						<label for="state">Enter your coupon code if you have one</label>
						<input type="text" id="state" placeholder="State">
						<button>Apply coupon</button>
					</form>
				</div>
				<div class="total">
					<div class="subTtl">
						<?php foreach($sum as $item): ?>

						<span class="sub-total">Sub total P<?= $item['sum(price * `quantity`)']?></span><br>
						<span class="grand">GRAND TOTAL<span class="grdTtl">P <?= $item['sum(price * `quantity`)']?></span></span>

						<?php endforeach; ?>
					</div>
					<button>proceed to checkout</button>
				</div>
			</div>	
		</div>	
	</div>
</body>
</html>