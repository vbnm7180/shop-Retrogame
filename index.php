<?php

//Старт сессии. Стартовать сессию надо в каждом файле в начале, где используются переменные $_SESSION
session_start();

//Если пуст массив с количеством элементов в корзине, создать пустой массив корзины в текущей сессии
if (!isset($_SESSION['in_cart'])) {
	$_SESSION['in_cart'] = array();
}
if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
$_SESSION['login']="";
$_SESSION['password']="";
}

header("Location: http://retrogame2/controllers/pageController.php?page_id=main");