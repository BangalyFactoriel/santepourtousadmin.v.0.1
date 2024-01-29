<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

class ArticleController extends Controller
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
     *                              ACTION SUR LES ARTICLE
     * *******************************************************************************************
     */


 


    //ACTION SUR L'ARTICLE
    public function actionArticle()
    {

        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('artile/vueprincipale.php');


    }


    /*********************************************************************************************
     *                              FONCTION DE LA CATEGORIE
     * *******************************************************************************************
     */
    public function actionCategories()
    {
        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('categorie/vueprincipale.php');

    }




    /*********************************************************************************************
     *                              FONCTION DE LA REFERENCE
     * *******************************************************************************************
     */
    public function actionReference()
    {

        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('reference/vueprincipale.php');

    }


    /*********************************************************************************************
     *                              FONCTION SUR L'ACTION PUBLICITE
     * *******************************************************************************************
     */

    public function actionPublicite()
    {
        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('publicite/vueprincipale.php');

    }


}