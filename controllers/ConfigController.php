<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

class ConfigController extends Controller
{
    private $pg = Null;
    private $msg = Null;


    /*********************************************************************************************
     *                              ALL AJAX FOR ARTICLE
     * *******************************************************************************************
     */


    public function actionAjax()
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $request = $_POST;
            $userCode = Yii::$app->mainClass->getUser();

            switch ($request['action_key']) {


                case 'profil':
                    $infousers = yii::$app->mainClass->getuniquedata('ste.utilisateur', $userCode);
                    return $this->renderPartial('/ajax/profil/infopricipal.php', ['infousers' => $infousers]);
                    break;

                case 'compte':
                    $infousers = yii::$app->mainClass->getuniquedata('ste.utilisateur', $userCode);
                    return $this->renderPartial('/ajax/profil/compte.php', ['infousers' => $infousers]);
                    break;

                case 'verifiepass':
                    $infousers = yii::$app->mainClass->getuniquedata('ste.utilisateur', $userCode);

                    $motpass_constitue = $infousers['identifiant'] . Yii::$app->params['key_connector'] . $_POST['mdpactuelle'];

                    // RASSURER QUE MOT PASS EST CORRECT
                    return $veraciteMot_passe = Yii::$app->cryptoClass->validate_password($motpass_constitue, $infousers['motpasse']);

                    break;
            }
        }
    }



    
    /*********************************************************************************************
     *                              FONCTION DE parametre
     * *******************************************************************************************
     */

     public function actionParams()
     {
 
 
 
        
         $detail = Yii::$app->mainClass->getTableDataparams('ste.entite');
 
         if (Yii::$app->request->isPost) {
              $photo = $_POST['logo'];
             if ($_POST['logolast'] != null) {
                 $uploadFile = $_POST['logolast'];
                 $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                 // yii::$app->request->baseUrl. '/web/mainAssets/media/auth/bg/auth-bg.png'
                 $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                 if ($file_uni_name != null) {
                     $photo = $file_uni_name;
                 }
             }
              yii::$app->configClass->updateentite($_POST['rsocile'],$_POST['sSocial'],$_POST['email'],$photo,$_POST['tel'],$_POST['historique']);
              $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
              Yii::$app->session->setFlash('flashmsg', $notification);
              return $this->redirect(Yii::$app->request->referrer);
          }
 
         return $this->render('entite/vuePrincipale.php', ['detail' => $detail]);
 
 
     }

}