/* 
 * App js
 * 
 */

(function(window, undefined) {

	var app = {
		indicator: '<img src="/img/ajax-loader.gif" class="indicator">',	
		redirect : function(s) {
			location.href = s;
		},		
		ui : {
			init : function() {

				$("a#forgot-password").on("click", function() {
					$("#UserForgotPasswordForm").fadeToggle();
				}); 				
				
				$('form.ajaxable').find('button[type=submit]').prepend(app.indicator);
				$('form.ajaxable').on('submit', function(e) {
				    e.preventDefault();
				    $(this).ajaxSubmit({
				    	dataType: 'json',
				    	beforeSubmit: function(arr, form) {
				    		form.find('button,input[type=submit]').attr('disabled','disabled');				    		
				    		form.find('.has-error .help-block').remove();
				    		form.find('.form-group').removeClass('has-error');
				    		form.find('.indicator').show();
				    	},				    	
				        success: function(json, statusText, xhr, form) {
				        	form.find('.indicator').hide();
				        	form.find('button,input[type=submit]').removeAttr('disabled');				        	
				        	if ($(json.validationErrors).size() > 0) {
				        		var errors = json.validationErrors;
								for (var model in errors) {
									for (var field in errors[model]) {
										form.find('[name="data['+model+']['+field+']"]').
											closest('.form-group').addClass('has-error').append('<p class="help-block">'+errors[model][field][0]+'</p>');
									}
								}				        		
				        	} else {
				        		app.redirect(json.redirect);
				        	}
				        }
				    });
				});
				
				// other ...
			}
		}
	};

	// Expose to the global object
	window.app = app;

})(window);

$(document).ready(function(){app.ui.init();});