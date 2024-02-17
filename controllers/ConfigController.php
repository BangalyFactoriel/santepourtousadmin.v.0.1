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


}