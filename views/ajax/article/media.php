<?php
switch ($media) {
    case 1:
        echo '
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
                                                    ' . yii::t("app", 'changephoto') . '">
                <a href="javascript:;" Class="btn " data-bs-toggle="modal"
                    data-bs-target="#vuePrincipaleAddInModal">
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
        </diiv>
     
     ';
        break;
  
    
        case '2':

            echo '<!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2  mt-md-20">
                '. yii::t("app", 'typecontent') .'
            </label>
            <input type="text" name="lienfille" class="form-control" placeholder="lien du fichier"  id="lienfille">
            <!--begin::Description-->
    
            </diiv>';
    default:
        # code...
        break;
}









?>