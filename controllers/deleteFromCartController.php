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

//Подсчет общей цены товаров в корзине

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		    //Выбор id секции и id товара
			$reg = '/\d+/';
			preg_match_all($reg, $del_prod, $arr);

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

			//Выбор удаленного из корзины товара
			$select_products = "SELECT * FROM `$table` WHERE `product_id`='$product_id'";

			//Запрос к бд
			$query = mysqli_query($db, $select_products);

			//Обработка результатов запроса 
			$res = mysqli_fetch_array($query);

			//Выбор цены товара
			$price = $res['price'];

			//Вычисление общей цены товаров в корзине
			$_SESSION['total_price']-=$price;

			//Отправка количества и цены товаров в корзине для отображения на странице
			$data=[
				'count'=> count($_SESSION['in_cart']),
				'price'=> $_SESSION['total_price']
			];

			echo json_encode($data);

		//Закрытие базы данных
		mysqli_close($db);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
