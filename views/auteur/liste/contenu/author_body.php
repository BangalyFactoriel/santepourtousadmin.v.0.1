<?php
// die(var_dump($_POST));
if (isset($authors) && sizeof($authors) > 0) {
    foreach ($authors as $key => $data) {
        $key2 = $key + 1;
        echo '
            <tr>
                <td>' . $key2 . '</td>
                
                
                <td>' . $data["nom"] . '</td>
                <td>' . $data["prenom"] . '</td>
                <td>' . $data["tel"] . '</td>
                <td>
                <a href="javascript:;"Class="btn btn-circle btn-primary " onClick="$(\'#action_on_this_update\').val(\'' . $data["code"] . '\');$(\'#action_key\').val(\'' . md5('updateAuthor') . '\');$(\'#nomUpdateField\').val(\'' . $data["nom"] . '\');$(\'#prenomUpdateField\').val(\'' . $data["prenom"] . '\'); $(\'#phoneUpdateField\').val(\'' . ($data["tel"]) . '\'); $(\'#statutAuthUpdate\').val(\'' . $data["statut"] . '\'); $(\'#updateAuthor\').modal(\'show\');"><i class="fa fa-edit"></i>' . Yii::t("app", "edit") . '</a>
                </td>
            </tr>
            ';
    }
}
?>
<script>
    console.log('teste js')
</script>