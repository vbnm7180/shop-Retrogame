<div class="pa__content">

	<div class="pa__form-wrapper">
	<?php
		$root = $_SERVER['DOCUMENT_ROOT'];
		require("$root/models/accountFormModel.php");
		?>
	</div>
	<div class="form_separator"></div>

	<div class="pa__orders">
		<div class="orders__title">Мои заказы <form action=""></form></div>
		<?php
			$root = $_SERVER['DOCUMENT_ROOT'];
			require("$root/models/accountOrdersModel.php");

		?>
	</div>
</div>