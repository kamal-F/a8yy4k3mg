<?php
$wsdl = "http://localhost:8080/latihan/uts_webservice/server/a8yy4k3mg/uts.wsdl";
$client2 = new SoapClient ( $wsdl, array('cache_wsdl' => WSDL_CACHE_NONE) );

$ws = $client2->getInfoMK ();
$wsout = $ws->MK;

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
