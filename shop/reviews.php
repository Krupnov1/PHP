<?php
include "connect/db.php";
include "connect/menu.php";

$titleMain = "Отзывы";

$messages = [
	'OK' => 'Сообщение добавлено',
	'DELETE' => 'Сообщение удалено',
	'EDIT' => 'Сообщение изменено',
	'ERROR' => 'Ошибка'
];

$buttonText = "Добавить";
$action = "create";
$row = null;

if($_GET['action'] == 'create') {
	$name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
	$texts = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['texts'])));
	$sql = "INSERT INTO feedback (name, texts) VALUES ('{$name}','{$texts}')";
	var_dump($sql);
	
	mysqli_query($link, $sql);
	header("Location: ?message=OK");
	die();
}

if($_GET['action'] == 'EDIT') {
	$id = (int)$_GET['id'];
	$result = mysqli_query($link, "SELECT * FROM feedback WHERE id = {$id}");
	if($result) $row = mysqli_fetch_assoc($result);
	$buttonText = "Изменить";
	$action = "save";
}

if($_GET['action'] == 'save') {
	$name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
	$texts = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['texts'])));
	$id = (int)$_POST['id'];
	$sql = "UPDATE feedback SET name = '{$name}', texts = '{$texts}' WHERE id = '{$id}'";
	mysqli_query($link, $sql);
	header("Location: ?message=EDIT");
	die();
}

if($_GET['action'] == 'DELETE') {
	$id = (int)$_GET['id'];
	$result = mysqli_query($link, "DELETE FROM feedback WHERE id = {$id}");
	header("Location: ?message=DELETE");
}

$result = mysqli_query($link, "SELECT * FROM feedback ORDER BY id DESC");

if (isset($_GET['message'])) {
	$message = $messages[$_GET['message']];
}
//var_dump($result ->num_rows);

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
			<h1>Отзывы</h1>
			<?=$message?>
			<form action="?action=<?=$action?>" method="post">
				<input hidden type="text" name="id" value="<?=$row['id']?>">
				<input class="inputTexts" type="text" placeholder="Ваше имя" name="name" value="<?=$row['name']?>"><br>
				<input class="inputTexts" type="text" placeholder="Ваш отзыв" name="texts" value="<?=$row['texts']?>"><br>
				<input class="inputTexts" type="submit" value="<?=$buttonText?>">
			</form>
			<?php foreach ($result as $item): ?>

				<b><?=$item['name']?>:</b>
				<?=$item['texts']?>
				<b><a href="?action=EDIT&id=<?=$item['id']?>"> [edit]</a></b> 
				<b><a href="?action=DELETE&id=<?=$item['id']?>"> [x]</a></b><br>

			<?php endforeach;?>
		</div>
	</body>
</html>



