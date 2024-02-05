<?php

$menuperse = explode(Yii::$app->params['subMenuSeperator'], $nosaction['action']);
?>


<form id="kt_formedit" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
    action="<?= Yii::$app->request->baseUrl . "/" . md5("utilisateur_addgroupeuser") ?>">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    <input type="hidden" name="action_key" id="action_key" value="<?= md5('modifiertype') ?>" />
    <input type="hidden" name="action_on_this" id="action_on_this" value="<?= $code ?>" />

    <!--begin::Card body-->
    <div class="row mt-5 mb-8">
        <div class="col-md-12">
            <label class="form-label required">
                <?= Yii::t("app", 'ngroupe') ?>
            </label>
        </div>

        <div class="col-md-12">
            <input type="text" name="nomgroupe" id="nomgroupep" value="<?= $nosaction['libelle'] ?>"
                class="form-control  border-dark form-control-solid mb-lg-0 " />

        </div>
    </div>
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
                        if (in_array($subMenuArray[$i], $menuperse)) {
                            $checked = 'checked';
                        } else
                            $checked = '';
                        echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  " . $checked . " />
                                                                    
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
                        if (in_array($subMenuArray[$i], $menuperse)) {
                            $checked = 'checked';
                        } else
                            $checked = '';
                        echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  " . $checked . " />
                                                                    
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
                        if (in_array($subMenuArray[$i], $menuperse)) {
                            $checked = 'checked';
                        } else
                            $checked = '';
                        echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  " . $checked . " />
                                                                    
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
                <?= Yii::t("app", 'config') ?>
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
                        if (in_array($subMenuArray[$i], $menuperse)) {
                            $checked = 'checked';
                        } else
                            $checked = '';
                        echo "   <div class='col-md-3 mt-5  pb-2 checkbox'>
                                                                        <div  class='form-check form-check-custom  border-dark form-check-solid'>
                                                                        
                                                                                    <input  type='checkbox'  name='menuaction[]' value='" . $subMenuArray[$i] . "' class='form-check-input me-3 border-dark' id=''  " . $checked . " />
                                                                    
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

    <div class='separator separator-dashed my-5'></div>

   


</form>