(function() {
    "use strict";

	var myModuleReq = 'site/request/assets/backbone';
	var libsPath	= myModuleReq+'/js/libs';
	var appsPath	= myModuleReq+'/js/apps';
	var modelsPath	= appsPath + '/model';
	var viewsPath	= appsPath + '/view';
	// var tmplsPath	= 'template';

	requirejs.config({
		paths : {
			text: 			libsPath + '/text',
			jquery: 		'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min',
			underscore: 	libsPath + '/underscore',
			backbone: 		libsPath + '/backbone',
			appsPath:		appsPath
			// modelsPath:		modelsPath,
			// viewsPath:		viewsPath,
			// tmplsPath:		tmplsPath
		},
		baseUrl : '/',
		shim: {
			underscore: {
			  exports: '_'
			},
			backbone: {
				//These script dependencies should be loaded before loading
				//backbone.js
				deps: ['underscore', 'jquery'],
				//Once loaded, use the global 'Backbone' as the
				//module value.
				exports: 'Backbone'
			}
		}
	});

	require([
				'jquery', 'text',
				'appsPath/test'
			]
	);
})();