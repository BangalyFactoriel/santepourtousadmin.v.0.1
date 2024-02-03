<script>

    document.getElementById('kt_docs_formvalidation_password').addEventListener('submit', function (event) {
        event.preventDefault();
    });

    /********************************************ajouter un groupe******************************************
 ********************************************************************************************************/

    function ajouteruserattente() {
        // alert('dd');
        // alert('dd');
        var button = document.querySelector("#kt_docs_formvalidation_password_submit");
        var mdp = $("#new_password").val();
        var confirme = $("#confirm_password").val();
        //--- @ --- Initialiser variables ---- @ ---//
        $('#action_key').val('<?= md5("ajouterusers") ?>')
        var index = 1;
        var requiredField = ['username', 'new_password', 'confirm_password'];

        var search = window.location.search;
        $('#kt_docs_formvalidation_password_submit').prop('disabled', true);

        var formValidation = false;
        console.log(button);

        button.setAttribute("data-kt-indicator", "on");

        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $('#kt_docs_formvalidation_password_submit').prop('disabled', false);

            return false;
        }

        if (mdp===confirme){
            $('#kt_docs_formvalidation_password').submit();
        }else{
            message('<?= Yii::t("app", "motpassdifferent") ?>', 'error');
            button.removeAttribute("data-kt-indicator");
            $("#kt_docs_formvalidation_password_submit").prop("disabled", false);
        }
          

    }

</script>