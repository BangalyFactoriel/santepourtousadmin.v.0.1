<!--begin::Form-->

<div class="modal fade" id="updateAuthor" tabindex="-1" style="display: none;" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-130-0luo">
		<!--begin::Modal content-->
		<div class="modal-content" data-select2-id="select2-data-129-jc5w">
			<!--begin::Modal header-->
			<div class="modal-header bg-primary" id="kt_modal_add_customer_header">
				<!--begin::Modal title-->
				<h2 class="fw-bold text-white">
					<?= Yii::t('app', 'btn_edit_author') ?>
				</h2>
				<!--end::Modal title-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body py-10 px-lg-17">
				<!--begin::Scroll-->
				<form id="kt_update_author" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
					action="<?= Yii::$app->request->baseUrl . "/" . md5("auteur_liste") ?>">
					<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
					<input type="hidden" name="action_key" id="action_key_update" value="" />
					<input type="hidden" name="code" id="action_on_this_update" value="" />
					<div class=" me-n7 pe-7" data-kt-scroll-activate="{default: false, lg: true}"
						data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
						data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style=""
						data-select2-id="select2-data-kt_modal_add_customer_scroll">

						<!--begin::Input group-->
						<div class="fv-row mb-12">
							<label class="col-sm-4 form-label">
								<?= Yii::t('app', 'statut') ?> :
							</label>
							<div class="col-sm-12">
								<select class="form-select" name="statut_auth_update" id="statutAuthUpdate">
									<option value="1">
										<?= Yii::t('app', 'active') ?>
									</option>
									<option value="2">
										<?= Yii::t('app', 'suprime') ?>
									</option>
								</select>
							</div>
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="fv-row mb-7 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'author_lname') ?>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" name="nom_update" id="nomUpdateField"
								class="form-control border-dark form-control-solid mb-3 mb-lg-0 " />
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="fv-row mb-7 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'author_fname') ?>
							</label>
							<!--end::Label-->
							<input type="text" name="prenom_update" id="prenomUpdateField"
								class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
							</input>
							<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--begin::Input group-->
						<div class="fv-row mb-7 fv-plugins-icon-container">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'author_phone') ?>
							</label>
							<!--end::Label-->
							<input type="text" name="phone_update" id="phoneUpdateField"
								class="form-control border-dark form-control-solid mb-3 mb-lg-0 ">
							</input>
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
				<button id="btn-update-author" Class="btn btn-circle btn-primary" onclick="update()">
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
</div>
<!--end::Modal - Customers - Add-->