<!--begin::Form-->

<div class="modal fade" id="adatepublicite" tabindex="-1" style="display: none;" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-130-0luo">
		<!--begin::Modal content-->
		<div class="modal-content" data-select2-id="select2-data-129-jc5w">
			<!--begin::Modal header-->
			<div class="modal-header bg-primary" id="kt_modal_add_customer_header">
				<!--begin::Modal title-->
				<h2 class="fw-bold text-white">
					<?= Yii::t('app', 'btnajoutpblicite') ?>
				</h2>
				<!--end::Modal title-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body py-10 px-lg-17">
				<!--begin::Scroll-->
				<form id="kt_productCats" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
					action="<?= Yii::$app->request->baseUrl . "/" . md5("article_publicite") ?>">
					<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
					<input type="hidden" name="action_key" id="action_key" value="" />
					<input type="hidden" name="action_on_this" id="action_on_this" value="" />
					<div class=" me-n7 pe-7" data-kt-scroll-activate="{default: false, lg: true}"
						data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
						data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style=""
						data-select2-id="select2-data-kt_modal_add_customer_scroll">

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
										data-bs-target="#addPubModal">
										<i class="bi bi-pencil-fill fs-7"></i>
									</a>
									<!--begin::Inputs-->
									<input type="hidden" name="avatar_remove" id="avatar_remove" />
									<input type="text" id="photo" value="" name="photo" accept=".png, .jpg, .jpeg" />
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
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'title') ?>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" name="titre" id="titre"
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
							<textarea type="text" name="content" id="content"
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
							<input type="date" name="datedebut" id="content"
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
							<input type="date" name="datefin" id="datefinField"
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
							<select name="position" id="positionField" data-kt-select2="true" class="form-control form-select border-dark form-control-solid mb-3 mb-lg-0 ">
								<option value="1">Haut</option>
								<option value="2">Milieu</option>

								<option value="3">Bas</option>
							</select>
						
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
					</div>
				</form>
			</div>
			<!--end::Modal body-->
			<!--begin::Modal footer-->
			<div class="modal-footer flex-center">
				<!--begin::Button-->
				<button type="button" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal"
					class="btn btn-light me-3">
					<?= yii::t("app", 'btnRetour') ?>
				</button>
				<!--end::Button-->
				<!--begin::Button-->
				<button id="btn-add-pub" Class="btn btn-circle btn-primary" onclick="add()">
					<span class="indicator-label">
						<?= yii::t("app", 'btnAddPub') ?>
					</span>
					<span class="indicator-progress">
						<?= yii::t("app", 'veuillezp') ?>
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
					</span>
				</button>
				<!--end::Button-->
			</div>
			<!--end::Modal footer-->

		</div>
	</div>
</div>
<!--end::Modal - Customers - Add-->


<div class="modal fade" id="addPubModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
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
						data-bs-target="#kt_modal_add_customer" data-bs-toggle="modal" data-bs-target="#addPubModal"
						class="btn btn-primary">
				</p>
				<a href="javascript:;" Class="btn btn-light me-3" id="retour" data-bs-toggle="modal"
					data-bs-target="#addPubModal"></a>
			</div>
		</div>
	</div>
</div>

<script>
	cropper(document.getElementById('image-cropper'), {
		area: [500, 400],
		cropBoxResizable: true,

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