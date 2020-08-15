<?php

//Старт сессии
session_start();

//Получаем корень сайта для ссылок/ В php он начинается не с /, а хранится в $_SERVER['DOCUMENT_ROOT']
$root=$_SERVER['DOCUMENT_ROOT'];

/*
Выбор основного блока страницы для вставки в main между шапкой и футером. 
Если в запросе нет переменной id, выбираем главную страницу.
*/
$page_id = isset($_REQUEST['page_id']) ? $_REQUEST['page_id'] : 'main';

require_once "$root/templates/header.php";

switch ($page_id) {
	case 'main':
		require "$root/templates/main.php";
		break;
	case 'cart':
		require "$root/templates/cart.php";
		break;
	case 'user-area':
		if ($_SESSION['login']=="" && $_SESSION['password']=="")
		{
			require "$root/templates/login.php";
		}
		else{
		require "$root/templates/account.php";
		}
		break;
	default:
		require "$root/templates/main.php";
		break;
}

require_once "$root/templates/footer.php";