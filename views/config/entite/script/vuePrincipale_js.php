<?php
$url = Yii::$app->request->baseUrl . "/" . md5("visiteur_verifmail");
$caseValue = md5(strtolower('verificationMail'));
$csrf = Yii::$app->request->getCsrfToken();

?>


<script>
    $(document).ready(function () {
        document.getElementById('ajout').style.display = 'block';


        $('#infoGeneral').click(function () {
            console.log('infoGeneral');
            document.getElementById('ajout').style.display = 'block';
            document.getElementById('liste').style.display = 'none';

        })

        $('#Personnel').click(function () {
            console.log('infoGeneral');
            document.getElementById('ajout').style.display = 'none';

            document.getElementById('liste').style.display = 'block';

        })


        // $('#kt_modal_new_target_submit').click(function () {
        //     $("#addPersonel").attr('action', '<?= Yii::$app->request->baseUrl . "/" . md5("personel_personel") ?>');
        //     $("#action_key").val('<?= md5(strtolower('personnelPartenaire')) ?>');
        //     $("#addPersonel").submit();

        // });


    });



    function add() {
        //  alert('nkiie');

        var button = document.querySelector("#btnadd");

        //--- @ --- Initialiser variables ---- @ ---//
        const form = document.getElementById('kt_project_settings_form');

        var index = 1;
        var requiredField = ['rsocile','email','tel'];

        var search = window.location.search;

        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");

        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");

            return false;
        }

        form.submit();




    }







    cropper(document.getElementById('logo-cropper'), {
        area: [500, 400],
        crop: [302, 302],
        allowResize: false,


    })

    document.getElementById('logo-crop').onclick = function () {
        document.getElementById('logo-cropper-resul').children[0].src =
            document.getElementById('logo-cropper').crop.getCroppedImage().src;
        var image = document.getElementById('logo-cropper-resul').children[0].src;
        document.getElementById('logo-cropper-resul').style.background = '';

        document.getElementById('photo').value = image;
        // var image =  document.getElementById('image-cropper').crop.getImage().src;;
        // console.log(image);
    }



</script>