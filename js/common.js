(function() {
  
	var app = {
		
		initialize : function () {
			this.setUpListeners();
		},

		modules: function () {
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
				console.log("success");
				console.log(ans);
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