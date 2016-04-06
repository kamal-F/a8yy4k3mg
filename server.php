<?php

    function getInfoMK(){

    $con = mysql_connect ( "localhost", "root", "" );
    if (! $con) {
        die ( 'Could not connect: ' . mysql_error () );
    }

    mysql_select_db ( "uts" ) or die ( 'database tidak ada' );

    $sql = "SELECT *  FROM matakuliah";

    $MK = [];
    while ( $row = mysql_fetch_array ( $result ) ) {
        $MK [] = [
                'namaMK' => $row ['namaMK'],
                'SKS' => $row ['SKS']
        ];
    }


    mysql_close ( $con );

    return [ 'MK' => $MK];

    }

//ini_set("soap.wsdl_cache_enabled", 0);

$server = new SoapServer("./server/uts.wsdl");
$server->addFunction ( "getInfoMK" );
$server->handle();

?>
