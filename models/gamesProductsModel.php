<?php

//Старт сессии
session_start();

//Выбор номера категории товара - игры
$categ = $_REQUEST['categ'];
$reg = '/-(\d+)/';
preg_match($reg, $categ, $arr);
$categ_id = $arr[1];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для выбора товаров
		$select_products = 'SELECT * FROM `games_products` WHERE `category_id`=' . $categ_id . '';

		//Выполнение запроса
		$query = mysqli_query($db, $select_products);

		//Обработка результатов запроса в виде массива. Цикл пока не пройдут все товары выбранной категории
		while ($res = mysqli_fetch_array($query)) {

			//Выбор данных о товаре 
			$name = $res['game_name'];
			$image = $res['image'];
			$price = $res['price'];
			$product_id = $res['product_id'];

			//Вывод карточки товара
			echo "
			<div class=\"game__card\">
			<div class=\"game__img\">
				<img src=\"/images/games/$image\" alt=\"\" class=\"game-img\">
			</div>
			<div class=\"game__title\">
			   $name
			</div>
			<button class=\"btn game-btn-buy\" id=\"add_$product_id\">В корзину</button>
		    </div>
            ";
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
