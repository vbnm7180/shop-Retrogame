//Вывод приставок в модальное окно

$('body').on('click', '.card__btn',
    function(e) {
        //Получение id категории
        let categ = e.target.id;
        let data = "categ=" + categ;
        console.log(data);
        //Загрузка товаров в модальное окно
        $('.popup__content').load('/models/consolesProductsModel.php', data);
    }
);


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