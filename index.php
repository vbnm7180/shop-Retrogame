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

header("Location: http://retrogame/controllers/pageController.php?page_id=main");

/*
//Загрузка шапки и подвала (1 раз), и основной части главной страницы
require_once './templates/header.php';
require './templates/main.php';
require_once './templates/footer.php';
*/
