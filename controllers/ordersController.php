<?php

//Старт сессии
session_start();

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {




		//Получение данных для заказа из формы
		$name = mysqli_real_escape_string($db, $_REQUEST['name']);
		$email = mysqli_real_escape_string($db, $_REQUEST['email']);
		$phone = mysqli_real_escape_string($db, $_REQUEST['phone']);
		$city = mysqli_real_escape_string($db, $_REQUEST['city']);
		$street = mysqli_real_escape_string($db, $_REQUEST['street']);
		$postcode = mysqli_real_escape_string($db, $_REQUEST['postcode']);

		//Получение данных для заказа из сессии
		$total = $_SESSION['total_price'];

		foreach ($_SESSION['in_cart'] as $val) {

			//Выбор id секции и id товара
			$reg = '/\d+/';
			preg_match_all($reg, $add_prod, $arr);

			$section_id = $arr[0][0];
			$product_id = $arr[0][1];

			//Выбор добавленного в корзину товара
			$select_products = "SELECT * FROM `$table` WHERE `product_id`='$product_id'";

			//Запрос к бд
			$query = mysqli_query($db, "INSERT INTO `users` (`login`, `password`,`name`) VALUES ('$login', '$hash_password', '$name')");

			//Обработка результатов запроса
			$res = mysqli_fetch_array($query);
		}


		//Закрытие базы данных
		mysqli_close($db);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
