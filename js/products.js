//вывод карточек игр

$(window).on('load',
    function(e) {
        //Получение id категории
        console.log($('.tabs__content__item'));
        $('.tabs__content__item').each(function() {
            let categ = this.id;
            let data = "categ=" + categ;
            //let link = $(e.target).href;
            console.log(data);
            //Загрузка товаров в модальное окно
            $(this).load('/models/gamesProductsModel.php', data);
        })
    }
);