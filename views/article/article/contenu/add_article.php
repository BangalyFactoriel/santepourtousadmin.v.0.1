<div class="container mt-4">
	<div class="card">
		<div class="card-header btn-primary">
			<h5 class="text-white mt-4">
				<?= yii::t("app", 'btn_ajout_article') ?>
			</h5>
		</div>
		<div class="card-body">

			<form id="kt_productCats" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
				action="<?= Yii::$app->request->baseUrl . "/" . md5("article_article") ?>">
				<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
				<input type="hidden" name="action_key" id="action_key" value="" />
				<input type="hidden" name="action_on_this" id="action_on_this" value="" />
				<div class=" me-n7 pe-7" data-kt-scroll-activate="{default: false, lg: true}"
					data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
					data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style=""
					data-select2-id="select2-data-kt_modal_add_customer_scroll">

					<!--begin::Input group-->

					<div class="row">
						<!--begin::Block-->
						<div class="col-md-6">
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'media_type') ?>
							</label>
							<select name="media_type" id="mediaTypeField" onchange="handleChage(this)"
								class="form-select form-select-solid" data-kt-select2="true">
								<option value="0">Choisir un type de fichier</option>
								<option value="1">Photo</option>
								<option value="2">Audio</option>
								<option value="3">Video</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="py-5 fileField" id="reapeterFieldImage" style="display:none">
								<div class="rounded border p-10">
									<!--begin::Repeater-->
									<div id="kt_docs_repeater_basic_img">
										<!--begin::Form group-->
										<div class="form-group">
											<div data-repeater-list="kt_docs_repeater_basic_img">
												<div data-repeater-item>
													<div class="form-group row mb-5">
														<div class="col-md-6" id="imageField">
															<label class="required fw-semibold fs-6 mb-2">
																<?= yii::t("app", 'article_image') ?>
															</label>
															<input type="file"
																class="form-control mb-2 mb-md-0"
																id="mediaInput" />
														</div>
														<div class="col-md-3">
															<a href="javascript:;" data-repeater-delete
																class="btn btn-sm btn-flex flex-center btn-light-danger mt-3 mt-md-9">
																<i class="ki-duotone ki-trash fs-5"><span
																		class="path1"></span><span
																		class="path2"></span><span
																		class="path3"></span><span
																		class="path4"></span><span
																		class="path5"></span></i>
																Delete
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Form group-->

										<!--begin::Form group-->
										<div class="form-group">
											<a href="javascript:;" data-repeater-create
												class="btn btn-flex flex-center btn-light-primary">
												<i class="ki-duotone ki-plus fs-3"></i> Ajouter
											</a>
										</div>
										<!--end::Form group-->
									</div>
									<!--end::Repeater-->
								</div>
							</div>
							<div class="py-5 fileField" id="reapeterFieldAudio" style="display:none">
								<div class="rounded border p-10">
									<!--begin::Repeater-->
									<div id="kt_docs_repeater_basic_aud">
										<!--begin::Form group-->
										<div class="form-group">
											<div data-repeater-list="kt_docs_repeater_basic_aud">
												<div data-repeater-item>
													<div class="form-group row mb-5">
														<div class="col-md-6" id="audioField">
															<label class="required fw-semibold fs-6 mb-2">
																<?= yii::t("app", 'audio_file') ?>
															</label>
															<input type="file"
																class="form-control mb-2 mb-md-0"
																id="mediaInput" />
														</div>
														<div class="col-md-3">
															<a href="javascript:;" data-repeater-delete
																class="btn btn-sm btn-flex flex-center btn-light-danger mt-3 mt-md-9">
																<i class="ki-duotone ki-trash fs-5"><span
																		class="path1"></span><span
																		class="path2"></span><span
																		class="path3"></span><span
																		class="path4"></span><span
																		class="path5"></span></i>
																Delete
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Form group-->

										<!--begin::Form group-->
										<div class="form-group">
											<a href="javascript:;" data-repeater-create
												class="btn btn-flex flex-center btn-light-primary">
												<i class="ki-duotone ki-plus fs-3"></i> Ajouter
											</a>
										</div>
										<!--end::Form group-->
									</div>
									<!--end::Repeater-->
								</div>
							</div>
							<div class="py-5 fileField" id="reapeterFieldVideo" style="display:none">
								<div class="rounded border p-10">
									<!--begin::Repeater-->
									<div id="kt_docs_repeater_basic_vid">
										<!--begin::Form group-->
										<div class="form-group">
											<div data-repeater-list="kt_docs_repeater_basic_vid">
												<div data-repeater-item>
													<div class="form-group row mb-5">
														<div class="col-md-6" id="videoFieldVideo">
															<label class="required fw-semibold fs-6 mb-2">
																<?= yii::t("app", 'video_file') ?>
															</label>
															<input type="file"
																class="form-control mb-2 mb-md-0"
																id="mediaInput" />
														</div>
														<div class="col-md-3">
															<a href="javascript:;" data-repeater-delete
																class="btn btn-sm btn-flex flex-center btn-light-danger mt-3 mt-md-9">
																<i class="ki-duotone ki-trash fs-5"><span
																		class="path1"></span><span
																		class="path2"></span><span
																		class="path3"></span><span
																		class="path4"></span><span
																		class="path5"></span></i>
																Delete
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Form group-->

										<!--begin::Form group-->
										<div class="form-group">
											<a href="javascript:;" data-repeater-create
												class="btn btn-flex flex-center btn-light-primary">
												<i class="ki-duotone ki-plus fs-3"></i> Ajouter
											</a>
										</div>
										<!--end::Form group-->
									</div>
									<!--end::Repeater-->
								</div>
							</div>
						</div>

						<!--end::Block-->

						<!-- ================================================ -->

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
									class="form-control border-dark form-control-solid mb-3 mb-lg-0 " />
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
									<option value="autheur1">categorie1</option>
									<option value="autheur2">categorie2</option>
									<option value="autheur3">categorie3</option>
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
									<option value="autheur1">Auteur1</option>
									<option value="autheur2">Auteur2</option>
									<option value="autheur3">Auteur3</option>
								</select>
								<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="col-md-6">
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
					<div>
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="button" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal"
								class="btn btn-light me-3">
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
			</form>
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

</div>

<script>

	function handleChage(param) {
		var selectedValue = param.value;

		// Afficher le champ d'entrée de fichier correspondant en fonction de la valeur sélectionnée
		if (selectedValue === "1") {
			$('#kt_docs_repeater_basic_img').repeater({
				initEmpty: true,

				defaultValues: {
					'text-input': 'foo'
				},

				show: function () {
					$(this).slideDown();
				},

				hide: function (deleteElement) {
					$(this).slideUp(deleteElement);
				}
			});
			document.getElementById("reapeterFieldImage").style.display = "block";
			document.getElementById("reapeterFieldAudio").style.display = "none";
			document.getElementById("reapeterFieldVideo").style.display = "none";
		} else if (selectedValue === "2") {
			$('#kt_docs_repeater_basic_aud').repeater({
				initEmpty: true,

				defaultValues: {
					'text-input': 'foo'
				},

				show: function () {
					$(this).slideDown();
				},

				hide: function (deleteElement) {
					$(this).slideUp(deleteElement);
				}
			});
			document.getElementById("reapeterFieldAudio").style.display = "block";
			document.getElementById("reapeterFieldImage").style.display = "none";
			document.getElementById("reapeterFieldVideo").style.display = "none";

		} else if (selectedValue === "3") {
			$('#kt_docs_repeater_basic_vid').repeater({
				initEmpty: true,

				defaultValues: {
					'text-input': 'foo'
				},

				show: function () {
					$(this).slideDown();
				},

				hide: function (deleteElement) {
					$(this).slideUp(deleteElement);
				}
			});
			document.getElementById("reapeterFieldVideo").style.display = "block";
			document.getElementById("reapeterFieldImage").style.display = "none";
			document.getElementById("reapeterFieldAudio").style.display = "none";
		}
		else{
			document.getElementById("reapeterFieldImage").style.display = "none";
			document.getElementById("reapeterFieldAudio").style.display = "none";
			document.getElementById("reapeterFieldVideo").style.display = "none";
		}

	}

</script>