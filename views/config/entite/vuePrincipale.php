<!--begin::Wrapper container-->
<div class="app-container container-xxl d-flex">

	<!--begin::Main-->
	<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

		<!--begin::Content wrapper-->
		<div class="d-flex flex-column flex-column-fluid">
			<!--begin::Content-->
			<div id="kt_app_content" class="app-content">
				<!--begin::Navbar-->
				<div class="card mb-5 mb-xl-10 shadow-lg">
					<div class="card-body pt-9 pb-0">
						<!--begin::Details-->
						<div class="d-flex flex-wrap flex-sm-nowrap">
							<!--begin: Pic-->
							<div class="me-7 mb-4">
								<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
									<img src="<?= yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] . $detail['logo'] ?>"
										alt="image" />
								</div>
							</div>
							<!--end::Pic-->
							<!--begin::Info-->
							<div class="flex-grow-1">
								<!--begin::Title-->
								<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
									<!--begin::User-->
									<div class="d-flex flex-column">
										<!--begin::Name-->
										<div class="d-flex align-items-center mb-2">
											<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">
												<?=$detail['denomination']?> 
											</a>


										</div>
										<!--end::Name-->
										<!--begin::Info-->
										<div class="d-flex flex-wrap fw-semibold fs-3 mb-4 pe-2">

											<a href="#"
												class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
												<i class="ki-outline ki-geolocation fs-2 me-1"></i>
												<?=$detail['adresse']?> 


											</a>
											<a href="#"
												class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-outline ki-phone fs-2 me-1"></i>
												<?=$detail['tel']?> &nbsp;


											</a>
											<a href="#"
												class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<i class="ki-outline ki-sms fs-2 me-1"></i>
												<?=$detail['email']?> 
											</a>
										</div>
										<!--end::Info-->
									</div>
									<!--end::User-->
									<!--begin::Actions-->

								</div>
								<!--end::Title-->

							</div>
							<!--end::Info-->
						</div>
						<!--end::Details-->
						<ul
							class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent text-uppercase fs-5 fw-bold">
							<!--begin::Nav item-->
							<li class="nav-item">
								<a class="nav-link text-active-primary py-5 me-6" href="javascript:;"
									id="infoGeneral">Information General</a>
							</li>
							<!--end::Nav item-->
							<!--begin::Nav item-->
						</ul>
					</div>

				</div>

				<!--end::Navbar-->

				<!--begin::Card-->
				<div class="card mt-5 shadow-lg" id="ajout" style="display:none;">
					<!--begin::Card header-->
					<div class="card-header bg-primary  ">
						<!--begin::Card title-->
						<div class="card-title fs-3 text-white fw-bold">INFORMATION GENERAL</div>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Form-->
					<form id="kt_project_settings_form" method="POST" enctype="multipart/form-data"
						action="<?= Yii::$app->request->baseUrl . "/" . md5("config_params") ?>"
						class="form fv-plugins-bootstrap5 fv-plugins-framework">
						<input type="hidden" name="action_key" id="action_key" value="" />
						<input type="hidden" name="action_on_this" id="action_on_this" value="" />
						<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />

						<!--begin::Card body-->
						<div class="card-body p-9">
							<!--begin::Row-->
							<div class="row mb-5">

								<!--begin::Col-->
								<div class="col-lg-6">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true"
										style="background-image: url('<?= yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] . $detail['logo'] ?>')">
										<!--begin::Preview existing avatar-->
										<div id="logo-cropper-resul" class="image-input-wrapper w-125px  h-125px"
											style="background-size: 75%; background-image: url('<?= yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] . $detail['logo'] ?>')">
											<img style="width:125px; height:125px;">
										</div>

										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											aria-label="Change avatar" data-kt-initialized="1">
											<a href="javascript:;" Class="btn" data-bs-toggle="modal"
												data-bs-target="#vueRognerModal"><i
													class="bi bi-pencil-fill fs-7">Logo</i></a>
											<!--begin::Inputs-->
											<input type="hidden" name="logo" value="<?=$detail['logo']?> ">
											<input type="text" name="logolast" id="photo">
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
									<!--begin::Hint-->
									<div class="form-text">png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
								<!--end::Col-->

							</div>
							<!--end::Row-->
							<div class="row mb-5">
								<!--begin::Col-->
								<div class="col-md-4  mt-5  fv-row fv-plugins-icon-container">
									<label for="form-label">
										<?= yii::t("app", 'denomination') ?>
									</label>
									<input type="text" class="form-control form-control-solid " id="rsocile"
										name="rsocile" value="<?=$detail['denomination']?> ">
								</div>
								<!--begin::Col-->
								<div class="col-md-4  mt-5  fv-row fv-plugins-icon-container">
									<label for="form-label">
										<?= yii::t("app", 'tel') ?>
									</label>
									<input type="text" class="form-control form-control-solid" name="tel" value="<?=$detail['tel']?>">
								</div>
								<!--begin::Col-->


								<!--begin::Col-->
								<div class="col-md-4   mt-5  fv-row fv-plugins-icon-container">
									<label for="form-label">
										<?= yii::t("app", 'adresse') ?>
									</label>

									<input type="text" class="form-control form-control-solid " name="sSocial" value="">
								</div>
								<!--begin::Col-->
								<div class="col-md-4 fv-row  mt-5   fv-plugins-icon-container">
									<label for="form-label">
										<?= yii::t("app", 'email') ?>
									</label>
									<input type="email" class="form-control form-control-solid" id="email" name="email"
										value="<?=$detail['email']?>">

								</div>
								<!--begin::Col-->
								<div class="col-md-8 fv-row  mt-5 fv-plugins-icon-container">
									<label for="form-label">
										<?= yii::t("app", 'historique') ?>
									</label>
									<textarea class="form-control form-control-solid" name="historique" id="historique" rows="2" cols="30" ><?=$detail['historique']?></textarea>
								</div>
								<!--begin::Col-->
							</div>
							<!--end::Row-->




						</div>
						<!--end::Card body-->

					</form>
					<!--begin::Card footer-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<a href="javascript:;" Class="btn btn-circle btn-primary " id="btnadd" onclick="add()">
							<span class="indicator-label">
								<?= yii::t("app", 'btnEnrg') ?>
							</span>
							<span class="indicator-progress">
								<?= yii::t("app", 'pleasewait') ?>
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
							</span>

							</span>
						</a>
					</div>
					<!--end::Card footer-->
					<!--end:Form-->
				</div>
				<!--end::Card-->

			</div>
			<!--end::Content-->
		</div>

	</div>
	<!--end:::Main-->
</div>
<!--end::Wrapper container-->

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<!--begin::Post-->
	<div class="content flex-row-fluid" id="kt_content">




	</div>
	<!--end::Post-->
</div>





<!--begin::Modal - Support Center - Create Ticket-->
<div class="modal fade" id="vueRognerModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
	data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content rounded">

			<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 mt-15">
				<div style="display: flex;">
					<div id="logo-cropper" style="border:1px solid #ccc; margin: 5px; width:120px; height:120px;">
						<?= yii::t("app", "selectImage") ?>
					</div>
				</div>

				<p><input type="button" value="<?= yii::t("app", "validecrop") ?>" id="logo-crop" data-bs-toggle="modal"
						data-bs-target="#vuePrincipaleAddInModal" class="btn btn-primary"></p>

				<a href="javascript:;" Class="btn btn-light me-3" id="retour" data-bs-toggle="modal"
					data-bs-target="#vuePrincipaleAddInModal">
				</a>
			</div>
		</div>
	</div>

</div>

<?php
require_once('script/vuePrincipale_js.php');
require_once('contenu/modalAddAction.php');
?>