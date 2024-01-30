<?php

$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
// $csrf = Yii::$app->request->getCsrfToken();
$urlajax = Yii::$app->request->baseUrl . "/" . md5("produit_ajax");
$csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));


?>

<script>

    // script d'ajout d'une catégorie
    function add() {
        console.log('test js')
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

        //============================================
        
        //============================================
    }


</script>