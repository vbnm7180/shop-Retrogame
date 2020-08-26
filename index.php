<?php

//Старт сессии
session_start();

//Если пуст массив с количеством элементов в корзине, создать пустой массив корзины в текущей сессии
if (!isset($_SESSION['in_cart'])) {
	$_SESSION['in_cart'] = array();
}

//Создание переменных сессии для авторизации
if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
$_SESSION['login']="";
$_SESSION['password']="";
}

//Редирект для выбора страницы
header("Location: http://retrogame2/controllers/pageController.php?page_id=main");