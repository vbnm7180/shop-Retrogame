<?php

$login = $_SESSION['login'];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для выбора данных пользователя, который вошел в личный кабинет
		$select = "SELECT * FROM `users` WHERE `login`='$login'";

		//Запрос к базе данных
		$query = mysqli_query($db, $select);

		//Обработка результатов запроса 
		$res = mysqli_fetch_array($query);


		//Выбор данных о пользователе
		if ($res == null) {
			$name = '';
			$phone = '';
			$city = '';
			$street = '';
			$postcode = '';
		} else {
			$name = $res['name'];
			$phone = $res['phone'];
			$city = $res['city'];
			$street = $res['street'];
			$postcode = $res['postcode'];
		}




		//Вывод формы с текущими данными пользователя
		echo "
		<form class=\"bucket__form\">
			<div class=\"bucket__form-wraper\">
				<label for=\"\">Адрес доставки</label>
				<input type=\"text\" class=\"bucket__input\" placeholder=\"Город\" value=\"$city\">
				<input type=\"text\" class=\"bucket__input\" placeholder=\"Улица/Квартира/Дом\" value=\"$street\">
				<input type=\"text\" class=\"bucket__input\" placeholder=\"Индекс\" value=\"$postcode\">
			</div>
			<div class=\"bucket__form-wraper bucket__form-wraper-2\">
				<label for=\"\">Личная информация</label>
				<input type=\"text\" class=\"bucket__input\" placeholder=\"ФИО\" value=\"$name\">
				<input type=\"text\" class=\"bucket__input\" placeholder=\"Номер телефона\" value=\"$phone\">
				<input type=\"text\" class=\"bucket__input\" placeholder=\"Электронная почта\" value=\"$login\">
			</div>
		</form>
		";

		//Закрытие базы данных
		mysqli_close($db);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
