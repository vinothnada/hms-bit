
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
                'empid': {
                    required: true,
                },
                'name': {
                    required: true
                },
                'role': {
                    required: true
                },
                'department': {
                    required: true
                },
                'Status': {
                    required: true
                },
                'tp': {
                    required: true,
                    number:true
                }                                                             
            },
            messages: {
                'empid': {
                    required: 'Please enter a Employee id'
                },
                'name': {
                    required: 'Please enter a Employee Name'
                },
                'role': {
                    required: 'Please select a Employee role'
                },
                'department': {
                    required: 'Please select a department'
                },
                'Status': {
                    required: 'Please select a Status'
                },
                'tp': {
                    required: 'Please enter a Telepone number',
                    number:'Telepone should contains number'
                }    
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