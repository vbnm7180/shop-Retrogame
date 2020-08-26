//добавление в корзину

$('body').on('click', '.add-cart',
    function(e) {
        //Получение id товара
        let reg = /(\d+-\d+)/;
        let add_prod = e.target.id.match(reg);
        //Передача id товара серверу, возвращается количество товаров в массиве корзины
        let data = "add_prod=" + add_prod[0];
        //console.log(data);
        $.get('/controllers/addToCartController.php', data);
        //$('.cart-count').load('/controllers/addToCartController.php', data);
        //Смена кнопки с Добавить в корзину на Перейти в корзину
        //$(e.target).css('display', 'none');
        //$(e.target).next('.cart-form').removeClass('displaynone');


    }
);

//удаление из корзины

$('body').on('click', '.del-cart',
    function(e) {
        //Получение id товара
        let reg = /(\d+-\d+)/;
        let del_prod = e.target.id.match(reg);
        //Передача id товара серверу, возвращается количество товаров в массиве корзины
        let data = "del_prod=" + del_prod[0];
        console.log(del_prod);
        $.get('/controllers/deleteFromCartController.php', data, function(res) {
            $(e.target).parent().remove();
            let count = 'Товары: ' + res;
            $('.goods').text(count);
        });
        //$('.cart-count').load('/controllers/deleteFromCartController.php', data);
        //при обращении к методам jquery нужно использовать $ всегда
        //Удаление строки товара из корзины



    }
);