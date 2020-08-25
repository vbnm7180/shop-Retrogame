//Кнопка зарегистрироваться

$('#signup-form').on('submit',
    function(e) {

        e.preventDefault();
        //Получение логина из формы
        let formData = $(this).serialize();
        console.log(formData);
        //$('body').load('/models/registerModel.php', formData);


        $.getJSON('/models/registerModel.php', formData, function(data) {


            if (data.login == 0) {
                $('.signup__email').text('Такой Email уже зарегистрирован');
                $('.signup__email').css('color', '#DF2121');
                $('.signup__email').next().css('border-color', '#DF2121');
            }
            if (data.password == 0) {
                $('.signup__passw').text('Пароли не совпадают');
                $('.signup__passw').css('color', '#DF2121');
                $('.signup__passw').next().css('border-color', '#DF2121');
            }
            if (data.login == 1 && data.password == 1) {
                window.location.reload("/controllers/pageController.php?page_id=account");
            }

        });

    }
);

//Изменение инпута после ошибки

$('.password-rep__input').on('input',
    function() {
        $(this).css('border-color', '#5E6572');
        $(this).prev().css('color', '#5E6572');
        $(this).prev().text('Повторите пароль');
    }
);