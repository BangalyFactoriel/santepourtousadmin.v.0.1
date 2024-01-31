<?php

$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
// $csrf = Yii::$app->request->getCsrfToken();
$urlajax = Yii::$app->request->baseUrl . "/" . md5("article_ajax");
$csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));


?>

<script>

    // script d'ajout d'une refférence
    function add() {
        var btnaddRef = document.querySelector("#btn-add-ref");
        $("#btn-add-ref").prop("disabled", true);
        //--- @ --- Initialiser variables et verification si les champs exisés sont remplie ---- @ ---//
        var index = 1;
        var requiredField = ['labelField'];
        var search = window.location.search;
        var formValidation = false;
        btnaddRef.setAttribute("data-kt-indicator", "on");
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            btnaddRef.removeAttribute("data-kt-indicator");
            $("#btn-add-ref").prop("disabled", false);
            return false;
        }



        //**********************************verification de l'unicité du nom de catégorie************************
        var labelField = document.getElementById('labelField').value;
        $.post(
            '<?= $url ?>',

            {
                _csrf: '<?= $csrf ?>',
                labelField: labelField,
                action_key: '<?= md5(strtolower('uniciteref')) ?>'
            },
            function (response) {
                console.log(response);
                if (response) {
                    message('<?= Yii::t("app", "libexiste") ?>', 'error');
                    button.removeAttribute("data-kt-indicator");
                    $("#btn-add-ref").prop("disabled", false);

                } else {

                    $('#action_key').val("<?= md5('addreference') ?>");
                    $('#kt_productCats').submit();


                }

            }
        );
    }


    function update() {
        var btnaddRef = document.querySelector("#btn-update-ref");
        $("#btn-update-ref").prop("disabled", true);
        //--- @ --- Initialiser variables et verification si les champs exisés sont remplie ---- @ ---//
        var index = 1;
        var requiredField = ['labelFieldupdate'];
        var search = window.location.search;
        var formValidation = false;
        btnaddRef.setAttribute("data-kt-indicator", "on");
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            btnaddRef.removeAttribute("data-kt-indicator");
            $("#btn-update-ref").prop("disabled", false);
            return false;
        }

        $('#action_keyupdate').val("<?= md5('updatereference') ?>");
        $('#kt_updatereference').submit();
    }




    
    //*************************************** Filtrer un produit  ******************************

    function Filter() {
        // alert('dd');
        var button = document.querySelector("#bntfiltree");
        button.setAttribute("data-kt-indicator", "on");
        ch = $('#donneeRecherche').val();

        limit = $('#limit').val();
        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        KTApp.showPageLoading();
        $.post(
            '<?= $urlajax ?>',

            {
                _csrf: '<?= $csrf ?>',
                ch: ch,
                limit: limit,
                action_key: '<?= md5(strtolower('filtrerefenrece')) ?>'
            },
            function (response) {
                console.log(response);
                $('#databody').html(response);
            }
        );
        button.removeAttribute("data-kt-indicator");
        // desactiver le chargement
        KTApp.hidePageLoading();
        loadingEl.remove();


    }
</script>