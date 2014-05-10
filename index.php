
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM first step</title>
	<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="vendors/DataTables-1.10.0/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="vendors/DataTables-1.10.0/media/css/jquery.dataTables_themeroller.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/common.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<div class="container main-wrapper highlight">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#items" data-toggle="tab">Ассортимент</a></li>
		  <li><a href="#customers" data-toggle="tab">Заказчики</a></li>
		  <li><a href="#orders" data-toggle="tab">Заказы</a></li>
		  <li><a href="#managers" data-toggle="tab">Менеджеры</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="items">

		  	<div class="panel panel-default">
			    <div class="panel-heading">Ассортимент</div>
				<table id="assortment-table" class="table table-striped" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>Название</th>
				            <th>Закупочная цена</th>
				            <th>Цена продажи</th>
				            <th>Выгода</th>
				        </tr>
				    </thead>	 
				    <tbody>
				        <tr>
				            <th></th>
				            <th></th>
				            <th></th>
				            <th></th>
				        </tr>
				    </tbody>
				</table>			  
			</div>

				<!-- Действия -->
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
						    <div class="panel-heading">Редактировать товар</div>
						    <div class="panel-body">
						    Panel content
						    </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
						    <div class="panel-heading">Добавить товар</div>
						    <div class="panel-body">
						    	<form id="create-item" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="name" class="col-sm-6 control-label">Название товара</label>
										<div class="col-sm-6">
											<input type="text" id="name" name="name" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="price-original" class="col-sm-6 control-label">Цена закупки</label>
										<div class="col-sm-6">
											<input type="text" id="price-original" name="price-original" class="form-control">
										</div>
									</div>								
									<div class="form-group">
										<label for="price-sale" class="col-sm-6 control-label">Цена продажи</label>
										<div class="col-sm-6">
											<input type="text" id="price-sale" name="price-sale" class="form-control">
										</div>
									</div>							
									<div class="form-group">
									    <div class="col-sm-offset-6 col-sm-6">
									    	<button type="submit" class="btn">Добавить товар</button>
									    </div>
									</div>
								</form>
						    </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default">
						    <div class="panel-heading">Удалить товар</div>
						    <div class="panel-body">
								<form id="delete-item" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="items-to-delete" class="col-sm-6 control-label">Название товара</label>
										<div class="col-sm-6">
											<select class="form-control" id="items-to-delete" name="id">
												<!-- options -->
											</select>
										</div>
									</div>
									<div class="form-group">
									    <div class="col-sm-offset-6 col-sm-6">
									     <button type="submit" class="btn">Удалить товар</button>
									    </div>
									</div>
								</form>					    
						    </div>
						</div>
					</div>
				</div>
				<!-- Действия - конец -->
		  </div>

		  <div class="tab-pane" id="customers">...</div>
		  <div class="tab-pane" id="orders">...</div>
		  <div class="tab-pane" id="managers">...</div>
		</div>

		

	</div>
	
	<!-- templates -->
	<script id="items-options" type="text/x-handlebars-template">
	          {{#this}}
	               <option value="{{id}}">{{product_name}}</option>
	          {{/this}}
	</script>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/handlebars.js"></script>
	<script src="vendors/bootstrap/js/bootstrap.js"></script>
	<script src="vendors/DataTables-1.10.0/media/js/jquery.dataTables.min.js"></script>
	<script src="js/jquery.dataTables.editable.js"></script>	
	<script src="js/dataTables.bootstrap.js"></script>
	<script src="js/common.js"></script>


</body>
</html>


























