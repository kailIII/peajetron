<?php
require("thread.php");
$conexion = "dbname=peajetron user=peajetron password=peajetron";
$cabinas  = (isset($argv[1])) ? $argv[1] : 0;
$tiempo   = (isset($argv[2])) ? $argv[2] : 1;
$hasta    = (isset($argv[3])) ? strtotime("+".$argv[3]." second", strtotime(date("Y-m-d H:i:s"))) : strtotime("+1 second", strtotime(date("Y-m-d H:i:s")));

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function proceso($cabina) {
	global $tiempo, $hasta, $conexion;

	$i = 0;
	$time = array();
	$conn = pg_connect($conexion);
	do
	{
		$i++;
		$time_start = microtime_float();
		pg_query($conn, "BEGIN");
		if(pg_query($conn, "INSERT INTO cobro (id_vehiculo, id_usuario_propietario, id_usuario_registra, id_peaje, valor) VALUES (1,1,1,1,1)"))
		{
			pg_query($conn, "COMMIT");
			$time[] = microtime_float() - $time_start;
			echo "Peaje:$cabina|Vehiculo:$i|Ok|";
		}
		else
		{
			pg_query($conn, "ROLLBACK");
			echo "Peaje:$cabina|Vehiculo:$i|Error|";
		}

		sleep($tiempo);
	} while(strtotime(date("Y-m-d H:i:s")) < $hasta);
	echo "Tiempo:".(array_sum($time) / count($time));
	pg_close($conn);
}

for($i = 0; $i <= $cabinas; $i++)
{
	$thread[$i] = new Thread('proceso');
	$thread[$i]->start($i);
}
?>
