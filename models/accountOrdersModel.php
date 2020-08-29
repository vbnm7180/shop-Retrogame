<?php

//session_start();

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		$login = $_SESSION['login'];

		//Выбор товаров, которые есть в корзине
		$select_orders = "SELECT * FROM `orders` WHERE `customer_email`='$login' ORDER BY `order_number` DESC";

		//Запрос к бд
		$query1 = mysqli_query($db, $select_orders);
		$query2 = mysqli_query($db, $select_orders);

		//Обработка результатов запроса 
		$res_orders = mysqli_fetch_array($query1);

		if ($res_orders == null) {
			echo "У вас нет заказов";
		} else {

			while ($res_order= mysqli_fetch_array($query2)) {



				$order_number = str_pad($res_order['order_number'], 7, "0", STR_PAD_LEFT);
				$date = date('d.m.Y', strtotime($res_order['order_date']));


				echo "
				<div class=\"orders__info\">
			<div class=\"orders__header\">
				<div class=\"order__number\">№ $order_number</div>
				<div class=\"order__date\">$date</div>
			</div>
			<div class=\"orders__content\">
			";

				$count = 1;

				$prod_arr = explode(', ', $res_order['products']);

				foreach ($prod_arr as $val) {

					//Выбор id секции и id товара
					$reg = '/\d+/';
					preg_match_all($reg, $val, $arr);

					$section_id = $arr[0][0];
					$product_id = $arr[0][1];

					if ($section_id == 1) {
						$table = 'consoles_products';
						$image_path = 'consoles';
						$section_name = 'Игровая консоль';
					}
					if ($section_id == 2) {
						$table = 'games_products';
						$image_path = 'games';
						$section_name = 'Игра';
					}

					//Выбор товаров, которые есть в корзине
					$select_products = "SELECT * FROM `$table` WHERE `product_id`='$product_id'";

					//Запрос к бд
					$query = mysqli_query($db, $select_products);

					//Обработка результатов запроса 
					$res_product = mysqli_fetch_array($query);

					$product_name = $res_product['name'];
					$product_price = $res_product['price'];


					echo "<div class=\"order\">$count. $section_name $product_name <span>$product_price р</span> </div>";

					$count++;
				}

				$total = $res_order['total_price'];

				echo "			
			      <div class=\"orders__price\">
			     Общая стоимость: <span>$total р</span>
				 </div>
				 </div>
	              ";
			}
		}
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
