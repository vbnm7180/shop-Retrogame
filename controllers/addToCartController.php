<?php

//Старт сессии
session_start();

//Извлечение номера товара из запроса после нажатия кнопки Добавить в корзину
$add_prod = $_REQUEST['add_prod'];

//Если товара нет в массиве корзины добавить его в массив корзины
if (!in_array($add_prod, $_SESSION['in_cart'])) {
	array_push($_SESSION['in_cart'], $add_prod);
}

//Подсчет общей цены товаров в корзине

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		    //Выбор id секции и id товара
			$reg = '/\d+/';
			preg_match_all($reg, $add_prod, $arr);

			$section_id = $arr[0][0];
			$product_id = $arr[0][1];

			//Выбор названия таблицы для запроса в базу данных
			if ($section_id == 1) {
				$table = 'consoles_products';
				$image_path = 'consoles';
			}
			if ($section_id == 2) {
				$table = 'games_products';
				$image_path = 'games';
			}

			//Выбор добавленного в корзину товара
			$select_products = "SELECT * FROM `$table` WHERE `product_id`='$product_id'";

			//Запрос к бд
			$query = mysqli_query($db, $select_products);

			//Обработка результатов запроса
			$res = mysqli_fetch_array($query);

			//Выбор цены товара
			$price = $res['price'];

			//Вычисление общей цены товаров в корзине
			$_SESSION['total_price']+=$price;

		//Закрытие базы данных
		mysqli_close($db);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}