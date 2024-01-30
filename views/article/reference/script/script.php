<?php

$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_unicitelibelle");
// $csrf = Yii::$app->request->getCsrfToken();
$urlajax = Yii::$app->request->baseUrl . "/" . md5("produit_ajax");
 $csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));


?>

<script>

    // script d'ajout d'une refférence
    function add() {
        console.log("Test js")
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
    }
</script>