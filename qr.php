<?php
require_once('application/third_party/phpqrcode/qrlib.php');

$vcard = "BEGIN:VCARD\nVERSION:4.0\nN:".$_GET['placa']."\nNOTE:".hash("sha256", $_GET['placa'])."\nREV:".date("Ymd\THis")."\nEND:VCARD";
QRcode::png($vcard, null, QR_ECLEVEL_L, 3);
?>
