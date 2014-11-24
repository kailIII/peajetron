<?php
$conexion = "dbname=peajetron user=peajetron password=peajetron";
$asunto = "Facturación";

class Facturacion {
	var $conn, $datos;

	function __construct()
	{
		global $conexion;

		$this->conn = pg_connect($conexion);
	}

	function generar()
	{
		global $asunto;

		$qusuario = pg_query($this->conn, "SELECT id_usuario, nombre, correo FROM usuario WHERE date_part('day', fecha_registro) = ".date('d'));
		while($usuario = pg_fetch_row($qusuario))
		{
			$para = $usuario[2];
			$mensaje = "<p>Señor $usuario[1]:</p><br />";
			$qcobro = pg_query($this->conn, "SELECT placa, peaje, valor, cobro.fecha_registro
                                                         FROM cobro
                                                         LEFT JOIN vehiculo ON vehiculo.id_vehiculo = cobro.id_vehiculo
                                                         LEFT JOIN peaje ON peaje.id_peaje = cobro.id_peaje
                                                         WHERE id_usuario_propietario = $usuario[0] AND cobro.fecha_registro > NOW() - '30 days'::interval
                                                        ");
			$mensaje .= "<table border=1><thead><tr><th align=center>Vehículo</th><th align=center>Peaje</th><th align=center>Fecha</th><th align=center>Valor</th></tr></thead><tbody>";
			$total = 0;
			while($cobro = pg_fetch_row($qcobro))
			{
				$mensaje .= "<tr><td>$cobro[0]</td><td>$cobro[1]</td><td>$cobro[3]</td><td align=right>$cobro[2]</td></tr>";
				$total += $cobro[2];
			}
			$mensaje .= "</tbody><tfoot><tr><th colspan=3 align=right>Total</th><td align=right>$total</td></tr></tfoot></table>";
			$cabecera  = "MIME-Version: 1.0\r\n";
			$cabecera .= "Content-type: text/html; charset=utf-8\r\n";
			$cabecera .= "From: Peajetron <admin@peajetron.com>\r\n";

			if(mail($para, $asunto, $mensaje, $cabecera))
				echo "Mail: $para\n";
		}
	}
}

$factura = new Facturacion();
$factura->generar();
