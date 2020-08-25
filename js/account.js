//призагрузке окна
$(window).on('load',
    function() {
        $('.pa__form-wrapper').load('/models/accountModel.php', data);
    }

);