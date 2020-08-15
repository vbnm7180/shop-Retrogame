//Кнопка выйти из кабинета

$('body').on('click', '.exit-btn',
    function() {

        $.ajax({
            type: "GET",
            url: "/controllers/exitAccountController.php",
            success: function() {
                window.location.reload("/controllers/pageController.php?page_id=user-area");
            }
        });
    }
);