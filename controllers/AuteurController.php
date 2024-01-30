<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

class AuteurController extends Controller
{
    private $pg = Null;
    private $msg = Null;


    /*********************************************************************************************
     *                              ALL AJAX FOR ARTICLE
     * *******************************************************************************************
     */

    
    public function actionAjax()
    {
        // die("dd");
        //preparer le mode de retour en ajx
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $request = $_POST;
            switch ($request['action_key']) {

            }


        }

    }




    /*********************************************************************************************
     *                              FONCTION DE LA liste
     * *******************************************************************************************
     */
    public function actionListe()
    {

        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('liste/vueprincipale.php');

    }




}