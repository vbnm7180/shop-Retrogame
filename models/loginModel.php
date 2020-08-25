<?php

session_start();



//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	$login = mysqli_real_escape_string($db, $_REQUEST['login']);
	$password = mysqli_real_escape_string($db, $_REQUEST['password']);


	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		$select_login = "SELECT * FROM `users` WHERE `login`='$login'";
		//$select_password = "SELECT * FROM `users` WHERE `password`='$password'";

		//Запрос к бд
		$query_login = mysqli_query($db, $select_login);
		//$query_passw = mysqli_query($db, $select_password);

		//Обработка результатов запроса в виде массива (1 элемент)
		$res_num_login = mysqli_num_rows($query_login);
		$res_login = mysqli_fetch_array($query_login);
		$hash_password=$res_login['password'];
		//$res_passw = mysqli_num_rows($query_passw);

		$success = ['login' => 1, 'password' => 1];

		if ($res__num_login == 0) {
			$success['login'] = 0;
		}
		if (password_verify($password, $hash_password)) {
			$success['password'] = 0;
		}
		if ($success['login'] == 1 && $success['password'] == 1) {
			$_SESSION['username'] = $login;
			$_SESSION['password'] = $password;
		}

		echo json_encode($success);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
