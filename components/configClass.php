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
        ->bindValue(':code',$code)
        ->queryOne();
      return $query;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }


  }

}