<?php
namespace app\components;

use Yii;
use yii\base\component;
use yii\web\Controller;
use yii\base\InvalidConfigException;


class authorClass extends Component
{
  public $connect = Null;

  public function __construct()
  {
    $this->connect = \Yii::$app->db;
  }



  public function getRealLimit($limit)
  {
    $rLimit = Null;
    if (isset($limit)) {
      switch ($limit) {
        case 1:
          $rLimit = 10;
          break;
        case 2:
          $rLimit = 20;
          break;
        case 3:
          $rLimit = 30;
          break;
        case 4:
          $rLimit = 40;
          break;
        case 5:
          $rLimit = 50;
          break;
        case 10:
          $rLimit = 10000;
          break;
      }
    }
    return $rLimit;
  }




  /*********************************************************************************************
   *                              CRUD  AUTHOR
   * *******************************************************************************************
   */


  public function addAuthor($code, $nom, $prenom, $tel, $codeusers)
  {
    try {
      $req = $this->connect->createCommand('INSERT INTO ste.auteur(code, nom, prenom, tel, codeusers)
                   VALUES (:code,:nom,:prenom,:tel,:codeusers)')
        ->bindValues([':code' => $code, ':nom' => $nom, ':prenom' => $prenom, ':tel' => $tel, ':codeusers' => $codeusers])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

 public function searchforfiltre($table,$donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->authorClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM '.$table.' where 
         	(tel like :donnerechercher)
          and statut=:statut
                ORDER BY id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%',':statut'=>'1'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }

  public function updateAuthor($code, $nom, $prenom, $tel, $statut)
  { 
    try {
      $req = $this->connect->createCommand('UPDATE ste.auteur
       SET  nom=:nom, prenom=:prenom, tel=:tel, statut=:statut
       WHERE  code=:code')
        ->bindValues([':code' => $code, ':nom' => $nom, ':prenom' => $prenom, ':tel' => $tel, ':statut' => $statut])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }
}