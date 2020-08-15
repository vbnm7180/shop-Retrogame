//вывод товаров в окно
$('.main').on('click', '.console__item, .games__item',
    function(e) {
        //Получение id категории
        let categ = e.target.id;
        let data = "categ=" + categ;
        //Загрузка товаров в модальное окно
        $('.modal__content').load('/models/productsModel.php', data);
        //Появление модального окна
        $('.modal').css('display', 'block');
        $('.modal__content').css('display', 'flex');
    }
);

//выход из окна, удаление товаров
$('.main').on('click', '.exit',
    function() {
        //Скрытие модального окна
        $('.modal').css('display', 'none');
        //Удаление товаров из модального окна
        $('.modal__content').empty();
    }
);