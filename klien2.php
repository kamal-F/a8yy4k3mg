<?php
$wsdl = "http://localhost:8080/latihan/utswebserver/server/a8yy4k3mg.git/uts.wsdl";
$client2 = new SoapClient ( $wsdl );

$ws = $client2->getInfoMK ();
$wsout = $ws->MK;
echo '<p>';
echo 'List mata kuliah';
echo '</p>';
echo '<table>';
echo '<thead><td>Nama Mk</td><td>SKS</td></thead>';
foreach ( $wsout as $val ) 
{
	echo '<tr><td>' . $val->namaMK . '</td><td>' . $val->SKS . '</td></tr>';
}
echo '</table>';

?>
