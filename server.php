<?php
//
class MyWs{

	function getInfoMK(){	
	$data->MK = array(	array("Nama MK"=>"PPKN", "SKS"=>4),
						array("Nama MK"=>"Bahasa Indonesia", "SKS"=>2),
						array("Nama MK"=>"Taboga", "SKS"=>2), ) ;
	return $data;		

 	}	

}	

$server = new SoapServer("uts.wsdl");
$server->setClass("MyWs");
$server->handle();

?>
