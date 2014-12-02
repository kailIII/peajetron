<?php

header("Content-Type: application/json");

$result = array();
$result["status"] = "OK";
$result["message"] = "PASO REGISTRADO";

echo(json_encode($result));