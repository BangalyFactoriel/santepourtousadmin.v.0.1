<?php
// die(var_dump($_POST));
if (is_array($listeuser) && sizeof($listeuser) > 0) {
    foreach ($listeuser as $key => $data) {

		$typeuser = yii::$app->mainClass->getuniquedata('ste.groupe_utilisateurs', $data['codegroupe']);
		$libtype = (($typeuser) ? $typeuser['libelle'] : '');
	//  die(var_dump($data['code']));
       
		if($data['etat']==1){
			$etat = '<span class="badge badge-success">' . Yii::t("app", "actif") . '</span>';
		}else{
			$etat = '<span class="badge badge-warning">' . Yii::t("app", "non actif") . '</span>';
		}

        $key2 = $key + 1;
        echo '
            <tr>
                <td>' . $key2 . '</td>
				<td>' . $data["prenom"] . ' ' . $data["nom"] . '</td>
                <td>' . $data["email"] . '</td>
                <td>' .$libtype. '</td>
                <td>' .$etat. '</td>
				<td>
                <a href="javascript:;" Class="btn btn-circle btn-primary " onClick="$(\'#action_key\').val(\'' . md5('utilisateur_adduser') . '\');$(\'#nomUpdate\').val(\''.$data["nom"].'\');$(\'#typeusersupdate\').val(\''.$data['codegroupe'].'\'); $(\'#prenomUpdate\').val(\'' . ($data["prenom"]) . '\');$(\'#statutCatUpdate\').val(\'' . $data["statut"] . '\'); $(\'.action_on_this\').val(\''.$data["code"].'\'); $(\'#kt_modal_edit_user_scroll\').modal(\'show\');"><i class="fa fa-indent"></i>&nbsp;' . Yii::t("app", "edit") . '</a>
                </td>
               
                
            </tr>
            ';
    }
}
?>