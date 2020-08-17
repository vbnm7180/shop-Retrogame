//Вывод приставок в модальное окно

$(".card__btn").on("click",
    function(e) {
        //Получение id категории
        let categ = e.target.id;
        let data = "categ=" + categ;

        //Загрузка товаров в модальное окно
        $('.popup__content').load('/models/consolesProductsModel.php', data);
    }
);

$(".game-btn").on("click",
    function(e) {
        //Получение id категории
        let categ = e.target.id;
        let data = "categ=" + categ;

        //Загрузка товаров в модальное окно
        $('.tabs__content').load('/models/gamesProductsModel.php', data);
    }
);

//вывод карточек игр
//призагрузке окна
$(window).on('load',
    function(e) {
        let categ = '2-7';
        let data = "categ=" + categ;
        //Загрузка товаров в блок этой категории
        $('.tabs__content').load('/models/gamesProductsModel.php', data);
    }

);