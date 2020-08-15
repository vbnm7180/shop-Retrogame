<?php

//Старт сессии
session_start();

/*Выбор № секции (игры или приставки) и категории(по приставке), 
в которой находится товар из запроса после открытия модального окна 
*/
$categ = $_REQUEST['categ'];
$section_id = $categ[0];
$categ_id = $categ[2];

//Выбор таблицы с товарами
if ($section_id==1) {
$table=`consoles_products`;
}
if ($section_id==2) {
	$table=`games_products`;
}

//Установка соединения с SQL, если соединение успешно
if ($db = mysqli_connect('localhost', 'root', '')) {

    //Соединяемся с базой данных retrogame
    if (mysqli_select_db($db, 'retrogame')) {

		//Выбор товаров
        $select_products = 'SELECT * FROM'. $table.' WHERE `category_id`=' . $categ_id .'';

        //Запрос к бд
        $query = mysqli_query($db, $select_products);

        //Обработка результатов запроса в виде массива. Цикл пока не пройдут все товары выбранной категории
        while ($res = mysqli_fetch_array($query)) {

            //Выбор данных о товаре 
            $name = $res['name'];
            $description = $res['description'];
            $image = $res['image'];
            $price = $res['price'];
            $product_id = $res['product_id'];

            //Если товара нет в корзине, выводим его карточку с кнопкой Добавить
            //if (!in_array($product_id, $_SESSION['in_cart'])) {

                echo "
                            <div class=\"item\" >
                              <img src=\"/images/products/$image\" alt=\"\" class=\"item__img\">
                              <div class=\"desc\">
                              Название: $name Состояние: $description Цена: $price ₽
                              </div>
                              <button class=\"addcart\" id=\"add_$product_id\">Добавить в корзину</button>
                              <form action=\"/controllers/pageController.php\" class=\"cart-form displaynone\">
                                 <input type=\"hidden\" name=\"page_id\" value=\"cart\">
                                 <button type=\"submit\" class=\"cart\">Перейти в корзину</button>
                              </form>
                           </div>
                            ";
            //} 
			//Если есть в корзине - только с кнопкой Перейти в корзину
			/*
            else {
                echo "
                            <div class=\"item\" >
                              <img src=\"/images/products/$image\" alt=\"\" class=\"item__img\">
                              <div class=\"desc\">
                              Название: $name Состояние: $description Цена: $price ₽
                              </div>
                              <form action=\"/controllers/pageController.php\" class=\"cart-form\">
                                 <input type=\"hidden\" name=\"page_id\" value=\"cart\">
                                 <button type=\"submit\" class=\"cart\">Перейти в корзину</button>
                              </form>
                           </div>
                            ";
			}
			*/
        }
        //Закрытие базы данных
        mysqli_close($db);
    } else {
        echo "Не удалось выбрать базу данных.";
    }
} else {
    echo "Не удалось подключиться к базе данных.";
    echo "Ошибка:" . mysqli_connect_error() . "";
}
