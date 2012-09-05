define([
    'jquery',
	'underscore',
	'backbone',
	'viewsPath/view'
    ],
  function($,_,backbone,view){
		Backbone.emulateHTTP = true;
		Backbone.emulateJSON = true;
	
		var RouterStock = Backbone.Router.extend({
			routes: {
				//"": "displayPage",
				"*action": "displayPage"
				//"*menu": "test"
			},
			displayPage: function(id){
				 var myjs_view = new view();
				 myjs_view.return_page(id);
				
			}
		});
		
		
		/*initialize the route*/
		$(function(){
		    new RouterStock();
			Backbone.history.start();
			
		});
	}
);