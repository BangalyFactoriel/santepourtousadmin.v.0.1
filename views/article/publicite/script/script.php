<?php

$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
// $csrf = Yii::$app->request->getCsrfToken();
$urlajax = Yii::$app->request->baseUrl . "/" . md5("article_ajax");
$csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));


?>

<script>

    // script d'ajout d'une catégorie
    function add() {
        var button = document.querySelector("#btn-add-pub");
        $("#btn-add-pub").prop("disabled", true);
        //--- @ --- Initialiser variables et verification si les champs exisés sont remplie ---- @ ---//
        var index = 1;
        var requiredField = ['titleField', 'contentField', 'datedebutField', 'datefinField', 'positionField'];
        var search = window.location.search;
        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $("#btn-add-pub").prop("disabled", false);
            return false;
        }
        $('#action_key').val("<?= md5('addpublicites') ?>");
        $('#kt_productCats').submit();
    }



       // script d'ajout d'une catégorie
       function updatepublicite() {
        var button = document.querySelector("#btn-add-pub");
        $("#btn-add-pub").prop("disabled", true);
        //--- @ --- Initialiser variables et verification si les champs exisés sont remplie ---- @ ---//
        var index = 1;
        var requiredField = ['titreupdate', 'contentupdate', 'datedebutupdate', 'datefinupdate', 'datefinupdate'];
        var search = window.location.search;
        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            $("#btn-add-pub").prop("disabled", false);
            return false;
        }
        $('#updatepub').submit();
    }

    function Filter() {
        // alert('dd');
        var button = document.querySelector("#bntfiltree");
        button.setAttribute("data-kt-indicator", "on");
        ch = $('#donneeRecherche').val();
        datedebutfitre = $('#datedebutfitre').val();
        datefinfitre = $('#datefinfitre').val();

        limit = $('#limit').val();
        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        KTApp.showPageLoading();
        $.post(
            '<?= $urlajax ?>',

            {
                _csrf: '<?= $csrf ?>',
                ch: ch,
                datedebutfitre:datedebutfitre,
                datefinfitre:datefinfitre,
                limit: limit,
                action_key: '<?= md5(strtolower('filtrepublicite')) ?>'
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