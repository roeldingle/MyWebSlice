define([
		// Libraries
		'jquery'
		], 
    function($){		
			
		return  Common = {
		
			ucwords: function(str){
				return (str + '').replace(/^([a-z])|[\s_]+([a-z])/g, function ($1) {
					return $1.toUpperCase();
				})
			}
		
		
		}
	}
);