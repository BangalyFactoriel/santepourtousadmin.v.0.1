<?php
if (isset($reference) && sizeof($reference) > 0) {
    foreach ($reference as $key => $data) {
        $key2 = $key + 1;
// die(var_dump($data));

        echo '
            <tr>
                <td>' . $key2 . '</td>
             
                <td>' . $data["libelle"] . '</td>
                <td>' . $data["description"] . '</td>
                <td>
                <a href="javascript:;" Class="btn btn-circle btn-primary " onClick="$(\'#action_on_thisupdate\').val(\'' . md5('catalog_updateCat') . '\');$(\'#labelFieldupdate\').val(\'' . $data["libelle"] . '\'); $(\'#descriptionFieldupdate\').val(\'' . ($data["description"]) . '\'); $(\'#statutCatUpdate\').val(\'' . $data["statut"] . '\'); $(\'#action_on_thisupdate\').val(\''.$data["code"].'\'); $(\'#modalupdate\').modal(\'show\');"><i class="fa fa-indent"></i>' . Yii::t("app", "edit") . '</a>
                </td>
            </tr>
            ';
    }
}
?>



