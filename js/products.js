//вывод карточек игр
//призагрузке окна
$(window).on('load',
    function(e) {
        //Для каждой категории
        $('.tabs__content__item').each(function() {
            //Получение id категории
            let categ = this.id;
            let data = "categ=" + categ;
            //Загрузка товаров в блок этой категории
            $(this).load('/models/gamesProductsModel.php', data);
        })
    }
);