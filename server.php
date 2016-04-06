<?php

class MyWs{
	
	function getInfoMK(){
		$re->PPKN='4';
		$re->Bahasa_Indonesia='2';
		$re->Tataboga='2';
				
		return $re;		
	}

	function MK(){
		$rw->PPKN='4';
		$rw->Bahasa_Indonesia='2';
	//$rw->Tataboga='2';
				
		return $rw;		
	}
}
	
//ini_set("soap.wsdl_cache_enabled", 0);

$server = new SoapServer("uts.wsdl");
$server->setClass("MyWs");
$server->handle();

?>
