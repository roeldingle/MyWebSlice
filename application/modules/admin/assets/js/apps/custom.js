var AppRouter = Backbone.Router.extend({
        routes: {
			"": "_page",
            "*menu": "_page"
        },
		_page: function(actions){
			var actions = (actions == null) ? 'dashboard' : actions;
			var admin_view = new Admin_view;
			admin_view.give_page(actions);
		}
    });
    
Admin_view = Backbone.View.extend({
        // initialize: function(){
            // alert("Alerts suck.");
        // },
		
		give_page: function(actions){
			$('.nav li').removeClass('active');
			$('#'+actions).addClass('active');
		}
    });
	
	
$(function(){
    var admin_router = new AppRouter;
    Backbone.history.start();
	
});









/*
Backbone.View.extend({
				model: new ModelStock(),
				initialize: function(){
				//this.popover_show();
					this.init_display();
					
				},
				el: "body",
				events: {
					"click .btn-danger": "delete_stock",
					"mouseover .btn-primary": "add_stock",
					"mouseover .item_name": "popover_show"
				},
				init_display: function(){
					//this.popover_show();
					var fetch = this.model;
					var formdata    = {
						'action':'stockList'
						};

					fetch.save(null,{ 
						data: formdata,
						error:	function(model,response){
							console.log('error');
						},
						success:	function(model, response){
							console.log(response);
							var sData = '';
							$.each(response, function(index, val) { 
								sData += '<tr>';
								sData += '<td><input type="checkbox" value="'+val.idx+'"></td>';
								sData += '<td>'+(index + 1)+'</td>'; 
								sData += '<td><a href="javascript:Custom.singleView('+val.idx+')"  >'+val.item_code+'</a></td>';	
								sData += '<td><a class="item_name" href="javascript:Custom.singleView('+val.idx+')" rel="popover" data-content="'+val.desc+'" data-original-title="'+val.name+'" >'+val.name+'</a></td>'; 					
								sData += '<td>'+val.type+'</td>'; 
								sData += '<td>'+val.desc+'</td>'; 
								sData += '<td>14</td>';
								sData += '</tr>';
							});
							
							$('tbody').html(sData);
							/*view template
							// var data =   {stock_list: sData};
							// var parsedTemplate 	= _.template(tmp, data);			
							// $('.span8').before(parsedTemplate);
						}
					});
			  },
			  add_stock: function(){
				var options = {
					placement : "bottom"
				
				}
				$('.item_name').popover(options);
			  
			  },
			  popover_show: function(){
				$('.item_name').popover();
			  },
			  delete_stock: function(){
				alert("Deleted");
			  
			  }
		});
	}
);*/