<?php


//Старт сессии
session_start();

/*Выбор № секции (игры или приставки) и категории(по приставке), 
в которой находится товар из запроса после открытия модального окна 
*/
$categ = $_REQUEST['categ'];
//$section_id = $categ[0];
$reg = '/-(\d+)/';
preg_match($reg, $categ, $arr);
$categ_id = $arr[1];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Выбор названия категории
		$select_category_name = 'SELECT * FROM `categories` WHERE `category_id`=' . $categ_id . '';

		//Выбор товаров
		$select_products = 'SELECT * FROM `consoles_products` WHERE `category_id`='. $categ_id . '';

		//Запросы к бд
		$query_category_name = mysqli_query($db, $select_category_name);
		$query_products = mysqli_query($db, $select_products);


		//Обработка результатов запроса названия категории
		$res1 = mysqli_fetch_array($query_category_name);
		$category_name = $res1['category_name'];

		echo "				
		<div class=\"popup__main-text\"><span class=\"popup__console-name\">$category_name</span>  Товары в наличии</div>
		";

		//Обработка результатов запроса товаров. Цикл пока не пройдут все товары выбранной категории
		while ($res2 = mysqli_fetch_array($query_products)) {

			//Выбор данных о товаре 
			$image = $res2['image'];
			$console_name = $res2['console_name'];
			$condition_rating = $res2['condition_rating'];
			$description = $res2['description'];
			$bundle = $res2['bundle'];
			$region = $res2['region'];
			$price = $res2['price'];
			$product_id = $res2['product_id'];

			echo "
				<div class=\"popup__card\">
					<div class=\"popup__img\"><img src=\"/images/consoles/$image\" alt=\"\" class=\"popup-img\"></div>
					<div class=\"popup__title\">
						<h3>$console_name</h3>
					</div>
					<div class=\"popup__text\">Состояние: $condition_rating<br>$description<br> Комплект: $bundle<br> Регион: $region<br> Цена $price ₽
					</div>
					<a href=\"#\" class=\"btn popap-btn\" id=\"add_$product_id\">Добавить в Корзину</a>
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
