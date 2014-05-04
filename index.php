<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>CRM first step</title>
</head>
<body>
	<form id="create-item">
		<label for="name">Название товара</label>
		<input type="text" id="name" name="name">
		<br>
		<label for="price-original">Цена закупки</label>
		<input type="text" id="price-original" name="price-original">
		<br>
		<label for="price-sale">Цена продажи</label>
		<input type="text" id="price-sale" name="price-sale">
		<br>
		<button type="submit">Добавить товар</button>
	</form>
	<script src="js/jquery.min.js"></script>
	<script src="js/common.js"></script>
</body>
</html>