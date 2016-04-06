<?php
$wsdl = "http://localhost/latihan/utswebservice/server/uts.wsdl";
$client2 = new SoapClient ( $wsdl );

$ws = $client2->getInfoMK ();
$wsout = $ws->PPKN;
var_dump($wsdl);
echo '<p>';
echo 'List mata kuliah';
echo '</p>';
echo '<table>';
echo '<thead><td>Nama Mk</td><td>SKS</td></thead>';
foreach ( $wsout as $val ) {
	echo '<tr><td>' . $val->namaMK . '</td><td>' . $val->SKS . '</td></tr>';
}
echo '</table>';

?>
