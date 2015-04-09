<?php

    //login de usuário
    if(strlen($_REQUEST['loginform'])>0){
		if(strlen($_REQUEST['formUser'])>0 && strlen($_REQUEST['formPass'])>0){
			$sqlQuery = "SELECT * FROM cmsUsers WHERE Usuario = '".$_REQUEST['formUser']."' AND Senha = '".md5($_REQUEST['formPass'])."'";
			if($db->HasRecords($sqlQuery)){
				$arResults = $db->QueryArray($sqlQuery);
					if($arResults[0]['Ativo']==1){
						$_SESSION['userid'] = $arResults[0]['cmsUsers_id'];
						unset($_SESSION['login']);
					} else header('Location: index.php?page=login&errorid=3'); //usuário bloqueado
			} else header('Location: index.php?page=login&errorid=1'); //Usuário errado
		}
    }  
	
	if($_REQUEST['page']=='logout'){
		$_SESSION['userid']=0;
		header('Location: index.php');
	}

?>