<?php
    //
    // ARQUIVO DE CONFIGURAÇÃO GERAL
    //
    include_once ("inc.lib.php");
	
    $arCfg['dbname'] = 'viverdeo_loja';
	$arCfg['dburl'] = 'localhost';
	$arCfg['dbusername'] = 'viverdeo_admin';
	$arCfg['dbpass'] = 'h77pSf1btpbg';
	
    include_once ("../classes/class.mysql.php");
	
	$db = new MySQL();
	if(!$db->Open( $arCfg['dbname'],$arCfg['dburl'], $arCfg['dbusername'], $arCfg['dbpass']))
        $db->Kill();	
	
	//Configurações do sistema
	$arKeysConf = $db->QueryArray("SELECT * FROM cmsVariables ORDER BY KeyName");
	
    foreach($arKeysConf as $Config){
		$arCfg[$Config["KeyName"]] = $Config["KeyValue"];
	}
	
	
	/*
    #region Arquivo de configuração
    $confFile = new fileManage();
    $confFile->set_filetocheck('../config.ini');
    foreach($confFile->fileToArray() as $i){
        $arTempData = explode('=',$i);
        $arFile[$arTempData[0]] = $arTempData[1];
    }
    #endregion
    
    $arCfg = $arFile;

    $arCfg['nomecliente'] = (strlen($arFile["NOMECLIENTE"])>0) ? $arFile["NOMECLIENTE"] : "SistemasD";
    $arCfg['version'] = (strlen($arFile["VERSION"])>0) ? $arFile["VERSION"] : "Demo";
    $arCfg['nomesistema'] = (strlen($arFile["NOMESISTEMA"])>0) ? $arFile["NOMESISTEMA"] : "Banco de currículos";
    $arCfg['dbname'] = trim($arFile["DBNAME"]);
    $arCfg['dburl'] = trim($arFile["DBURL"]);
    $arCfg['dbusername'] = trim($arFile["DBUSERNAME"]);
    $arCfg['dbpass'] = trim($arFile["DBPASS"]);
    $arCfg['debug'] = trim($arFile["DEBUG"]);
    $arCfg['emailadmin'] = trim($arFile["EMAILADMIN"]);
    $arCfg['emailsys'] = trim($arFile["EMAILSISTEMA"]);
    $arCfg['tipoadmin'] = 255;
    $arCfg['valorminimo']= (strlen($arFile["VLRMIN"])>0) ? $arFile["VLRMIN"] : "0";
    $arCfg['maxavatarsize'] = (strlen($arFile["MAXAVATARSIZE"])>0) ? $arFile["MAXAVATARSIZE"] : "5000";
    
  */ 
?>