
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
                                                <img src="<?= yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] . $infousers['photo'] ?>"
                                                    style="width:125px; height:125px;">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="
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
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="
                                                                                            <?= yii::t("app", 'supPhoto') ?>">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="
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
              