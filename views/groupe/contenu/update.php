<!-- Modal -->
<div class="modal fade" id="modalupdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="staticBackdropLabel">
          <?= Yii::t("app", 'modifierusertype') ?>
        </h3>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenueajax">
        <!--begin::Card-->
       
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <?= yii::t("app", 'btnRetour') ?>
            </button>
            <button  onclick="modifierupdate()" class="btn btn-primary" id="modifierup">
                <span class="indicator-label">
                    <?= yii::t("app", 'edit') ?>
                </span>
                <span class="indicator-progress">
                    <?= yii::t("app", 'veillez') ?>
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
      </div>
    </div>
  </div>
</div>


<?php
require_once('script/script.php');
?>