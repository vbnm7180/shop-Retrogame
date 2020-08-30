<?php

//Старт сессии
session_start();

//Получаем корень сайта 
$root=$_SERVER['DOCUMENT_ROOT'];

//Выбор основного блока страницы для вставки в main между шапкой и футером. 

$page_id = isset($_REQUEST['page_id']) ? $_REQUEST['page_id'] : 'main';

//require_once "$root/templates/header.php";

switch ($page_id) {
	case 'main':
		require "$root/templates/header.php";
		require "$root/templates/main.php";
		break;
	case 'cart':
		require "$root/templates/header2.php";
		require "$root/templates/cart.php";
		break;
	case 'user-area':
		if ($_SESSION['login']=="" && $_SESSION['password']=="")
		{
			require "$root/templates/header2.php";
			require "$root/templates/form.php";
		}
		else{
		require "$root/templates/header2.php";
		require "$root/templates/account.php";
		}
		break;
	default:
		require "$root/templates/main.php";
		break;
}

require_once "$root/templates/footer.php";