<?php

namespace app\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;


// use yii\filters\VerbFilter;
// use app\models\RgUsrInfo;

class AuthController extends Controller {
	public $request;
	public $cruizer = false;

	public function __construct(){
		$cruizer = true;
	}

	public static function store_auth($code=Null, $identifiant=Null ,$typeUser=Null){

	

		$userAuthDtlsArray = ['userCode'=>$code];
			
		$salt = Yii::$app->nonSqlClass->generateUniq();

		Yii::$app->session[Yii::$app->params['userSession']] = serialize($userAuthDtlsArray);

		$userSession = unserialize(Yii::$app->session[Yii::$app->params['userSession']]);
		Yii::$app->session['token'] = base64_encode(md5($identifiant.Yii::$app->params['key_connector'].$salt));

			//Mettre à jour le salt dans la base de données
		Yii::$app->accessClass->mettreStatPresenceSaltAJour($salt, $code);
		return true;
	}

	private static function compareDateToToday($dte_in_string){
		$cmparer = Null;
		$dteJour = date('Y-m-d');
		$data = explode('-',$dteJour);
		$dtetoday = $data['0'].$data['1'].$data['2'];
		$licencedate = base64_decode($dte_in_string);
		if($dtetoday >= $licencedate){
			$cmparer = '2692';
		}
		return $cmparer;
	}

	public static function UserAuthDtls($identifiant,$motPass){
		$vraisMotPass = false;
		$dteJour = date('Y-m-d');
		$estPermit = false;
		$connection = \Yii::$app->db;


		if(!empty($identifiant)){

			$auth = Yii::$app->mainClass->demarrer_auth($identifiant);
			// die(var_dump($auth));
			
			if(!is_array($auth) OR $auth==false){ # MEANING ,NO RECORD MATCHES THE userName SERCHED
				return 22;
			}else{

				// $pswrd = Yii::$app->accessClass->create_pass($identifiant, $motPass);
				// die(var_dump($pswrd));

					// PREPARE MOT PASSE A ANALYSER
				$motPass_constitue = $identifiant.Yii::$app->params['key_connector'].$motPass; 
				
					// RASSURER QUE MOT PASS EST CORRECT
				$veraciteMot_passe = Yii::$app->cryptoClass->validate_password($motPass_constitue, $auth['motpasse']); 
				
				switch ($veraciteMot_passe) {

						// Mot de passe est correct
					case true:
					case 1: 
					
							// Demarrer l'enregistrement des datas
						$storageProcess = AuthController::store_auth($auth['code'],$auth['identifiant'], $auth['codegroupe']);
						switch ($storageProcess) {
							case true:
							case 1:
								//if(Yii::$app->mainClass->creerEvent('001','CONNEXION REUSSIE')) {
									return 'success';
								//}
							break;

							default:
								return 22;
							break;
						}
					break;

						// Mot de passe est incorrect
					default:
						//die(var_dump(Yii::$app->accessClass->create_pass($auth['identifiant'], $motPass)));
						return 22;
					break;
				}
				// die(var_dump('Ooops'));
			}
		} else { 
			return false; 
		}
	}

	#****************************************************
	# AUTHENTIFICATION DES UTILISATEURS
	#****************************************************
	public static function Authentifcation(){
		// START : DECLARE VARIABLES
		$cruizer = true;
		$session = null;
		// END : DECLARE VARIABLES

		$request = Yii::$app->request;
		$userName = $request->post('username');
		$motPass = $request->post('password');
		$sugarpot = $request->post('sugarpot');
		$token = isset($session['token']) ? $session['token'] : ''; 

		# GET THE VALUE OF THE TOKEN PREVIOUSLY SET
		if(!empty($token) ){ # WE CHEQUE IF TOKEN HAS BEEN SET
			if($usr_confirmed){
				if(Yii::$app->mainClass->validiteToken($token)){
					return 'success';
				}else{
					return 22; # INVALIDE AUTHENTIFICATION
				}
			}else{return $usr_confirmed;}
		}

		if($userName == Null || $motPass == Null){ // ICHECK IF ONE FIELD IS EMPTY OR NOT
			return 11;
		}

		if(!empty($sugarpot) OR $sugarpot!=""){
			return 12;
		}

		if($cruizer){ // WE CONFIRM THE userName
			$UserAuthDtls = AuthController::UserAuthDtls($userName, $motPass);
			return $UserAuthDtls;
		}
	}

}
