//Обновление данных в личном кабинете (кнопка Сохранить)
$('body').on('submit', '#account-form',
    function(e) {
        e.preventDefault();
        //Получение данных формы
        let formData = $(this).serialize();
        //Изменение данных личного кабинета в базе данных
        $.get('/models/accountUpdateDataModel.php', formData);
    }
);