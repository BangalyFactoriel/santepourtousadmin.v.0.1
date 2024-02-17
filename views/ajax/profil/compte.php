<!--begin::Card header-->
<div class="card-header bg-primary border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
    data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
    <!--begin::Card title-->
    <div class="card-title m-0">
        <h3 class="fw-bold m-0 text-white">MODFIER LE MOTS DE PASSE</h3>
    </div>
    <!--end::Card title-->
</div>
<!--begin::Card header-->
<!--begin::Content-->
<div id="" class="collapse show">
    <!--begin::Form-->
    <div class="card-body border-top p-9">

        <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
            action="<?= Yii::$app->request->baseUrl . "/" . md5("site_profil") ?>">

            <input type="hidden" name="action_key" id="action_key" value="<?= md5(strtolower('modifiercompte')) ?>" />
            <input type="hidden" name="action_on_this" id="action_on_this" value="<?= $infousers['code'] ?>" />
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />

            <!--end::Input group-->
            <div class="row mb-5">

                <!--begin::Label-->
                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3 col-lg-4">
                    <?= yii::t("app", 'mdpEncours') ?>
                </label> <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="password" class="form-control  form-control-lg form-control-solid"
                        name="currentpassword" id="currentpassword">
                </div>
                <!--end::Col-->

            </div>
            <div class="row mb-5">
                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3 col-lg-4">
                    <?= yii::t("app", 'newpassword') ?>
                </label>
                <div class="col-lg-8 fv-row">
                    <input type="password" class="form-control  form-control-lg form-control-solid" name="newpassword"
                        id="newpassword">
                </div>

            </div>
            <div class="row mb-5">
                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3 col-lg-4">
                    <?= yii::t("app", 'confirmpswd') ?>
                </label>
                <div class="col-lg-8 fv-row">
                    <input type="password" class="form-control  form-control-lg form-control-solid"
                        name="confirmpassword" id="confirmpassword">
                </div>

            </div>





    </div>
    <!--end::Card body-->
    <!--end::Actions-->
    </form>
    <!--end::Form-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Annuler</button>
        <button type="submit" class="btn btn-primary" onclick="modifierpass()" id="kt_account_profile_details_submit"
            on>Modifier</button>
    </div>

</div>
<!--end::Content-->


<script>
    function modifierpass() {
        mdpactuelle = $('#currentpassword').val();
        nvpassaword = $('#newpassword').val();
        confirmepassword = $('#confirmpassword').val();

        var button = document.querySelector("#passwordSubmit");
        //--- @ --- Initialiser variables ---- @ ---//
        button.disabled = true;

        var index = 1;
        var requiredField = ['currentpassword', 'newpassword', 'confirmpassword'];

        var search = window.location.search;

        var formValidation = false;
        button.setAttribute("data-kt-indicator", "on");

        //--- @ --- Validation champs du formulaire ---- @ ---//
        formValidation = formValidator(index, requiredField);
        if (formValidation !== true) {
            button.removeAttribute("data-kt-indicator");
            button.disabled = false;
            return false;
        }


        if (confirmepassword != nvpassaword) {
            message('les mots de passe sont différents', 'info');
            return false;

        }

        $.post(
            '<?= Yii::$app->request->baseUrl . "/" . md5("config_ajax") ?>',
            { mdpactuelle: mdpactuelle, action_key: 'verifiepass', _csrf: '<?= Yii::$app->request->getCsrfToken() ?>' },
            function (response) {
                if (response) {
                    $('#kt_account_profile_details_form').submit();
                } else {
                    message('le mot de passe actuels est incorrect', 'info');
                    return false;
                }
            }
        );




    }

</script>