<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class UtilisateurController extends Controller
{

    private $pg = Null;
    private $msg = Null;


    //***********************************************foncion utilisateur *****************************************
    public function actionAdduser()
    {
        if (Yii::$app->request->isPost) {
            $request = $_POST;

            switch ($_POST['action_key']) {
                case md5(strtolower('ajouterUtilisateur')):
                    $code = Yii::$app->nonSqlClass->generateUniq();
                    // die(var_dump($_POST));
                    if (!empty($_POST['nomuser']) && !empty($_POST['prenomuser']) && !empty($_POST['email'])) {
                        $addUserattente = Yii::$app->utilisateurClass->addUserAttente($code, $_POST['nomuser'], $_POST['prenomuser'], $_POST['email'], $_POST['groupe']);
                        $lien = yii::$app->request->baseurl . '/' . md5('visiteur_adduser') . '/' . $code;

                        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                            $url = "https";
                        } else {
                            $url = "http";
                        }
                        $url .= "://";
                        $_SERVER['REQUEST_URI'] = $lien;
                        $url .= $_SERVER['HTTP_HOST'];
                        $url .= $_SERVER['REQUEST_URI'];
                        // die(var_dump($url));
                        Yii::$app->nonSqlClass->envoimail('/utilisiteurs/mailFinaliser.php', $url, $_POST['email'], $_POST['nomuser'] . '' . $_POST['prenomuser'], 'OBJECTIF SANTE', 'Votre lien pour valider votre compte');
                        $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccessvmail'));
                        Yii::$app->session->setFlash('flashmsg', $notification);
                        return $this->redirect(Yii::$app->request->referrer);
                    } else {
                        $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['attention'], yii::t('app', 'infosAAffairerVide'));
                        Yii::$app->session->setFlash('flashmsg', $notification);
                        return $this->redirect(Yii::$app->request->referrer);
                    }

                    break;

                case md5(strtolower('modifierUnUtilisateur')):
                    $code = $_POST['action_on_this'];
                    //  die(var_dump($_POST));
                    $typeuser = $_POST['typeusersupdate'];
                    $statut = $_POST['statutCatUpdate'];

                    if (!empty($_POST['typeusersupdate'])) {
                        // die(var_dump($_POST));

                        $req = Yii::$app->utilisateurClass->updateuser($typeuser, $statut, $code);
                        // die(var_dump($req));
                        $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['information'], yii::t('app', 'modifSuccess'));
                        Yii::$app->session->setFlash('flashmsg', $notification);
                        return $this->redirect(Yii::$app->request->referrer);
                    }

                    break;
            }
        }


        $typeUser = Yii::$app->utilisateurClass->listegroupeUser();
        $listeuser = Yii::$app->utilisateurClass->listeUser();

        return $this->render('/utilisiteurs/vuePrincipaleLst.php', ['typeUser' => $typeUser, 'listeuser' => $listeuser]);

    }


    // ajouter un groupe d'utilisateur dans la table utilisateur groupe
    public function actionNewuser()
    {

        if (Yii::$app->request->isPost) {
            $verifiercode = strval($_GET['code']);
            $verifiercode = Yii::$app->configClass->verifiercode($_GET['code']);
            $code = $verifiercode['code'];
            $nom = $verifiercode['nom'];
            $prenom = $verifiercode['prenom'];
            $email = $verifiercode['email'];
            $groupe = $verifiercode['lien'];

            $codeuser = Yii::$app->mainClass->getUser();

            //   die(var_dump($verifiercode));
            if (!empty($_POST['username']) && !empty($_POST['new_password'])) {
                $addUser = Yii::$app->utilisateurClass->addUsers($code, $nom, $prenom, $email, $_POST['new_password'], $groupe, $codeuser, $_POST['username']);
                //  die(var_dump($addUser));

                $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                Yii::$app->session->setFlash('flashmsg', $notification);
                return $this->render('/site/login.php');

            }

        }

    }


    //***********************************************foncion ajax *****************************************
    public function actionAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            // return $_POST;
            switch ($_POST['action_key']) {
                case md5('modifiertypeuser'):
                    // return $_POST;
                    $nosaction = Yii::$app->mainClass->getTableData($_POST['code'], 'icopub.groupe_utilisateurs');
                    // return $nosaction;

                    return $this->renderPartial('/ajax/typeuser/modaledit.php', ['nosaction' => $nosaction, 'code' => $_POST['code']]);
                    // return $nosaction;

                    break;
                case md5(strtolower('verifermailforuser')):

                    $mail = $_POST['adresseMail'];
                    // return $mail;
                    $verifie = Yii::$app->mainClass->verifie_mail($mail);
                    if ($verifie == false) {
                        return yii::t('app', 'email_valid');
                    }
                    return true;
                    break;
                default:
                    # code...
                    break;
            }

        }


    }


    //***********************************************foncion groupe d'utiilisatuer*****************************************

    public function actionAddgroupeuser()
    {

        $codeuser = Yii::$app->mainClass->getUser();
        // die(var_dump($codeuser));


        if (Yii::$app->request->isPost) {
            switch ($_POST['action_key']) {
                case md5("ajouterusers"):
                    //  die(var_dump($_POST));
                    $menuaction = '';
                    if (sizeof($_POST['menuaction']) > 0) {
                        foreach ($_POST['menuaction'] as $key => $value) {
                            $menuaction .= $value . ',';

                        }
                    }

                    //  die(var_dump($menuaction));
                    $code = Yii::$app->nonSqlClass->generateUniq();


                    $addgroupeuser = Yii::$app->utilisateurClass->addgroupeUser($code, $_POST['nomgroupe'], $menuaction, $codeuser);
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);

                    return $this->redirect(Yii::$app->request->referrer);

                    break;

                case md5("modifiertype"):
                    // die('ok');
                    $menuaction = '';
                    if (sizeof($_POST['menuaction']) > 0) {
                        foreach ($_POST['menuaction'] as $key => $value) {
                            $menuaction .= $value . ',';

                        }
                    }
                    Yii::$app->utilisateurClass->updategroupeuser($_POST['nomgroupe'], $_POST['action_on_this'], $menuaction);

                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['succes'], yii::t('app', 'enrgSuccess'));
                    Yii::$app->session->setFlash('flashmsg', $notification);
                    return $this->redirect(Yii::$app->request->referrer);
                    break;

            }
        }
        $liste = Yii::$app->utilisateurClass->listegroupeUser();
        return $this->render('/groupe/vuePrincipaleLst.php', ['liste' => $liste]);
    }



}