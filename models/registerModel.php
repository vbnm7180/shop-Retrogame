<?php

session_start();

$login=$_REQUEST['login'];
$password=$_REQUEST['password'];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame')) {

		$select_login = 'SELECT * FROM `users` WHERE `login`='.$_REQUEST['login'].'';

			//Запрос к бд
			$query_login = mysqli_query($db, $select_login);

			//Обработка результатов запроса в виде массива (1 элемент)
			$res_login = mysqli_num_rows($query_login);

			if ($res_login==0)
			{
				
				mysqli_query($db,"INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')");
				//echo "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')";
				echo 1;

			}
			else {

				echo 0;
			}

	} 
	else {
		echo "Не удалось выбрать базу данных.";
	}
} 
else {
	echo "Не удалось подключиться к базе данных.";
	echo "Ошибка:" . mysqli_connect_error() . "";
}
