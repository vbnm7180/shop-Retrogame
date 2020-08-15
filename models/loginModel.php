<?php

session_start();

$login=$_REQUEST['login'];
$password=$_REQUEST['password'];

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

	//Соединяемся с базой данных retrogame
	if (mysqli_select_db($db, 'retrogame')) {

		$select_login = 'SELECT * FROM `users` WHERE `login`='.$_REQUEST['login'].'';
		$select_password='SELECT * FROM `users` WHERE `login`='.$_REQUEST['password'].'';

			//Запрос к бд
			$query_login = mysqli_query($db, $select_login);
			$query_passw = mysqli_query($db, $select_password);

			//Обработка результатов запроса в виде массива (1 элемент)
			$res_login = mysqli_num_rows($query_login);
			$res_passw= mysqli_num_rows($query_passw);

			if ($res_login==0 && $res_passw==0)
			{
				//$res=["success"=>1];
				echo 0;

			}
			else {
				//$res=["success"=>0];
				echo 1;
				$_SESSION['username']=$login;
                $_SESSION['password']=$password;
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
