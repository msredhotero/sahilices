<?php

session_start();

if (!isset($_SESSION['usua_sahilices']))
{
	header('Location: ../../error.php');
} else {


include ('../includes/funciones.php');
include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

$resTraerConceptos = $serviciosReferencias->traerConceptos();
/*
id: "'.$row[0].'",

*/
$cadConcepto = '';
	while ($row = mysql_fetch_array($resTraerConceptos)) {
		//$cadJugadores .= '"'.$row[0].'": "'.$row['apellido'].', '.$row['nombres'].' - '.$row['nrodocumento'].'",';
		$cadConcepto .= '
		      {
				"name": "'.$row['concepto'].'",
				"id": "'.$row['idconcepto'].'"
			  },';
	}

echo "[".substr($cadConcepto,0,-1)."]";
}
?>
