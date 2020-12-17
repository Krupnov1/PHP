<?php

$arr = [
    [   'src' => 'img/img_1.jpg', 
        'alt' => 'product_1' ],

    [   'src' => 'img/img_2.jpg',
        'alt' => 'product_2' ],

    [   'src' => 'img/img_3.jpg',
        'alt' => 'product_3' ],

    [   'src' => 'img/img_4.jpg',
        'alt' => 'product_4' ],

    [   'src' => 'img/img_5.jpg',
        'alt' => 'product_5' ],

    [   'src' => 'img/img_6.jpg',
        'alt' => 'product_6' ],

    [   'src' => 'img/img_7.jpg',
        'alt' => 'product_7' ],

    [   'src' => 'img/img_8.jpg',
        'alt' => 'product_8' ],

    [   'src' => 'img/img_9.jpg',
        'alt' => 'product_9' ],

    [   'src' => 'img/img_10.jpg',
        'alt' => 'product_10' ],

    [   'src' => 'img/img_11.jpg',
        'alt' => 'product_11' ],

    [   'src' => 'img/img_12.jpg',
        'alt' => 'product_12' ],
];

foreach($arr as $value) {
	$images .= "<a href='{$value['src']}'target='_blank'><img src='{$value['src']}' alt='{$value['alt']}'></a>";    
};

/*$gallery = [];

function getGallery() {
	return scandir("shop\img");	 
}
$gallery = getGallery();*/


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
				<section class="product"><?=$images?></section>
			</div>
		</div>
	</body>
</html>