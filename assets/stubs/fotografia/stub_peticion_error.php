<?php

header("Content-Type: application/json");

$result = array();
$result["status"] = "ERROR";
$result["message"] = "PASO REGISTRADO";

echo(json_encode($result));