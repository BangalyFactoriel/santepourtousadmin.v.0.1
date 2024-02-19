<?php 
	
if(isset($liste) && sizeof($liste)>0){
	$j = 0;

	foreach ($liste as $each_personel) {
		$j = $j+1;
		$genre  = $each_personel['genre']==1 ? 'Feminin' :'Masculin'; 
		 $btnProfil = '<a  href="javascript:;" Class="btn btn-circle btn-primary"   onclick="document.getElementById(\'action_key\').value=\''.md5(strtolower("profif")).'\';  
		 document.getElementById(\'da_frm_aut_space\').submit(); 				
		 document.getElementById(\'action_on_this\').value=\''.$each_personel["codePersonnel"].'\';">'.yii::t("app",'profil').'</a>';

		// $rjtBtn = '<a href="javascript:;" Class="btn btn-circle btn-danger"  data-bs-toggle="modal" data-bs-target="#modalAppelAction" onclick="document.getElementById(\'action_key\').value=\''.md5(strtolower("rejeterUnEsapce")).'\';  document.getElementById(\'action_on_this\').value=\''.$each_personel["code"].'\';">'.yii::t("app",'Rejeter').'</a>';

		echo '
			<tr>
					<td>'.$j.'</td>
					<td class="d-flex align-items-center">
					<!--begin:: Avatar -->
					<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
						<a href="#">
							<div class="symbol-label">
								<img src="'.yii::$app->request->baseUrl. '/web/mainAssets/media/uploads/photo/'.$each_personel['photo'] .'" alt="Emma Smith" class="w-100">
							</div>
						</a>
					</div>
					<!--end::Avatar-->
					<!--begin::User details-->
					<div class="d-flex flex-column">
							<a href="#" class="text-gray-800 text-hover-primary mb-1">'.$each_personel['nom'].' '.$each_personel['prenom'] .'</a>
						<span>'.$each_personel["email"].'</span>
					</div>
					<!--begin::User details-->
				</td>
	    		<td>'.$genre.'</td>
	    		<td>'.$each_personel["adresse"].'</td>
	    		<td>'.$each_personel["libFOnction"].'</td>
				<td>'.$each_personel["libPost"].'</td>
				<td class="text-end">'.$btnProfil.'</td>
	  
			</tr>
			';
	}
}