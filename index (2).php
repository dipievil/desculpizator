<?php
    
    session_start();
 
    include_once ("../classes/class.bootstrapcontrols.php");
    include_once ("../classes/class.TemplatePower.php");   
    include_once ("../inc/inc.lib.php");
    include_once ("../inc/inc.config.php");
    include_once ("../classes/class.phpmailer.php");
	include_once ("../inc/inc.login.php");
	
    $boolOG= false;
		
	////
	//: Dados da página

	////
	//: Include pages
	if($_REQUEST['page'])
		$pageIDInclude = $_REQUEST['page'];
	else
		$pageIDInclude = 1;
	
	if(is_numeric($_REQUEST['page'])){
		$arPageDetail = $db->QueryArray("SELECT * FROM cmsPages WHERE cmsPages_id = '".$pageIDInclude."' ORDER BY Ordem");
		$pageName = ucwords($arPageDetail[0]['Pagename']);
	} else {
		$pageName = ucwords($_REQUEST['page']);
	}
	$customHtml = '../html/page'.$pageName.'.html';
	$customPhp = '../php/page'.$pageName.'.php';
	//: Include pages
	////

	if($_REQUEST['errorid']){
		$arAlert['titulo'] = "Falha de login";
		switch($_REQUEST['errorid']){
			case '1':
				$arAlert['msg'] = utf8_decode("Usuário ou senha errada");
			break;	
			case '2':
				$arAlert['msg'] = utf8_decode("Usuário bloqueado");
			break;	
		}
	}

	if($pageName == "Login" || !$_SESSION['userid']){
		$tpl = new TemplatePower( "../html/login.html");  		
		
	} else {
		$tpl = new TemplatePower( "../html/MasterPage.html");       
		if(file_exists($customHtml)){
			$tpl->assignInclude("body", $customHtml);
		}
	}
	
    $tpl->prepare();
	if(file_exists($customPhp)){
		include utf8_encode($customPhp);
	}

	////
	//: Menu principal
	$arPages = $db->QueryArray("SELECT * FROM cmsPages WHERE Ativo = 1 AND Ordem > 0 ORDER BY Ordem");
	foreach($arPages as $page){
		if($page['PaiId']==0){
			$tpl->newBlock("pagesList");
			$tpl -> assign("pageName", $page['Title']);
			$tpl -> assign("iconName", $page['Icon']);
			
			$sqlPagesFilhos = "SELECT * FROM cmsPages WHERE PaiId = ".$page['cmsPages_id'];
			
			if($page['Pagename'] == 'tables'){
				$tpl -> assign("pageItemClass", "submenu");
				$tpl -> assign("pageURL", "#");
				
				$arTables = $db->QueryArray("SELECT * FROM cmsTables ORDER BY TableName");			
				foreach($arTables as $table){			
					$tpl->newBlock("submenuList");
					$tpl -> assign("submenuURL", "../php/index.php?page=listTable&tableid=".$table['cmsTables_id']);
					$tpl -> assign("submenuName", $table['StringName']);
					$tpl -> assign("submenuTitle", utf8_encode($table['Description']));
				}
			} else if($db -> HasRecords($sqlPagesFilhos)){
				//Tem filhos?
				$tpl -> assign("pageItemClass", "submenu");
				$tpl -> assign("pageURL", "#");
				
				$arSubMenu = $db->QueryArray($sqlPagesFilhos);
				foreach($arSubMenu as $itemSubMenu){	
					$tpl->newBlock("submenuList");
					$tpl -> assign("submenuURL", "../php/index.php?page=".$itemSubMenu['Pagename']);
					$tpl -> assign("submenuName", $itemSubMenu['Title']);
				}			
			
			}else {
				if($pageIDInclude == $page['cmsPages_id'])
					$tpl -> assign("pageItemClass", "current");
				$tpl -> assign("pageURL", "../php/index.php?page=".$page['cmsPages_id']);
			}
		}
	}
	


	if(count($arAlert)>0){
		$tpl->newBlock("modalMessageBlock");
		$tpl -> assign("modalTitle",$arAlert['titulo']);
		$tpl -> assign("modalMessage",$arAlert['msg']);
	}
	
	if(strlen($redirectURL)){
		$tpl->newBlock("redirectBLOCK");
		$tpl -> assign("urlToRedirect",$redirectURL);
		
	}
    #endregion
	
        
    $tpl->printToScreen();
    //$db->Close();

?>