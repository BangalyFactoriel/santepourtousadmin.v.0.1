<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar pt-4 pt-lg-7 mb-n2 mb-lg-n3">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-row-fluid">
        <!--begin::Toolbar container-->
        <div class="d-flex flex-stack flex-row-fluid">
            <!--begin::Toolbar container-->
            <div class="d-flex flex-column flex-row-fluid">
                <!--begin::Toolbar wrapper-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-1 mb-lg-3 me-2 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                        <a href="<?= yii::$app->request->baseUrl . '/' . md5('site_index') ?>" class="text-white">
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-700 fw-bold fs-1 lh-1">
                        <?= Yii::t("app", Yii::$app->controller->id) ?>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
                <!--begin::Page title-->

            </div>
            <!--end::Toolbar container-->

        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->


<!--begin::Wrapper container-->
<div class="app-container container-xxl d-flex">

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content">
                <!--begin::Navbar-->
                <div class="card  shadow-lg	 mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="<?= yii::$app->request->baseUrl . Yii::$app->params['linkToUploadIndividusProfil'] . $infousers['photo'] ?>"
                                        alt="image" />
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                                <?= strtoupper($infousers['nom']) . ' ' . strtoupper($infousers['prenom']) ?>
                                            </a>

                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <i class="ki-outline ki-sms fs-4 me-1"></i>
                                                <?= $infousers['email'] ?>
                                            </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">

                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 slide active details"
                                    href="javascript:;" onclick="slide('profil');"> DETAILS SUR LE PROFIL</a>
                            </li>
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 slide  details"
                                    href="javascript:;" onclick="slide('compte');">MON COMPTE</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->


                        </ul>
                        <!--begin::Navs-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::Basic info-->
                <div class="card shadow-lg mb-5 mb-xl-10" id="contenue">
                    <!--begin::Card header-->
                    <div class="card-header bg-primary border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0 text-white">DETAILS SUR LE PROFIL</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="" class="collapse show">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST"
                            enctype="multipart/form-data"
                            action="<?= Yii::$app->request->baseUrl . "/" . md5("site_profil") ?>">

                            <input type="hidden" name="action_key" id="action_key"
                                value="<?= md5(strtolower('modifier')) ?>" />
                            <input type="hidden" name="action_on_this" id="action_on_this"
                                value="<?= $infousers['code'] ?>" />
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                            <div class="card-body border-top p-9">

                                <div class="row mb-6">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 justify-content-center">
                                        <label class="d-block fw-semibold fs-6 mb-5 ">
                                            <?= yii::t("app", 'image') ?>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Image input-->
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline  image-input-empty "
                                            data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div id="image-cropper-result" class="image-input-wrapper w-125px  h-125px">
                                                <img src="<?= yii::$app->request->baseUrl . Yii::$app->params['linkToUploadIndividusProfil'] . $infousers['photo'] ?>"
                                                    style="width:125px; height:125px;">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="
                                                                                        <?= yii::t("app", 'changephoto') ?>">
                                                <a href="javascript:;" Class="btn " data-bs-toggle="modal"
                                                    data-bs-target="#vuePrincipaleAddInModal">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                </a>
                                                <!--begin::Inputs-->
                                                <input type="text" id="photo" value="" name="photo"
                                                    accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove"
                                                    value="<?= $infousers['photo'] ?>" />

                                                <br>
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="
                                                                                            <?= yii::t("app", 'supPhoto') ?>">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="
                                                                                            <?= yii::t("app", 'supPhoto') ?>">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">
                                            <?= yii::t("app", 'TypePhoto') ?>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom
                                        Complet</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="nom"
                                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                    placeholder="First name" value="<?= $infousers['nom'] ?>" />
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="prenom"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Last name" value="<?= $infousers['prenom'] ?>" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="mail" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Company website" value="<?= $infousers['email'] ?>" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                           </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary me-2">Annuler</button>
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Enregistrer</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>


            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper container-->

<!--begin::Modal - Support Center - Create Ticket-->
<div class="modal fade" id="vuePrincipaleAddInModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 mt-15">
                <div style="display: flex;">
                    <div id="image-cropper" style="border:1px solid #ccc; margin: 5px; width:120px; height:120px;">
                        <?= yii::t("app", "selectImage") ?>
                    </div>
                </div>
                <p>
                    <input type="button" value="<?= yii::t("app", "validecrop") ?>" id="image-getter"
                        data-bs-toggle="modal" data-bs-target="#vuePrincipaleAddInModal" class="btn btn-primary">
                </p>
                <a href="javascript:;" Class="btn btn-light me-3" id="retour" data-bs-toggle="modal"
                    data-bs-target="#vuePrincipaleAddInModal"></a>
            </div>
        </div>
    </div>
</div>


<!--begin::Modal - Support Center - Create Ticket-->
<div class="modal fade" id="vuePrincipaleAddInModals" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header bg-primary" id="kt_modal_add_user_header">

                <!--begin::Modal title-->
                <h2 class="fw-bold text-white">
                    <?= yii::t("app", 'modifpassword') ?>
                </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"
                    data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 mt-15">

                <div id="kt_signin_email_edit" class="flex-row-fluid ">
                    <!--begin::Form-->
                    <div class="row mb-1">

                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">
                                <?= yii::t("app", 'mdpEncours') ?>
                            </label>
                            <input type="password" class="form-control border-dark form-control-lg form-control-solid"
                                name="currentpassword" id="currentpassword">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="newpassword" class="form-label fs-6 fw-bold mb-3">
                                <?= yii::t("app", 'newpassword') ?>
                            </label>
                            <input type="password" class="form-control  border-dark form-control-lg form-control-solid"
                                name="newpassword" id="newpassword">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">
                                <?= yii::t("app", 'confirmpswd') ?>
                            </label>
                            <input type="password" class="form-control border-dark form-control-lg form-control-solid"
                                name="confirmpassword" id="confirmpassword">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="text-center  d-flex flex-end mt-2">
                        <a href="javascript:;" Class="btn btn-light me-3" data-bs-toggle="modal">
                            <?= yii::t("app", 'retour') ?>
                        </a>
                        <a href="javascript:;" onclick="modifierpass()" class="btn btn-primary" id="passwordSubmit">
                            <span class="indicator-label">
                                <?= yii::t("app", 'btnModif') ?>
                            </span>
                            <span class="indicator-progress">
                                <?= yii::t("app", 'pleasewait') ?>
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



















<script>
    cropper(document.getElementById('image-cropper'), {
        area: [500, 400],
        crop: [302, 302],
        allowResize: false,
    })
    document.getElementById('image-getter').onclick = function () {
        document.getElementById('image-cropper-result').children[0].src = document.getElementById('image-cropper').crop
            .getCroppedImage().src;
        var image = document.getElementById('image-cropper-result').children[0].src;
        document.getElementById('photo').value = image;
        // var image =  document.getElementById('image-cropper').crop.getImage().src;;
        // console.log(image);
    }
</script>


<script>
    function slide(action) {

        $.post(
            '<?= Yii::$app->request->baseUrl . "/" . md5("config_ajax"); ?>',
            { action_key: action, _csrf: '<?= Yii::$app->request->getCsrfToken() ?>' },
            function (response) {
                $('#contenue').html(response);

            }
        );
    }


    
</script>