<?php

$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
// $csrf = Yii::$app->request->getCsrfToken();
$urlajax = Yii::$app->request->baseUrl . "/" . md5("produit_ajax");
$csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));

?>

<script>
    // script d'ajout d'un auteur
    function add() {

        var button = document.querySelector("#btn-add-author");
        $("#btn-add-author").prop("disabled", true);

        // Initialisation et verification du formulaire 
        var index = 1;
        var requiredField = ['nomField', 'prenomField', 'phoneField'];
        var search = window.location.search;
        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");

        // Validation champs du formulaire 
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $("#btn-add-author").prop("disabled", false);
            return false;
        }
        //********************************** verification de l'unicité du phone ************************
        var phoneField = document.getElementById('phoneField').value;

        $.post(
            '<?= $url ?>',
            {
                _csrf: '<?= $csrf ?>',
                phoneField: phoneField,
                action_key: '<?= md5(strtolower('uniciteauth')) ?>'
            },

            function (response) {
                //console.log(response);

                if (response) {
                    // console.log(response)

                    message('<?= Yii::t("app", "phone_exists") ?>', 'error');
                    button.removeAttribute("data-kt-indicator");
                    $("#btn-add-author").prop("disabled", false);
                }
                else {
                    $('#action_key').val("<?= md5('addAuthor') ?>");
                    $('#kt_productCats').submit();
                }
            }
        );
    }

    function update() {
        var btnUpdateAuthor = document.querySelector("#btn-update-author");
        $("#btn-update-author").prop("disabled", true);
        
        // Initialisations des variables et verification si les champs exigés sont remplis
        var index = 1;
        var requiredField = ['lastNameField', 'firstNameField', 'phoneFieldUp'];
        var search = window.location.search;
        var formValidation = false;
        btnUpdateAuthor.setAttribute("data-kt-indicator", "on");

        // Validation champs du formulaire
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            btnUpdateAuthor.removeAttribute("data-kt-indicator");
            $("#btn-update-author").prop("disabled", false);
            return false;
        }

        $('#action_key_update').val("<?= md5('updateAuthor') ?>");
        $('#kt_update_author').submit();
    }
</script>