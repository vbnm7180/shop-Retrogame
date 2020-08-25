//Кнопка войти

$('#signin-form').on('submit',
    function(e) {

        e.preventDefault();
        //Получение логина из формы
        let formData = $(this).serialize();
        console.log(formData);
        //$('body').load('/models/loginModel.php', formData);

        $.getJSON('/models/loginModel.php', formData, function(data) {


            if (data.login == 0) {
                $('.signin__email').text('Неверный Email');
                $('.signin__email').css('color', '#DF2121');
                $('.signin__email').next().css('border-color', '#DF2121');
            }
            if (data.password == 0) {
                $('.signin__passw').text('Неверный пароль');
                $('.signin__passw').css('color', '#DF2121');
                $('.signin__passw').next().css('border-color', '#DF2121');
            }
            if (data.login == 1 && data.password == 1) {
                window.location.reload("/controllers/pageController.php?page_id=account");
            }

        });
    }
);

//Изменение инпута после ошибки

$('.email__input').on('input',
    function() {
        $(this).css('border-color', '#5E6572');
        $(this).prev().css('color', '#5E6572');
        $(this).prev().text('Ваш Email');
    }
);

$('.password__input').on('input',
    function() {
        $(this).css('border-color', '#5E6572');
        $(this).prev().css('color', '#5E6572');
        $(this).prev().text('Введите пароль');
    }
);