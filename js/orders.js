$('.sum-btn').on("click", function() {
    console.log(1);
    let formData = $('#bucket-form').serialize();
    $.get('/controllers/ordersController.php', formData, function() {
        window.location.href = "/controllers/pageController.php?page_id=main";
    });
});