<div class="pa__content">

	<div class="pa__form-wrapper">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		require("$root/models/accountDataModel.php");
		?>
	</div>
	<div class="form_separator"></div>

	<div class="pa__orders">
		<div class="orders__title">Мои заказы <form action=""></form>
		</div>
		<div class="orders__info">
			<div class="orders__header">
				<div class="order__number">№ 0001</div>
				<div class="order__date">18.08.2020</div>
			</div>
			<div class="orders__content">
				<div class="order">1. Игровая консоль Nintendo64 <span>8990р</span> </div>
				<div class="order">1. Игровая консоль Nintendo64 <span>8990р</span></div>
				<div class="order">1. Игровая консоль Nintendo64 <span>8990р</span></div>

			</div>
			<div class="orders__price">
				Общая стоимость: <span>10000р</span>
			</div>
		</div>
	</div>
</div>