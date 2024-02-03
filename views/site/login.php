<?php

use yii\helpers\Url;

$bgImg = yii::$app->request->baseUrl . '/web/assets/media/misc/auth-screens-1.png';
?>


<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->

        <div class="d-flex flex-column flex-lg-row-fluid col-lg-9 col-md-7 p-10 order-2 order-lg-1"
            style="background-image: url(<?= $bgImg ?>)">
            <!--begin::Content-->

            <div class="d-none d-lg-block text-white fs-base text-center">
                <div class="mt-15"></div>
                <!--begin::Title-->
                <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
                    Productive</h1>
                <!--end::Title-->
                <!--begin::Text-->

                In this kind of post,
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person
                they’ve interviewed
                <br />and provides some background information about
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                <br />work following this is a transcript of the interview.
            </div>
            <!--end::Text-->
            <!--end::Content-->
        </div>
        <!--end::Aside-->

        <!--begin::Body-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2">

            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                    <!--begin::Form-->
                    <form class="form w-100 " method="POST"
                        action="<?= Yii::$app->request->baseUrl . '/' . md5('login') ?>" id="kt_sign_in_form">

                        <!-- Debut :: Charger les inputs chachés par default -->
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                        <input type="hidden" name="action_key" id="action_key" value="" />
                        <input type="hidden" name="action_on_this" id="action_on_this" value="" />
                        <input type="hidden" name="sugarpot" id="sugarpot" value="" />
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Authentification</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">Votre Compagnie Social</div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Login options-->
                        <!--end::Login options-->

                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Username-->
                            <input type="text" id="usernameField" placeholder="Nom d'utilisateur" name="username"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Username-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Mot de passe" name="password" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <a href="#" class="link-primary">Mot de passe oublié ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="btn-signin" class="btn btn-primary" onclick="add()">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Connexion</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Veuillez patientez...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->


</html>