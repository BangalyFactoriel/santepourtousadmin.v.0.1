<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    public function actionLogin()
    {
        $notification = Null;
        Yii::$app->layout = 'loginlayout';
        if (Yii::$app->request->isPost) { // MAKE SURE THE USER HAS REALLY SUBMITTED
            switch (AuthController::authentifcation()) { // CKECK THE USER AUTHENTIFICATION
                case 'success': // IF RESPONSE IS SUCCESS
                    return $this->redirect(md5('site_index')); // REDIRECT IT TO THE ACTION INDEX
                    break;

                //Champs imperatifs sont vides 
                case '11':
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['attention'], yii::t('app', 'pasData_trouvee'));
                    break;

                case '12':
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['attention'], yii::t('app', 'actionNon_valide'));
                    break;

                case '22':
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['erreur'], yii::t('app', 'utilisateurNon_valid'));
                    break;

                case '33':
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['attention'], yii::t('app', 'compteBloque'));
                    break;
            }

            Yii::$app->session->setFlash('flashmsg', $notification);
            return $this->render('login', [
                'userName' => $_POST['username'],
                'motPass' => $_POST['password'],
                // 'sugarpot' => $_POST['sugarpot'],
            ]);

        }
        return $this->render('login');
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionDeconnecter(){
        Yii::$app->getSession()->destroy();
      }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionError()
    {
      $this->layout = 'login_layout.php';
      return $this->render('error');
      // die('ok');
  
    }



    
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


    public function actionProfil(){
        $userCode = Yii::$app->mainClass->getUser();
        $infousers = yii::$app->mainClass->getuniquedata('ste.utilisateur', $userCode);
        if (Yii::$app->request->isPost) {

            $photo =$_POST['avatar_remove'];
            if ($_POST['photo'] != null) {
              $uploadFile = $_POST['photo'];
              $link_to_upload = Yii::$app->params["linkToUploadIndividusProfil"];
              // yii::$app->request->baseUrl. '/web/mainAssets/media/auth/bg/auth-bg.png'
              $file_uni_name = Yii::$app->fileuploadClass->upload_image64($link_to_upload, $uploadFile);
              if ($file_uni_name != null) {
                $photo = $file_uni_name;
              }
            }
      
            
            if(empty($_POST['newpassword']) ){
                $modepasse =$infousers['motpasse'] ;
            }else{
                	// PREPARE MOT PASSE A ANALYSER
				$motpass_constitue = $infousers['identifiant'].Yii::$app->params['key_connector']. $_POST['currentpassword']; 

                // RASSURER QUE MOT PASS EST CORRECT
            $veraciteMot_passe = Yii::$app->cryptoClass->validate_password($motpass_constitue, $infousers['motpasse']); 
                if(!$veraciteMot_passe || ($_POST['newpassword'] != $_POST['confirmpassword'])){
                    $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['attention'], yii::t('app', 'motsdepassedifferent'));
                Yii::$app->session->setFlash('flashmsg', $notification);
                return $this->redirect(Yii::$app->request->referrer); 
                }
                $modepasse = Yii::$app->accessClass->create_pass($infousers['identifiant'], $_POST['newpassword']);
            }
            $request=$_POST;
            // $request['']
            yii::$app->clientClass->updateClient($_POST['nom'],$_POST['prenom'],$_POST['email'],$modepasse,$photo,$userCode);
            $notification = yii::$app->nonSqlClass->afficherNofitication(yii::$app->params['information'], yii::t('app', 'enrgSuccess'));
            Yii::$app->session->setFlash('flashmsg', $notification);
            return $this->redirect(Yii::$app->request->referrer);
          }

        return $this->render('profil', ['infousers' => $infousers]);
    }
}
