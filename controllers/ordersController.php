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

		//Запрос для номера заказа

		$select_max_order="SELECT MAX(`order_number`) FROM `orders`";
		$query_max_order=mysqli_query($db,$select_max_order);
		$res_max_order=mysqli_fetch_array($query_max_order);
		$order_number=$res_max_order[0]+1;


		foreach ($_SESSION['in_cart'] as $val) {

			//Выбор id секции и id товара
			$reg = '/\d+/';
			preg_match_all($reg, $val, $arr);

			$section_id = $arr[0][0];
			$product_id = $arr[0][1];

			//Выбор добавленного в корзину товара
			$select_to_orders = "INSERT INTO `orders` (`order_number`, `section_id`,`product_id`,`customer_name`,`customer_email`,`customer_phone`,`customer_city`,`customer_street`,`customer_postcode`,`total_price`,`order_date`) VALUES ('$order_number', '$section_id', '$product_id','$name','$email','$phone','$city','$street','$postcode','$total',CURRENT_DATE())";

			//Запрос к бд
			$query = mysqli_query($db, $select_to_orders);
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
