define([
		// Libraries
		'jquery', 'backbone','common',
	
		// Templates
            'text!tmplsPath/admin.html'		
		], 
    function($,backbone,common,tpl){		
	
		var ModelStock = Backbone.Model.extend({
			url: urls.ajax_url
		});
						
		return  Backbone.View.extend({
		
				model: new ModelStock(),
				
				initialize: function(){
					this.init_display();
				},
				el: "body",
				events: {
					
				},
				init_display: function(){
					
					console.log(this.model.url);
					
					var fetch = this.model;
					var formdata    = {
						module : "admin",
						controller : "api",
						method : "test"
						};
						

					fetch.save(null,{ 
						data: formdata,
						error:	function(model,response){
							console.log('error');
						},
						success:	function(model, response){
							console.log(response);
							
						}
					});
				},

				/*give the current page*/
				return_page: function(id){
				
					var def_page = "dashboard";

					if(id == null || id == ""){
						var id =  def_page;
					 }
					 
					 $('#page_title').html(common.ucwords(id));
					//alert(id);
					 
					$('.nav-list li').removeClass();

					$('#'+id).addClass('active');

				}
		});
	}
);