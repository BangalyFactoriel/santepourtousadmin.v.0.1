<?php
namespace app\components;

use Yii;
use yii\base\component;
use yii\web\Controller;
use yii\base\InvalidConfigException;
use yii\filters\VerbFilter;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use infobip\api\client\SendSingleTextualSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;

class ConfigClass extends component
{

  public $connect = Null;

  public function __construct()
  {
    $this->connect = \Yii::$app->db;
  }

  public function verifiercode($code)
  {
    $query = null;
    try {
      $query = $this->connect->createCommand("SELECT * from ste.user_attente
                        where code=:code and date >= CURRENT_DATE - INTERVAL '3 days'
                               ")
        ->bindValue(':code', $code)
        ->queryOne();
      return $query;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }


  }


  public function updateinfo($nom, $prenom, $email, $photo, $userCode){
    try {
      $query = $this->connect->createCommand("UPDATE ste.utilisateur SET nom=:nom,prenom=:prenom,email=:email,photo=:photo
                        where code=:code")
        ->bindValues([':code'=> $userCode,':nom'=>$nom,':prenom'=>$prenom,'email'=>$email,':photo'=>$photo])
        ->execute();
      return $query;
    } catch (\Throwable $th) {
      die( $th->getMessage());
    }

  }


  public function updateentite($denomination,$adresse,$email,$logo,$tel,$historique)
  {
    try {
      $req = $this->connect->createCommand('UPDATE  ste.entite SET  denomination=:denomination, adresse=:adresse, email=:email, logo=:logo, tel=:tel,historique=:historique')
        ->bindValues([':denomination'=>$denomination,':adresse'=>$adresse,':email'=>$email,':logo'=>$logo,':tel'=>$tel,':historique'=>$historique])
        ->execute();
        return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }


  public function updateUsers($code, $identifiant, $motPass)
  {
    $query = null;

    $motPassCrypte = Yii::$app->accessClass->create_pass($identifiant, $motPass);

    try {
      $query = $this->connect->createCommand('UPDATE ste.utilisateur SET identifiant=:identifiant,motpasse=:motPass,userActif=:userActif WHERE code=:code ')
        ->bindValues([':code' => $code, ':identifiant' => $identifiant, ':motPass' => $motPassCrypte, 'userActif' => '1'])
        ->execute();
      return;
    } catch (\PDOException $ex) {

    }
  }


}