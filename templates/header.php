<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <header class="header">
        <form action="/controllers/pageController.php" class="logo-form">
            <input type="hidden" name="page_id" value="main">
            <button type="submit" class="logo-button">Логотип</button>
        </form>
        <form action="/controllers/pageController.php" class="cart-form">
            <input type="hidden" name="page_id" value="cart">
            <button type="submit" class="cart">Корзина</button>
        </form>
        <div class="cart-count"><?php echo count($_SESSION['in_cart']) ?></div>
        <form action="/controllers/pageController.php">
            <input type="hidden" name="page_id" value="user-area">
            <button type="submit" class="user-area">Личный кабинет</button>
        </form>
    </header>