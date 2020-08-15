//Кнопка войти

$('.main').on('click', '.login-btn',
    function() {

        //Получение логина из формы
        var formData = $('#login-form').serialize();

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
    }
);

//Кнопка зарегистрироваться

$('body').on('click', '.reg-btn',
    function(e) {

        //Получение пароля из формы
        let pass = $(e.target).prevAll('.password').val();
        let pass_rep = $(e.target).prevAll('.password-rep').val();
        let formData = $('#register-form').serialize();

        //Если пароль один
        if (pass == pass_rep) {

            $.ajax({
                type: "GET",
                url: "/models/registerModel.php",
                data: formData,
                success: function(data) {
                    if (data == 1) {
                        window.location.reload("/controllers/pageController.php?page_id=main");
                    } else {
                        $('.error2').html('Такой логин уже зарегистрирован');
                    }

                }
            });

        } else {
            $('.error2').html('Пароли не совпадают');
        }
    }
);