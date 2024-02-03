<?php

?>


<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('<?= Yii::$app->request->baseUrl ?>/web/assets/media/auth/bg.jpg');
            position: relative;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 900px;
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!--begin::Aside-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <!--begin::Aside-->
            <div class="d-flex flex-center flex-lg-start flex-column">

                <!--end::Logo-->
                <!--begin::Title-->
                <h2 class="text-white fw-normal m-0"></h2>
                <!--end::Title-->
            </div>
            <!--begin::Aside-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12" style="margin-left:90px">
            <!--begin::Card-->
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20 shadow-lg">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">

                    <form class="form w-100 " id="kt_docs_formvalidation_password" method="POST"
                        action="<?= Yii::$app->request->baseUrl . '/' . md5("utilisateur_newuser") . '/' . $code ?>"
                        autocomplete="off">
                        <?=
                            Yii::$app->nonSqlClass->getHiddenFormTokenField();
                        $token2 = Yii::$app->getSecurity()->generateRandomString();
                        $token2 = str_replace('+', '.', base64_encode($token2));
                        ?>

                        <!-- Debut :: Charger les inputs chachés par default -->
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                        <input type="hidden" name="action_key" id="action_key" value="" />
                        <input type="hidden" name="action_on_this" id="action_on_this" value="" />

                        <?= Yii::$app->session->getFlash('flashmsg');
                        Yii::$app->session->removeFlash('flashmsg'); ?>
                        <!-- Fin :: Charger les inputs chachés par default -->
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3 fs-2x">CREE VOTRE COMPTE</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                <?= yii::t("app", 'infos') ?>
                            </div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">
                                <?= yii::t("app", 'identifiant') ?>
                            </label>

                            <input class="form-control form-control-lg form-control-solid border-dark" type="text"
                                placeholder="" name="username" id="username" autocomplete="off" />
                        </div>
                        <!--end::Input group--->


                        <!--begin::Input group-->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold fs-6 mb-2 required">
                                    <?= yii::t("app", 'mdp') ?>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid border-dark"
                                        type="password" placeholder="" id="new_password" name="new_password"
                                        autocomplete="off" />

                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Meter-->

                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Hint-->
                            <div class="text-muted">
                            </div>
                            <!--end::Hint-->
                        </div>


                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold fs-6 mb-2 required">
                                    <?= yii::t("app", 'confirmpswd') ?>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid border-dark"
                                        type="password" placeholder="" id="confirm_password" name="confirm_password"
                                        autocomplete="off" />

                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>

                            </div>

                            <div class="text-muted">
                            </div>
                            <!--end::Hint-->
                        </div>


                        <div class="d-grid mb-10">
                            <button id="kt_docs_formvalidation_password_submit" type="submit"
                                onclick="ajouteruserattente()" class="btn btn-primary">
                                <span class="indicator-label">
                                    <?= yii::t("app", 'btnEnrg') ?>
                                </span>
                                <span class="indicator-progress">
                                    Veuillez patienter... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Actions-->
                        </div>

                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->

                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<?php
require_once('script/finaliseruser_js.php');
?>