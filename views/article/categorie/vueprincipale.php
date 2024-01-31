<div class="app-container container-xxl d-flex">
    <!--begin::Sidebar-->
    <div id="kt_app_sidebar" class="app-sidebar  align-self-start" data-kt-drawer="true"
        data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '225px'}"
        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
        <!--begin::Sidebar secondary menu-->
        <div class="card flex-grow-1 py-5 shadow-lg" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
            data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-width="225px"
            data-kt-sticky-left="auto" data-kt-sticky-top="125px" data-kt-sticky-animation="false"
            data-kt-sticky-zindex="95">
            <div class="hover-scroll-y px-1 px-lg-5" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_header, #kt_app_toolbar, #kt_app_footer"
                data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
                <div id="kt_app_sidebar_menu" data-kt-menu="true"
                    class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6">
                    <!--begin:Menu item-->
                    <?php Yii::$app->menuactionClass->actionMenu(); ?>



                </div>
            </div>
        </div>
        <!--end::Sidebar secondary menu-->
    </div>
    <!--end::Sidebar-->

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content">
                <!--begin::Card-->
                <div class="card shadow-lg">
                    <!--begin::Card header-->
                    <div class="card-header  bg-primary border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="row mb-2 mt-0">

                                <div class="col-md-4 mt-2">
                                    <select class="form-select select2 w-md-150px  " id="limit" name="limit">
                                        <option value="1" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 1 ? 'selected' : '' : '' ?>>
                                            1 - 10</option>
                                        <option value="2" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 2 ? 'selected' : '' : '' ?>>
                                            1 - 20</option>
                                        <option value="3" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 3 ? 'selected' : '' : '' ?>>
                                            1 - 30</option>
                                        <option value="4" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 4 ? 'selected' : '' : '' ?>>
                                            1 - 40</option>
                                        <option value="5" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 5 ? 'selected' : '' : '' ?>>
                                            1 - 50</option>
                                        <option value="6" <?= isset($_POST[Yii::$app->params['limit']]) ? $_POST[Yii::$app->params['limit']] == 6 ? 'selected' : '' : '' ?>>
                                            1 - 50 +</option>

                                    </select>
                                </div>
                                <!--begin::Search-->
                                <div class="col-md-6 mt-2">
                                    <input type="text" data-kt-customer-table-filter="search" id="donneeRecherche"
                                        name="donneeRecherche"
                                        value="<?= isset($_POST['donneeRecherche']) ? $_POST['donneeRecherche'] : Null ?>"
                                        class="form-control form-control-solid w-250px ps-15"
                                        placeholder="<?= Yii::t('app', 'donneeRecherche') ?>">
                                </div>
                                <!--end::Search-->

                                <div class="col-md-2 mt-2">
                                    <a href="javascript:;" onclick="Filter()" class="btn btn-circle btn-secondary pe-10"
                                        name="afficheBtn" id="bntfiltree">
                                        <span class="indicator-label">
                                            <?= yii::t("app", 'Filtrer') ?>
                                        </span>
                                        <span class="indicator-progress">
                                            <?= yii::t("app", 'veuillezp') ?>
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                                <!--begin::Add user-->
                                <a href="javascript:;" onclick="$('#kt_cat_conge').reset()"
                                    class="btn btn-flex btn-sm btn-body btn-color-gray-600 h-35px bg-body fw-bold"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
                                    <i class="ki-outline ki-plus fs-2">
                                    </i>
                                    <?= Yii::t("app", 'btnajoutcategorie') ?>
                                </a>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->


                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->

                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                id="kt_datatable_zero_configuration">

                                <thead>
                                    <?php require_once('contenu/vuePrincipaleLst_tblHeader.php') ?>

                                </thead>
                                <tbody class="text-gray-600 fw-semibold" id="databody">
                                    <?php require_once('contenu/vuePrincipaleLst_tblBody.php') ?>

                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->

</div>
<!--end::Wrapper container-->

<div class="py-5" id="reapeterField">
    <div class="rounded border p-10">
        <!--begin::Repeater-->
        <div id="kt_docs_repeater_basic">
            <!--begin::Form group-->
            <div class="form-group">
                <div data-repeater-list="kt_docs_repeater_basic">
                    <div data-repeater-item>
                        <div class="form-group row mb-5">
                            <div class="col-md-3 " id="">
                                <label class="required fw-semibold fs-6 mb-2">
                                    <?= yii::t("app", 'media_type') ?>
                                </label>
                                <select name="media_type" id="mediaTypeField" onchange="handleChage(this)"
                                    class="form-select form-select-solid" data-kt-select2="true">
                                    <option value="0">Choisir un type de fichier
                                    </option>
                                    <option value="1">Photo</option>
                                    <option value="2">Audio</option>
                                    <option value="3">Video</option>
                                </select>
                            </div>
                            <!-- begin image -->
                            <div class="fv-row mb-7 fv-plugins-icon-container col-md-3" id="imgDiv">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <!--begin::Preview existing avatar-->
                                    <div id="image-cropper-result" class="image-input-wrapper w-150px  h-150px">
                                        <img style="width:150px; height:150px;">
                                    </div>
                                    <!--end::Preview existing avatar-->
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="
                                                                            <?= yii::t("app", 'changephoto') ?>">
                                        <a href="javascript:;" Class="btn " data-bs-toggle="modal"
                                            data-bs-target="#articleImageModal">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                        </a>
                                        <!--begin::Inputs-->
                                        <input type="hidden" name="avatar_remove" id="avatar_remove" />
                                        <input type="text" id="photo" value="" name="photo"
                                            accept=".png, .jpg, .jpeg" />
                                        <br>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        aria-label="Cancel avatar" data-kt-initialized="1">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        aria-label="Remove avatar" data-kt-initialized="1">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">
                                    *.png, *.jpg et *.jpeg</div>
                                <!--end::Description-->
                            </div>
                            <!-- end image -->

                            <!-- begin audio -->
                            <div class="col-md-6" id="audDiv">
                                <label class="required fw-semibold fs-6 mb-2">
                                    <?= yii::t("app", 'audio_file') ?>
                                </label>
                                <input type="file" class="form-control mb-2 mb-md-0" id="mediaInput" />
                            </div>
                            <!-- end audio -->

                            <!-- begin video -->
                            <div class="col-md-6" id="vidDiv">
                                <label class="required fw-semibold fs-6 mb-2">
                                    <?= yii::t("app", 'video_file') ?>
                                </label>
                                <input type="file" class="form-control mb-2 mb-md-0" id="mediaInput" />
                            </div>
                            <!-- end video -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Form group-->
        </div>
        <!--end::Repeater-->
    </div>
</div>
<?php
require_once('contenu/modalAddAction.php');
require_once('contenu/vuePrincipaleUpdateInModal.php');
require_once('script/script.php');
?>