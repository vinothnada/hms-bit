

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
                'name':{ required:true},
                'slogan':{ required:true},
                'address1':{ required:true},
                'address2':{ required:true},
                'address3':{ required:true},
                'phone':{ required:true},
                'email':{ required:true},
                'fax':{ required:true}
            },
            messages: {
                'id':{ required :'This field is required'},
                'name':{ required :'This field is required'},
                'slogan':{ required :'This field is required'},
                'address1':{ required :'This field is required'},
                'address2':{ required :'This field is required'},
                'address3':{ required :'This field is required'},
                'phone':{ required :'This field is required'},
                'email':{ required :'This field is required'},
                'fax':{ required :'This field is required'},
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