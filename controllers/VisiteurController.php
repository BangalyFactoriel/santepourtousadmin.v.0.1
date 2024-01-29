<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class VisiteurController extends Controller
{




  public function actionUnicitelibelle()
  {
    Yii::$app->response->format = Response::FORMAT_JSON;
    $verifieUniciter = false;
    //  die(var_dump($_POST));
    switch ($_POST['action_key']) {

      case md5(strtolower('addfournisseur')) :
        $code = Yii::$app->nonSqlClass->generateUniq();

        return Yii::$app->productClass->addpfournisseur($code,$_POST['raisonsociale'],$_POST['email'],$_POST['tel'],$_POST['adresse']);
      
        break;

      case md5(strtolower('uniciteCat')):
        $libCat = $_POST['productCatNames'];

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.categorie', $libCat, 'libelle');
        // die(var_dump($verifieUniciter));
        return $verifieUniciter;
        break;



      case md5(strtolower('uniciteGrp')):

        $productGroupName = $_POST['productGrpNames'];

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.groupe', $productGroupName, 'libelle');
        return $verifieUniciter;
        break;

        case md5(strtolower('uniciteGrpUpdate')):

        $productGrpNameUpdate = $_POST['productGrpNameUpdate'];

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.groupe', $productGrpNameUpdate, 'libelle');
        return $verifieUniciter;
        break;



      case md5(strtolower('uniciteBanner')):

        // die(var_dump($_POST));

        $productBanNames = $_POST['productBanNames'];
        // return $productBanNames;

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.banner', $productBanNames, 'libelle');
        return $verifieUniciter;

        break;
      case md5(strtolower('unirefUpdate')):

        $productRefNameUpdate = $_POST['productRefNameUpdate'];

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.reference', $productRefNameUpdate, 'libelle');
        return $verifieUniciter;
        break;
      case md5(strtolower('uniref')):

        $ref = $_POST['productRefNames'];

        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.reference', $ref, 'libelle');
        return $verifieUniciter;
        break;
      case md5(strtolower('uniciteClient')):
        // return $_POST;
        $email = $_POST['email'];
        $verifieUniciter = Yii::$app->mainClass->unicite('icopub.client', $email, 'email');
        return $verifieUniciter;
        break;
      case md5(strtolower('verifiermail')):

        $email = $_POST['email'];
        $verifie = yii::$app->mainCLass->verifData($email, 'individus.individus_contactdata', 'email');
        if ($verifie) {
          // $verifieUniciter = Yii::$app->mainCLass->verifie_mail($email);

        }

        return true;

        break;
      case md5(strtolower('uniclient')):

        return Yii::$app->clientClass->uniclient($_POST['tel'], $_POST['email']);
        break;
      case md5(strtolower('unifournissuer')):

        return Yii::$app->fournisseurClass->unifournissurs($_POST['tel'], $_POST['rsociale'], $_POST['email']);
        break;

      default:
        # code...

        break;

        return $verifieUniciter;
    }

  }

  public function actionAdduser()
  {
    $this->layout= 'loginlayout';

    if (yii::$app->request->isGET) {
      // verification si le code envoyer par get existe dans la table(user_attente)
      $codeattente = Yii::$app->configClass->verifiercode($_GET['code']);
      if ($codeattente) {
       
        return $this->render('/utilisiteurs/finaliseUserForm.php', ['code' => $codeattente['code']]);

      } else {
        echo ' le lien à expirer';

      }




    }


  }



  public function actionAdduserse()
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
                      Yii::$app->nonSqlClass->envoimail('/utilisiteurs/mailFinaliser.php', $url, $_POST['email'], $_POST['nomuser'] . '' . $_POST['prenomuser'], 'ICOPUB', 'Votre lien pour valider votre compte');
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




  public function actionTest(){
    $motPassCrypte = Yii::$app->accessClass->create_pass('Bangaly', '1234');
    die(var_dump($motPassCrypte));
  }



}