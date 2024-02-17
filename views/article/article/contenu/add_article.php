<div class="container mt-4" id="kt_modal_add_customer_parent">
	<div class="card">
		<div class="card-header btn-primary">
			<h5 class="text-white mt-4 text-uppercase">
				<?= yii::t("app", 'formajoutarcticle') ?>
			</h5>
		</div>
		<div class="card-body">
			<form id="kt_productCats" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
				action="<?= Yii::$app->request->baseUrl . "/" . md5("article_article") ?>">
				<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
				<input type="hidden" name="action_key" id="action_key" value="<?= md5('addaricle') ?>" />
				<input type="hidden" name="action_on_this" id="action_on_this" value="" />
				<div class=" me-n7 pe-7" data-kt-scroll-activate="{default: false, lg: true}"
					data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
					data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style=""
					data-select2-id="select2-data-kt_modal_add_customer_scroll">

					<!--begin::Input group-->
					<div class="row">
						<!--begin::Input group-->
						<div class="row mb-7 fv-plugins-icon-container">
							<div class="col-md-6 mt-md-20">
								<!--begin::Label-->
								<label class="required fw-semibold fs-6 mb-2">
									<?= yii::t("app", 'typecontent') ?>
								</label>
								<!--end::Label-->
								<select name="typecontent" id="typecontent" onchange="selecttypemedia()"
									class="form-control form-select border-dark form-control-solid mb-3 mb-lg-0 ">
									<option value="1">Photo</option>
									<option value="2">Lien</option>

								</select>
							</div>
							<div class="col-md-6" id="contentmedia">
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

							</div>

							<!-- =========================================== -->
							<!--begin::Block-->

							<div class="col-md-6">
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'article_title') ?>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" name="article_title" id="articleTitleField"
										class="form-control border-dark form-control-solid mb-3 mb-lg-0 " />
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
							</div>
							<div class="col-md-6">
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'article_pub_date') ?>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="date" name="article_pub_date" id="articlePubDateField"
										class="form-control border-dark form-control-solid mb-3 mb-lg-0 "
										min="<?= date('Y-m-d') ?>" />
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'article_category') ?>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select type="date" name="article_category" id="articleCategoryField"
										class="form-control form-select border-dark form-control-solid mb-3 mb-lg-0 ">
										<option value="" hidden>Selectionner une categorie </option>
										<?php
										$cat = Yii::$app->mainClass->getAlltableData('ste.categorie');
										if (sizeof($cat) > 0) {
											foreach ($cat as $key => $value) {

												echo '<option value="' . $value['code'] . '">' . $value['libelle'] . '</option>';
											}
										}
										?>

									</select>
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'article_author') ?>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select type="date" name="article_author" id="article_author"
										class="form-control form-select border-dark form-control-solid mb-3 mb-lg-0 ">
										<option value="" hidden>Selectionner un auteur </option>
										<?php
										$aut = Yii::$app->mainClass->getAlltableData('ste.auteur');
										if (sizeof($aut) > 0) {
											foreach ($aut as $key => $data) {

												echo '<option value="' . $data['code'] . '">' . $data['nom'] . ' ' . $data['prenom'] . ' : ' . $data['tel'] . '</option>';
											}
										}
										?>
									</select>
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'typecnetents') ?>
									</label>
									<!--end::Label-->
									<div class="row">
										<div class="col-md-2">
											<div class="mb-3">
												<div class="form-check">
													<input class="form-check-input" name="typecnetent" type="radio"
														value="1" id="radio1" />
													<label class="form-check-label" for="radio1">
														<?= yii::t("app", 'article') ?>
													</label>
												</div>

											</div>
										</div>
										<div class="col-md-2">
											<div class="mb-3">
												<div class="form-check">
													<input class="form-check-input" name="typecnetent" type="radio"
														value="1" id="radio1" />
													<label class="form-check-label" for="radio1">
														<?= yii::t("app", 'interview') ?>
													</label>
												</div>

											</div>
										</div>
										<div class="col-md-2">
											<div class="mb-3">
												<div class="form-check">
													<input class="form-check-input" name="typecnetent" value="2"
														type="radio" id="radio1" />
													<label class="form-check-label" for="radio1">
														<?= yii::t("app", 'granddossier') ?>
													</label>
												</div>

											</div>
										</div>
										<div class="col-md-2">
											<div class="mb-3">
												<div class="form-check">
													<input class="form-check-input" name="typecnetent" value="3"
														type="radio" id="radio1" />
													<label class="form-check-label" for="radio1">
														<?= yii::t("app", 'conseil') ?>
													</label>
												</div>

											</div>
										</div>
									</div>

								</div>

							</div>
							<div class="col-md-12">
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fw-semibold fs-6 mb-2">
										<?= yii::t("app", 'article_content') ?>
									</label>
									<!--end::Label-->
									<textarea type="text" name="article_content" id="articleContentField"
										class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
									</textarea>
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
							</div>

						</div>

			</form>
		</div>
		<!--begin::Modal footer-->
		<div class="card-footer d-flex flex-center">
			<!--begin::Button-->
			<button type="button" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal"
				class="btn btn-secondary me-3">
				<?= yii::t("app", 'btnRetour') ?>
			</button>
			<!--end::Button-->
			<!--begin::Button-->
			<button id="btnadd" Class="btn btn-circle btn-primary" onclick="add()">
				<span class="indicator-label">
					<?= yii::t("app", 'btnEnrg') ?>
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
						data-bs-target="#kt_modal_add_customer" data-bs-toggle="modal"
						data-bs-target="#vuePrincipaleAddInModal" class="btn btn-primary">
				</p>
				<a href="javascript:;" Class="btn btn-light me-3" id="retour" data-bs-toggle="modal"
					data-bs-target="#vuePrincipaleAddInModal"></a>
			</div>
		</div>
	</div>
</div>


<?php

$urlajax = Yii::$app->request->baseUrl . "/" . md5("article_ajax");
$csrf = Yii::$app->request->getCsrfToken();
// $caseValue = md5(strtolower('uniciteCat'));


?>


<script>

	function selecttypemedia() {
		media = $(' #typecontent').val(); $.post('<?= $urlajax ?>', {
			_csrf: '<?= $csrf ?>', media: media,
			action_key: '<?= md5(strtolower('selectfichier')) ?>'
		}, function (response) {
			console.log(response); $('#contentmedia').html(response);
		});
	}




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

	// function add() {
	// 	alert('ok');
	// }








</script>