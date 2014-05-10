(function() {
  
	var app = {
		
		initialize : function () {
			this.setUpListeners();
			this.modules();
		},

		modules: function () {

			// Подключаем таблицу  
			// https://datatables.net/reference/option/ajax
			app.getItemsTable = $('#assortment-table').dataTable( {
				"processing": true, // обязательно, для обновления данных с сервера при fnDraw()
        		"serverSide": true, // обязательно, для обновления данных с сервера при fnDraw()
				"ajax": {
					"url": "/functions/getitems.php",
					"dataSrc": function ( json ) {
						app.assortment = json; // закэшируем ассортимент
				    	return json;
				    }
				},
		        "columns": [
					{ "data": "product_name" },
					{ "data": "price_original" },
					{ "data": "price_sale" },
					{ "data": "profit" }
				],
				"fnDrawCallback" : function( oSettings ) {
					app.drawOptions()
				}
		    } );	

		},

    	// Отрисовываем селект для удаления товаров
		drawOptions: function () {
		    var source   = $('#items-options').html(),
		    	template = Handlebars.compile(source);
			$("#items-to-delete").html(template(app.assortment));
		},

		setUpListeners: function () {
			$('#create-item').on('submit', app.createItem);
			$('#delete-item').on('submit', app.deleteItem);
		},

		createItem: function (ev) {
			ev.preventDefault();
			app.ajax(this, '/functions/createitem.php');
		},

		deleteItem: function (ev) {
			ev.preventDefault();
			app.ajax(this, '/functions/delitem.php');
		},

		ajax: function (form, url, str){

			var form = $(form),
				str = form.serialize();

			$.ajax({
				url: url,
				type: 'POST',
				data: str
			})
			.done(function(ans) {
				// console.log("success");
				// console.log(ans);
				app.getItemsTable.fnDraw();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});	
		}	
		
	}

	app.initialize();

}());