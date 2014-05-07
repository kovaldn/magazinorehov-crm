<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>CRM first step</title>
	<link rel="stylesheet" href="DataTables-1.10.0/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="DataTables-1.10.0/media/css/jquery.dataTables_themeroller.min.css">
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

	<br><br><br>

	<button id="get-all-items">Получить список товаров</button>

	<br><br><br>

	<table id="example" class="display" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Product alias</th>
	            <th>Product name</th>
	            <th>Price original</th>
	            <th>Price sale</th>
	            <th>Profit</th>
	        </tr>
	    </thead>	 
	    <tfoot>
	        <tr>
	            <th></th>
	            <th></th>
	            <th></th>
	            <th></th>
	            <th></th>
	        </tr>
	    </tfoot>
	</table>
	
	<script src="js/jquery.min.js"></script>
	<script src="DataTables-1.10.0/media/js/jquery.dataTables.min.js"></script>

	<script src="js/common.js"></script>

</body>
</html>