$('.sum-btn').on("click", function() {
    let formData = $('#bucket-form').serialize();
    $.get('/controllers/orderController.php', formData);
});