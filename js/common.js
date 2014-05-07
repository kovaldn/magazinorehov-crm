(function() {
  
	var app = {
		
		initialize : function () {
			this.setUpListeners();
			this.modules();
		},

		modules: function () {

			app.getItemsTable = $('#example').dataTable( {
				 bProcessing  : true,
			     sProcessing  : true,
			     bServerSide  : true,
				"ajax": {
					"url": "/functions/getitems.php",
					"dataSrc": ""
				},
		        "columns": [
					{ "data": "product_alias" },
					{ "data": "product_name" },
					{ "data": "price_original" },
					{ "data": "price_sale" },
					{ "data": "profit" }
				]
		    } );

		},

		setUpListeners: function () {
			$('#create-item').on('submit', app.createItem);
		},

		createItem: function (ev) {
			ev.preventDefault();
			
			var form = $(this),
				str = form.serialize();

			console.log(str);

			$.ajax({
				url: '/functions/createitem.php',
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