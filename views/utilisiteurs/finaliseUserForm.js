// Define form element
const form = document.getElementById('kt_docs_formvalidation_password');
    alert('dd');

// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    form,
    {
        fields: {
            'username': {
                validators: {
                    notEmpty: {
                        message: 'le nom d\'utilisateurs est obligatoire'
                    }
                }
            },
            'new_password': {
                validators: {
                    notEmpty: {
                        message: 'le mots de pass est obligatpire'
                    },
                    callback: {
                        message: 'donner un mots de pass valide',
                        callback: function (input) {
                            if (input.value.length > 0) {
                                return validatePassword();
                            }
                        }
                    }
                }
            },
            'confirm_password': {
                validators: {
                    notEmpty: {
                        message: 'Vous devez confirmer le mots de pass'
                    },
                    identical: {
                        compare: function () {
                            return form.querySelector('[name="new_password"]').value;
                        },
                        message: 'Les mots de passe doivent etre identique'
                    }
                }
            },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

// Submit button handler
const submitButton = document.getElementById('kt_docs_formvalidation_password_submit');
submitButton.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();

    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                submitButton.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                submitButton.disabled = true;
                
                  form.submit(); // Submit form
                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    setTimeout(function () {
                        // Remove loading indication    
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        // Show popup confirmation
                        Swal.fire({
                            text: "Compte cree avec succes!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                    }, 2000);
            }
        });
    }
});