<?php

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Вывод сообщения, если в корзине нет товаров
		if (count($_SESSION['in_cart'])==0)
		{
			echo 'Корзина пуста';
		}

		$count = 1; //счетчик строки товара в корзине

		foreach ($_SESSION['in_cart'] as $val) {

			//Выбор id секции и id товара
			$reg = '/\d+/';
			preg_match_all($reg, $val, $arr);

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

			//Выбор товаров, которые есть в корзине
			$select_products = "SELECT * FROM `$table` WHERE `product_id`='$product_id'";

			//Запрос к бд
			$query = mysqli_query($db, $select_products);

			//Обработка результатов запроса 
			$res = mysqli_fetch_array($query);

			//Выбор информации о товаре
			$name = $res['name'];
			$image = $res['image'];
			$price = number_format($res['price'],0,'','.');
			$product_id = $res['product_id'];

			//Вывод перечня товаров в корзине
			echo "
		<div class=\"bucket__product__card\">
			<div class=\"card__number\">
			  $count.
			</div>
			<div class=\"card-img\"><img src=\"/images/$image_path/$image\" alt=\"\"></div>
			<div class=\"name_product\">$name</div>
			<div class=\"numberOf\">1шт</div>
			<div class=\"card-price\">$price&#8381; </div>
			<button class=\"btn-bucket del-cart\" type=\"button\" id=\"del_$section_id-$product_id\"> </button>
		</div>
		";

			$count++;

		}
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
