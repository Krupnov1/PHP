<?php
include "connect/db.php";
include "connect/menu.php";
include "connect/session.php";

$titleMain = "Корзина";

$result = mysqli_query($link, "SELECT * FROM basket INNER JOIN products on basket.id_product = products.id");

if(!empty($_POST)) {
	$id_product = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['id_product'])));
	$sql = mysqli_query($link, "DELETE FROM basket WHERE id_product = {$id_product}");	
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

		<div class="wrapper arrivalsProduct">
			<div class="productDetails">
				<span>Product Details</span>
				<div class="prodCategor">
					<span class="categor1">unite price</span>
					<span class="categor2">Quantity</span>
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
						<div class="qua"><input type="text" placeholder="1"></div>
						<div class="ship"><span>FREE</span></div>
						<div class="sub"><span>$300</span></div>
						<form action="" method="post">
							<button class="act" name="id_product" value="<?=$item['id_product']?>">
								<span><i class="fas fa-times-circle"></i></span>
							</button>
						</form>
					</div>
				</section>

			<?php endforeach; ?>

			<div class="shopCart">
				<div class="clearShop">
					<span>CLEAR SHOPPING CART</span>
				</div>
				<div class="contShop">
					<span>CONTINUE SHOPPING</span>
				</div>
			</div>
			<div class="containerForm">
				<div class="adress">
					<form class="adressOne" action="#">
						<h4>Shipping Adress</h4>
						<select name="#" id="#">
							<option value="bangladesh">Bangladesh</option>
							<option value="russia">Russia</option>
							<option value="china">China</option>
							<option value="indonesia">Indonesia</option>
						</select>
						<input required type="text" placeholder="State">
						<input required type="number" placeholder="Postcode / Zip">
						<button>get a quote</button>
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
						<span class="sub-total">Sub total  $900</span><br>
						<span class="grand">GRAND TOTAL<span class="grdTtl">$900</span></span>
					</div>
					<button>proceed to checkout</button>
				</div>
			</div>	
		</div>	
	</div>
</body>
</html>