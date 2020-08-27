<?php

session_start();

$current_login = $_SESSION['login'];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Получение новых данных о пользователе из формы изменения данных
	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
	$phone = mysqli_real_escape_string($db, $_REQUEST['phone']);
	$login = mysqli_real_escape_string($db, $_REQUEST['login']);
	$city = mysqli_real_escape_string($db, $_REQUEST['city']);
	$street = mysqli_real_escape_string($db, $_REQUEST['street']);
	$postcode = mysqli_real_escape_string($db, $_REQUEST['postcode']);

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для обновления данных пользователя
		$select = "UPDATE `users` SET `login`='$login',`name`='$name',`phone`='$phone',`city`='$city',`street`='$street',`postcode`='$postcode' WHERE `login`='$current_login'";

		//Выполнение запроса
		mysqli_query($db, $select);

		//Изменение переменной login текущего сеанса
		$_SESSION['login'] = $login;

		//Закрытие базы данных
		mysqli_close($db);
		
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
