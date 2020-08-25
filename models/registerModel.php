<?php

session_start();



//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
	$login = mysqli_real_escape_string($db, $_REQUEST['login']);
	$password = mysqli_real_escape_string($db, $_REQUEST['password']);
	$password_rep = mysqli_real_escape_string($db, $_REQUEST['password_rep']);

	$success = ['login' => 1, 'password' => 1];

	if ($password != $password_rep) {
		$success['password'] = 0;
	}



	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		$select_login = "SELECT * FROM `users` WHERE `login`='$login'";

		//Запрос к бд
		$query_login = mysqli_query($db, $select_login);

		//Обработка результатов запроса в виде массива (1 элемент)
		$res_login = mysqli_num_rows($query_login);

		if ($res_login != 0) {
			$success['login'] = 0;
		}

		if ($success['login'] == 1 && $success['password'] == 1) {
			$hash_password=password_hash($password, PASSWORD_DEFAULT);

			mysqli_query($db, "INSERT INTO `users` (`login`, `password`,`name`) VALUES ('$login', '$hash_password', '$name')");
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
			//echo "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')";
		}

		echo json_encode($success);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
