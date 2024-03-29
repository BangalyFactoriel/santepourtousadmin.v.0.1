<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-130-0luo">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Modification Categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="updatepub" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                action="<?= Yii::$app->request->baseUrl . "/" . md5("article_publicite") ?>" method="post">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                <input type="hidden" name="action_key" class="action_key" value="" />
                <input type="hidden" name="action_on_this" class="action_on_this" value="" />
                <div class="modal-body">


                    <!--begin::Input group-->
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
                    <div class="fv-row mb-7 fv-plugins-icon-container">
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
                            data-kt-image-input="true" id="imgbackground">
                            <!--begin::Preview existing avatar-->
                            <!--begin::Preview existing avatar-->
                            <div id="image-cropper-resultUpdate" class="image-input-wrapper w-150px  h-150px">
                                <img style="width:150px; height:150px;">
                            </div>
                            <!--end::Preview existing avatar-->
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="
                                                                            <?= yii::t("app", 'changephoto') ?>">
                                <a href="javascript:;" Class="btn " data-bs-toggle="modal"
                                    data-bs-target="#vuePrincipaleUpdateInModal">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                </a>
                                <!--begin::Inputs-->
                                <input type="hidden" name="avatar_removeupdate" id="avatar_removeupdateupdate" />
                                <input type="text" id="updatephoto" value="" name="updatephoto"
                                    accept=".png, .jpg, .jpeg" />
                                <br>
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                                data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                                data-kt-initialized="1">
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
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">
                            <?= yii::t("app", 'title') ?>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="titreupdate" id="titreupdate"
                            class="form-control border-dark form-control-solid mb-3 mb-lg-0 " />
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">
                            <?= yii::t("app", 'content') ?>
                        </label>
                        <!--end::Label-->
                        <textarea type="text" name="contentupdate" id="contentupdate"
                            class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
                            </textarea>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">
                            <?= yii::t("app", 'datedebut') ?>
                        </label>
                        <!--end::Label-->
                        <input type="date" name="datedebutupdate" id="datedebutupdate"
                            class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
                        </input>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">
                            <?= yii::t("app", 'datefin') ?>
                        </label>
                        <!--end::Label-->
                        <input type="date" name="datefinupdate" id="datefinupdate"
                            class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
                        </input>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">
                            <?= yii::t("app", 'position') ?>
                        </label>
                        <!--end::Label-->
                        <select name="positionupdate" id="positionupdate"
                            class="form-control form-select border-dark form-control-solid mb-3 mb-lg-0 ">
                            <option value="1">Haut</option>
                            <option value="2">Milieu</option>

                            <option value="3">Bas</option>
                        </select>

                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button onClick="updatepublicite()" class="btn btn-circle btn-primary" id="updateproduitup"><i
                        class="fa fa-edit"></i>
                    <span class="indicator-label">
                        &nbsp;
                        <?= Yii::t('app', 'Modifier'); ?>
                    </span>
                    <span class="indicator-progress">
                        <?= Yii::t('app', 'veuillez'); ?><span
                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span></button>
                </button>
                <button type="button" onClick="cancel()" class="btn btn-circle btn-primary" data-bs-dismiss="modal"
                    data-kt-users-modal-action="close"><i class="fa fa-close"></i>&nbsp;
                    <?= Yii::t('app', 'fermer'); ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="vuePrincipaleUpdateInModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 mt-15">
                <div style="display: flex;">
                    <div id="image-cropperupdate"
                        style="border:1px solid #ccc; margin: 5px; width:120px; height:120px;">
                        <?= yii::t("app", "selectImage") ?>
                    </div>
                </div>
                <p>
                    <input type="button" value="<?= yii::t("app", "validecrop") ?>" id="image-getterupdate"
                        data-bs-target="#updatemodal" data-bs-toggle="modal"
                        data-bs-target="#vuePrincipaleUpdateInModal" class="btn btn-primary">
                </p>
                <a href="javascript:;" Class="btn btn-light me-3" id="retour" data-bs-toggle="modal"
                    data-bs-target="#vuePrincipaleUpdateInModal"></a>
            </div>
        </div>
    </div>
</div>

<script>
    cropper(document.getElementById('image-cropperupdate'), {
        area: [500, 400],
        cropBoxResizable: true,

    })
    document.getElementById('image-getterupdate').onclick = function () {
        document.getElementById('image-cropper-resultUpdate').children[0].src = document.getElementById('image-cropperupdate').crop
            .getCroppedImage().src;
        var image = document.getElementById('image-cropper-resultUpdate').children[0].src;
        document.getElementById('updatephoto').value = image;
        // var image =  document.getElementById('image-cropper').crop.getImage().src;;
        // console.log(image);
    }
</script>