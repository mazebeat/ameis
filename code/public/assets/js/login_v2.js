/* Webarch Admin Dashboard 
 -----------------------------------------------------------------*/
$(document).ready(function () {
    $('#login_toggle').click(function () {
        $('#frm_login').show();
        $('#frm_register').hide();
    })
    $('#register_toggle').click(function () {
        $('#frm_login').hide();
        $('#frm_register').show();
    })

    $(".lazy").lazyload({
        effect: "fadeIn"
    });

    $('#frm_login').validate({

        focusInvalid: true,
        ignore: "",
        rules: {
            mail: {
                maxlength: 100,
                email: true,
                required: true
            },
            password: {
                maxlength: 100,
                required: true
            }
        },
        messages: {
            mail: {
                required: "Campo obligatorio",
                email: "Porfavor ingrese un direccion email valida",
                maxlength: function (p, element) {
                    return "Tiene que tener un máximo de " + p + " digitos";
                }
            },
            password: {
                required: "Campo obligatorio"
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
        },

        errorPlacement: function (label, element) { // render error placement for each input type
            $('<span class="error"></span>').insertAfter(element).append(label)
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs

        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('error-control').addClass('success-control');
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

});