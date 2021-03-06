<?php

//Старт сессии
session_start();

//Выбор номера категории товара - игровой приставки
$categ = $_REQUEST['categ'];
$reg = '/-(\d+)/';
preg_match($reg, $categ, $arr);
$categ_id = $arr[1];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для выбора названия категории
		$select_category_name = 'SELECT * FROM `categories` WHERE `category_id`=' . $categ_id . '';

		//Запрос для выбора товаров
		$select_products = 'SELECT * FROM `consoles_products` WHERE `category_id`='. $categ_id . '';

		//Выполнение запросов
		$query_category_name = mysqli_query($db, $select_category_name);
		$query_products = mysqli_query($db, $select_products);

		//Обработка результатов запроса названия категории
		$res_category_name = mysqli_fetch_array($query_category_name);
		$category_name = $res_category_name['category_name'];

		//Вывод заголовка модального окна
		echo "<div class=\"popup__main-text\"><span class=\"popup__console-name\">$category_name</span>&nbsp;&nbsp;&nbsp;&nbsp;Товары в наличии</div>";

		//Обработка результатов запроса товаров. Цикл пока не пройдут все товары выбранной категории
		while ($res_products = mysqli_fetch_array($query_products)) {

			//Выбор данных о товаре 
			$image = $res_products['image'];
			$console_name = $res_products['name'];
			$condition_rating = $res_products['condition_rating'];
			$description = $res_products['description'];
			$bundle = $res_products['bundle'];
			$region = $res_products['region'];
			$price = number_format($res_products['price'],0,'','.');
			$section_id = $res_products['section_id'];
			$product_id = $res_products['product_id'];
			
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

			//Вывод карточки товара в модальное окно
			echo "
				<div class=\"popup__card\">
					<div class=\"popup__img\"><img src=\"/images/consoles/$image\" alt=\"\" class=\"popup-img\"></div>
					<div class=\"popup__title\">
						<h3>$console_name</h3>
					</div>
					<div class=\"popup__text\">Состояние: $condition_rating<br>$description<br> Комплект: $bundle<br> Регион: $region<br> Цена $price ₽
					</div>
					<button type=\"button\" class=\"btn popap-btn add-cart $add_btn_display\" id=\"add_$btn_id\">Добавить в Корзину</button>
					<button type=\"button\" class=\"btn popap-btn go-cart $go_btn_display\" id=\"add_$btn_id\">Перейти в корзину</button>
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
