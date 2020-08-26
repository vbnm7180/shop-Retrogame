<div class="bucket__content">

	<div class="row__wraper">
		<div class="bucket__products">
			<div class="bucket__title">
				<div class="naming">
					Наименование товара
				</div>
				<div class="info">
					Количество Цена
				</div>
			</div>
			<div class="bucket__content-cards">

				<?php
				$root = $_SERVER['DOCUMENT_ROOT'];
				require("$root/models/cartListModel.php");
				?>

			</div>
		</div>
		<div class="bucket__final__sum">
			<div class="sum-title">
				Итоговая стоимость
			</div>
			<div class="sum-info">
				<div class="goods">
					Товары: <?php echo count($_SESSION['in_cart']); ?>
				</div>
				<div class="goods__price">
					<b>15000&#8381; </b>
				</div>
			</div>
			<div class="sumbtn">
				<button type="button" class="sum-btn">Оформить заказ</button>
			</div>
		</div>
	</div>

	<div class="row__wraper row__wraper-2">
		<form action="" class="bucket__form">
			<div class="bucket__form-wraper">
				<label for="">Адрес доставки</label>
				<input type="text" class="bucket__input" placeholder="Страна/Город">
				<input type="text" class="bucket__input" placeholder="Улица/Квартира/Дом">
				<input type="text" class="bucket__input" placeholder="Индекс">
			</div>
			<div class="bucket__form-wraper bucket__form-wraper-2">
				<label for="">Личная информация</label>
				<input type="text" class="bucket__input" placeholder="ФИО">
				<input type="text" class="bucket__input" placeholder="Номер телефона">
				<input type="text" class="bucket__input" placeholder="Электронная почта">
			</div>
		</form>
		<div class="bucket__helper">Остались вопросы? <br><span class="vk__span">Напишите нам <a href="#"> Вконтакте</a></span></div>
	</div>

</div>