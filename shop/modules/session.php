<?php
$link = @mysqli_connect("localhost:3308", "root", "root", "shop") or die("Ошибка подключения " . mysqli_connect_error());

session_start();
$session = session_id();
$result = mysqli_query($link, "SELECT COUNT(*) FROM basket");
$arr = mysqli_fetch_assoc($result);
$count = $arr['COUNT(*)'];
