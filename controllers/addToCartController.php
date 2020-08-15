<?php

//Старт сессии
session_start();

//Извлечение номера товара из запроса после нажатия кнопки Добавить в корзину
$add_prod = $_REQUEST['add_prod'];

//Если товара нет в массиве корзины добавитьего в массив корзины
if (!in_array($add_prod, $_SESSION['in_cart'])) {
	array_push($_SESSION['in_cart'], $add_prod);
}

//Вывод количества товаров в корзине
echo count($_SESSION['in_cart']);
