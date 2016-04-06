<?php

$wsdl = "http://localhost/latihan/utswebservice/server/uts.wsdl";
$client2 = new SoapClient ( $wsdl );

$ws = $client2->getInfoMK ();
$wsout = $ws->MK;
//var_dump ($wsout);
echo '<p>';
echo 'List mata kuliah';
echo '</p>';
echo '<table>';
echo '<thead><td>Nama Mk</td><td>SKS</td></thead>';
if (is_array($wsout) || is_object($wsout))
{
	foreach ( $wsout as $val ) {
	echo '<tr><td>' . $val->namaMK . '</td><td>' . $val->SKS . '</td></tr>';
	}
}
echo '</table>';

?>
