
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
                'type':{ required:true},
                'tariff':{ required:true,number:true},
                'status':{ required:true},
                'remarks':{ required:true},
                'name':{ required:true},
                'building':{ required:true},
            },
            messages: {
                'type':{ required :'This field is required'},
                'tariff':{ required :'This field is required'},
                'status':{ required :'This field is required'},
                'remarks':{ required :'This field is required'},
                'name':{ required :'This field is required'},
                'building':{ required :'This field is required'},
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