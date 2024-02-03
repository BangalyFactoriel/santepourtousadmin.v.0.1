<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_edit_user_scroll" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header bg-primary" id="kt_modal_add_user_header">

                <!--begin::Modal title-->
                <h2 class="fw-bold text-white">
                    <?= yii::t("app", 'formupdateuser') ?>
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
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="da_frm_update" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <input type="hidden" name="action_key" id="action_keys" value="" />
                    <input type="hidden" name="action_on_this" class="action_on_this" value="" />



                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_user_scroll">
                       


                        <div class="fv-row mb-12">
                            <label class="col-sm-4 form-label">
                                <?= Yii::t('app', 'statut') ?> :
                            </label>
                            <div class="col-sm-12">
                                <select class="form-select" name="statutCatUpdate" id="statutCatUpdate">
                                    <option value="1">
                                        <?= Yii::t('app', 'active') ?>
                                    </option>
                                    <option value="2">
                                        <?= Yii::t('app', 'suprime') ?>
                                    </option>
                                </select>
                            </div>
                        </div>


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">
                                <?= yii::t("app", 'nom') ?>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="nom" readonly
                                class="form-control form-control-solid mb-3 mb-lg-0 border-dark" id="nomUpdate"
                                placeholder="Nom d'utilisateurs" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">
                                <?= yii::t("app", 'prenom') ?>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="prenom" readonly
                                class="form-control form-control-solid border-dark mb-3 mb-lg-0" id="prenomUpdate"
                                placeholder="Prénom d'utilisateurs" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->

                        <div class="mb-7" id="listrole">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 required">
                                <span class="">
                                    <?= yii::t("app", 'typeuser') ?>
                                </span>
                            </label>
                            <!--end::Label-->
                            <select name="typeusersupdate" id="typeusersupdate"
                                class="form-select  form-control mb-2 border-dark bg-transparent">
                                <option value=""></option>

                                <?php
                                if (sizeof($typeUser) > 0) {
                                    foreach ($typeUser as $key => $value) {
                                        echo '<option value="' . $value['code'] . '">' . $value['libelle'] . '</option>';
                                    }
                                }

                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="modifier" id="modifielUpdate">
                        <div class="mb-7" id="listrole">

                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <a href="javascript:;" Class="btn btn-light me-3" data-bs-toggle="modal"
                            data-bs-target="#vuePrincipaleAddInModal">
                            <?= yii::t("app", 'retour') ?>
                        </a>


                        <button Class="btn btn-circle btn-primary" id="btupdate" onclick="update()"> <span
                                class="indicator-label">
                                <?= yii::t("app", 'edit') ?>
                            </span><span class="indicator-progress">
                                <?= yii::t("app", 'veuillez') ?> <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->