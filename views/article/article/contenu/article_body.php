<?php
        // die(var_dump($aricle));

if (isset($aricle) && sizeof($aricle) > 0) {
    foreach ($aricle as $key => $data) {
        $key2 = $key + 1;
        $aut = Yii::$app->mainClass->databycode('ste.auteur', $data['codeauter'], 'code');
        $cat = Yii::$app->mainClass->databycode('ste.categorie', $data['codecategorie'], 'code');
        $infocat =(sizeof($cat) > 0)  ? $cat['0']['libelle'] : '';

        $infoauteur =(sizeof($aut) > 0)  ? $aut['0']['nom'] .' '.$aut['0']['prenom'] : '';
        echo '
            <tr>
                <td>' . $key2 . '</td>
                
                
                <td>' . $data["titre"] . '</td>
                <td>' . $data["contenue"] . '</td>
                <td>' . $data["datepublication"] . '</td>
                <td>' . $infocat. '</td>
                <td>' . $infoauteur. '</td>
                <td>
                <a href="javascript:;"Class="btn btn-circle btn-primary " onClick="$(\'#action_on_this_update\').val(\'' . $data["code"] . '\'); $(\'#updateAuthor\').modal(\'show\');"><i class="fa fa-edit"></i>' . Yii::t("app", "edit") . '</a>
                </td>
            </tr>
            ';
    }
}
?>
<script>
    console.log('teste js')
</script>