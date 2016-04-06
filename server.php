<?php

class MyWs{
	function getInfoMK(){
		$re->PPKN='4';
		$re->Bahasa_Indonesia='2';
		$re->Tata_Boga='2';
						
		return $re;		
	}

}
//init_set( "soap.wsdl_cache_enable", "0");
$server = new SoapServer( "uts.wsdl" );
$server->setClass( "MyWs" );
$server->handle();
?>