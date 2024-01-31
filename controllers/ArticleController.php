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

        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $request = $_POST;
            switch ($request['action_key']) {
                case md5(strtolower('filtrecategorie')):
                    $result = Yii::$app->articleClass->searchforfiltre('ste.categorie', $_POST['ch'], $_POST['limit']);
                    return $this->renderPartial('categorie/contenu/vuePrincipaleLst_tblBody.php', ['categorie' => $result]);
                    break;
                case  md5(strtolower('filtrerefenrece')):
                    
                    $result = Yii::$app->articleClass->searchforfiltre('ste.reference', $_POST['ch'], $_POST['limit']);
                    return $this->renderPartial('reference/contenu/refference_body.php', ['reference' => $result]);
                  
                break;
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
        return $this->render('article/vueprincipale.php');


    }

    public function actionAddarticle()
    {

        if (Yii::$app->request->isPost) {
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
            switch ($_POST['action_key']) {
                case md5('addcategorie'):
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $photo = $_POST['avatar_remove'];
                    if ($_POST['photo'] != null) {
                        $uploadFile = $_POST['photo'];
                        $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                        $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                        if ($file_uni_name != null) {
                            $photo = $file_uni_name;
                        }
                    }
                    $userCode = Yii::$app->mainClass->getUser();
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $libelle = $_POST['productCatNames'];
                    $description = $_POST['description'];
                    Yii::$app->articleClass->addCategorie($code, $libelle, $photo, $userCode, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);

                    break;
                case md5('updateCategorie'):
                    $photo = $_POST['avatar_removeupdate'];
                    if ($_POST['updatephoto'] != null) {
                        $uploadFile = $_POST['updatephoto'];
                        $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                        // yii::$app->request->baseUrl. '/web/mainAssets/media/auth/bg/auth-bg.png'
                        $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                        if ($file_uni_name != null) {
                            $photo = $file_uni_name;
                        }
                    }
                    $code = $_POST['action_on_this'];
                    $libelle = $_POST['productCatNameUpdate'];
                    $description = $_POST['productCatDescUpdate'];
                    $statut = $_POST['statutCatUpdate'];
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
        $categorie = Yii::$app->articleClass->searchforfiltre('ste.categorie', '', '1');
        return $this->render('categorie/vueprincipale.php', ['categorie' => $categorie]);

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
                    $libelle = $_POST['label'];
                    $description = $_POST['description'];
                    Yii::$app->articleClass->addreference($code, $libelle, $userCode, $description);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;
                case md5('updatereference'):

                    // dd($_POST);
                      $code = $_POST['code'];
                    $libelle = $_POST['labelupdate'];
                    $description = $_POST['descriptionupdate'];
                    $statut = $_POST['statutCatUpdate'];
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

        $reference = Yii::$app->articleClass->searchforfiltre('ste.reference', '', '1');

        return $this->render('reference/vueprincipale.php',['reference'=>$reference]);

    }


    /*********************************************************************************************
     *                              FONCTION SUR L'ACTION PUBLICITE
     * *******************************************************************************************
     */

    public function actionPublicite()
    {
        $userCode = Yii::$app->mainClass->getUser();
        $date = Yii::$app->nonSqlClass->datecontrole();
        $datedebut = $date['debutMois'];
        $datefin = $date['finMois'];
        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->isPost) {
                switch ($_POST['action_key']) {
                    case md5('addpublicites'):
                        $code = Yii::$app->nonSqlClass->generateUniq();
                        $titre = $_POST['title'];
                        $contenue = $_POST['content'];
                        $datedebut = $_POST['datedebut'];
                        $datefin = $_POST['datefin'];
                        $photo = '';
                        if ($_POST['photo'] != null) {
                            $uploadFile = $_POST['photo'];
                            $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
                            $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
                            if ($file_uni_name != null) {
                                $photo = $file_uni_name;
                            }
                        }
                        $positionnement = $_POST['position'];
                        Yii::$app->articleClass->addpublicites($code, $titre, $contenue, $userCode, $datedebut, $datefin, $photo, $positionnement);
                        $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                        Yii::$app->session->setFlash('flashmsg', $notification);
                        return $this->redirect(Yii::$app->request->referrer);
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
        $publlicite = Yii::$app->articleClass->searchforfiltrepublicite('ste.publicites', '', '1',$datedebut,$datefin);
        // dd($publlicite);
        return $this->render('publicite/vueprincipale.php',['publlicite'=>$publlicite]);

    }


}