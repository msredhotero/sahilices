<?php

date_default_timezone_set('America/Buenos_Aires');

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias 			= new ServiciosReferencias();

$fecha = date('Y-m-d');

require('fpdf.php');

//$header = array("Hora", "Cancha 1", "Cancha 2", "Cancha 3");

////***** Parametros ****////////////////////////////////
$id		=	$_GET['id'];
$idempresa = $_GET['idempresa'];

$resultado = $serviciosReferencias->traerOportunidadesPorId($id);





$pdf = new FPDF();


function Footer($pdf)
{

$pdf->SetY(-10);

$pdf->SetFont('Arial','I',10);

$pdf->Cell(0,10,'Cotizacion sin validez  -  Pagina '.$pdf->PageNo()." - Fecha: ".date('Y-m-d'),0,0,'C');
}


$cantidadJugadores = 0;
#Establecemos los márgenes izquierda, arriba y derecha:
//$pdf->SetMargins(2, 2 , 2);

#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(false,1);



$pdf->AddPage();
/***********************************    PRIMER CUADRANTE ******************************************/
switch ($idempresa) {
   case 1:
      $pdf->Image('../imagenes/logos1.jpg',2,2,40);
      break;
   case 2:
      $pdf->Image('../imagenes/logos2.jpg',2,2,40);
      break;
   case 3:
      $pdf->Image('../imagenes/logos3.jpg',2,2,40);
      break;
   case 4:
      $pdf->Image('../imagenes/logos4.jpg',2,2,40);
      break;
   default:
      // code...
      break;
}


/***********************************    FIN ******************************************/



//////////////////// Aca arrancan a cargarse los datos de los equipos  /////////////////////////


$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(15);
$pdf->SetX(50);
$pdf->Cell(100,5,'COTIZACION SIN VALIDEZ',0,0,'C',false);
$pdf->Line(5,30,200,30);


$pdf->SetX(5);



$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


Footer($pdf);



$nombreTurno = "EQUIPOS-CLUB-".$fecha.".pdf";

$pdf->Output($nombreTurno,'I');


?>
