<?php
namespace app\components;

use Yii;
use yii\base\component;
use yii\web\Controller;
use yii\base\InvalidConfigException;


class articleClass extends Component
{
  public $connect = Null;

  public function __construct()
  {
    $this->connect = \Yii::$app->db;
  }


  /*********************************************************************************************
   *                              CRUDE  CATEGORIE
   * *******************************************************************************************
   */
  public function addCategorie($code, $libelle, $photo, $codeuses, $description)
  {
    try {
      $req = $this->connect->createCommand('INSERT INTO ste.categorie(
                  code, libelle, photo, codeuses, dateajout, description)
                  VALUES (:code, :libelle, :photo, :codeuses, :dateajout, :description) ')
        ->bindValues([':code' => $code, ':libelle' => $libelle, ':photo' => $photo, ':codeuses' => $codeuses, ':dateajout' => date('Y-m-d'), ':description' => $description])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

  //update categorie
  public function updateCategorie($code, $libelle, $photo, $statut, $description)
  {
    try {
      $req = $this->connect->createCommand('UPDATE ste.categorie
                SET   libelle=:libelle, photo=:photo,statut=:statut, description=:description
                WHERE code=:code')
        ->bindValues([':code' => $code, ':libelle' => $libelle, ':photo' => $photo, ':statut' => $statut, ':description' => $description])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }



  /*********************************************************************************************
   *                              CRUDE  REFERENCE
   * *******************************************************************************************
   */


  public function addreference($code, $libelle, $codeuses, $description)
  {
    try {
      $req = $this->connect->createCommand('INSERT INTO ste.reference(code, libelle, codeuser, description)
                   VALUES (:code,:libelle,:codeuser,:description) ')
        ->bindValues([':code' => $code, ':libelle' => $libelle, ':codeuser' => $codeuses, ':description' => $description])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

  public function updatereference($code, $libelle, $statut, $description)
  { 
    try {
      $req = $this->connect->createCommand('UPDATE ste.reference
       SET  libelle=:libelle, statut=:statut, description=:description
       WHERE  code=:code')
        ->bindValues([':code' => $code, ':libelle' => $libelle, ':statut' => $statut, ':description' => $description])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }



    /*********************************************************************************************
   *                              CRUDE  PUBLICITE
   * *******************************************************************************************
   */

   public function addpublicites($code, $titre,$contenue ,$codeuses, $datedebut,$datefin,$photo,$positionnement)
   {
     try {
       $req = $this->connect->createCommand('INSERT INTO ste.publicites(code, titre, contenue, datedebut, datefin, positionnement, codeusers, photo)
                    VALUES (:code,:titre, :contenue, :datedebut, :datefin, :positionnement,:codeusers, :photo) ')
         ->bindValues([':code' => $code, ':titre' => $titre,':contenue'=>$contenue ,':codeusers' => $codeuses, ':datedebut' => $datedebut,':datefin'=>$datefin,':photo'=>$photo,':positionnement'=>$positionnement])
         ->execute();
     } catch (\Throwable $th) {
       die($th->getMessage());
     }
   }

   public function updatepublicites($code, $titre,$contenue ,$statut, $datedebut,$datefin,$photo,$positionnement)
   {
     try {
       $req = $this->connect->createCommand('UPDATE ste.publicites
       SET  titre=:titre, contenue=:contenue, datedebut=:datedebut, datefin=:datefin, statut=:statut, positionnement=:positionnement, photo=:photo
       where  code=:code')
         ->bindValues([':code' => $code, ':titre' => $titre,':contenue'=>$contenue ,':statut' => $statut, ':datedebut' => $datedebut,':datefin'=>$datefin,':photo'=>$photo,':positionnement'=>$positionnement])
         ->execute();
     } catch (\Throwable $th) {
       die($th->getMessage());
     }
   }

     /*********************************************************************************************
   *                              CRUDE  ARTICLE
   * *******************************************************************************************
   */

   public function addArticle($code, $titre,$contenue ,$codeuses, $datepublication,$codeauter,$codecategorie,$codetype)
   {
     try {
       $req = $this->connect->createCommand('INSERT INTO ste.article(code, titre, contenue, datepublication, codeauter, codeuser, codecategorie, codetype)
        VALUES (:code, :titre, :contenue, :datepublication, :codeauter, :codeuser, :codecategorie, :codetype) ')
         ->bindValues([':code' => $code, ':titre' => $titre,':contenue'=>$contenue ,':codeuser' => $codeuses, ':datepublication' => $datepublication,':codeauter'=>$codeauter,':codecategorie'=>$codecategorie,':codetype'=>$codetype])
         ->execute();
     } catch (\Throwable $th) {
       die($th->getMessage());
     }
   }

}