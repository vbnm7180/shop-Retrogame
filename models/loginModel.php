<?php

session_start();

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Получение введенных логина и пароля из формы
	$login = mysqli_real_escape_string($db, $_REQUEST['login']);
	$password = mysqli_real_escape_string($db, $_REQUEST['password']);

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame2')) {

		//Запрос для поиска пользователя в базе данных
		$select = "SELECT * FROM `users` WHERE `login`='$login'";

		//Выполнение запроса
		$query = mysqli_query($db, $select);

		//Поиск пользователя в базе данных 
		$res_num = mysqli_num_rows($query);

		//Выбор информации о пользователе в базе данных
		$res = mysqli_fetch_array($query);

		//Если пользователь есть в базе, выбираем его пароль в хешированном виде
		if ($res_num != 0) {
			$hash_password = $res['password'];
		}

		$success = ['login' => 1, 'password' => 1];

		//Если пользователя нет в базе $success['login'] = 0
		if ($res_num == 0) {
			$success['login'] = 0;
		}

		//Если пользователь есть в базе, но его пароль неверный $success['password'] = 0
		if ($res_num != 0 && password_verify($password, $hash_password) == false) {

			$success['password'] = 0;
		}

		//Если пользователь есть и пароль совпадает, авторизуем его
		if ($success['login'] == 1 && $success['password'] == 1) {
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
