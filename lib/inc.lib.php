<?php

##Returno chave com nome
function returnKey($arValues,$strToCheck){
	$nCols=0;
	$colIndex = 0;
	$ignore = false;

	while($colIndex==0){
		$pos = strpos($arValues[$nCols],$strToCheck);
		if(!$pos)
			$colIndex = $nCols;
		$nCols++;
	}
	
	return $colIndex;
}



class fileManage {
    
    #region Atributos
    private $filetocheck;
    public function set_filetocheck($_filetocheck){
        $this -> filetocheck = $_filetocheck;
    }
    public function get_filetocheck($_filetocheck){
        $this -> filetocheck = $_filetocheck;
    }
    #endregion
    
    public function fileManage(){
        $this ->set_filetocheck(" ");
    }
    
    public function fileToArray(){
        if(filetocheck != " ")
            return file($this->filetocheck);
    }
}

/**
*
* Retorna controle HTML conforme tipo enviado
*/
function getInput($fieldtype,$id,$value){
    switch($fieldtype){
        case "int":
            $controle = "<input type='number' id='form".$id."' value='".$value."'>";
            break;  
        case "datetime":
            $controle = "<input type='datetime' id='form".$id."' value='".$value."'>";
            break;
        case "string": default:
            $controle = "<input type='text' id='form".$id."' style='width:100px' value='".$value."'>";
            break;
    }
    return $controle;
}

function clearSession(){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
}

/**
* Configura a mensagem HTML do e-mail
*
*/
function MontaHTML($mensagem,$assunto,$arCfg){
    $html = file_get_contents('../html/mail.html');
    $html = str_replace('##MENSAGEM##',$mensagem,$html);
     $html = str_replace('##DATA##',date('d/m/Y H:i:s'),$html);
    $html = str_replace('##TITULO##',$assunto,$html);    
    return $html;
}

/**
 * Limpa a session do usu�rio
 * 
 */
function sessionClear(){
   
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
}

/**
* Retorna se � administrador
* 
 * @param string $userid id do usuario
 * @param array $arCfg Array com configura��es
 * @param objetct $db Objeto do banco de dados
* 
* @return boolean True se for admin
 */
function isAdmin($arCfg,$tipouser){
    if($tipoUser == $arCfg['tipoadmin'])
        return true;
    else
        return false;
}


function dateUSToBR($usData){
    list($ano, $mes, $dia) = explode('-',$usData);
    $fulldate =$dia."/".$mes."/".$ano;
    return $fulldate;
}

/**
* Arrays
*/
$arErrorMsg[1] = "Usu�rio inexistente.";
$arErrorMsg[2] = "Senha inv�lida.";
$arErrorMsg[3] = "Usu�rio bloqueado.";
$arErrorMsg[4] = "Voc� n�o tem acesso a esta p�gina.";
$arErrorMsg[5] = "Falha ao acessar o banco. Tente novamente mais tarde.";
$arErrorMsg[6] = "E-mail inv�lido.";
$arErrorMsg[7] = "E-mail n�o confere.";
$arErrorMsg[8] = "Digite seu nome completo.";
$arErrorMsg[9] = "Nome de usu�rio deve conter pelo menos (6) caracteres.";
$arErrorMsg[10] = "Os dois campos de senha devem ser iguais e ter pelo menos 4 caracteres.";
$arErrorMsg[11] = "O campo de usu�rio deve ter pelo menos 4 caracteres.";
$arErrorMsg[12] = "Este usu�rio j� existe.";
$arErrorMsg[13] = "Usu�rio cadastrado com sucesso.";
$arErrorMsg[14] = "Curr�culo atualizado com sucesso.";
$arErrorMsg[15] = "Arquivo grande de mais ou formato inv�lido.";
$arErrorMsg[16] = "Foto exclu�da com sucesso.";
$arErrorMsg[17] = "Senha atual inv�lida.";
$arErrorMsg[18] = "Senha atualizada com sucesso.";
$arErrorMsg[19] = "Senha anterior igual a nova.";
$arErrorMsg[20] = "Senha nova n�o confere.";
$arErrorMsg[21] = "Falha ao enviar mensagem. ".$_SESSION['GlobalError'];
$arErrorMsg[22] = "Falha ao acessar o banco. ".$_SESSION['GlobalError'];
$arErrorMsg[23] = "Usu�rio excluido com sucesso.";
$arErrorMsg[24] = "Pedido enviado com sucesso. Aguarde confirma��o. ";
$arErrorMsg[25] = "Mensagem enviada com sucesso.";

/**
 * Express�es regulares
 */
 
 $rxEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

?>