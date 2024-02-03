<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header bg-primary " id="kt_modal_add_user_header">

				<!--begin::Modal title-->
				<h2 class="fw-bold text-white">
					<?= yii::t("app", 'formajoutuser') ?>
				</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-light btn-sm btn-active-icon-light" data-bs-dismiss="modal"
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
				<form id="da_frm_users" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post">
					<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
					<input type="hidden" name="action_key" id="action_key" value="" />
					<input type="hidden" name="action_on_this" id="action_on_this" value="" />

					<?= Yii::$app->session->getFlash('flashmsg');
					Yii::$app->session->removeFlash('flashmsg'); ?>
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
						data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
						data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
						data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
						style="max-height: 457px;">
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'Nom') ?>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" name="nomuser"
								class="form-control form-control-solid mb-3 mb-lg-0 border-dark" id="nom"
								placeholder="Nom d'utilisateurs" value="" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'Prenom') ?>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" name="prenomuser"
								class="form-control form-control-solid border-dark mb-3 mb-lg-0" id="prenom"
								placeholder="Prénom d'utilisateurs" value="" />
							<!--end::Input-->
						</div>
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'Email') ?>
							</label>
							<!--end::Label-->

							<!--begin::Input-->
							<input type="text" name="email" id="email"
								class="form-control border-dark form-control-solid mb-3 mb-lg-0 " />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="required fw-semibold fs-6 mb-2">
								<?= yii::t("app", 'Group') ?>
							</label>
							<!--end::Label-->
							<select name="groupe" id="groupe" data-select="select2"
								class=" form-control form-select  border-dark form-control-solid mb-3 mb-lg-0 ">
								<option value="" hidden>Selectionner un groupe</option>
								<?php
								if (sizeof($typeUser) > 0) {
									foreach ($typeUser as $key => $value) {
										echo '<option value="' . $value['code'] . '">' . $value['libelle'] . '</option>';
									}
								}
								?>
							</select>

						</div>
						<!--end::Input group-->

					</div>
					<!--end::Scroll-->

				</form>
				<!--end::Form-->
				<!--begin::Actions-->
				<div class="text-center pt-15">
					<a href="javascript:;" Class="btn btn-light me-3" data-bs-toggle="modal"
						data-bs-target="#vuePrincipaleAddInModal">
						<?= yii::t("app", 'retour') ?>
					</a>

					<button Class="btn btn-circle btn-primary" id="btnadd" onclick="ajoutuser()">
						<span class="indicator-label">
							<?= yii::t("app", 'btnEnrg') ?>
						</span><span class="indicator-progress">
							<?= yii::t("app", 'pleasewait') ?> <span
								class="spinner-border spinner-border-sm align-middle ms-2"></span>
						</span>
					</button>

				</div>
				<!--end::Actions-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->