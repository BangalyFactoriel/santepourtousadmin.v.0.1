<div class="py-5" id="reapeterFieldImage">
    <div class="rounded border p-10">
        <!--begin::Repeater-->
        <div id="kt_docs_repeater_basic_img">
            <!--begin::Form group-->
            <div class="form-group">
                <div data-repeater-list="kt_docs_repeater_basic_img">
                    <div data-repeater-item>
                        <div class="form-group row mb-5">
                            <div class="col-md-3 " id="">
                                <label class="required fw-semibold fs-6 mb-2">
                                    <?= yii::t("app", 'media_type') ?>
                                </label>
                                <select name="media_type" class="form-select form-select-solid"
                                        data-kt-select2="true">
                                    <option value="0">Choisir un type de fichier</option>
                                    <option value="1">Photo</option>
                                    <option value="2">Audio</option>
                                    <option value="3">Video</option>
                                </select>
                            </div>
                            <!-- ... Votre code pour les autres champs répétés ... -->
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


<script>
    $('#kt_docs_repeater_basic').repeater({
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
</script>