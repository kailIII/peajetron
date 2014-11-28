<?php
require_once('application/third_party/phpqrcode/qrlib.php');

$vcard = "BEGIN:VCARD%0AVERSION:4.0%0AN:".$_GET['placa']."%0ANOTE:".hash("sha256", $_GET['placa'])."%0AREV:".date("Ymd\THis")."%0AEND:VCARD";
QRcode::png($vcard);
?>
