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




      case md5(strtolower('uniciteauth')):
        $phoneField = $_POST['phoneField'];
        $verifieUniciter = Yii::$app->mainClass->unicite('ste.auteur', $phoneField, 'tel');
        // die(var_dump($verifieUniciter));
        return $verifieUniciter;
        break;
    
      case md5(strtolower('uniciteCat')):
        $libCat = $_POST['CatNames'];
        $verifieUniciter = Yii::$app->mainClass->unicite('ste.categorie', $libCat, 'libelle');
        // die(var_dump($verifieUniciter));
        return $verifieUniciter;
        break;
    
        
      case md5(strtolower('uniciteref')):
        $labelField = $_POST['labelField'];
        $verifieUniciter = Yii::$app->mainClass->unicite('ste.reference', $labelField, 'libelle');
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