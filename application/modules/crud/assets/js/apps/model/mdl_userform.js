define([
		// Libraries
		'jquery', 'backbone'		
		], 
    function(
        $,backbone
    ){		
		return {
            defAjax: Backbone.Model.extend({
                url: 'http://smplx_mngt.com/core/request/ajax/'
            })            
		}
	}
);