<?php
$lien = Yii::$app->request->baseUrl . "/" . md5("utilisateur_ajax");
$case = md5(strtolower('verificationMail'));
$urlajax = Yii::$app->request->baseUrl . "/" . md5("produit_ajax");
$csrf = Yii::$app->request->getCsrfToken();
$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
?>

<script type="text/javascript">
    document.getElementById('da_frm_update').addEventListener('submit', function (event) {
        event.preventDefault();
    });

    // ********************************foction qui permet d'ajouter d'utilisateur*********************************

    function ajoutuser() {
        // alert    ('ddd');

        var button = document.querySelector("#btnadd");
        document.getElementById('action_key').value = '<?= md5(strtolower("ajouterUtilisateur")) ?>';
        $('#da_frm_users').attr('action', '<?= Yii::$app->request->baseUrl . "/" . md5("utilisateur_adduser") ?>');
        //--- @ --- Initialiser variables ---- @ ---//
        const form = document.getElementById('da_frm_users');
        $('#btnadd').prop('disabled', true);

        var index = 1;
        var requiredField = ['nom', 'prenom', 'email', 'typeusers'];

        var search = window.location.search;

        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");

        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $('#btnadd').prop('disabled', false);

            return false;
        }
        adresseMail = document.getElementById('email').value;
        form.submit();

        $.post(
            '<?= $lien ?>',
            {
                adresseMail: adresseMail,
                action_key: '<?= md5(strtolower('verifermailforuser')) ?>',
                _csrf: '<?= $csrf ?>'
            },
            function (response) {
                console.log(response);
                if (response == true) {
                    $.post(
                        '<?= $url ?>',
                        {
                            adresseMail: adresseMail,
                            action_key: '<?= md5(strtolower('Unicitemail')) ?>',
                            _csrf: '<?= $csrf ?>'
                        },
                        function (response) {
                            console.log(response);
                            if (response == true) {
                                message('<?= Yii::t("app", "emailexiste") ?>', 'error');
                                button.removeAttribute("data-kt-indicator");
                                $("#btnadd").prop("disabled", false);
                            } else {

                                form.submit();
                            }
                        }

                    )


                } else {

                    message(response, 'error');
                    button.removeAttribute("data-kt-indicator");
                    $('#btnadd').prop('disabled', false);

                }

            }
        );



    }







    function update() {

        // alert('ok');

        var button = document.querySelector("#btupdate");
        document.getElementById('action_keys').value = '<?= md5(strtolower("modifierUnUtilisateur")) ?>';
        $('#da_frm_update').attr('action', '<?= Yii::$app->request->baseUrl . "/" . md5("utilisateur_adduser") ?>');
        //--- @ --- Initialiser variables ---- @ ---//
        const form = document.getElementById('da_frm_update');
        $('#btupdate').prop('disabled', true);

        var index = 1;
        var requiredField = ['typeusersupdate'];

        var search = window.location.search;

        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");

        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $('#btupdate').prop('disabled', false);


            return false;
        }
        form.submit(); // Submit form

    }



    //*************************************** Filtrer un produit  ******************************

    function Filter() {
        // alert('dd');
        var button = document.querySelector("#bntfiltree");
        button.setAttribute("data-kt-indicator", "on");
        ch = $('#donneeRecherche').val();
        limit = $('#limit').val();
        //chargement du loading
        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        KTApp.showPageLoading();

        // Show page loading
        $.post(
            '<?= $urlajax ?>',

            {
                _csrf: '<?= $csrf ?>',
                ch: ch,
                limit: limit,
                action_key: '<?= md5(strtolower('filtreUser')) ?>'
            },
            function (response) {
                $('#databody').html(response);
            }
        );
        button.removeAttribute("data-kt-indicator");
        // desactiver le chargement
        KTApp.hidePageLoading();
        loadingEl.remove();


    }

    $("#kt_datatable_zero_configuration").DataTable();


</script>