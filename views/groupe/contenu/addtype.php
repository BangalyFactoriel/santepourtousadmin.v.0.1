<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white" id="staticBackdropLabel">
          <?= Yii::t("app", 'addtypeusers') ?>
        </h3>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body scroll-y h-100">
        <!--begin::Card-->
        <form id="kt_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
          action="<?= Yii::$app->request->baseUrl . "/" . md5("utilisateur_addgroupeuser") ?>">
          <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
          <input type="hidden" name="action_key" id="action_key" value="" />
          <input type="hidden" name="action_on_this" id="action_on_this" value="" />

          <?= Yii::$app->session->getFlash('flashmsg');
          Yii::$app->session->removeFlash('flashmsg'); ?>
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut illo neque quisquam quia, saepe repellat iure nostrum ipsum ad aliquam eos voluptate minus autem quae adipisci enim eveniet officia? Eaque.
          <!--begin::Card body-->
          <div class="row  mb-8">
            <div class="col-md-12">
              <label class="form-label required fs-5">
                <?= Yii::t("app", 'ngroupe') ?>
              </label>

            </div>
            <div class="col-md-12">
              <input type="text" name="nomgroupe" id="nomgroupe" placeholder="    <?= Yii::t("app", 'groulibb') ?>"
                class="form-control  border-dark form-control-solid mb-lg-0 " />

            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-12">
              <h3 class="text-gray-400 fs-4">
                <?= Yii::t("app", 'article') ?>
              </h3>
              <input class="form-control form-checkbox " id="sitep" checked hidden type="checkbox" name="menuaction[]"
                value="@article">

            </div>
            <?php
             $menuString = yii::$app->params['article'];

            if (isset($menuString)) {
              $ajaxAction = Yii::$app->params['ajaxActions'];
              $menuArray = explode(Yii::$app->params['menuSeperator'], $menuString); # ligne principal des menus
            
              foreach ($menuArray as $value) {
                /* Empechons la vue des actions ajax */

                $subMenuArray = explode(Yii::$app->params['subMenuSeperator'], $value);
                for ($i = 1; $i < sizeof($subMenuArray); $i++) {
                  if (!(in_array($subMenuArray[$i], $ajaxAction))) {

                    echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  />
                                                                    
                                                                                    <label class='' for='kt_modal_update_role_option_0'>
                                                                                        <div class='fw-bold text-gray-800  fs-6' >" . Yii::t('app', $subMenuArray[$i]) . "  </div>
                                                                                    </label>
                                                                            
                                                                        </div>


                                                                </div>             
                                                            
                                                          ";
                  }

                }
              }
            }
            ?>
          </div>
          <div class='separator separator-dashed my-5'></div>

          <div class="row">
            <div class="col-md-12">
              <h3 class="text-gray-400 fs-4">
                <?= Yii::t("app", 'auteur') ?>
              </h3>
              <input class="form-control form-checkbox " id="sitep" checked hidden type="checkbox" name="menuaction[]"
                value="@auteur">

            </div>
            <?php
             $menuString = yii::$app->params['auteur'];

            if (isset($menuString)) {
              $ajaxAction = Yii::$app->params['ajaxActions'];
              $menuArray = explode(Yii::$app->params['menuSeperator'], $menuString); # ligne principal des menus
            
              foreach ($menuArray as $value) {
                /* Empechons la vue des actions ajax */

                $subMenuArray = explode(Yii::$app->params['subMenuSeperator'], $value);
                for ($i = 1; $i < sizeof($subMenuArray); $i++) {
                  if (!(in_array($subMenuArray[$i], $ajaxAction))) {

                    echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  />
                                                                    
                                                                                    <label class='' for='kt_modal_update_role_option_0'>
                                                                                        <div class='fw-bold text-gray-800  fs-6' >" . Yii::t('app', $subMenuArray[$i]) . "  </div>
                                                                                    </label>
                                                                            
                                                                        </div>


                                                                </div>             
                                                            
                                                          ";
                  }

                }
              }
            }
            ?>
          </div>
          <div class='separator separator-dashed my-5'></div>
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-gray-400 fs-6">
                <?= Yii::t("app", 'utilisateur') ?>
              </h3>
              <input class="form-control form-checkbox " id="sitep" checked hidden type="checkbox" name="menuaction[]"
                value="@utilisateur">

            </div>
            <?php
            $menuString = yii::$app->params['utilisateur'];

            if (isset($menuString)) {
              $ajaxAction = Yii::$app->params['ajaxActions'];
              $menuArray = explode(Yii::$app->params['menuSeperator'], $menuString); # ligne principal des menus
            
              foreach ($menuArray as $value) {
                /* Empechons la vue des actions ajax */

                $subMenuArray = explode(Yii::$app->params['subMenuSeperator'], $value);
                for ($i = 1; $i < sizeof($subMenuArray); $i++) {
                  if (!(in_array($subMenuArray[$i], $ajaxAction))) {

                    echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  />
                                                                    
                                                                                    <label class='' for='kt_modal_update_role_option_0'>
                                                                                        <div class='fw-bold text-gray-800  fs-6' >" . Yii::t('app', $subMenuArray[$i]) . "  </div>
                                                                                    </label>
                                                                            
                                                                        </div>


                                                                </div>             
                                                            
                                                          ";
                  }

                }
              }
            }
            ?>
          </div>
          <div class='separator separator-dashed my-5'></div>

          <div class="row">
            <div class="col-md-12">
              <h3 class="text-gray-400 fs-6">
                <?= Yii::t("app", 'UITILISATEUR') ?>
              </h3>
              <input class="form-control form-checkbox " id="sitep" checked hidden type="checkbox" name="menuaction[]"
                value="@utilisateur">

            </div>
            <?php
            $menuString = yii::$app->params['utilisateur'];

            if (isset($menuString)) {
              $ajaxAction = Yii::$app->params['ajaxActions'];
              $menuArray = explode(Yii::$app->params['menuSeperator'], $menuString); # ligne principal des menus
            
              foreach ($menuArray as $value) {
                /* Empechons la vue des actions ajax */

                $subMenuArray = explode(Yii::$app->params['subMenuSeperator'], $value);
                for ($i = 1; $i < sizeof($subMenuArray); $i++) {
                  if (!(in_array($subMenuArray[$i], $ajaxAction))) {

                    echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  />
                                                                    
                                                                                    <label class='' for='kt_modal_update_role_option_0'>
                                                                                        <div class='fw-bold text-gray-800  fs-6' >" . Yii::t('app', $subMenuArray[$i]) . "  </div>
                                                                                    </label>
                                                                            
                                                                        </div>


                                                                </div>             
                                                            
                                                          ";
                  }

                }
              }
            }
            ?>
          </div>
          <div class='separator separator-dashed my-5'></div>



          <div class="row">
            <div class="col-md-12">
              <h3 class="text-gray-400 fs-6">
                <?= Yii::t("app", 'PARAMETRE') ?>
              </h3>
              <input class="form-control form-checkbox " id="sitep" checked hidden type="checkbox" name="menuaction[]"
                value="@config">

            </div>
            <?php
            $menuString = yii::$app->params['config'];

            if (isset($menuString)) {
              $ajaxAction = Yii::$app->params['ajaxActions'];
              $menuArray = explode(Yii::$app->params['menuSeperator'], $menuString); # ligne principal des menus
            
              foreach ($menuArray as $value) {
                /* Empechons la vue des actions ajax */

                $subMenuArray = explode(Yii::$app->params['subMenuSeperator'], $value);
                for ($i = 1; $i < sizeof($subMenuArray); $i++) {
                  if (!(in_array($subMenuArray[$i], $ajaxAction))) {

                    echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  />
                                                                    
                                                                                    <label class='' for='kt_modal_update_role_option_0'>
                                                                                        <div class='fw-bold text-gray-800  fs-6' >" . Yii::t('app', $subMenuArray[$i]) . "  </div>
                                                                                    </label>
                                                                            
                                                                        </div>


                                                                </div>             
                                                            
                                                          ";
                  }

                }
              }
            }
            ?>
          </div>
          <div class='separator separator-dashed my-5'></div>

          


          


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <?= yii::t("app", 'btnRetour') ?>
        </button>
        <button onclick="ajoutgroup()"  class="btn btn-primary" id="enregistre">
          <span class="indicator-label">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <?= yii::t("app", 'btnEnrg') ?>
          </span>
          <span class="indicator-progress">
            <?= yii::t("app", 'pleasewait') ?>
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
</div>