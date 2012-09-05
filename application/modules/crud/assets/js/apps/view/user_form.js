define([
            // Libraries
			'backbone',

			// Templates
            'text!tmplsPath/form.html',

			// Models
            'modelsPath/mdl_userform'
		],
	function(
	    // Libraries
		backbone,

		// Templates
		user_form,
        
        // Models
        mdl_userform
	){
        var navigator    = Backbone.Router.extend({});
        
	    return {
		    userForm: Backbone.View.extend({
			    el: 'body',

				events: {
				    'click form#user_form input[name="formBtn"]': 'formSubmt'
				},

                initialize:  function(){
				    _.bindAll(this, 'render');

                    this.render();
				},

				render:  function(){
				    var data 			=   {userSbmtBtn: 'Add User', formAction: 'add'};
					var parsedTemplate 	= _.template(user_form, data);

                    $('form#user_form').remove();
					$('div#content').append(parsedTemplate);
				},

				formSubmt: function(e){
				    var action    = $(e.currentTarget).data().action;

					if (action === 'add') {
					    // Add to database
						var form		= $('form#user_form').serialize();
						var formdata	= {};

                        formdata['module']        = 'crud';
                        formdata['controller']    = 'userform';
                        formdata['method']        = 'add';
                        
						$.each(form.split('&'), function(k,v){
							formdata[v.split('=')[0]] = v.split('=')[1];
						});
                        
                        var save    = new mdl_userform.defAjax();
                        
                        save.save(null, {
                            data:    formdata,
                            error:   function(model, response){
                                console.log('error');
                            },
                            success: function(model, response){
                                if (response.stat === true) {
                                    console.log('Adding users successful!');
                                }
                                
                                var router  = new navigator();
                                router.navigate('read');
                            }
                        });
					}

					return false;
				}
	        }),
		};        
	}
);