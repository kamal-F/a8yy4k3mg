<?php
class MyWs{
	
	function getInfoMK(){
		$re->PPKN='4';
		$re->Bahasa_Indonesia='2';
		$re->Tataboga='2';
				
		return $re;		
	}
}
	
//ini_set("soap.wsdl_cache_enabled", 0);
$server = new SoapServer("server/uts.wsdl");
$server->setClass("MyWs");
$server->handle();
?>