<?php
namespace app\components;

use Yii;
use yii\base\component;
use yii\web\Controller;
use yii\base\InvalidConfigException;


class utilisateurClass extends Component
{


    public $connect = Null;

    public function __construct()
    {
        $this->connect = \Yii::$app->db;
    }


    // requette d'insertion de utilisateur

    public function addUsers($code, $nom, $prenom, $email, $motpasse, $codegroupe, $codeuser,$identifiant)
    {
      $motpasse = Yii::$app->accessClass->create_pass($identifiant, $motpasse);


        try {
            $req = $this->connect->createCommand('INSERT INTO ste.utilisateur(code,nom, prenom, email, motpasse, codegroupe,codeuser,identifiant)
        	VALUES (:code,:nom, :prenom, :email, :motpasse, :codegroupe, :codeuser,:identifiant)')
          ->bindValues([':code'=>$code,':nom'=>$nom,'prenom'=>$prenom, ':email'=>$email,':motpasse'=>$motpasse,'codegroupe'=>$codegroupe, ':codeuser'=>$codeuser,':identifiant'=>$identifiant])
          ->execute();

        } catch (\Throwable $th) {
            return ($th->getMessage());
        }

    }

    // ajout d'un utilisateur en attente
    
    public function addUserAttente($code, $nom, $prenom,$email,$groupe)
  {
    try {
      $query = $this->connect->createCommand("INSERT INTO ste.user_attente(code, nom, prenom, email,lien,date) 
        VALUES (:code, :nom,:prenom,:email,:lien,:date)")
        ->bindValues([':code' => $code, ':nom' => $nom, ':prenom' => $prenom, ':email' => $email,':lien' => $groupe,':date' => date('Y-m-d')])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }


  }


  public function listeUser()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM ste.utilisateur WHERE  statut=1 ')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }


  public function updateuser($typeuser, $statut, $code)
  {
   
    try {
      $query = $this->connect->createCommand('UPDATE ste.utilisateur
        SET  codegroupe=:codegroupe,statut=:statut
        where code=:code ')
        ->bindValues([':codegroupe' => $typeuser,':statut' => $statut, ':code' => $code])
        ->execute();
      // die($action);

    } catch (\PDOException $ex) {
      die($ex->getMessage());
    }
  }

  public function searchUsers($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM ste.utilisateur where 
         	(utilisateur.nom like :donnerechercher
          or utilisateur.prenom like :donnerechercher)
                ORDER BY utilisateur.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }










    /********************************************************************groupe utilisateur */

    // ajouter un groupeuser
    public function addgroupeUser($code, $libelle, $action, $codeuser)
  {
    try {
      $query = $this->connect->createCommand("INSERT INTO ste.groupe_utilisateurs(code, libelle,action,codeuser,dateajout) 
        VALUES (:code, :libelle,:action,:codeuser,:dateajout)")
        ->bindValues([':code' => $code, ':libelle' => $libelle, ':action' => $action, ':codeuser' => $codeuser,':dateajout' => date('Y-m-d')])
        ->execute();
    } catch (\Throwable $th) {
      die($th->getMessage());
    }


  }

  //liste groupeusr
  public function listegroupeUser()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM ste.groupe_utilisateurs WHERE  statut=1 ')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  // modifier un groupe d'utiisateur
  public function updategroupeuser($nomgroupe, $typeuser, $action = '')
  {
   
    try {
      $query = $this->connect->createCommand('UPDATE ste.groupe_utilisateurs
        SET  action=:action,libelle=:libelle
        where code=:code ')
        ->bindValues([':code' => $typeuser, ':action' => $action, ':libelle' => $nomgroupe])
        ->execute();
      // die($action);

    } catch (\PDOException $ex) {
      die($ex->getMessage());
    }
  }


  // filtrer un groupe d'utilisateur
  public function searchgroupeuser($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM ste.groupe_utilisateurs where 
         	(groupe_utilisateurs.libelle like :donnerechercher
                )
                ORDER BY groupe_utilisateurs.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }



}

