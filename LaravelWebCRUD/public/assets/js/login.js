"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;
        var form = KTUtil.getById('kt_login_signin_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('kt_login_signin_form'), {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'El email es obligatorio'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'La contraseña es obligatoria'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signin_submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    form.submit();
                } else {
                    swal.fire({
                        text: "Sorry, you must fill in all the fields.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function(e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function(e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                    email_r: {
                        validators: {
                            notEmpty: {
                                message: 'The email is required'
                            },
                            emailAddress: {
                                message: 'The email is not valid'
                            }
                        }
                    },
                    password_r: {
                        validators: {
                            notEmpty: {
                                message: 'The password is mandatory'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'You must confirm the password'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password_r"]').value;
                                },
                                message: 'Passwords do not match'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must agree to terms and conditions'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signup_submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    form.submit();
                } else {
                    swal.fire({
                        text: "Sorry, you must fill in all the fields.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Accept",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function(e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_forgot_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email is required'
                            },
                            emailAddress: {
                                message: 'The email is not valid'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    // Submit form
                    form.submit();
                } else {
                    swal.fire({
                        text: "Sorry, you must fill in all the fields.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Accept",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function(e) {
            e.preventDefault();

            _showForm('signin');
        });
    }



    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();

            if ($("input[name=error]").val() == 1) {
                $("#kt_login_signup").trigger("click");
            }

        }
    };
}();

var msg_register_success = "false";

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();

    msg_register_success = $('#msg_register_success').val();
    if (msg_register_success == "true") {
        swal.fire({
            text: "¡Registrado correctamente!",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Cerrar",
            customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary"
            }
        }).then(function() {
            KTUtil.scrollTop();
        });
    }
});