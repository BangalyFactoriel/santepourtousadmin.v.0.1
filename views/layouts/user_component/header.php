<?php
//   $userCode = Yii::$app->mainClass->getUser();
//   $infousers = yii::$app->mainClass->getuniquedata('icopub.utilisateur', $userCode);
//   $detail = Yii::$app->mainClass->getTableDataparams('icopub.entite');

?>

<style>
	* {
		text-transform: none;
	}

	.bg-primary {
		background-image: linear-gradient(to bottom, rgba(50, 111, 155), rgba(50, 111, 155, 0.5));
	}

	.text-primary {
		color: linear-gradient(to bottom, rgba(50, 111, 155), rgba(50, 111, 155, 0.5));
	}

	.btn-primary {
		background-image: linear-gradient(to bottom, rgba(50, 111, 155), rgba(50, 111, 155, 0.5));
	}

	.badge-primary {
		background-image: linear-gradient(to bottom, rgba(50, 111, 155), rgba(50, 111, 155, 0.5));
	}

	.btn-bg-primary {
		background-image: linear-gradient(to bottom, rgba(50, 111, 155), rgba(50, 111, 155, 0.5));
		color: white;
	}


	/* CSS for hiding the div on mobile devices */
	@media (max-width: 767px) {
		#mobilebreacump {
			display: none;

		}

		#header {
			margin-top: -8px;
		}
	}
</style>

<div class="page-loader flex-column bg-dark bg-opacity-25">
    <span class="spinner-border text-primary" role="status"></span>
    <span class="text-gray-800 fs-6 fw-semibold mt-5">chargement...</span>
</div>
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
	<!--begin::Page-->
	<!--begin::Header-->
	<div id="kt_app_header" class="app-header  shadow-lg" data-kt-sticky="true"
		data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky"
		data-kt-sticky-offset="{default: false, lg: '300px'}">
		<!--begin::Header container-->
		<div class="app-container container-xxl d-flex align-items-stretch justify-content-between "
			id="kt_app_header_container">
			<!--begin::Header mobile toggle-->
			<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
				<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
					<i class="ki-outline ki-abstract-14 fs-2"></i>
				</div>
			</div>
			<!--end::Header mobile toggle-->
			<!--begin::Logo-->
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-1 me-lg-13">
				<a href="">
					<?php
					echo '<img alt="Logo" src="' . yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] .'" class="h-60px h-lg-60px theme-light-show" />';


					?>
				</a>
			</div>
			<!--end::Logo-->
			<!--begin::Header wrapper-->
			<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
				<!--begin::Menu wrapper-->
				<div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
					<!--begin::Menu holder-->
					<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
						data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
						data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
						data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle"
						data-kt-swapper="true" data-kt-swapper-mode="prepend"
						data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
						<!--begin::Menu-->
						<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-600 menu-state-dark menu-arrow-gray-400 fw-semibold fw-semibold fs-6 align-items-stretch my-5 my-lg-0 px-2 px-lg-0"
							id="#kt_app_header_menu" data-kt-menu="true">
							<?= Yii::$app->menuactionClass->menuConstructeur(''); ?>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Menu holder-->
				</div>
				<!--end::Menu wrapper-->
				<!--begin::Navbar-->
				<div class="app-navbar-item" id="kt_header_user_menu_toggle">
					<!--begin::Menu wrapper-->
					<div class="d-flex align-items-center border border-dashed border-gray-300 rounded  mt-md-10 p-1"
						data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
						data-kt-menu-placement="bottom-end">
						<!--begin::User-->
						<div class="cursor-pointer symbol me-3 symbol-35px symbol-lg-45px ">
							<img class=""
								src="<?= yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] ?>"
								alt="user" />
						</div>
						<!--end::User-->

					</div>
					<!--begin::User account menu-->
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
						data-kt-menu="true">
						<!--begin::Menu item-->
						<div class="menu-item px-3">
							<div class="menu-content d-flex align-items-center px-3">
								<!--begin::Avatar-->
								<div class="symbol symbol-50px me-5">
									<img alt="Logo"
										src="<?=yii::$app->request->baseUrl .Yii::$app->params['linkToUploadIndividusProfil'] ?>" />
								</div>
								<!--end::Avatar-->
								<!--begin::Username-->
								<div class="d-flex flex-column">
									<div class="fw-bold d-flex align-items-center fs-5">
										Bangaly Camara
										<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">En
											ligne</span>
									</div>
								
								</div>
								<!--end::Username-->
							</div>
						</div>
						<!--end::Menu item-->
						<!--begin::Menu separator-->
						<div class="separator my-2"></div>
						<!--end::Menu separator-->
						<!--begin::Menu item-->
						<div class="menu-item px-5">
							<a href="<?= yii::$app->request->baseUrl . '/' . md5('site_profil') ?>"
								class="menu-link px-5">Mon profil</a>
						</div>
						<!--end::Menu item-->


						<!--begin::Menu separator-->
						<div class="separator my-2"></div>
						<!--end::Menu separator-->
				

						<!--begin::Menu item-->
						<div class="menu-item px-5">
							<a href="<?= yii::$app->request->baseUrl . '/' . md5('site_deconnecter') ?>"
								class="menu-link px-5">Deconnection</a>
						</div>
						<!--end::Menu item-->
					</div>
					<!--end::User account menu-->
					<!--end::Menu wrapper-->
				</div>
			</div>
			<!--end::Header wrapper-->
		</div>
		<!--end::Header container-->
	</div>
	<!--end::Header-->
</div>