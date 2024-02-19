<?php

$this->title = Yii::t('app', 'connexion');
$userName = !empty($userName) ? $userName : '';
$motPass = !empty($motPass) ? $motPass : '';
$sugarpot = !empty($sugarpot) ? $sugarpot : '';

?>



<div class="d-flex flex-column flex-root" id="kt_app_root">

    <!--end::Header Section-->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-left  flex-column  w-lg-950px bgi-size-cover bgi-position-center mt-n4 order-1 order-lg-2	 mb-3"
            style="background-image: url(<?= Yii::$app->request->baseUrl ?>/web/assets/media/auth/1.jpg)">
            <!--begin::Content-->
            <div style="width:100%;height:100%;border:1px solid; background-color:rgba(0,0,0,0.6);">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <h1 class="mb-0 mb-lg-12 d-block d-lg-none  text-white">
                        OBJECTIF SANTÉ GUINÉE
                    </h1>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                        src="assets/media/misc/auth-screens.png" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-4qx mt-20 fw-bolder text-center mb-7"> OBJECTIF SANTÉ GUINÉE</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center fs-3">
                    "Objectif Santé Guinée" est un site d'actualité dédié à la santé en Guinée. 
                    Ce portail vise à fournir des informations pertinentes, 
                    actualisées et fiables sur  <br> les questions de santé qui touchent la population guinéenne. .</div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>

        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid  p-10 order-2 order-lg-2">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-md-10">
                    <!--begin::Form-->
                    <form class="form w-100 " method="POST"
                        action="<?= Yii::$app->request->baseUrl . '/' . md5('login') ?>" id="kt_sign_in_form">

                        <!-- Debut :: Charger les inputs cachés par default -->
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                        <input type="hidden" name="action_key" id="action_key" value="" />
                        <input type="hidden" name="action_on_this" id="action_on_this" value="" />
                        <input type="hidden" name="sugarpot" id="sugarpot" value="" />
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3 fs-2x">AUTHENTIFICATION</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">(Objectif Santé Guinée)</div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->

                        <?= Yii::$app->session->getFlash('flashmsg');
                        Yii::$app->session->removeFlash('flashmsg'); ?>



                        <!--<@>---Identifiant---<@>--->
                        <div class="fv-row mb-8 pt-8 fv-plugins-icon-container">

                            <input type="text" placeholder="Identifiant" name="username" id="username"
                                value="<?= $userName ?>" autocomplete="off"
                                class="form-control bg-transparent border-dark">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!--<@>---Mot de Passe---<@>--->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Password-->
                            <input type="password" placeholder="Mot de Passe" name="password" id="password"
                                value="<?= $motPass ?>" autocomplete="off"
                                class="form-control bg-transparent border-dark">
                            <!--end::Password-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!--<@>---Sugarpot---<@>--->
                        <input type="hidden" name="sugarpot" value="<?= $sugarpot ?>"> <!--begin::Submit button-->


                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <a href="<?= yii::$app->request->baseurl . '/' . md5('visiteur_reset') ?>"
                                class="mb-5 text-end d-none"> Mots de passe oublier ?</a>

                            <a href="javascript:;" id="kt_sign" onclick="connexion()" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">S'AUTHENTIFIER</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress"> Veuillez patienter...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </a>




                        </div>
                    </form>

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <div class="w-lg-500px d-flex flex-center px-10 mx-auto">

                <!--begin::Links-->
                <div class="d-flex  flex-center text-center fw-semibold text-primary fs-base gap-5">
                    <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#coondition">copyright
                        <i class="fa fa-copyright" aria-hidden="true"></i> Factoriel technologie</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->

    </div>
    <!--end::Authentication - Sign-in-->
</div>



<?php require('script/login_sc.php'); ?>