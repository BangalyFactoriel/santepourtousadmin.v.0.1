

<!--begin::Wrapper container-->
<div class="app-container container-xxl d-flex">
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content">
                <!--begin::Row-->

                <!--begin::Col-->

                <div class="row mb-xxl-2 ">
                    <!--begin::Card Widget 22-->
                    <div class="card card-reset mb-5 shadow 	mb-xl-10">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Row-->
                            <div class="row g-5 g-lg-9">
                                <!--begin::Col-->
                                <div class="col-lg-4 col-md-6">
                                    <!--begin::Card-->
                                    <div class="card card-shadow">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex justify-content-between">
                                            <h2>Total Articles Publier</h2>

                                            <h1 class="text-end"><?=   yii::$app->articleClass->countaricle()?>
                                            </h1>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-lg-4 col-md-6">
                                    <!--begin::Card-->
                                    <div class="card card-shadow">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex justify-content-between">
                                            <h2>Total Auteur</h2>
                                            <h1 class="text-end"><?=   yii::$app->articleClass->countauteur()?>
                                            </h1>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!--begin::Card-->
                                    <div class="card card-shadow">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex justify-content-between">
                                            <h2>Total Publicite en cours</h2>
                                            <h1 class="text-end"><?=   yii::$app->articleClass->countpublicite()?>
                                            </h1>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                             
                                <!--begin::Col-->



                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card Widget 22-->

                </div>
                <!--end::Col-->
                <div class="row g-5 g-xxl-10">

                    <!--begin::Col-->
                    <div class="col-xxl-12 mb-xl-3  ">
                        <!--begin::Engage widget 14-->
                        <div class="card border-0 mb-5 mb-xl-11 shadow-lg" data-bs-theme="light">
                            <!--begin::Card header-->
                            <div class="card-header bg-primary">
                                <h2 class="card-title fw-bold text-white">
                                    <?= Yii::t("app", "caleve") ?>
                                </h2>
                                
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body mb-2 ">
                                <!--begin::Calendar-->
                                <div id="kt_docs_fullcalendar_background_events"></div>                            </div>
                            <!--end::Card 	body-->
                        </div>


                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->

                    <!--end::Col-->
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper container-->




<script>
    $('document').ready(function(){
        "use strict";

// Class definition
var KTGeneralFullCalendarEventsDemos = function() {
	// Private functions

	var exampleBackgroundEvents = function() {
		// Define colors
		var green = KTUtil.getCssVariableValue('--bs-active-success');
		var red = KTUtil.getCssVariableValue('--bs-active-danger');

		// Initialize Fullcalendar -- for more info please visit the official site: https://fullcalendar.io/demos
		var calendarEl = document.getElementById('kt_docs_fullcalendar_background_events');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
			},
			initialDate: '2020-09-12',
			navLinks: true, // can click day/week names to navigate views
			businessHours: true, // display business hours
			editable: true,
			selectable: true,
			events: [			]
		});

		calendar.render();
	}

	return {
		// Public Functions
		init: function() {
			exampleBackgroundEvents();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
	KTGeneralFullCalendarEventsDemos.init();
});
    });
</script>



