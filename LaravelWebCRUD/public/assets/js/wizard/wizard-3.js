"use strict";

// Class definition
var KTWizard3 = function() {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initWizard = function() {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: true // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function(wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function(status) {
                    if (status == 'Valid') {
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "¡Ok lo tengo!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false; // Do not change wizard step, further action will be handled by he validator
        });

        // Changed event
        _wizardObj.on('changed', function(wizard) {
            KTUtil.scrollTop();
        });

        // Submit event
        _wizardObj.on('submit', function(wizard) {
            // Validate form before submit
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function(status) {
                    if (status == 'Valid') {
                        _formEl.submit(); // submit form
                    } else {
                        Swal.fire({
                            text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "¡Ok lo tengo!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }
        });
    }

    var _initValidation = function() {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    name_event: {
                        validators: {
                            notEmpty: {
                                message: 'El campo nombre del evento es obligatorio'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'El campo ciudad es obligatorio'
                            }
                        }
                    },
                    type_event: {
                        validators: {
                            notEmpty: {
                                message: 'El campo tipo de evento es obligatorio'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'El campo dirección es obligatorio'
                            }
                        }
                    },
                    img: {
                        validators: {
                            notEmpty: {
                                message: 'El campo imagen principal es obligatorio'
                            }
                        }
                    },
                    promotor: {
                        validators: {
                            notEmpty: {
                                message: 'El campo promotor es obligatorio'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        // Step 2
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    date_event: {
                        validators: {
                            notEmpty: {
                                message: 'El campo dia del evento es obligatorio'
                            }
                        }
                    },
                    time_event_since: {
                        validators: {
                            notEmpty: {
                                message: 'El campo hora de inicio es obligatorio'
                            }
                        }
                    },
                    time_event_until: {
                        validators: {
                            notEmpty: {
                                message: 'El campo hora de fin es obligatorio'
                            }
                        }
                    },
                    date_event_end_sell: {
                        validators: {
                            notEmpty: {
                                message: 'El campo dia finaliza venta es obligatorio'
                            }
                        }
                    },
                    time_event_end_sell: {
                        validators: {
                            notEmpty: {
                                message: 'El campo hora finaliza venta es obligatorio'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        // Step 3
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    delivery: {
                        validators: {
                            notEmpty: {
                                message: 'Delivery type is required'
                            }
                        }
                    },
                    packaging: {
                        validators: {
                            notEmpty: {
                                message: 'Packaging type is required'
                            }
                        }
                    },
                    preferreddelivery: {
                        validators: {
                            notEmpty: {
                                message: 'Preferred delivery window is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        // Step 4
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    locaddress1: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            }
                        }
                    },
                    locpostcode: {
                        validators: {
                            notEmpty: {
                                message: 'Postcode is required'
                            }
                        }
                    },
                    loccity: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
                            }
                        }
                    },
                    locstate: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            }
                        }
                    },
                    loccountry: {
                        validators: {
                            notEmpty: {
                                message: 'Country is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Validate fields when clicking the Submit button
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));
    }

    return {
        // public functions
        init: function() {
            _wizardEl = KTUtil.getById('kt_wizard_v3');
            _formEl = KTUtil.getById('kt_form');

            _initWizard();
            _initValidation();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard3.init();
});