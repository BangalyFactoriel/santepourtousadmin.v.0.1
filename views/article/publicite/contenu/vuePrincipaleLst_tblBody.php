<?php
// die(var_dump($_POST));
if (isset($publlicite) && sizeof($publlicite) > 0) {
    foreach ($publlicite as $key => $data) {
        $key2 = $key + 1;
        // die(var_dump($data));
        switch ($data['positionnement']) {
            case '1':
                $posi = 'haut';
                break;
            case '2':
                $posi = 'Milieu';
                break;
            case '3':
                $posi = 'Bas';
                break;

            default:
                $posi = '';

                break;
        }
        echo '
            <tr>
                <td>' . $key2 . '</td>
                <td>
                <div class="symbol symbol-65px symbol-circle mb-2 ">
                    <img src="' . yii::$app->request->baseUrl . '/web/assets/media/uploads/photo/' . $data['photo'] . '" alt="" style=" padding-lef:40%">
                    <div class="bg-succes position-absolute  rounded-circle translate-middle start-100 top-100 border-4 border-bo"></div>
                    
                </div>
                </td>
                <td>' . $data["titre"] . '</td>
                <td>' . $posi . '</td>
                <td>' . $data['datedebut'] . '</td>
                <td>' . $data['datefin'] . '</td>
                <td>
                <a href="javascript:;" Class="btn btn-circle btn-primary " onClick="updatebackground(\'' . yii::$app->request->baseUrl . '/web/assets/media/uploads/photo/' . $data['photo'] . '\');$(\'#action_key\').val(\'' . md5('catalog_updateCat') . '\');$(\'#avatar_removeupdateupdate\').val(\'' . $data['photo'] . '\');$(\'#productCatNameUpdate\').val(\'' . $data["titre"] . '\'); $(\'#productCatDescUpdate\').val(\'' . ($data["contenue"]) . '\'); $(\'#statutCatUpdate\').val(\'' . $data["statut"] . '\'); $(\'.action_on_this\').val(\'' . $data["code"] . '\'); $(\'#updatepublicite\').modal(\'show\');"><i class="fa fa-indent"></i>' . Yii::t("app", "edit") . '</a>
                </td>
            </tr>
            ';
    }
}
?>



<script>
    function updatebackground(photo) {
        $("#imgbackground").css("background-image", "url(" + photo + ")");

    }
</script>