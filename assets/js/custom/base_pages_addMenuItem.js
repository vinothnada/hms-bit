
var BasePagesLogin = function() {
    var initValidationLogin = function(){
        jQuery('.js-validation-form').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'itemname':{ required:true},
                'rate':{ required:true,number:true},
                'itemcat':{ required:true},
                'itemunit':{ required:true},
                'status':{ required:true},                                                         
            },
            messages: {
                'id':{ required :'This field is required'},
                'itemname':{ required :'This field is required'},
                'rate':{ required :'This field is required',number:'Please enter a valid number'},
                'itemcat':{ required :'This field is required'},
                'itemunit':{ required :'This field is required'},
                'status':{ required :'This field is required'},   
            }
        });
    };

    return {
        init: function () {
            // Init Login Form Validation
            initValidationLogin();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesLogin.init(); });