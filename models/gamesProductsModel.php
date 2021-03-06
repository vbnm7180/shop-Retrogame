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
			$name = $res['name'];
			$image = $res['image'];
			$price = $res['price'];
			$section_id = $res['section_id'];
			$product_id = $res['product_id'];

			//id для кнопки
			$btn_id=$section_id.'-'.$product_id;

			//Изменение кнопки в зависимости от наличия товара в корзине
			if (in_array($btn_id,$_SESSION['in_cart'])){
				$add_btn_display='displaynone';
				$go_btn_display='displayblock';
			}
			else{
				$add_btn_display='displayblock';
				$go_btn_display='displaynone';
			}

			//Вывод карточки товара
			echo "
			<div class=\"game__card\">
			<div class=\"game__img\">
				<img src=\"/images/games/$image\" alt=\"\" class=\"game-img\">
			</div>
			<div class=\"game__title\">
			   $name
			</div>
			<button class=\"btn game-btn-buy add-cart $add_btn_display\" id=\"add_$section_id-$product_id\">В корзину</button>
			<button class=\"btn game-btn-buy go-cart $go_btn_display\" id=\"add_$section_id-$product_id\">Перейти в корзину</button>
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
