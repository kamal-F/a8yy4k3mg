<?php
$wsdl = "http://localhost/latihan/utswebservice/server/uts.wsdl";
$client2 = new SoapClient ( $wsdl );

$ws = $client2->getInfoMK ();
$wsout = $ws->MK;

echo '<p>';
echo 'List mata kuliah';
echo '</p>';
echo '<table>';
echo '<thead><td>Nama Mk</td><td>SKS</td></thead>';
foreach ( $wsout as $val ) {
    echo '<tr><td>' . $wsout->namaMK . '</td><td>' . $wsout->SKS . '</td></tr>';
}

echo '</table>';

?>
