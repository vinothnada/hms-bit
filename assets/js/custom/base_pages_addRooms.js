
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
                'roomno':{ required:true, number:true},
                'roomtype':{ required:true},
                'floortype':{ required:true},
                'toilet':{ required:true},
                'status':{ required:true},                                                           
            },
            messages: {
                'roomno':{ required :'This field is required'},
                'roomtype':{ required :'This field is required'},
                'floortype':{ required :'This field is required'},
                'toilet':{ required :'This field is required'},
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