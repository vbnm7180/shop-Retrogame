<?php

session_start();

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Получение данных для регистрации из формы
	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
	$login = mysqli_real_escape_string($db, $_REQUEST['login']);
	$password = mysqli_real_escape_string($db, $_REQUEST['password']);
	$password_rep = mysqli_real_escape_string($db, $_REQUEST['password_rep']);

	$success = ['login' => 1, 'password' => 1];

	//Если пароль не совпадают $success['password'] = 0
	if ($password != $password_rep) {
		$success['password'] = 0;
	}

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для проверки, есть ли уже такой пользователь в базе
		$select_login = "SELECT * FROM `users` WHERE `login`='$login'";

		//Выполнение запроса
		$query_login = mysqli_query($db, $select_login);

		//Обработка результатов запроса 
		$res_login = mysqli_num_rows($query_login);

		//Если такой логи уже есть $success['login'] = 0
		if ($res_login != 0) {
			$success['login'] = 0;
		}

		//Если пароли совпадают и пользователя нет в базе
		if ($success['login'] == 1 && $success['password'] == 1) {
			//Хешируем введенный пароль
			$hash_password = password_hash($password, PASSWORD_DEFAULT);

			//Добавление пользователя в базу данных
			mysqli_query($db, "INSERT INTO `users` (`login`, `password`,`name`) VALUES ('$login', '$hash_password', '$name')");

			//Авторизация
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
		}

		//Вывод информации для выдачи ошибок, либо перезагрузки страницы
		echo json_encode($success);

		//Закрытие базы данных
		mysqli_close($db);
	} else {
		echo "Не удалось выбрать базу данных.";
	}
} else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
