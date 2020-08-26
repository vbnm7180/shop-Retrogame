<?php

//Старт сессии
session_start();

//Извлечение номера товара из запроса после нажатия кнопки Удалить из корзины
$del_prod = $_REQUEST['del_prod'];

//Если товар есть в массиве корзины
if (in_array($del_prod, $_SESSION['in_cart'])) {
	//Поиск индекса товара
	$index = array_search($del_prod, $_SESSION['in_cart']);
	//Удаление товара
	unset($_SESSION['in_cart'][$index]);
	//Переиндексирование
	$_SESSION['in_cart'] = array_values($_SESSION['in_cart']);
}

//Вывод количества товаров в корзине
echo count($_SESSION['in_cart']);
