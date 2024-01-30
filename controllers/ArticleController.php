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




        if (Yii::$app->request->isPost) {
            die(var_dump($_POST));
            switch ($_POST['action_key']) {
                case md5('addcategorie'):

                    $userCode = Yii::$app->mainClass->getUser();
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $titre = 'categorie';
                    $contenue = '';
                    $datepublication = date('Y-m-d');
                    $codeauter = '';
                    $codecategorie = '';
                    $codetype = '';
                    Yii::$app->articleClass->addArticle($code, $titre, $contenue, $userCode, $datepublication, $codeauter, $codecategorie, $codetype);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);

                    break;
            }
        }
        return $this->render('artile/vueprincipale.php');


    }

    public function actionAddarticle()
    {

        if(Yii::$app->request->isPost){
            die(var_dump($_POST));
        }
        return $this->render('article/contenu/add_article.php');


    }
    /*********************************************************************************************
     *                              FONCTION DE LA CATEGORIE
     * *******************************************************************************************
     */
    public function actionCategories()
    {
        $userCode = Yii::$app->mainClass->getUser();
        if (Yii::$app->request->isPost) {
            // die(var_dump($_POST));
            switch ($_POST['action_key']) {
                case md5('addcategorie'):
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $photo = $_POST['avatar_remove'];
                    if ($_POST['photo'] != null) {
                        $uploadFile = $_POST['photo'];
                        $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                        // yii::$app->request->baseUrl. '/web/mainAssets/media/auth/bg/auth-bg.png'
                        $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                        if ($file_uni_name != null) {
                            $photo = $file_uni_name;
                        }
                    }
                    $userCode = Yii::$app->mainClass->getUser();
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $libelle = 'categorie';
                    $description = '';
                    Yii::$app->articleClass->addCategorie($code, $libelle, $photo, $userCode, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);

                    break;
                case md5('updatecategorie'):
                    $photo = $_POST['avatar_remove'];
                    if ($_POST['photo'] != null) {
                        $uploadFile = $_POST['photo'];
                        $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                        // yii::$app->request->baseUrl. '/web/mainAssets/media/auth/bg/auth-bg.png'
                        $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                        if ($file_uni_name != null) {
                            $photo = $file_uni_name;
                        }
                    }
                    $code = $_POST['action_on_this'];
                    $libelle = 'categorie';
                    $description = '';
                    $statut = '0';
                    Yii::$app->articleClass->updateCategorie($code, $libelle, $photo, $statut, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['information'], yii::t('app', 'modifSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;

                default:
                    # code...
                    break;
            }
        }
        return $this->render('categorie/vueprincipale.php');

    }




    /*********************************************************************************************
     *                              FONCTION DE LA REFERENCE
     * *******************************************************************************************
     */
    public function actionReference()
    {
        $userCode = Yii::$app->mainClass->getUser();

        if (Yii::$app->request->isPost) {
            switch ($_POST['action_key']) {
                case md5('addreference'):
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $libelle = '';
                    $description = '';
                    $statut = '';
                    Yii::$app->articleClass->addreference($code, $libelle, $userCode, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;
                case md5('updatereference'):
                    $code = $_POST['action_on_this'];
                    $libelle = '';
                    $description = '';
                    $statut = '0';
                    Yii::$app->articleClass->updatereference($code, $libelle, $statut, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'modifSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;

                default:
                    # code...
                    break;
            }

        }
        return $this->render('reference/vueprincipale.php');

    }


    /*********************************************************************************************
     *                              FONCTION SUR L'ACTION PUBLICITE
     * *******************************************************************************************
     */

    public function actionPublicite()
    {
        $userCode = Yii::$app->mainClass->getUser();

        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->isPost) {
                switch ($_POST['action_key']) {
                    case md5('addpublicites'):
                        $code = Yii::$app->nonSqlClass->generateUniq();
                        $titre = '';
                        $contenue = '';
                        $datedebut = date('Y-m-d');
                        $datefin = date('Y-m-d');
                        $photo = '';
                        $positionnement = '1';
                        Yii::$app->articleClass->addpublicites($code, $titre, $contenue, $userCode, $datedebut, $datefin, $photo, $positionnement);
                        break;
                    case md5('updatepublicite'):
                        $code = $_POST['action_on_this'];
                        $titre = '';
                        $contenue = '';
                        $datedebut = date('Y-m-d');
                        $datefin = date('Y-m-d');
                        $photo = '';
                        $positionnement = '1';
                        $statut = 'o';
                        Yii::$app->articleClass->updatepublicites($code, $titre, $contenue, $statut, $datedebut, $datefin, $photo, $positionnement);
                        break;
                }
            }

        }
        return $this->render('publicite/vueprincipale.php');

    }


}