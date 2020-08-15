<?php

//Старт сессии
//session_start();

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame')) {

		foreach ($_SESSION['in_cart'] as $val) {

			//Выбор товаров, которые есть в корзине
			$select_products = 'SELECT * FROM `products` WHERE `product_id`=' . $val . '';

			//Запрос к бд
			$query = mysqli_query($db, $select_products);

			//Обработка результатов запроса в виде массива (1 элемент)
			$res = mysqli_fetch_array($query);

			//Выбор информации о товаре
			$name = $res['name'];
			$description = $res['description'];
			$image = $res['image'];
			$price = $res['price'];
			$product_id = $res['product_id'];

			//Вывод перечня товаров в корзине
			echo "
						 <div class=\"item-in-cart\">Название: $name Цена: $price ₽ <button class=\"deletecart\" id=\"add_$product_id\">Удалить</button></div>
						 
						 ";
		}
	} 
	else {
		echo "Не удалось выбрать базу данных.";
	}
} 
else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
