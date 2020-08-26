<?php

//session_start();

$login=$_SESSION['login'];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		$select = "SELECT * FROM `users` WHERE `login`='$login'";
		//$select_password = "SELECT * FROM `users` WHERE `password`='$password'";

		//Запрос к бд
		$query = mysqli_query($db, $select);
		//$query_passw = mysqli_query($db, $select_password);

		//Обработка результатов запроса в виде массива (1 элемент)
		$res = mysqli_fetch_array($query);

		//Выбор данных о пользователе

		$name = $res['name'];
		$phone = $res['phone'];
		$city = $res['city'];
		$street = $res['street'];
		$postcode = $res['postcode'];

		echo "
		<form class=\"pa__form\" id=\"account-form\">
		<label for=\"\" class=\"form__title\">личный кабинет</label>
			<input type=\"text\" placeholder=\"ФИО\" class=\"pa__input\" name=\"name\" value=\"$name\">
			<input type=\"text\" placeholder=\"Телефон\" class=\"pa__input\" name=\"phone\" value=\"$phone\">
			<input type=\"text\" placeholder=\"Электронная почта\" class=\"pa__input\" name=\"login\" value=\"$login\">
			<input type=\"text\" placeholder=\"Город\" class=\"pa__input\" name=\"city\" value=\"$city\">
			<input type=\"text\" placeholder=\"Улица/Дом/Квартира\" class=\"pa__input\" name=\"street\" value=\"$street\">
			<input type=\"text\" placeholder=\"Индекс\" class=\"pa__input\" name=\"postcode\" value=\"$postcode\">
			<div class=\"btn__wraper\">
			<button type=\"submit\" class=\"personal__area-btn\">Сохранить</button></div>
	</form>
		";


	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
