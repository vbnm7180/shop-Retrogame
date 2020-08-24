//Кнопка войти

$('.log__btn').on('click',
    function() {

        //Получение логина из формы
        let formData = $('#111111').serialize();
        console.log(formData);

        $.get('/models/loginModel.php', formData, function(data) {
            if (data == 0) {
                console.log(1);
                $('.signin__email').text('Неверный Email');
                $('.signin__email').css('color', 'red');
                $('.signin__email').next().css('color', 'red');
            }
            if (data == 1) {
                $('.signin__passw').text('Неверный пароль');
                $('.signin__passw').css('color', 'red');
                $('.signin__passw').next().css('color', 'red');
            }
            if (data == 2) {
                window.location.reload("/controllers/pageController.php?page_id=account");
            }
        });

        /*

        $.ajax({
            type: "GET",
            url: "/models/loginModel.php",
            data: formData,
            success: function(data) {
                if (data == 1) {
                    window.location.reload("/controllers/pageController.php?page_id=account");
                } else {

                    $('.error').html('Неправильный логин или пароль');
                }
            }
        });
        */
    }
);