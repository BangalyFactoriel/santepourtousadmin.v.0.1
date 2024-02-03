<?php
$url = Yii::$app->request->baseUrl."/".md5("utilisateur_ajax");
$caseValue = md5(strtolower('modifieruser'));
$urlajax = Yii::$app->request->baseUrl . "/" . md5("produit_ajax");
$csrf = Yii::$app->request->getCsrfToken();
?>


<script>


/********************************************ajouter un groupe******************************************
 ********************************************************************************************************/
function ajoutgroup() {
    // alert('dd');
        var button = document.querySelector("#enregistre");
            //--- @ --- Initialiser variables ---- @ ---//
        $('#action_key').val('<?=md5("ajouterusers")?>')
        var index = 1;
        var requiredField = ['nomgroupe'];

        var search = window.location.search;
        $('#enregistre').prop('disabled', true);

        var formValidation = false;
        console.log(button);

        button.setAttribute("data-kt-indicator", "on");
       
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
            if(formValidation !== true){
            button.removeAttribute("data-kt-indicator");
             $('#enregistre').prop('disabled', false);

            return false;
        }

        
        $('#kt_form').submit();
        
    }

/********************************************modifier un groupe******************************************
 ********************************************************************************************************/


function modifierupdate() {
    // alert('ff');
        var button = document.querySelector("#modifierup");
            //--- @ --- Initialiser variables ---- @ ---//
        var index = 1;
        var requiredField = ['nomgroupep'];

        var search = window.location.search;
        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");
        $("#modifierup").prop("disabled", true); //desactiver le button
        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
            if(formValidation !== true){
            button.removeAttribute("data-kt-indicator");
            $("#modifierup").prop("disabled", false); //activer le button

            return false;
        }
        $('#kt_formedit').submit();
        
    }
    
    function modifier(code){
        // alert('dd')
        $.post(
            '<?= $url ?>',
            { code: code, action_key: '<?= md5('modifiertypeuser') ?>', _csrf: '<?= $csrf ?>' },
            function (response) {
                    console.log(response);
                    $('#contenueajax').html(response);
                    // form.submit(); // Submit form
             

            }
        );
    }



    //*************************************** Filtrer un groupe d'utilisateur ******************************

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
                action_key: '<?= md5(strtolower('filtregroupeuser')) ?>'
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

</script>