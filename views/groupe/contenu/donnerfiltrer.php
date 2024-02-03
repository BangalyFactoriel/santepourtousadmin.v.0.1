<?php 
if(isset($liste) && sizeof($liste)>0){
	$j = 0;
	foreach ($liste as $data) {
		$j = $j+1;

		$autBtn = '<a href="javascript:;" onclick="$(\'#action_on_this\').val(\''.$data['code'].'\');modifier(\''.$data['code'].'\');" Class="btn btn-circle btn-primary " data-bs-toggle="modal" data-bs-target="#modalupdate">'.Yii::t("app","Modifier").'</a>';
	 

		echo '
			<tr  class="fs-6">
			<td>'.$j.'</td>
			
	    		<td>'.$data["libelle"].'</td>
				<td>'.$data['dateajout'].'</td>
			
	    		<td>'.$autBtn.'</td>
			</tr>';
	}
}