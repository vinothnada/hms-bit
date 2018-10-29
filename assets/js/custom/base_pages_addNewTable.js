
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
                'tblnum':{ required:true,number:true},
                'seats':{ required:true,number:true},
                'status':{ required:true},
                'cat':{ required:true},                                                     
            },
            messages: {
                'tblnum':{ required :'This field is required'},
                'seats':{ required :'This field is required'},
                'status':{ required :'This field is required'},
                'cat':{ required :'This field is required'},
            },
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