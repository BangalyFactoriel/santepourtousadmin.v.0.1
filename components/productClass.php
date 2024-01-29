<?php
namespace app\components;

use Yii;
use yii\base\component;
use yii\web\Controller;
use yii\base\InvalidConfigException;


class ProductClass extends Component
{

  public $connect = Null;

  public function __construct()
  {
    $this->connect = \Yii::$app->db;
  }


  // fonction pour les limites 
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



  // requette de detail du product:



  // requette qui permet d'ajouter un produit
  public function addproduct($libelle, $prix, $desctiption, $photo, $dateajout, $photo2, $code, $cdegroupe, $codecategorie,$fournisseur)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.produit(libelle, prixunitairevente, description, photo, dateajout, photo2,code, codegroupe, category,codefournisseur)
        	VALUES (:libelle,:prixunitairevente,:description,:photo,:dateajout, :photo2, :code,:codegroupe,:category,:codefournisseur);')
        ->bindValues([':libelle' => $libelle, ':prixunitairevente' => $prix, ':description' => $desctiption, 'photo' => $photo, 'dateajout' => $dateajout, ':photo2' => $photo2, ':code' => $code, ':codegroupe' => $cdegroupe, ':category' => $codecategorie,':codefournisseur'=>$fournisseur])
        ->execute();

    } catch (\Throwable $th) {
        die($th->getMessage());
    }

  }

  // requette  pour modifier un produit
  public function updateProduct($photo, $libelle, $categoryId, $groupId, $prixUnitaireVente, $dateexp, $fournisseur, $description, $codeproduit,$photo2)
  {
    $rslt = false;

    try {
      $updateCodeStmt = $this->connect->createCommand('UPDATE icopub.produit SET photo=:photo, libelle =:libelle, category=:categoryId, codegroupe=:groupId, prixunitairevente=:prixunitairevente,dateajout=:dateexp,photo2=:photo2,description=:description,codefournisseur=:codefournisseur WHERE code=:code')
        ->bindValues([':photo' => $photo, ':libelle' => $libelle, ':categoryId' => $categoryId, ':groupId' => $groupId, ':prixunitairevente' => $prixUnitaireVente, ':dateexp' => $dateexp, ':photo2' => $photo2, ':description' => $description, ':code' => $codeproduit,':codefournisseur'=>$fournisseur])
        ->execute();
      if (isset($updateCodeStmt)) {
        $rslt = true;
      }
      return $rslt;

    } catch (\Throwable $th) {
      return ($th->getMessage());
    }

  }

  // requette de la rechrche du produit

  public function searchProduct($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.produit where 
         	(produit.libelle like :donnerechercher
                or produit.description like :donnerechercher)
                ORDER BY produit.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }








  public function addrefproduit($code, $idprod, $idref, $contenue)
  {
    $query = null;
    $id = '19';
    try {
      $insertStmt = $this->connect->createCommand('INSERT INTO  icopub.reference_produit (code,codeprod, coderef, contenue) VALUES (:code,:idprod, :idref, :contenue)')
        ->bindValues(['code' => $code, ':idprod' => $idprod, ':idref' => $idref, ':contenue' => $contenue])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }


  // liste refproduit
  public function listerefproduit($codeprod)
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.reference_produit WHERE  statut=1
      and  codeprod=:codeprod ORDER BY id DESC')
       ->bindValue(':codeprod', $codeprod)
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }
  public function listfournisseur()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.fournisseur WHERE  statut=1
        ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  // update product_ref

  public function updaterefproduct($codeprod, $coderef, $contenue, $action_on_this)
  {
    $rslt = Null;
    if (isset($action_on_this)) {
      $req = $this->connect->createCommand('UPDATE icopub.reference_produit SET codeprod=:codeprod, coderef=:coderef,contenue=:contenue WHERE code=:code')
        ->bindValues([':codeprod' => $codeprod, ':coderef' => $coderef, ':contenue' => $contenue, ':code' => $action_on_this])
        ->execute();
      if ($req) {
        $rslt = '2692';
      }
    }
    return $rslt;
  }

// requette detail produit
  public function detailproduct($code)
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.produit WHERE  statut=1
      and code=:code ORDER BY id DESC')
       ->bindValue(':code',$code)
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }



  public function listeproduct()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.produit WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }









  /* *************************************************************************************************************
                              FONCTION DE GROUPE DE PRODUIT
  ***************************************************************************************************************/

  // fonction d'ajouter un groupe de produit
  public function addGroupe($code, $productGroupName, $productGroupDesc)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.groupe (code,libelle, description) VALUES (:code,:libelle, :description)')
        ->bindValues(['code' => $code, ':libelle' => $productGroupName, ':description' => $productGroupDesc])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }


  // fonction de modifier un groupe de produit
  public function updateProductgroup($libelle, $desctiption, $statut, $action_on_this)
  {
    $rslt = Null;
    if (isset($action_on_this)) {
      $req = $this->connect->createCommand('UPDATE icopub.groupe SET libelle=:libelle, description=:description,statut=:statut WHERE code=:code')
        ->bindValues([':libelle' => $libelle, ':description' => $desctiption, ':statut' => $statut, ':code' => $action_on_this])
        ->execute();
      if ($req) {
        $rslt = '2692';
      }
    }
    return $rslt;
  }


  // fonction  d'afficher la liste de groupe de produit
  public function listeGroupe()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.groupe WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }


  // fonction qui permet d'obtenir le libelle du groupe
  public function getgroupelibelle($grp)
  {
    $groupe = Null;
    $req = $this->connect->createCommand('SELECT libelle FROM icopub.groupe WHERE code=:id')
      ->bindValue(':id', $grp)
      ->queryOne();
    if (is_array($req) && sizeof($req) > 0) {
      $groupe = $req['libelle'];
    } else {
      if ($grp == '0') {
        $groupe = Yii::t('app', 'fournisord');
      }
    }
    return $groupe;
  }



  // fonction de recherche d'un groupe
  public function searchgroupe($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.groupe where 
         	(groupe.libelle like :donnerechercher
                or groupe.description like :donnerechercher)
                ORDER BY groupe.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }


  /* *************************************************************************************************************
                              FONCTION DE CATEGORIE DE PRODUIT
  ***************************************************************************************************************/

  // fonction qui permet d'obtenir le libelle de la categorie
  public function getcategorielibelle($cat)
  {
    $categorie = Null;
    $req = $this->connect->createCommand('SELECT libelle FROM icopub.categorie WHERE code=:id')
      ->bindValue(':id', $cat)
      ->queryOne();
    if (is_array($req) && sizeof($req) > 0) {
      $categorie = $req['libelle'];
    } else {
      if ($cat == '0') {
        $categorie = Yii::t('app', 'fournisord');
      }
    }
    return $categorie;
  }

  // fonction d'ajouter un groupe de produit
  public function addCategorie($code, $productGroupName, $productGroupDesc, $photo)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.categorie (code,libelle, description,photo) VALUES (:code,:libelle, :description, :photo)')
        ->bindValues(['code' => $code, ':libelle' => $productGroupName, ':description' => $productGroupDesc, ':photo' => $photo])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }


  public function addCategoriesecond($code, $productGroupName, $productGroupDesc)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.categorie (code,libelle, description) VALUES (:code,:libelle, :description)')
        ->bindValues(['code' => $code, ':libelle' => $productGroupName, ':description' => $productGroupDesc])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }




  public function listeCategorie()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.categorie WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  public function listeCategoriesecond()
  {
    try {
      $req = $this->connect->createCommand('SELECT  libelle,code, description FROM icopub.categorie WHERE statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }



  // fonction de recherche d'une categorie
  public function searchcategorie($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.categorie where 
         	(categorie.libelle like :donnerechercher
                or categorie.description like :donnerechercher)
                ORDER BY categorie.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }



  public function searchcategories($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.categorie where 
         	(categorie.libelle like :donnerechercher
                or categorie.description like :donnerechercher)
                ORDER BY categorie.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }

  public function updateCategorie($libelle, $desctiption, $statut, $photo, $action_on_this)
  {
    $rslt = Null;

    try {

      if (isset($action_on_this)) {
        $req = $this->connect->createCommand('UPDATE icopub.categorie SET libelle=:libelle, description=:description,statut=:statut,photo=:photo WHERE code=:code')
          ->bindValues([':libelle' => $libelle, ':description' => $desctiption, ':statut' => $statut, ':photo' => $photo, ':code' => $action_on_this])
          ->execute();
        if ($req) {
          $rslt = '2692';
        }
      }
      return $rslt;
    } catch (\Throwable $th) {
      //throw $th;
    }

  }

  /* *************************************************************************************************************
                               FONCTION DE LA REFERENCE
   ***************************************************************************************************************/


  // fonction d'ajouter une reference de produit
  public function addRef($code, $productRefName, $productRefDesc)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.reference (code,libelle, description) VALUES (:code,:libelle, :description)')
        ->bindValues(['code' => $code, ':libelle' => $productRefName, ':description' => $productRefDesc])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }


  // fonction de modifier un reference de produit
  public function updateProductref($libelle, $desctiption, $statut, $action_on_this)
  {
    $rslt = Null;
    if (isset($action_on_this)) {
      $req = $this->connect->createCommand('UPDATE icopub.reference SET libelle=:libelle, description=:description,statut=:statut WHERE code=:code')
        ->bindValues([':libelle' => $libelle, ':description' => $desctiption, ':statut' => $statut, ':code' => $action_on_this])
        ->execute();
      if ($req) {
        $rslt = '2692';
      }
    }
    return $rslt;
  }


  //fonction pour selectionner les  blog
  public function listblog()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.blog WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }


  // fonction  d'afficher la liste de reference de produit
  public function listeRef()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.reference WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  // fonction de recherche d'une reference
  public function searchref($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.reference where 
         	(reference.libelle like :donnerechercher
                or reference.description like :donnerechercher)
                ORDER BY reference.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }


  // fonction qui permet d'obtenir le libelle du reference
  public function getReferencelibelle($grp)
  {
    $groupe = Null;
    $req = $this->connect->createCommand('SELECT libelle FROM icopub.reference WHERE code=:id')
      ->bindValue(':id', $grp)
      ->queryOne();
    if (is_array($req) && sizeof($req) > 0) {
      $groupe = $req['libelle'];
    } else {
      if ($grp == '0') {
        $groupe = Yii::t('app', 'fournisord');
      }
    }
    return $groupe;
  }


  /* *************************************************************************************************************
                               FONCTION DU BANNER
   ***************************************************************************************************************/


    // fonction qui permet d'obtenir le libelle du groupe
  public function getBannerlibelle($grp)
  {
    $groupe = Null;
    $req = $this->connect->createCommand('SELECT libelle FROM icopub.banner WHERE code=:id')
      ->bindValue(':id', $grp)
      ->queryOne();
    if (is_array($req) && sizeof($req) > 0) {
      $groupe = $req['libelle'];
    } else {
      if ($grp == '0') {
        $groupe = Yii::t('app', 'fournisord');
      }
    }
    return $groupe;
  }

  // fonction d'ajouter le banner de produit
  public function addBanner($code, $productBanerName, $titre, $soustitre, $photo,$rang,$color)
  {

    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.banner (code,libelle, titre,sous_titre,photo,rang,color) VALUES (:code,:libelle, :titre, :soustitre,:photo,:rang,:color)')
        ->bindValues(['code' => $code, ':libelle' => $productBanerName, ':titre' => $titre, 'soustitre' => $soustitre, 'photo' => $photo,':rang'=>$rang,':color'=>$color])
        ->execute();
    } catch (\PDOException $ex) {
      return $ex->getMessage();
    }
  }

  // fonction de modifier du banner de produit

  public function updateProductbanner($libelle, $titre, $soustitre, $photo, $statut, $action_on_this, $rang,$color)
  {

    try {
      $rslt = Null;
      if (isset($action_on_this)) {
        $req = $this->connect->createCommand('UPDATE icopub.banner SET libelle=:libelle, titre=:titre,sous_titre=:soustitre,photo=:photo,statut=:statut,rang=:rang,color=:color WHERE code=:code')
          ->bindValues([':libelle' => $libelle, ':titre' => $titre, ':soustitre' => $soustitre, ':photo' => $photo, ':statut' => $statut, ':code' => $action_on_this,':rang'=>$rang,':color'=>$color])
          ->execute();
        if ($req) {
          $rslt = '2692';
        }
      }
      return $rslt;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }


  
  public function updatestatut($rang)
  {

    try {
      $rslt = Null;
        $req = $this->connect->createCommand('UPDATE icopub.banner SET  rang=:rang WHERE rang=:rangupdate')
          ->bindValues([':rang'=>'0',':rangupdate'=>$rang])
          ->execute();
       
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  // fonction d'afficher
  public function listeBanner()
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.banner WHERE  statut=1 ORDER BY id DESC')
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

  }

  public function searchbanner($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.banner where 
         	(banner.libelle like :donnerechercher
                or banner.titre like :donnerechercher)
                ORDER BY banner.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }







  public function listeproductupdate($productId)
  {
    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.produit WHERE icopub.produit.code =:slimproductid')
        ->bindValue(':slimproductid', $productId)
        ->queryOne();
      return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public function searchfournisseur($donneeRecherche = '', $limit = '1')
  {
    $query = null;

    $limit = Yii::$app->productClass->getRealLimit($limit);
    if (isset($limit) && $limit > 0) {
      $limit = 'LIMIT ' . $limit;
    }

    try {
      $req = $this->connect->createCommand('SELECT * FROM icopub.fournisseur where 
         	(raisonsocial like :donnerechercher
                or email like :donnerechercher
                or telephone like :donnerechercher
                or adresse like :donnerechercher)
                ORDER BY fournisseur.id desc ' . $limit)

        ->bindValues([':donnerechercher' => '%' . $donneeRecherche . '%'])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }

  }




  //autre requet
  public function addpfournisseur($code,$raisonsocial,$email,$telephone,$adresse)
  {
    try {
      $req = $this->connect->createCommand('INSERT INTO icopub.fournisseur(
        code, raisonsocial, email, telephone, adresse, statut)
        VALUES (:code,:raisonsocial,:email,:telephone,:adresse, :statut)')
        ->bindValues([':code'=>$code,':raisonsocial'=>$raisonsocial,':email'=>$email,':telephone'=>$telephone,':adresse'=>$adresse,':statut'=>'1'])
        ->execute();
        return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }


  public function updatefournisseur($code,$raisonsocial,$email,$telephone,$adresse)
  {
    try {
      $req = $this->connect->createCommand('UPDATE  icopub.fournisseur SET  raisonsocial=:raisonsocial, email=:email, telephone=:telephone, adresse=:adresse WHERE code=:code')
        ->bindValues([':code'=>$code,':raisonsocial'=>$raisonsocial,':email'=>$email,':telephone'=>$telephone,':adresse'=>$adresse])
        ->execute();
        return $req;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }


  public function updateentite($denomination,$adresse,$email,$logo,$tel,$historique)
  {
    try {
      $req = $this->connect->createCommand('UPDATE  icopub.entite SET  denomination=:denomination, adresse=:adresse, email=:email, logo=:logo, tel=:tel,historique=:historique')
        ->bindValues([':denomination'=>$denomination,':adresse'=>$adresse,':email'=>$email,':logo'=>$logo,':tel'=>$tel,':historique'=>$historique])
        ->execute();
        return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }




  //statistique acceuil

  public function countarticle(){
    try {
      $req = $this->connect->createCommand('SELECT count(*) as totalarticle FROM icopub.produit where statut=:statut ')
        ->bindValue(':statut','1')
        ->queryOne();
        if($req) return $req['totalarticle'];
        return 0;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

  public function countclient(){
    try {
      $req = $this->connect->createCommand('SELECT count(*) as totalarticle FROM icopub.client where statut=:statut ')
        ->bindValue(':statut','1')
        ->queryOne();
        if($req) return $req['totalarticle'];
        return 0;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

  public function countlikes(){
    try {
      $req = $this->connect->createCommand('SELECT count(*) as totalarticle FROM icopub.lien_like_produit where statut=:statut ')
        ->bindValue(':statut','1')
        ->queryOne();
        if($req) return $req['totalarticle'];
        return 0;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

  public function countcomment(){
    try {
      $req = $this->connect->createCommand('SELECT count(*) as totalarticle FROM icopub.lien_comentaire_produit    where statut=:statut ')
        ->bindValue(':statut','1')
        ->queryOne();
        if($req) return $req['totalarticle'];
        return 0;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  } 



  public function selecttopproduit($limit = 10)
  {

    try {
      $req = $this->connect->createCommand('SELECT count(lien_like_produit.id) as totallike,codeproduit FROM icopub.lien_like_produit,icopub.produit
          where produit.code = lien_like_produit.codeproduit
          and produit.statut =:statut
          group by codeproduit order by count(lien_like_produit.id) desc limit :limite')
        ->bindValues([':statut' => '1', 'limite' => $limit])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }


  //top 10 fournisseurs en ce basant sur le nombre de like de leurs produits 

  public function topfournissuer($limit = 10)
  {

    try {
      $req = $this->connect->createCommand('SELECT count(lien_like_produit.id) as totallike,codefournisseur FROM icopub.lien_like_produit,icopub.produit
          where produit.code = lien_like_produit.codeproduit
          and produit.statut =:statut
          group by codefournisseur order by count(lien_like_produit.id) desc limit :limite')
        ->bindValues([':statut' => '1', 'limite' => $limit])
        ->queryAll();
      return $req;
    } catch (\Throwable $th) {
      die($th->getMessage());
    }
  }

}