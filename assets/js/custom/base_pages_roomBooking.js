
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
                'title':{ required:true},
                'firstname':{ required:true},
                'lastname':{ required:true},
                'gender':{ required:true},
                'address':{ required:true},
                'city':{ required:true},
                'mobile':{ required:true,number:true},
                'nationality':{ required:true},
                'identityType':{ required:true},
                'identityNo':{ required:true},
                'chkin_date ':{ required:true},
                'chkout_date ':{ required:true},
                'tariff ':{ required:true},
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