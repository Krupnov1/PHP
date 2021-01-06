<header>
	<nav class="navigation">

		<?php foreach($resultMenu as $value):?>

			<a href="<?= $value['route'] ?>"> <?= $value['name'] ?> </a>

		<?php endforeach; ?>
		<a href="/basket.php">Корзина ( <?=$count?> ) </a>

		<?if (isAdmin()):?>
			<a href="/admin.php">Страница админа</a>
		<?endif;?>

	</nav>
	<div class="logo">
		<a href="../index.php"><span>BRAN</span><span class="headSp">D</span></a>	
	</div>
</header>