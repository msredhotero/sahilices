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
$idcontacto = $_GET['idcontacto'];
$idtrabajo = $_GET['idtrabajo'];
$idpago = $_GET['idpago'];

session_start();

$resultado = $serviciosReferencias->traerOportunidadesPorId($id);

$resLogos = $serviciosReferencias->traerConfiguracionPorId($idempresa);
$razonsocial    = mysql_result($resLogos,0,'razonsocial');
$cuit    = mysql_result($resLogos,0,'cuit');
$convenio    = mysql_result($resLogos,0,'convenio');
$direccion = mysql_result($resLogos,0,'direccion');
$observaciones    = mysql_result($resLogos,0,'observaciones');

$resEmpresa = $serviciosReferencias->traerClientesPorId(5);
$empresa    = mysql_result($resEmpresa,0,'razonsocial');

$resContacto = $serviciosReferencias->traerContactosPorId($idcontacto);
$contacto    = mysql_result($resContacto,0,'apellido').' '.mysql_result($resContacto,0,'nombre');

$resTrabajo = $serviciosReferencias->traerTipostrabajosPorId($idtrabajo);
$trabajo = mysql_result($resTrabajo,0,'tipotrabajo');

$resNotas = $serviciosReferencias->traerTipotrabajoconceptosPorTipoTrabajo($idtrabajo);
$resItem  = $serviciosReferencias->traerCotizaciondetallesauxPorOportunidad($id);

$resPago = $serviciosReferencias->traerConceptosPorId($idpago);
$formadepago = mysql_result($resPago,0,'leyenda');


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
$pdf->SetAutoPageBreak(true,1);



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

$pdf->SetLineWidth(1);

$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(15);
$pdf->SetX(50);
$pdf->Cell(100,5,'COTIZACION SIN VALIDEZ',0,0,'C',false);
$pdf->Line(5,35,200,35);

$pdf->SetFont('Arial','b',10);


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(0);
$pdf->Cell(200,5,'Cotizacion Nro: xxxx',0,0,'C',false);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(30,5,'Empresa:',0,0,'L',false);
$pdf->Cell(100,5,$empresa,0,0,'L',false);
$pdf->Cell(20,5,'Fecha:',0,0,'L',false);
$pdf->Cell(50,5,date('Y-m-d'),0,0,'L',false);

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(30,5,'Para:',0,0,'L',false);
$pdf->Cell(100,5,$contacto,0,0,'L',false);
$pdf->Cell(20,5,'De:',0,0,'L',false);
$pdf->Cell(50,5,$_SESSION['nombre_sahilices'],0,0,'L',false);
$pdf->Ln();
$pdf->Ln();
$pdf->Line(5,$pdf->getY(),200,$pdf->getY());

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(45,5,'Empresa cotizante:',0,0,'L',false);
$pdf->Cell(145,5,$razonsocial,0,0,'L',false);

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(45,5,'CUIT:',0,0,'L',false);
$pdf->Cell(145,5,$cuit,0,0,'L',false);

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(45,5,'Convenio Multilateral:',0,0,'L',false);
$pdf->Cell(145,5,$convenio,0,0,'L',false);

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(45,5,utf8_decode( 'Dirección:'),0,0,'L',false);
$pdf->Cell(145,5,$direccion,0,0,'L',false);

$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(45,5,'Nuestra Empresa cuenta con:',0,0,'L',false);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Multicell(200,4,$observaciones,0,'J',false);
$pdf->Ln();
$pdf->Ln();
$pdf->Line(5,$pdf->getY(),200,$pdf->getY());

$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,$trabajo,0,0,'L',false);
$pdf->Ln();
//items
while ($row = mysql_fetch_array($resItem)) {
   $pdf->SetFont('Arial','U',12);
   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Cell(200,5,utf8_decode( 'Item N° ').$row['item'],0,0,'L',false);

   $pdf->SetFont('Arial','',12);
   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Cell(200,5,$row['concepto'],0,0,'L',false);

   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Multicell(200,5,$row['leyenda'],0,'L',false);

   $pdf->SetX(5);
   $pdf->Cell(200,5,'Cantidad: '.$row['cantidad'],0,0,'L',false);

   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Cell(200,5,'Precio Unit.: '.$row['simbolo'].''.$row['preciounitario'].' + IVA',0,0,'L',false);

   $pdf->SetFont('Arial','B',12);
   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Cell(200,5,'Se cotiza: '.$row['simbolo'].''.($row['preciounitario'] * $row['cantidad']).' + IVA',0,0,'L',false);
}


$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Notas:',0,0,'L',false);
$pdf->Ln();

//items
while ($row = mysql_fetch_array($resNotas)) {

   $pdf->SetFont('Arial','',12);

   $pdf->Ln();
   $pdf->SetX(5);
   $pdf->Multicell(200,5,utf8_decode( $row['leyenda']),0,'J',false);

}

$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Condiciones Generales:',0,0,'L',false);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','U',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Plazos de entrega:',0,0,'L',false);


$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','U',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Forma de Pago:',0,0,'L',false);

$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Multicell(200,5,utf8_decode( $formadepago),0,'J',false);

$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','U',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Validez de la oferta:',0,0,'L',false);


$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','U',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,'Lugar de Entrega:',0,0,'L',false);

$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,($direccion),0,0,'L',false);
$pdf->Ln();
$pdf->SetX(5);
$pdf->Cell(200,5,utf8_decode('HORARIOS DE ATENCIÓN: LUNES A JUEVES DE 8:00 A 17:00HS. VIERNES DE 8 A 16:00HS.
'),0,0,'L',false);


//Footer($pdf);



$nombreTurno = "EQUIPOS-CLUB-".$fecha.".pdf";

$pdf->Output($nombreTurno,'I');


?>
