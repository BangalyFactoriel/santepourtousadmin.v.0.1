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
     *                              ALL AJAX FOR AUTHOR
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
                case md5(strtolower('filtreautheur')):
                    $result = Yii::$app->authorClass->searchforfiltre('ste.auteur', $_POST['ch'], $_POST['limit']);
                    return $this->renderPartial('liste/contenu/vuePrincipaleLst_tblBody.php', ['auteur' => $result]);
                    break;
            }
        }
    }

    /*********************************************************************************************
     *                              FONCTION DE LA liste
     * *******************************************************************************************
     */
    public function actionListe()
    {
        $userCode = Yii::$app->mainClass->getUser();

        if (Yii::$app->request->isPost) {
            switch ($_POST['action_key']) {
                case md5('addAuthor'):
                    // dd($_POST);
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $tel = $_POST['phone'];
                    Yii::$app->authorClass->addAuthor($code, $nom, $prenom, $tel, $userCode);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;

                case md5('updateAuthor'):

                    // dd($_POST);
                    $code = $_POST['code'];
                    $nom = $_POST['nom_update'];
                    $prenom = $_POST['prenom_update'];
                    $tel = $_POST['phone_update'];
                    $statut = $_POST['statut_auth_update'];
                    Yii::$app->authorClass->updateAuthor($code, $nom, $prenom, $tel, $statut);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'modifSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;

                default:
                    # code...
                    break;
            }

        }
        $authors = Yii::$app->authorClass->searchforfiltre('ste.auteur', '', '1');
        return $this->render('liste/vueprincipale.php', ['authors' => $authors]);

    }
}