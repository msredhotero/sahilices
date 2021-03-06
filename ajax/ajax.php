<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');
include ('../includes/funcionesNotificaciones.php');
include ('../includes/validadores.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias		= new ServiciosReferencias();
$serviciosNotificaciones	= new ServiciosNotificaciones();
$serviciosValidador        = new serviciosValidador();


$accion = $_POST['accion'];


$resV['error'] = '';
$resV['mensaje'] = '';



switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'entrar':
		entrar($serviciosUsuarios);
		break;
	case 'insertarUsuario':
        insertarUsuario($serviciosUsuarios);
        break;
	case 'modificarUsuario':
        modificarUsuarios($serviciosReferencias,$serviciosUsuarios);
        break;
   case 'eliminarUsuarios':
        eliminarUsuarios($serviciosReferencias);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
		break;

   case 'insertarOportunidades':
      insertarOportunidades($serviciosReferencias);
      break;
   case 'modificarOportunidades':
      modificarOportunidades($serviciosReferencias);
      break;
   case 'eliminarOportunidades':
      eliminarOportunidades($serviciosReferencias);
      break;
   case 'traerOportunidades':
      traerOportunidades($serviciosReferencias);
      break;
   case 'traerOportunidadesPorId':
      traerOportunidadesPorId($serviciosReferencias);
      break;


   case 'insertarClientes':
      insertarClientes($serviciosReferencias, $serviciosValidador);
   break;
   case 'modificarClientes':
      modificarClientes($serviciosReferencias, $serviciosValidador);
   break;
   case 'eliminarClientes':
      eliminarClientes($serviciosReferencias);
   break;
   case 'traerClientes':
      traerClientes($serviciosReferencias);
   break;
   case 'traerClientesPorId':
      traerClientesPorId($serviciosReferencias);
   break;
   case 'insertarConceptos':
      insertarConceptos($serviciosReferencias);
   break;
   case 'modificarConceptos':
      modificarConceptos($serviciosReferencias);
   break;
   case 'eliminarConceptos':
      eliminarConceptos($serviciosReferencias);
   break;
   case 'traerConceptos':
      traerConceptos($serviciosReferencias);
   break;
   case 'traerConceptosPorId':
      traerConceptosPorId($serviciosReferencias);
   break;
   case 'insertarConceptosviaticos':
      insertarConceptosviaticos($serviciosReferencias);
   break;
   case 'modificarConceptosviaticos':
      modificarConceptosviaticos($serviciosReferencias);
   break;
   case 'eliminarConceptosviaticos':
      eliminarConceptosviaticos($serviciosReferencias);
   break;
   case 'traerConceptosviaticos':
      traerConceptosviaticos($serviciosReferencias);
   break;
   case 'traerConceptosviaticosPorId':
      traerConceptosviaticosPorId($serviciosReferencias);
   break;
   case 'insertarContactos':
      insertarContactos($serviciosReferencias);
   break;
   case 'modificarContactos':
      modificarContactos($serviciosReferencias);
   break;
   case 'eliminarContactos':
      eliminarContactos($serviciosReferencias);
   break;
   case 'traerContactos':
      traerContactos($serviciosReferencias);
   break;
   case 'traerContactosPorId':
      traerContactosPorId($serviciosReferencias);
   break;
   case 'insertarEmpleados':
      insertarEmpleados($serviciosReferencias, $serviciosValidador);
   break;
   case 'modificarEmpleados':
      modificarEmpleados($serviciosReferencias, $serviciosValidador);
   break;
   case 'eliminarEmpleados':
      eliminarEmpleados($serviciosReferencias);
   break;
   case 'traerEmpleados':
      traerEmpleados($serviciosReferencias);
   break;
   case 'traerEmpleadosPorId':
      traerEmpleadosPorId($serviciosReferencias);
   break;
   case 'insertarListasprecios':
      insertarListasprecios($serviciosReferencias, $serviciosValidador);
   break;
   case 'modificarListasprecios':
      modificarListasprecios($serviciosReferencias, $serviciosValidador);
   break;
   case 'eliminarListasprecios':
      eliminarListasprecios($serviciosReferencias);
   break;
   case 'traerListasprecios':
      traerListasprecios($serviciosReferencias);
   break;
   case 'traerListaspreciosPorId':
      traerListaspreciosPorId($serviciosReferencias);
   break;
   case 'insertarPlantas':
      insertarPlantas($serviciosReferencias);
   break;
   case 'modificarPlantas':
      modificarPlantas($serviciosReferencias);
   break;
   case 'eliminarPlantas':
      eliminarPlantas($serviciosReferencias);
   break;
   case 'traerPlantas':
      traerPlantas($serviciosReferencias);
   break;
   case 'traerPlantasPorId':
      traerPlantasPorId($serviciosReferencias);
   break;
   case 'insertarSectores':
      insertarSectores($serviciosReferencias);
   break;
   case 'modificarSectores':
      modificarSectores($serviciosReferencias);
   break;
   case 'eliminarSectores':
      eliminarSectores($serviciosReferencias);
   break;
   case 'traerSectores':
      traerSectores($serviciosReferencias);
   break;
   case 'traerSectoresPorId':
      traerSectoresPorId($serviciosReferencias);
   break;
   case 'insertarUsuarios':
   insertarUsuarios($serviciosReferencias,$serviciosUsuarios);
   break;

   case 'insertarEstados':
      insertarEstados($serviciosReferencias);
   break;
   case 'modificarEstados':
      modificarEstados($serviciosReferencias);
   break;
   case 'eliminarEstados':
      eliminarEstados($serviciosReferencias);
   break;
   case 'traerEstados':
      traerEstados($serviciosReferencias);
   break;
   case 'traerEstadosPorId':
      traerEstadosPorId($serviciosReferencias);
   break;

   case 'insertarMotivosoportunidades':
      insertarMotivosoportunidades($serviciosReferencias);
   break;
   case 'modificarMotivosoportunidades':
      modificarMotivosoportunidades($serviciosReferencias);
   break;
   case 'eliminarMotivosoportunidades':
      eliminarMotivosoportunidades($serviciosReferencias);
   break;
   case 'traerMotivosoportunidades':
      traerMotivosoportunidades($serviciosReferencias);
   break;
   case 'traerMotivosoportunidadesPorId':
      traerMotivosoportunidadesPorId($serviciosReferencias);
   break;
   case 'insertarRecursosnecesarios':
      insertarRecursosnecesarios($serviciosReferencias);
   break;
   case 'modificarRecursosnecesarios':
      modificarRecursosnecesarios($serviciosReferencias);
   break;
   case 'eliminarRecursosnecesarios':
      eliminarRecursosnecesarios($serviciosReferencias);
   break;
   case 'traerRecursosnecesarios':
      traerRecursosnecesarios($serviciosReferencias);
   break;
   case 'traerRecursosnecesariosPorId':
      traerRecursosnecesariosPorId($serviciosReferencias);
   break;

   case 'insertarSemaforos':
      insertarSemaforos($serviciosReferencias);
   break;
   case 'modificarSemaforos':
      modificarSemaforos($serviciosReferencias);
   break;
   case 'eliminarSemaforos':
      eliminarSemaforos($serviciosReferencias);
   break;
   case 'traerSemaforos':
      traerSemaforos($serviciosReferencias);
   break;
   case 'traerSemaforosPorId':
      traerSemaforosPorId($serviciosReferencias);
   break;
   case 'insertarTipoclientes':
      insertarTipoclientes($serviciosReferencias);
   break;
   case 'modificarTipoclientes':
      modificarTipoclientes($serviciosReferencias);
   break;
   case 'eliminarTipoclientes':
      eliminarTipoclientes($serviciosReferencias);
   break;
   case 'traerTipoclientes':
      traerTipoclientes($serviciosReferencias);
   break;
   case 'traerTipoclientesPorId':
      traerTipoclientesPorId($serviciosReferencias);
   break;
   case 'insertarTipoconceptos':
      insertarTipoconceptos($serviciosReferencias);
   break;
   case 'modificarTipoconceptos':
      modificarTipoconceptos($serviciosReferencias);
   break;
   case 'eliminarTipoconceptos':
      eliminarTipoconceptos($serviciosReferencias);
   break;
   case 'traerTipoconceptos':
      traerTipoconceptos($serviciosReferencias);
   break;
   case 'traerTipoconceptosPorId':
      traerTipoconceptosPorId($serviciosReferencias);
   break;
   case 'insertarTipomonedas':
      insertarTipomonedas($serviciosReferencias);
   break;
   case 'modificarTipomonedas':
      modificarTipomonedas($serviciosReferencias);
   break;
   case 'eliminarTipomonedas':
      eliminarTipomonedas($serviciosReferencias);
   break;
   case 'traerTipomonedas':
      traerTipomonedas($serviciosReferencias);
   break;
   case 'traerTipomonedasPorId':
      traerTipomonedasPorId($serviciosReferencias);
   break;
   case 'insertarTipostrabajos':
      insertarTipostrabajos($serviciosReferencias);
   break;
   case 'modificarTipostrabajos':
      modificarTipostrabajos($serviciosReferencias);
   break;
   case 'eliminarTipostrabajos':
      eliminarTipostrabajos($serviciosReferencias);
   break;
   case 'traerTipostrabajos':
      traerTipostrabajos($serviciosReferencias);
   break;
   case 'traerTipostrabajosPorId':
      traerTipostrabajosPorId($serviciosReferencias);
   break;
   case 'insertarUnidadesnegocios':
      insertarUnidadesnegocios($serviciosReferencias);
   break;
   case 'modificarUnidadesnegocios':
      modificarUnidadesnegocios($serviciosReferencias);
   break;
   case 'eliminarUnidadesnegocios':
      eliminarUnidadesnegocios($serviciosReferencias);
   break;
   case 'traerUnidadesnegocios':
      traerUnidadesnegocios($serviciosReferencias);
   break;
   case 'traerUnidadesnegociosPorId':
      traerUnidadesnegociosPorId($serviciosReferencias);
   break;

   case 'frmAjaxModificar':
      frmAjaxModificar($serviciosFunciones, $serviciosReferencias, $serviciosUsuarios);
   break;
   case 'frmAjaxNuevo':
      frmAjaxNuevo($serviciosFunciones, $serviciosReferencias, $serviciosUsuarios);
   break;

   case 'verificarSemaforos':
      verificarSemaforos($serviciosReferencias, $serviciosNotificaciones, $serviciosUsuarios);
   break;
   case 'traerNotificacionesPorRol':
      traerNotificacionesPorRol($serviciosReferencias, $serviciosNotificaciones, $serviciosUsuarios);
   break;

   case 'devolverEstadoCliente':
      devolverEstadoCliente($serviciosReferencias);
   break;

   case 'insertarTipotrabajoconceptos':
      insertarTipotrabajoconceptos($serviciosReferencias);
   break;
   case 'modificarTipotrabajoconceptos':
      modificarTipotrabajoconceptos($serviciosReferencias);
   break;
   case 'eliminarTipotrabajoconceptos':
      eliminarTipotrabajoconceptos($serviciosReferencias);
   break;

   case 'traerPrecioPorIdConcepto':
      traerPrecioPorIdConceptoJ($serviciosReferencias);
   break;

   case 'traerContactosPorCliente':
      traerContactosPorCliente($serviciosReferencias);
   break;

   /* carrito de items */
   case 'agregarItem':
      agregarItem($serviciosReferencias);
   break;
   case 'agregarItemUsuario':
      agregarItemUsuario($serviciosReferencias);
   break;
   case 'eliminarCotizaciondetallesaux':
      eliminarCotizaciondetallesaux($serviciosReferencias);
   break;
   case 'eliminarCotizaciondetalles':
      eliminarCotizaciondetalles($serviciosReferencias);
   break;
   case 'agregarItemId':
      agregarItemId($serviciosReferencias);
   break;
   case 'traerTipotrabajoconceptosPorTipoTrabajo':
      traerTipotrabajoconceptosPorTipoTrabajo($serviciosReferencias);
   break;
   /* fin carrito */

   case 'insertarCotizaciones':
      insertarCotizaciones($serviciosReferencias);
   break;
   case 'modificarCotizaciones':
      modificarCotizaciones($serviciosReferencias);
   break;
   case 'eliminarCotizaciones':
      eliminarCotizaciones($serviciosReferencias);
   break;
   case 'traerCotizaciones':
      traerCotizaciones($serviciosReferencias);
   break;
   case 'traerEstadosCotizaciones':
      traerEstadosCotizaciones($serviciosReferencias);
   break;
   case 'traerCotizacionesPorId':
      traerCotizacionesPorId($serviciosReferencias);
   break;
   case 'insertarCotizacionmovimientos':
      insertarCotizacionmovimientos($serviciosReferencias);
   break;
   case 'modificarCotizacionmovimientos':
      modificarCotizacionmovimientos($serviciosReferencias);
   break;
   case 'eliminarCotizacionmovimientos':
      eliminarCotizacionmovimientos($serviciosReferencias);
   break;
   case 'traerCotizacionmovimientos':
      traerCotizacionmovimientos($serviciosReferencias);
   break;
   case 'traerCotizacionmovimientosPorId':
      traerCotizacionmovimientosPorId($serviciosReferencias);
   break;

   case 'modificarCotizacionDetalleLeyendasPorId':
      modificarCotizacionDetalleLeyendasPorId($serviciosReferencias);
   break;
   case 'calcularViaticoPorConcepto':
      calcularViaticoPorConcepto($serviciosReferencias);
   break;


/* Fin */

}
/* Fin */

function calcularViaticoPorConcepto($serviciosReferencias) {
   $idconcepto    =  $_POST['idconcepto'];
   $cantidad      =  $_POST['cantidad'];
   $j             =  $_POST['j'];
   $k             =  $_POST['k'];
   $l             =  $_POST['l'];
   $m             =  $_POST['m'];
   $n             =  $_POST['n'];
   $o             =  $_POST['o'];
   $p             =  $_POST['p'];
   $r             =  $_POST['r'];
   $s             =  $_POST['s'];

   $res = $serviciosReferencias->calcularViaticoPorConcepto($idconcepto, $cantidad, $j, $k, $l, $m, $n, $o, $p, $r, $s);

   echo $res;
}

function modificarCotizacionDetalleLeyendasPorId($serviciosReferencias) {
   $id =          $_POST['id'];
   $concepto =    $_POST['concepto'];
   $leyenda  =    $_POST['leyenda'];



   if (($concepto != '') && ($leyenda != '')) {
      $res = $serviciosReferencias->modificarCotizacionDetalleLeyendasPorId($id, $concepto, $leyenda);
      if ($res == true) {
         session_start();
         $serviciosReferencias->copiarDetallePorId($id,$_SESSION['nombre_sahilices'],'M');
         echo '';
      } else {
         echo 'Hubo un error al modificar datos';
      }
   } else {
      echo 'Hubo un error, los campos concepto y leyenda son obligatorios';
   }

}

function insertarCotizaciones($serviciosReferencias) {
   $refclientes = $_POST['refclientes'];
   $refestados = $_POST['refestadocotizacion'];
   $refcontactos = $_POST['refcontactos'];
   $refmotivosoportunidades = $_POST['refmotivosoportunidades'];
   $reftipostrabajos = $_POST['reftipostrabajos'];
   $refusuarios = $_POST['refusuarios'];
   $observaciones = $_POST['observaciones'];
   $fechacrea = $_POST['fechacrea'];
   $fechamodi = $_POST['fechamodi'];
   $usuariomodi = $_POST['usuariomodi'];
   $refempresas = $_POST['refempresasaux'];
   $reflistas = $_POST['reflistasaux'];

   // depende de donde venga, si es de una oportunidad el id oportunidad sino el id cotizacion
   $tiporeferencia = $_POST['tiporeferencia']; // 0 => de una oportunidad, 1 => cotizacion de cero
   $referencia1 = $_POST['referencia1'];

   /* detalle de la cotizacion */
   $formadepago = $_POST['refformapago'];
   $validez = $_POST['refvalidez'];
   $plazosentrega = $_POST['refplazos'];

   $resNotas = $serviciosReferencias->traerTipotrabajoconceptosPorTipoTrabajo($reftipostrabajos);
   // item
   $resItem = $serviciosReferencias->traerCotizaciondetallesauxPorOportunidad($referencia1);
   /* fin detalle */

   $res = $serviciosReferencias->insertarCotizaciones($refclientes,$refestados,$refcontactos,$refmotivosoportunidades,$reftipostrabajos,$refusuarios,$observaciones,$fechacrea,$fechamodi,$usuariomodi,$refempresas,$reflistas);


   if ((integer)$res > 0) {
      while ($rowItem = mysql_fetch_array($resItem)) {
         $refcotizaciones = $res;
         $refconceptos = $rowItem['refconceptos'];
         $cantidad = $rowItem['cantidad'];
         $preciounitario = $rowItem['preciounitario'];
         $porcentajebonificado = $rowItem['porcentajebonificado'];
         $reftipomonedas = $rowItem['reftipomonedas'];
         $rango = 0;
         $aplicatotal = 1;
         $cargavieja = $rowItem['cargavieja'];
         $concepto = '';
         $leyenda = '';

         $resInsertItem = $serviciosReferencias->insertarCotizaciondetalles($refcotizaciones,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja, $concepto, $leyenda);
      }

      while ($rowNotas = mysql_fetch_array($resNotas)) {
         $refcotizaciones = $res;
         $refconceptos = $rowNotas['refconceptos'];
         $cantidad = 1;
         $preciounitario = 0;
         $porcentajebonificado = 0;
         $reftipomonedas = 1;
         $rango = 0;
         $aplicatotal = 1;
         $cargavieja = 0;
         $concepto = $serviciosReferencias->devolverConcepto($rowNotas['refconceptos'],2);
         $leyenda = $serviciosReferencias->devolverConcepto($rowNotas['refconceptos'],4);

         $resInsertNotas = $serviciosReferencias->insertarCotizaciondetalles($refcotizaciones,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja, $concepto, $leyenda);
      }

      // forma de pago
      $resInsertFormaPago = $serviciosReferencias->insertarCotizaciondetalles($res,$formadepago,1,0,0,1,0,1,0, $serviciosReferencias->devolverConcepto($formadepago,2) , $serviciosReferencias->devolverConcepto($formadepago,4) );

      // validez
      $resInsertFormaPago = $serviciosReferencias->insertarCotizaciondetalles($res,$validez,1,0,0,1,0,1,0, $serviciosReferencias->devolverConcepto($validez,2) , $serviciosReferencias->devolverConcepto($validez,4));

      // plazos de entrega
      $resInsertFormaPago = $serviciosReferencias->insertarCotizaciondetalles($res,$plazosentrega,1,0,0,1,0,1,0, $serviciosReferencias->devolverConcepto($plazosentrega,2) , $serviciosReferencias->devolverConcepto($plazosentrega,4));

      //actualizo la oportunidad en caso de que venga de una oportunidades
      $resCambioEstado = $serviciosReferencias->modificarEstadoCotizacionOportunidad($referencia1, $res);


      echo '';
   } else {
      echo 'Hubo un error al insertar datos';
   }

   //echo $res;
}

function modificarCotizaciones($serviciosReferencias) {
   $id = $_POST['id'];

   $refestados = $_POST['refestadocotizacion'];
   $refcontactos = $_POST['refcontactos'];
   $refmotivosoportunidades = $_POST['refmotivosoportunidades'];

   $observaciones = $_POST['observaciones'];

   session_start();
   $usuariomodi = $_SESSION['nombre_sahilices'];
   $refempresas = $_POST['refempresasaux'];

   // los 3 conceptos de forma de pago, validez de la oferta y plazos de entrega
   $formadepago = $_POST['refformapago'];
   // formas de pago
   $resDCformapago = $serviciosReferencias->traerCotizacionDetallePorTipoConcepto($id,3);

   $validez = $_POST['refvalidez'];
   // validez
   $resDCvalidez = $serviciosReferencias->traerCotizacionDetallePorTipoConcepto($id,4);

   $plazosentrega = $_POST['refplazos'];
   // plazos de entrega
   $resDCplazo = $serviciosReferencias->traerCotizacionDetallePorTipoConcepto($id,5);
   // *****************         //

   $res = $serviciosReferencias->modificarCotizaciones($id,$refestados,$refcontactos,$refmotivosoportunidades,$observaciones,$usuariomodi,$refempresas);

   if ($res == true) {
      //$serviciosReferencias->copiarDetallePorId($id,$_SESSION['nombre_sahilices'],'M');
      if ($formadepago != mysql_result($resDCformapago,0,0)) {

         $res1 =$serviciosReferencias->copiarDetallePorId(mysql_result($resDCformapago,0,'idcotizaciondetalle'),$_SESSION['nombre_sahilices'],'M');

         $res1m = $serviciosReferencias->modificarCotizacionDetalle3PorId(mysql_result($resDCformapago,0,'idcotizaciondetalle'), $formadepago);
      }
      if ($validez != mysql_result($resDCvalidez,0,0)) {

         $res2 =$serviciosReferencias->copiarDetallePorId(mysql_result($resDCvalidez,0,'idcotizaciondetalle'),$_SESSION['nombre_sahilices'],'M');

         $res2m = $serviciosReferencias->modificarCotizacionDetalle3PorId(mysql_result($resDCvalidez,0,'idcotizaciondetalle'), $validez);

      }
      if ($plazosentrega != mysql_result($resDCplazo,0,0)) {
         $res3 = $serviciosReferencias->copiarDetallePorId(mysql_result($resDCplazo,0,'idcotizaciondetalle'),$_SESSION['nombre_sahilices'],'M');

         $res3m = $serviciosReferencias->modificarCotizacionDetalle3PorId(mysql_result($resDCplazo,0,'idcotizaciondetalle'), $plazosentrega);
      }
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarCotizaciones($serviciosReferencias) {
   $id = $_POST['id'];
   $res = $serviciosReferencias->eliminarCotizaciones($id);
   echo $res;
}

function traerCotizaciones($serviciosReferencias) {
   $res = $serviciosReferencias->traerCotizaciones();
   $ar = array();

   while ($row = mysql_fetch_array($res)) {
      array_push($ar, $row);
   }

   $resV['datos'] = $ar;

   header('Content-type: application/json');
   echo json_encode($resV);
}
function traerEstadosCotizaciones($serviciosReferencias) {
   $res = $serviciosReferencias->traerEstadosCotizaciones();
   $ar = array();
    while ($row = mysql_fetch_array($res)) {
      array_push($ar, $row);
   }
   $resV['datos'] = $ar;

   header('Content-type: application/json');
   echo json_encode($resV);
}

function insertarCotizacionmovimientos($serviciosReferencias) {
   $refcotizaciondetalles = $_POST['refcotizaciondetalles'];
   $refconceptos = $_POST['refconceptos'];
   $cantidad = $_POST['cantidad'];
   $preciounitario = $_POST['preciounitario'];
   $porcentajebonificado = $_POST['porcentajebonificado'];
   $reftipomonedas = $_POST['reftipomonedas'];
   $rango = $_POST['rango'];

   if (isset($_POST['aplicatotal'])) {
      $aplicatotal	= 1;
   } else {
      $aplicatotal = 0;
   }

   $fechacrea = $_POST['fechacrea'];
   $usuariocrea = $_POST['usuariocrea'];

   $res = $serviciosReferencias->insertarCotizacionmovimientos($refcotizaciondetalles,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$fechacrea,$usuariocrea);

   if ((integer)$res > 0) {
      echo '';
   } else {
      echo 'Hubo un error al insertar datos';
   }
}

function modificarCotizacionmovimientos($serviciosReferencias) {
   $id = $_POST['id'];
   $refcotizaciondetalles = $_POST['refcotizaciondetalles'];
   $refconceptos = $_POST['refconceptos'];
   $cantidad = $_POST['cantidad'];
   $preciounitario = $_POST['preciounitario'];
   $porcentajebonificado = $_POST['porcentajebonificado'];
   $reftipomonedas = $_POST['reftipomonedas'];
   $rango = $_POST['rango'];

   if (isset($_POST['aplicatotal'])) {
      $aplicatotal	= 1;
   } else {
      $aplicatotal = 0;
   }

   $fechacrea = $_POST['fechacrea'];
   $usuariocrea = $_POST['usuariocrea'];

   $res = $serviciosReferencias->modificarCotizacionmovimientos($id,$refcotizaciondetalles,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$fechacrea,$usuariocrea);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarCotizacionmovimientos($serviciosReferencias) {
   $id = $_POST['id'];
   $res = $serviciosReferencias->eliminarCotizacionmovimientos($id);
   echo $res;
}

function traerCotizacionmovimientos($serviciosReferencias) {
   $res = $serviciosReferencias->traerCotizacionmovimientos();
   $ar = array();
   while ($row = mysql_fetch_array($res)) {
   array_push($ar, $row);
   }
   $resV['datos'] = $ar;
   header('Content-type: application/json');
   echo json_encode($resV);
}

   function traerContactosPorCliente($serviciosReferencias) {
      $refclientes            = $_POST['refclientes'];

      $res = $serviciosReferencias->traerContactosPorCliente($refclientes);

      $ar = array();
      if (mysql_num_rows($res)>0) {
         while ($row = mysql_fetch_array($res)) {
            array_push($ar, array('idcontacto' => $row['idcontacto'], 'apellido' => $row['apellido'], 'nombre' => $row['nombre'], 'sector' => $row['sector'], 'planta' => $row['planta']));
         }
      } else {
         $ar = array();
      }

      header('Content-type: application/json');
   	echo json_encode($ar);
   }


   /* carrito de items */
   function agregarItem($serviciosReferencias) {

      $refclientes            = $_POST['refclientes'];

      $refoportunidad         = $_POST['id'];
      $refconceptos           = $_POST['refconceptos'];
      $cantidad               = $_POST['cantidad'];

      $porcentajebonificado   = $_POST['porcentajebonificado'];
      $reftipomonedas         = $_POST['reftipomonedas'];
      $rango                  = 0;
      $aplicatotal            = $_POST['aplicatotal'];
      $cargavieja             = 0;
      $concepto               = '';
      $leyenda                = '';

      $preciounitario         = $serviciosReferencias->traerPrecioPorIdConcepto($refconceptos, $refclientes)['precio'];

      $refcotizaciones        = $_POST['id'];

      $res = $serviciosReferencias->insertarCotizaciondetallesaux($refoportunidad,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja,$concepto,$leyenda,$refcotizaciones);

      echo '';
   }

   /* carrito de items */
   function agregarItemUsuario($serviciosReferencias) {

      $refclientes            = $_POST['refclientes'];

      $refoportunidad         = 0;
      $refconceptos           = $_POST['refconceptos'];
      $cantidad               = $_POST['cantidad'];

      $porcentajebonificado   = $_POST['porcentajebonificado'];
      $reftipomonedas         = $_POST['reftipomonedas'];
      $rango                  = 0;
      $aplicatotal            = $_POST['aplicatotal'];
      $cargavieja             = 0;
      $concepto               = '';
      $leyenda                = '';

      $refcotizaciones        = $_POST['id'];

      $preciounitario         = $serviciosReferencias->traerPrecioPorIdConcepto($refconceptos, $refclientes)['precio'];



      $res = $serviciosReferencias->insertarCotizaciondetallesaux($refoportunidad,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja,$concepto,$leyenda,$refcotizaciones);

      echo '';
   }

   function agregarItemId($serviciosReferencias) {

      $refclientes            = $_POST['refclientes'];

      $refoportunidad         = 0;
      $refconceptos           = $_POST['refconceptos'];
      $cantidad               = $_POST['cantidad'];

      $porcentajebonificado   = $_POST['porcentajebonificado'];
      $reftipomonedas         = $_POST['reftipomonedas'];
      $rango                  = 0;
      $aplicatotal            = $_POST['aplicatotal'];
      $cargavieja             = 0;
      $concepto               = '';
      $leyenda                = '';

      $refcotizaciones        = $_POST['id'];

      $preciounitario         = $serviciosReferencias->traerPrecioPorIdConcepto($refconceptos, $refclientes)['precio'];



      $res = $serviciosReferencias->insertarCotizaciondetalles($refcotizaciones,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja, $concepto, $leyenda);

      session_start();
      $serviciosReferencias->copiarDetallePorId($res,$_SESSION['nombre_sahilices'],'I');

      echo '';
   }

   function eliminarCotizaciondetallesaux($serviciosReferencias) {
      $id = $_POST['id'];

      $res = $serviciosReferencias->eliminarCotizaciondetallesaux($id);

      if ($res == true) {

         echo '';
      } else {
         echo 'Hubo un error al modificar datos';
      }
   }

   function eliminarCotizaciondetalles($serviciosReferencias) {
      $id = $_POST['id'];

      session_start();
      $serviciosReferencias->copiarDetallePorId($id,$_SESSION['nombre_sahilices'],'E');

      $res = $serviciosReferencias->eliminarCotizaciondetalles($id);

      if ($res == true) {

         echo '';
      } else {
         echo 'Hubo un error al modificar datos';
      }
   }

   function traerTipotrabajoconceptosPorTipoTrabajo($serviciosReferencias) {
      $id = $_POST['id'];

      $error = false;

      $res = $serviciosReferencias->traerTipotrabajoconceptosPorTipoTrabajo($id);
      $ar = array();
      if (mysql_num_rows($res)>0) {
         while ($row = mysql_fetch_array($res)) {
            array_push($ar, array('refconceptos' => $row['refconceptos'], 'concepto' => $row['concepto'], 'leyenda' => $row['leyenda']));
         }
      } else {
         $ar = array();
      }

      header('Content-type: application/json');
   	echo json_encode($ar);
   }
   /* fin carrito */

function traerPrecioPorIdConcepto($serviciosReferencias) {
   $idconcepto = $_POST['idconcepto'];
   $idcliente = $_POST['idcliente'];

   $res = $serviciosReferencias->traerPrecioPorIdConcepto($idconcepto, $idcliente)['precio'];

   echo $res;
}

function traerPrecioPorIdConceptoJ($serviciosReferencias) {
   $idconcepto = $_POST['idconcepto'];
   $idcliente = $_POST['idcliente'];

   $res = $serviciosReferencias->traerPrecioPorIdConcepto($idconcepto, $idcliente);

   $ar['error'] = true;
   $ar['precio'] = 0;
   $ar['idmoneda'] = 1;
   $ar['moneda'] = 'ARG';

   if (count($res) > 0) {
      $ar['error'] = false;
      $ar['precio'] = $res['precio'];
      $ar['idmoneda'] = $res['moneda'];
      $ar['moneda'] = $res['monedanombre'];
   }

   header('Content-type: application/json');
   echo json_encode($ar);
}

function insertarTipotrabajoconceptos($serviciosReferencias) {
   $reftipostrabajos = $_POST['reftipostrabajos'];
   $refconceptos = $_POST['refconceptos'];

   if ($serviciosReferencias->existeDupla($reftipostrabajos,$refconceptos) == 1) {
      echo 'Ya existe este Concepto';
   } else {
      $res = $serviciosReferencias->insertarTipotrabajoconceptos($reftipostrabajos,$refconceptos);

      if ((integer)$res > 0) {
         echo '';
      } else {
         echo 'Hubo un error al insertar datos';
      }
   }

}

function modificarTipotrabajoconceptos($serviciosReferencias) {
   $id = $_POST['id'];
   $reftipostrabajos = $_POST['reftipostrabajos'];
   $refconceptos = $_POST['refconceptos'];

   $res = $serviciosReferencias->modificarTipotrabajoconceptos($id,$reftipostrabajos,$refconceptos);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarTipotrabajoconceptos($serviciosReferencias) {
   $id = $_POST['id'];
   $res = $serviciosReferencias->eliminarTipotrabajoconceptos($id);
   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function devolverEstadoCliente($serviciosReferencias) {
   $id = $_POST['idcliente'];

   $res = $serviciosReferencias->devolverEstadoCliente($id);

   if (mysql_num_rows($res) > 0) {
      $ar = array('Estado' => mysql_result($res,0,0), 'Comentario' => mysql_result($res,0,1), 'Color' => mysql_result($res,0,2));
   } else {
      $ar = array('Estado' => '', 'Comentario' => 'No posee comentarios', 'Color' => 'blue');
   }

   header('Content-type: application/json');
	echo json_encode($ar);
}

function traerNotificacionesPorRol($serviciosReferencias, $serviciosNotificaciones, $serviciosUsuarios) {
   session_start();

   $usuario = $_SESSION['nombre_sahilices'];
   $idrol = $_SESSION['idroll_sahilices'];
   $idusuario = $_SESSION['usuaid_sahilices'];
   $email = $_SESSION['email_sahilices'];

   $altura = $_POST['altura'];

	$res = $serviciosNotificaciones->traerNotificacionesPorUsuarios($email);

	$cad = '';

	$cantidad = 0;
	while ($row = mysql_fetch_array($res)) {
      if ($row['leido'] == 'No') {
         $cantidad += 1;
      }


      $cad .= '<li>
                     <a href="'.$altura.'notificaciones/router.php?id='.$row[0].'" class=" waves-effect waves-block">
                     <div class="icon-circle bg-'.$row['estilo'].'">
                        <i class="material-icons">'.$row['icono'].'</i>
                     </div>
                     <div class="menu-info">
                        <h4>'.$row['mensaje'].'</h4>
                           <p>
                              <i class="material-icons">access_time</i> '.$row['fecha'].'
                           </p>
                     </div>
                  </a>
               </li>';
	}
	$cad .= '';


	//echo array('respuesta' => $cad, 'cantidad' => $cantidad);
	header('Content-type: application/json');
	echo json_encode(array('respuesta' => $cad, 'cantidad' => $cantidad));
}

function verificarSemaforos($serviciosReferencias, $serviciosNotificaciones, $serviciosUsuarios) {
   $res = $serviciosReferencias->traerOportunidadesActivas();

   $mensaje = 'Demora de Oportunidad';
	$idpagina = '1';
	$autor = 'Sistema';
	$destinatario = '';
	$id1 = 0;
	$id2 = 0;
	$id3 = 0;
	$icono = 'alarm';
	$estilo = '';
	$fecha = date('Y-m-d H:i:s');
	$url = 'oportunidades/oportunidad.php?id=';

   $bandera = '0';
   while ($row = mysql_fetch_array($res)) {
      $semaforo = $serviciosReferencias->devolverSemaforosPorDias($row['mora']);
      if ($semaforo != $row['refsemaforos']) {
         $bandera = '1';
         //envio email a quien corresponda y genero notificacion al usuario Responsables
         $id1 = $row[0];
         $usuario = $serviciosUsuarios->traerUsuarioId($row['refusuarios']);
         $destinatario = mysql_result($usuario,0,'email');
         $emailUsuario = mysql_result($usuario,0,'email');
         switch ($semaforo) {
            case 2:
               $estilo = 'orange';
               break;
            case 3:
               $estilo = 'red';
               break;
            default:
               $estilo = 'green';
               break;
         }
         $resInsertarNotificacion = $serviciosNotificaciones->insertarNotificaciones($mensaje,$idpagina,$autor,$destinatario,$id1,$id2,$id3,$icono,$estilo,$fecha,$url);
         // fin

         $resModificarOportunidad = $serviciosReferencias->modificarSemaforoOportunidad($row[0],$semaforo);


      }
   }

   echo $bandera;
}


function insertarOportunidades($serviciosReferencias) {
   $empresa = $_POST['empresa'];
   $contacto = $_POST['contacto'];
   $telefono = $_POST['telefono'];
   $email = $_POST['email'];
   $comentarios = $_POST['comentarios'];
   $reftipostrabajos = $_POST['reftipostrabajos'];
   $refmotivosoportunidades = $_POST['refmotivosoportunidades'];
   $observaciones = $_POST['observaciones'];
   $refusuarios = $_POST['refusuarios'];
   $refestados = $_POST['refestados'];

   $refcotizaciones = 0;
   $refsemaforos = $_POST['refsemaforos'];
   $refestadocotizacion = $_POST['refestadocotizacion'];

   $res = $serviciosReferencias->insertarOportunidades($empresa,$contacto,$telefono,$email,$comentarios,$reftipostrabajos,$refmotivosoportunidades,$observaciones,$refusuarios,$refestados,$refcotizaciones,$refsemaforos,$refestadocotizacion);

   if ((integer)$res > 0) {
      echo '';
   } else {
      echo 'Hubo un error al insertar datos ';
   }
}


function modificarOportunidades($serviciosReferencias) {
   $id = $_POST['id'];
   $empresa = $_POST['empresa'];
   $contacto = $_POST['contacto'];
   $telefono = $_POST['telefono'];
   $email = $_POST['email'];
   $comentarios = $_POST['comentarios'];
   $reftipostrabajos = $_POST['reftipostrabajos'];
   $refmotivosoportunidades = $_POST['refmotivosoportunidades'];
   $observaciones = $_POST['observaciones'];
   $refusuarios = $_POST['refusuarios'];
   $refestados = $_POST['refestados'];

   $refcotizaciones = $_POST['refcotizaciones'];
   $refsemaforos = $_POST['refsemaforos'];
   $refestadocotizacion = $_POST['refestadocotizacion'];

   $res = $serviciosReferencias->modificarOportunidades($id,$empresa,$contacto,$telefono,$email,$comentarios,$reftipostrabajos,$refmotivosoportunidades,$observaciones,$refusuarios,$refestados,$refcotizaciones,$refsemaforos,$refestadocotizacion);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}


function eliminarOportunidades($serviciosReferencias) {
   $id = $_POST['id'];
   $res = $serviciosReferencias->eliminarOportunidades($id);
   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerOportunidades($serviciosReferencias) {
   $res = $serviciosReferencias->traerOportunidades();
   $ar = array();

   while ($row = mysql_fetch_array($res)) {
      array_push($ar, $row);
   }

   $resV['datos'] = $ar;

   header('Content-type: application/json');
   echo json_encode($resV);
}


function frmAjaxModificar($serviciosFunciones, $serviciosReferencias, $serviciosUsuarios) {
   $tabla = $_POST['tabla'];
   $id = $_POST['id'];

   session_start();

   switch ($tabla) {
      case 'tbunidadesnegocios':
         $modificar = "modificarUnidadesnegocios";
         $idTabla = "idunidadnegocio";

         $lblCambio	 	= array("unidadnegocio");
         $lblreemplazo	= array("Unidad de Negocio");

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbtipostrabajos':
         $modificar = "modificarTipostrabajos";
         $idTabla = "idtipotrabajo";

         $lblCambio	 	= array("tipotrabajo");
         $lblreemplazo	= array("Tipo de Trabajo");

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbtipomonedas':
         $modificar = "modificarTipomonedas";
         $idTabla = "idtipomoneda";

         $lblCambio	 	= array("tipomoneda");
         $lblreemplazo	= array("Tipo de Moneda");

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbtipoconceptos':
         $modificar = "modificarTipoconceptos";
         $idTabla = "idtipoconcepto";

         $lblCambio	 	= array("tipoconcepto");
         $lblreemplazo	= array("Tipo de Concepto");

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbtipoclientes':
         $modificar = "modificarTipoclientes";
         $idTabla = "idtipocliente";

         $lblCambio	 	= array("tipocliente");
         $lblreemplazo	= array("Tipo de Clientes");

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbmotivosoportunidades':
         $modificar = "modificarMotivosoportunidades";
         $idTabla = "idmotivooportunidad";

         $lblCambio	 	= array();
         $lblreemplazo	= array();

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'tbrecursosnecesarios':
         $modificar = "modificarRecursosnecesarios";
         $idTabla = "idrecursonecesario";

         $lblCambio	 	= array('recursonecesario');
         $lblreemplazo	= array('Recurso Necesario');

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'dbempleados':
         $res = $serviciosReferencias->traerEmpleadosPorId($id);
         $modificar = "modificarEmpleados";
         $idTabla = "idempleado";

         $lblCambio	 	= array('nrodocumento','fechanacimiento','telefonofijo','telefonomovil');
         $lblreemplazo	= array('Nro Documento','Fecha Nacimiento','Tel. Fijo','Tel. Movil');

         if (mysql_result($res,0,'sexo') == 'F') {
            $cadRef 	= '<option value="F" selected>Femenino</option><option value="M">Masculino</option>';
         } else {
            $cadRef 	= '<option value="F">Femenino</option><option value="M" selected>Masculino</option>';
         }


         $refdescripcion = array(0=>$cadRef);
         $refCampo 	=  array('sexo');
         break;
      case 'dbconceptos':
         $resultado = $serviciosReferencias->traerConceptosPorId($id);

         $modificar = "modificarConceptos";
         $idTabla = "idconcepto";

         $lblCambio	 	= array("reftipoconceptos");
         $lblreemplazo	= array('Tipo Conceptos');

         $resV = $serviciosReferencias->traerTipoconceptos();
         $cadRef 	= $serviciosFunciones->devolverSelectBoxActivo($resV,array(1),'', mysql_result($resultado,0,'reftipoconceptos'));

         $refdescripcion = array(0=>$cadRef);
         $refCampo 	=  array('reftipoconceptos');
         break;

      case 'dbusuarios':
         $resultado = $serviciosUsuarios->traerUsuarioId($id);
         $modificar = "modificarUsuario";
         $idTabla = "idusuario";

         $lblCambio	 	= array('refroles','refunidadesnegocios','refcontactos','refsector');
         $lblreemplazo	= array('Perfil','Unidad de Negocio','Contacto','Sector');

         //obtengo los roles dependiendo el rol que este logueado
         if($_SESSION['idroll_sahilices']==1){
         	$refRoles = $serviciosUsuarios->traerRoles();
         	$cadRef 	= $serviciosFunciones->devolverSelectBox($refRoles,array(1),'');
         }else{
         	$refRoles = $serviciosUsuarios->traerRolesSimple();
         	$cadRef 	= $serviciosFunciones->devolverSelectBox($refRoles,array(1),'');
         }

         //traigo las unidades de negocios
         $refUN = $serviciosReferencias->traerUnidadesnegocios();
         $cadRefUN    = $serviciosFunciones->devolverSelectBoxActivo($refUN,array(1),'', mysql_result($resultado,0,'refunidadesnegocios'));

         //traigo los contactos
         $refC = $serviciosReferencias->traerContactos();
         $cadRefC    = $serviciosFunciones->devolverSelectBoxActivo($refC,array(2,3,4,5,6),'', mysql_result($resultado,0,'refcontactos'));

         //traigo los sectores
         $refS = $serviciosReferencias->traerSectores();
         $cadRefS    = $serviciosFunciones->devolverSelectBoxActivo($refS,array(2),'', mysql_result($resultado,0,'refsector'));

         $refdescripcion = array(0=>$cadRef,1=>$cadRefUN,2=>$cadRefC,3=>$cadRefS);
         $refCampo 	=  array('refroles','refunidadesnegocios','refcontactos','refsector');

         break;
      case 'dbconceptosviaticos':
         $resultado = $serviciosReferencias->traerConceptosviaticosPorId($id);

         $modificar = "modificarConceptosviaticos";
         $idTabla = "idconceptoviatico";

         $lblCambio	 	= array('refconceptos');
         $lblreemplazo	= array('Conceptos');


         $resVar1 = $serviciosReferencias->traerConceptos();
         $cadRef1 	= $serviciosFunciones->devolverSelectBoxActivo($resVar1,array(1),'', mysql_result($resultado,0,'refconceptos'));

         $refdescripcion = array(0=>$cadRef1);
         $refCampo 	=  array('refconceptos');
         break;
      case 'dbclientes':
         $modificar = "modificarClientes";
         $idTabla = "idcliente";

         $lblCambio	 	= array('razonsocial');
         $lblreemplazo	= array('Razon Social');

         $cadRef 	= '';

         $refdescripcion = array();
         $refCampo 	=  array();
         break;
      case 'dbplantas':
         $modificar = "modificarPlantas";
         $idTabla = "idplanta";

         $lblCambio	 	= array('refclientes');
         $lblreemplazo	= array('Cliente');

         $resVar1 = $serviciosReferencias->traerClientesPorId($_POST['referencia1']);
         $cadRef1 	= $serviciosFunciones->devolverSelectBoxActivo($resVar1,array(1),'', $_POST['referencia1']);

         $refdescripcion = array(0=>$cadRef1);
         $refCampo 	=  array('refclientes');
         break;
      case 'dbsectores':
         $resultado = $serviciosReferencias->traerSectoresPorId($id);
         $modificar = "modificarSectores";
         $idTabla = "idsector";

         $lblCambio	 	= array('refplantas');
         $lblreemplazo	= array('Planta');

         $resVar2 = $serviciosReferencias->traerPlantasPorCliente($_POST['referencia1']);
         $cadRef2 	= $serviciosFunciones->devolverSelectBoxActivo($resVar2,array(2),'', mysql_result($resultado,0,'refplantas'));

         $refdescripcion = array(0=> $cadRef2);
         $refCampo 	=  array('refplantas');
         break;
      case 'dbcontactos':
         $resultado = $serviciosReferencias->traerContactosPorId($id);
         $modificar = "modificarContactos";
         $idTabla = "idcontacto";

         $lblCambio	 	= array('refsectores');
         $lblreemplazo	= array('Sector');

         $resVar2 = $serviciosReferencias->traerSectoresPorCliente($_POST['referencia1']);
         $cadRef2 	= $serviciosFunciones->devolverSelectBoxActivo($resVar2,array(3,2),' - ', mysql_result($resultado,0,'refsectores'));

         $refdescripcion = array(0=> $cadRef2);
         $refCampo 	=  array('refsectores');
         break;
      case 'dblistasprecios':
         $resultado = $serviciosReferencias->traerListaspreciosPorId($id);
         $modificar = "modificarListasprecios";
         $idTabla = "idlistaprecio";

         $lblCambio	 	= array('refconceptos','reftipomonedas');
         $lblreemplazo	= array('Conceptos','Tipo Moneda');

         $resVar = $serviciosReferencias->traerTipomonedas();
         $cadRef 	= $serviciosFunciones->devolverSelectBoxActivo($resVar,array(1),'',mysql_result($resultado,0,'reftipomonedas'));

         $resVar2 = $serviciosReferencias->traerConceptos();
         $cadRef2 	= $serviciosFunciones->devolverSelectBoxActivo($resVar2,array(1),' - ', mysql_result($resultado,0,'refconceptos'));

         $refdescripcion = array(0=> $cadRef2, 1=>$cadRef);
         $refCampo 	=  array('refconceptos','reftipomonedas');
         break;
      case 'dboportunidades':
         $resultado = $serviciosReferencias->traerOportunidadesPorId($id);
         $modificar = "modificarOportunidades";
         $idTabla = "idoportunidad";


         $lblCambio	 	= array('reftipostrabajos','refmotivosoportunidades','refusuarios','refestados','refcotizaciones','refsemaforos','fechacreacion','refestadocotizacion');
         $lblreemplazo	= array('Tipo de Trabajo','Motivo de Oportunidad','Usuario','Estado','Id Cotizacion','Demora','Fecha Creacion','Est.Cot.');


         $resVar1 = $serviciosReferencias->traerTipostrabajos();
         $cadRef1 	= $serviciosFunciones->devolverSelectBoxActivo($resVar1,array(1),'', mysql_result($resultado,0,'reftipostrabajos'));

         $resVar2 = $serviciosReferencias->traerMotivosoportunidades();
         $cadRef2 	= $serviciosFunciones->devolverSelectBoxActivo($resVar2,array(1),'',mysql_result($resultado,0,'reftipostrabajos'));

         $resVar3 = $serviciosUsuarios->traerUsuarioId($_SESSION['usuaid_sahilices']);
         $cadRef3 	= $serviciosFunciones->devolverSelectBox($resVar3,array(1),'');

         $resVar4 = $serviciosReferencias->traerEstadosInId(1,2);
         $cadRef4 	= $serviciosFunciones->devolverSelectBox($resVar4,array(1),'',mysql_result($resultado,0,'refestados'));

         $resVar5 = $serviciosReferencias->traerSemaforosPorId(mysql_result($resultado,0,'refsemaforos'));
         $cadRef5 	= $serviciosFunciones->devolverSelectBox($resVar5,array(2,3),' a ');

         $resVar6 = $serviciosReferencias->traerEstadoCotizacionPorId(mysql_result($resultado,0,'refestadocotizacion'));
         $cadRef6 	= $serviciosFunciones->devolverSelectBox($resVar6,array(1),'');

         $refdescripcion = array(0=>$cadRef1,1=>$cadRef2,2=>$cadRef3,3=>$cadRef4,4=>$cadRef5,5=>$cadRef6);
         $refCampo 	=  array('reftipostrabajos','refmotivosoportunidades','refusuarios','refestados','refsemaforos','refestadocotizacion');

         break;

      default:
         // code...
         break;
   }

   $formulario = $serviciosFunciones->camposTablaModificar($id, $idTabla,$modificar,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

   echo $formulario;
}


function frmAjaxNuevo($serviciosFunciones, $serviciosReferencias) {
   $tabla = $_POST['tabla'];
   $id = $_POST['id'];

   switch ($tabla) {
      case 'dbplantas':

         $insertar = "insertarPlantas";
         $idTabla = "idplanta";

         $lblCambio	 	= array("reflientes");
         $lblreemplazo	= array("Cliente");

         $resVar1 = $serviciosReferencias->traerClientesPorId($id);
         $cadRef1 	= $serviciosFunciones->devolverSelectBoxActivo($resVar1,array(1),'', $id);

         $refdescripcion = array(0=>$cadRef1);
         $refCampo 	=  array('refclientes');
         break;
      case 'dbsectores':
         $insertar = "insertarSectores";
         $idTabla = "idsector";

         $lblCambio	 	= array("refplantas");
         $lblreemplazo	= array("Planta");

         $resVar1 = $serviciosReferencias->traerPlantasPorCliente($id);
         $cadRef1 	= $serviciosFunciones->devolverSelectBox($resVar1,array(2),'');

         $refdescripcion = array(0=>$cadRef1);
         $refCampo 	=  array('refplantas');
         break;
      case 'dbcontactos':
         $insertar = "insertarContactos";
         $idTabla = "idcontacto";

         $lblCambio	 	= array("refsectores");
         $lblreemplazo	= array("Sector");

         $resVar1 = $serviciosReferencias->traerSectoresPorCliente($id);
         $cadRef1 	= $serviciosFunciones->devolverSelectBox($resVar1,array(3,2),' - ');

         $refdescripcion = array(0=>$cadRef1);
         $refCampo 	=  array('refsectores');
         break;


      default:
         // code...
         break;
   }

   $formulario = $serviciosFunciones->camposTablaViejo($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

   echo $formulario;
}


/* PARA Unidadesnegocios */

function insertarClientes($serviciosReferencias, $serviciosValidador) {
   $error = '';

   $razonsocial = ( $serviciosValidador->validaRequerido( trim($_POST['razonsocial']) ) == true ? trim($_POST['razonsocial']) : $error .= 'El campo Razon Social es obligatorio
   ');

   $cuit = ( $serviciosValidador->validaRequerido( str_replace('_','',trim($_POST['cuit'])) ) == true ?
               $serviciosValidador->validaLongitud( str_replace('_','',trim($_POST['cuit'])),11 ) == true ? str_replace('_','',trim($_POST['cuit'])) : $error .= 'El campo CUIT no valido
   ' : $error .= 'El campo CUIT es obligatorio
   ');

   $direccion = $_POST['direccion'];
   $email = $_POST['email'];
   $telefono = $_POST['telefono'];

   if ($error != '') {
      echo $error;
   } else {
      $res = $serviciosReferencias->insertarClientes($razonsocial,$cuit,$direccion,$email,$telefono);

      if ((integer)$res > 0) {
         echo '';
      } else {
         echo 'Hubo un error al insertar datos';
      }
   }

}

function modificarClientes($serviciosReferencias, $serviciosValidador) {
   $error = '';

   $id = $_POST['id'];
   $razonsocial = ( $serviciosValidador->validaRequerido( trim($_POST['razonsocial']) ) == true ? trim($_POST['razonsocial']) : $error .= 'El campo Razon Social es obligatorio
   ');

   $cuit = ( $serviciosValidador->validaRequerido( str_replace('_','',trim($_POST['cuit'])) ) == true ?
               $serviciosValidador->validaLongitud( str_replace('_','',trim($_POST['cuit'])),11 ) == true ? str_replace('_','',trim($_POST['cuit'])) : $error .= 'El campo CUIT no valido
   ' : $error .= 'El campo CUIT es obligatorio
   ');

   $direccion = $_POST['direccion'];
   $email = $_POST['email'];
   $telefono = $_POST['telefono'];

   if ($error != '') {
      echo $error;
   } else {
      $res = $serviciosReferencias->modificarClientes($id,$razonsocial,$cuit,$direccion,$email,$telefono);

      if ($res == true) {
         echo '';
      } else {
         echo 'Hubo un error al modificar datos';
      }
   }

}

function eliminarClientes($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarClientes($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerClientes($serviciosReferencias) {
   $res = $serviciosReferencias->traerClientes();
   $ar = array();

   while ($row = mysql_fetch_array($res)) {
   array_push($ar, $row);
   }
   $resV['datos'] = $ar;
   header('Content-type: application/json');
   echo json_encode($resV);
}

function insertarConceptos($serviciosReferencias) {
   $reftipoconceptos = $_POST['reftipoconceptos'];
   $concepto = $_POST['concepto'];
   $abreviatura = $_POST['abreviatura'];
   $leyenda = $_POST['leyenda'];

   if (isset($_POST['activo'])) {
      $activo	= 1;
   } else {
      $activo = 0;
   }

   $res = $serviciosReferencias->insertarConceptos($reftipoconceptos,$concepto,$abreviatura,$leyenda,$activo);

   if ((integer)$res > 0) {
      echo '';
   } else {
      echo 'Hubo un error al insertar datos';
   }
}

function modificarConceptos($serviciosReferencias) {
   $id = $_POST['id'];

   $reftipoconceptos = $_POST['reftipoconceptos'];
   $concepto = $_POST['concepto'];
   $abreviatura = $_POST['abreviatura'];
   $leyenda = $_POST['leyenda'];

   if (isset($_POST['activo'])) {
      $activo	= 1;
   } else {
      $activo = 0;
   }

   $res = $serviciosReferencias->modificarConceptos($id,$reftipoconceptos,$concepto,$abreviatura,$leyenda,$activo);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarConceptos($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarConceptos($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerConceptos($serviciosReferencias) {
$res = $serviciosReferencias->traerConceptos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarConceptosviaticos($serviciosReferencias) {
   $refconceptos = $_POST['refconceptos'];
   $valor = $_POST['valor'];
   $formula = $_POST['formula'];

   $res = $serviciosReferencias->insertarConceptosviaticos($refconceptos,$valor,$formula);

   if ((integer)$res > 0) {
      echo '';
   } else {
      echo 'Hubo un error al insertar datos';
   }
}

function modificarConceptosviaticos($serviciosReferencias) {
   $id = $_POST['id'];
   $refconceptos = $_POST['refconceptos'];
   $valor = $_POST['valor'];
   $formula = $_POST['formula'];

   $res = $serviciosReferencias->modificarConceptosviaticos($id,$refconceptos,$valor,$formula);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarConceptosviaticos($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarConceptosviaticos($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerConceptosviaticos($serviciosReferencias) {
$res = $serviciosReferencias->traerConceptosviaticos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarContactos($serviciosReferencias) {
$refsectores = $_POST['refsectores'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$res = $serviciosReferencias->insertarContactos($refsectores,$apellido,$nombre,$nrodocumento,$email,$telefono);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarContactos($serviciosReferencias) {
$id = $_POST['id'];
$refsectores = $_POST['refsectores'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$res = $serviciosReferencias->modificarContactos($id,$refsectores,$apellido,$nombre,$nrodocumento,$email,$telefono);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarContactos($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarContactos($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerContactos($serviciosReferencias) {
$res = $serviciosReferencias->traerContactos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarEmpleados($serviciosReferencias, $serviciosValidador) {
   $error = '';

   $apellido = ($serviciosValidador->validaRequerido($_POST['apellido']) == true ? trim($_POST['apellido']) : $error.= 'El campo Apellido es obligatorio
   ');
   $nombre = ($serviciosValidador->validaRequerido($_POST['nombre']) == true ? trim($_POST['nombre']) : $error.= 'El campo Nombre es obligatorio
   ');
   $nrodocumento = ($serviciosValidador->validaRequerido($_POST['nrodocumento']) == true
                     ?
                     (($serviciosValidador->validarEnteroRango($_POST['nrodocumento'],5000000,99999999)  == true
                     ?
                     $_POST['nrodocumento'] : $error.= 'El Nro Documento esta fuera de los intervalos
                     ')) : $error.= 'El campo Nro Documento es obligatorio
                     ');
   $cuit = $_POST['cuit'];
   $fechanacimiento = ($serviciosValidador->validar_fecha_espanol( $_POST['fechanacimiento']) == true ? $_POST['fechanacimiento'] : $error.= 'Formato incorrecto en Fecha Nacimiento
   ');
   $domicilio = $_POST['domicilio'];
   $telefonofijo = $_POST['telefonofijo'];
   $telefonomovil = $_POST['telefonomovil'];
   $sexo = $_POST['sexo'];
   $email = $_POST['email'];

   if (isset($_POST['activo'])) {
      $activo	= 1;
   } else {
      $activo = 0;
   }

   if ($error != '') {
      echo $error;
   } else {

      $existe = $serviciosReferencias->existeEmpleado($nrodocumento);

      if ($existe != 0) {
         echo 'Ya existe el Nro de documento ingresado';
      } else {
         $res = $serviciosReferencias->insertarEmpleados($apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo);

         if ((integer)$res > 0) {
            echo '';
         } else {
            echo 'Hubo un error al insertar datos';
         }
      }
   }

}

function modificarEmpleados($serviciosReferencias, $serviciosValidador) {
   $id = $_POST['id'];

   $error = '';

   $apellido = ($serviciosValidador->validaRequerido($_POST['apellido']) == true ? trim($_POST['apellido']) : $error.= 'El campo Apellido es obligatorio
   ');
   $nombre = ($serviciosValidador->validaRequerido($_POST['nombre']) == true ? trim($_POST['nombre']) : $error.= 'El campo Nombre es obligatorio
   ');
   $nrodocumento = ($serviciosValidador->validaRequerido($_POST['nrodocumento']) == true
                     ?
                     (($serviciosValidador->validarEnteroRango($_POST['nrodocumento'],5000000,99999999)  == true
                     ?
                     $_POST['nrodocumento'] : $error.= 'El Nro Documento esta fuera de los intervalos
                     ')) : $error.= 'El campo Nro Documento es obligatorio
                     ');
   $cuit = $_POST['cuit'];
   $fechanacimiento = ($serviciosValidador->validar_fecha_espanol( $_POST['fechanacimiento']) == true ? $_POST['fechanacimiento'] : $error.= 'Formato incorrecto en Fecha Nacimiento
   ');
   $domicilio = $_POST['domicilio'];
   $telefonofijo = $_POST['telefonofijo'];
   $telefonomovil = $_POST['telefonomovil'];
   $sexo = $_POST['sexo'];
   $email = $_POST['email'];

   if (isset($_POST['activo'])) {
      $activo	= 1;
   } else {
      $activo = 0;
   }

   if ($error != '') {
      echo $error;
   } else {

      $existe = $serviciosReferencias->existeEmpleadoModificar($nrodocumento, $id);

      if ($existe != 0) {
         echo 'Ya existe el Nro de documento ingresado';
      } else {
         $res = $serviciosReferencias->modificarEmpleados($id,$apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo);

         if ($res == true) {
            echo '';
         } else {
            echo 'Hubo un error al modificar datos';
         }
      }
   }
}

function eliminarEmpleados($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarEmpleados($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerEmpleados($serviciosReferencias) {
$res = $serviciosReferencias->traerEmpleados();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarListasprecios($serviciosReferencias, $serviciosValidador) {
   $error = '';

   $nombre = trim($_POST['nombre']);
   if ($serviciosValidador->validaRequerido($nombre) == false) {
      $error .= 'El campo Nombre es obligatorio
      ';
   }

   $refconceptos = $_POST['refconceptos'];

   $precio1 = $_POST['precio1'];
   $precio2 = $_POST['precio2'];
   $precio3 = $_POST['precio3'];
   $precio4 = $_POST['precio4'];
   $iva = $_POST['iva'];

   $vigenciadesde = str_replace('_','',trim($_POST['vigenciadesde']));
   if ($serviciosValidador->validar_fecha_espanol($vigenciadesde) == false) {
      $error .= 'Vig. Desde Fecha Invalida
      ';
   }

   $vigenciahasta = str_replace('_','',trim($_POST['vigenciahasta']));
   if ($serviciosValidador->validar_fecha_espanol($vigenciahasta) == false) {
      $error .= 'Vig. Hasta Fecha Invalida
      ';
   }

   if ($error == '') {
      $res = $serviciosReferencias->insertarListasprecios($nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta);

      if ((integer)$res > 0) {
         echo '';
      } else {
         echo 'Hubo un error al insertar datos';
      }
   } else {
      echo $error;
   }

}

function modificarListasprecios($serviciosReferencias, $serviciosValidador) {
   $error = '';

   $id = $_POST['id'];

   $nombre = trim($_POST['nombre']);
   if ($serviciosValidador->validaRequerido($nombre) == false) {
      $error .= 'El campo Nombre es obligatorio
      ';
   }

   $refconceptos = $_POST['refconceptos'];
   $precio1 = $_POST['precio1'];
   $precio2 = $_POST['precio2'];
   $precio3 = $_POST['precio3'];
   $precio4 = $_POST['precio4'];
   $iva = $_POST['iva'];

   $vigenciadesde = str_replace('_','',trim($_POST['vigenciadesde']));
   if ($serviciosValidador->validar_fecha_espanol($vigenciadesde) == false) {
      $error .= 'Vig. Desde Fecha Invalida
      ';
   }

   $vigenciahasta = str_replace('_','',trim($_POST['vigenciahasta']));
   if ($serviciosValidador->validar_fecha_espanol($vigenciahasta) == false) {
      $error .= 'Vig. Hasta Fecha Invalida
      ';
   }

   if ($error == '') {
      $res = $serviciosReferencias->modificarListasprecios($id,$nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta);

      if ($res == true) {
         echo '';
      } else {
         echo 'Hubo un error al modificar datos';
      }
   } else {
      echo $error;
   }

}

function eliminarListasprecios($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarListasprecios($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerListasprecios($serviciosReferencias) {
$res = $serviciosReferencias->traerListasprecios();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarPlantas($serviciosReferencias) {
$refclientes = $_POST['refclientes'];
$planta = $_POST['planta'];
$res = $serviciosReferencias->insertarPlantas($refclientes,$planta);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarPlantas($serviciosReferencias) {
   $id = $_POST['id'];
   $refclientes = $_POST['refclientes'];
   $planta = $_POST['planta'];

   $res = $serviciosReferencias->modificarPlantas($id,$refclientes,$planta);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function eliminarPlantas($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarPlantas($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerPlantas($serviciosReferencias) {
$res = $serviciosReferencias->traerPlantas();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarSectores($serviciosReferencias) {
$refplantas = $_POST['refplantas'];
$sector = $_POST['sector'];
$res = $serviciosReferencias->insertarSectores($refplantas,$sector);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarSectores($serviciosReferencias) {
$id = $_POST['id'];
$refplantas = $_POST['refplantas'];
$sector = $_POST['sector'];
$res = $serviciosReferencias->modificarSectores($id,$refplantas,$sector);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarSectores($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarSectores($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Hubo un error al modificar datos';
   }
}

function traerSectores($serviciosReferencias) {
   $res = $serviciosReferencias->traerSectores();

   $ar = array();

   while ($row = mysql_fetch_array($res)) {
      array_push($ar, $row);
   }
   $resV['datos'] = $ar;

   header('Content-type: application/json');
   echo json_encode($resV);
}

function insertarUsuarios($serviciosReferencias,$serviciosUsuarios) {

$error = false;
if(strlen($_POST['usuario']) <= 3){
   echo 'Usuario, ';
   $error= true;
}else{
   $usuario = $_POST['usuario'];
}
if(strlen($_POST['password']) <= 3){
   echo 'Contraseña, ';
   $error= true;
}else{
   $password = $_POST['password'];
}
if($_POST['refroles'] == 0){
   echo 'Rol, ';
   $error= true;
}else{
   $refroles = $_POST['refroles'];
}
if(strlen($_POST['email']) <= 3){
   echo 'Email, ';
   $error= true;
}else{
   $existeEmail=$serviciosUsuarios->traerUsuario($_POST['email']);
   if($existeEmail){
      echo "Email, ";
      $error= true;
   }else{
      $email = $_POST['email'];
   }

}
if(strlen($_POST['nombrecompleto']) <= 3){
   echo 'Apellido y Nombre, ';
   $error= true;
}else{
   $nombrecompleto = $_POST['nombrecompleto'];
}
if($_POST['refunidadesnegocios'] <= 0){
   echo 'Unidad de Negocio, ';
   $error= true;
}else{
   $refunidadesnegocios = $_POST['refunidadesnegocios'];
}
if($_POST['refsector'] <= 0){
   echo 'Sector, ';
   $error= true;
}else{
   $refsector = $_POST['refsector'];
}
/*
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$refroles = $_POST['refroles'];
$email = $_POST['email'];
$nombrecompleto = $_POST['nombrecompleto'];
$refcontactos = $_POST['refcontactos'];
$refunidadesnegocios = $_POST['refunidadesnegocios'];
$refsector = $_POST['refsector'];
*/
$imgurl = $_FILES['imgurl']['name'];

if (isset($_POST['activo'])) {
   $activo	= 1;
} else {
   $activo = 0;
}
if($error){
   echo 'Invalido/s';
}else{
   $res = $serviciosReferencias->insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo,$refunidadesnegocios,$refsector,$imgurl);
   if ((integer)$res > 0) {
      $uploaddir = '../images/users-photos/'.$res.'/';
      $uploadfile = $uploaddir . basename($_FILES['imgurl']['name']);
      move_uploaded_file($_FILES['imgurl']['tmp_name'], $uploadfile);
      echo '';
   } else {
      echo 'Hubo un error al insertar datos';
   }
}
}

function modificarUsuarios($serviciosReferencias,$serviciosUsuarios) {

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$refroles = $_POST['refroles'];
$email = $_POST['email'];
$nombrecompleto = $_POST['nombrecompleto'];
$refcontactos = $_POST['refcontactos'];
$refunidadesnegocios = $_POST['refunidadesnegocios'];
$refsector = $_POST['refsector'];
$imgurl = $_FILES['imgurl']['name'];

if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo,$refunidadesnegocios,$refsector,$imgurl);
if ($res == true) {
   $uploaddir = '../images/users-photos/'.$id.'/';
   $uploadfile = $uploaddir . basename($_FILES['imgurl']['name']);
   move_uploaded_file($_FILES['imgurl']['tmp_name'], $uploadfile);
   echo '';
} else {
   echo 'Hubo un error al modificar datos';
}
}

function eliminarUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarUsuarios($id);
echo $res;
}

function traerUsuarios($serviciosReferencias) {
$res = $serviciosReferencias->traerUsuarios();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarPredio_menu($serviciosReferencias) {
$url = $_POST['url'];
$icono = $_POST['icono'];
$nombre = $_POST['nombre'];
$Orden = $_POST['Orden'];
$hover = $_POST['hover'];
$permiso = $_POST['permiso'];
if (isset($_POST['administracion'])) {
$administracion	= 1;
} else {
$administracion = 0;
}
if (isset($_POST['torneo'])) {
$torneo	= 1;
} else {
$torneo = 0;
}
if (isset($_POST['reportes'])) {
$reportes	= 1;
} else {
$reportes = 0;
}
$grupo = $_POST['grupo'];
$res = $serviciosReferencias->insertarPredio_menu($url,$icono,$nombre,$Orden,$hover,$permiso,$administracion,$torneo,$reportes,$grupo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarPredio_menu($serviciosReferencias) {
$id = $_POST['id'];
$url = $_POST['url'];
$icono = $_POST['icono'];
$nombre = $_POST['nombre'];
$Orden = $_POST['Orden'];
$hover = $_POST['hover'];
$permiso = $_POST['permiso'];
if (isset($_POST['administracion'])) {
$administracion	= 1;
} else {
$administracion = 0;
}
if (isset($_POST['torneo'])) {
$torneo	= 1;
} else {
$torneo = 0;
}
if (isset($_POST['reportes'])) {
$reportes	= 1;
} else {
$reportes = 0;
}
$grupo = $_POST['grupo'];
$res = $serviciosReferencias->modificarPredio_menu($id,$url,$icono,$nombre,$Orden,$hover,$permiso,$administracion,$torneo,$reportes,$grupo);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarPredio_menu($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPredio_menu($id);
echo $res;
}

function traerPredio_menu($serviciosReferencias) {
$res = $serviciosReferencias->traerPredio_menu();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarConfiguracion($serviciosReferencias) {
$razonsocial = $_POST['razonsocial'];
$empresa = $_POST['empresa'];
$sistema = $_POST['sistema'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$res = $serviciosReferencias->insertarConfiguracion($razonsocial,$empresa,$sistema,$direccion,$telefono,$email);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarConfiguracion($serviciosReferencias) {
$id = $_POST['id'];
$razonsocial = $_POST['razonsocial'];
$empresa = $_POST['empresa'];
$sistema = $_POST['sistema'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$res = $serviciosReferencias->modificarConfiguracion($id,$razonsocial,$empresa,$sistema,$direccion,$telefono,$email);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarConfiguracion($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarConfiguracion($id);
echo $res;
}

function traerConfiguracion($serviciosReferencias) {
$res = $serviciosReferencias->traerConfiguracion();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarEstados($serviciosReferencias) {
$estado = $_POST['estado'];
$color = $_POST['color'];
$icono = $_POST['icono'];
$orden = $_POST['orden'];
$valor = $_POST['valor'];
$refformularios = $_POST['refformularios'];
$res = $serviciosReferencias->insertarEstados($estado,$color,$icono,$orden,$valor,$refformularios);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarEstados($serviciosReferencias) {
$id = $_POST['id'];
$estado = $_POST['estado'];
$color = $_POST['color'];
$icono = $_POST['icono'];
$orden = $_POST['orden'];
$valor = $_POST['valor'];
$refformularios = $_POST['refformularios'];
$res = $serviciosReferencias->modificarEstados($id,$estado,$color,$icono,$orden,$valor,$refformularios);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarEstados($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarEstados($id);
echo $res;
}

function traerEstados($serviciosReferencias) {
$res = $serviciosReferencias->traerEstados();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarFormularios($serviciosReferencias) {
$formulario = $_POST['formulario'];
$res = $serviciosReferencias->insertarFormularios($formulario);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarFormularios($serviciosReferencias) {
$id = $_POST['id'];
$formulario = $_POST['formulario'];
$res = $serviciosReferencias->modificarFormularios($id,$formulario);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarFormularios($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarFormularios($id);
echo $res;
}

function traerFormularios($serviciosReferencias) {
$res = $serviciosReferencias->traerFormularios();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarMotivosoportunidades($serviciosReferencias) {
$motivo = $_POST['motivo'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarMotivosoportunidades($motivo,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarMotivosoportunidades($serviciosReferencias) {
$id = $_POST['id'];
$motivo = $_POST['motivo'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarMotivosoportunidades($id,$motivo,$activo);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarMotivosoportunidades($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarMotivosoportunidades($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerMotivosoportunidades($serviciosReferencias) {
$res = $serviciosReferencias->traerMotivosoportunidades();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarRecursosnecesarios($serviciosReferencias) {
$recursonecesario = $_POST['recursonecesario'];
$letra = $_POST['letra'];
$res = $serviciosReferencias->insertarRecursosnecesarios($recursonecesario,$letra);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarRecursosnecesarios($serviciosReferencias) {
$id = $_POST['id'];
$recursonecesario = $_POST['recursonecesario'];
$letra = $_POST['letra'];
$res = $serviciosReferencias->modificarRecursosnecesarios($id,$recursonecesario,$letra);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarRecursosnecesarios($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarRecursosnecesarios($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerRecursosnecesarios($serviciosReferencias) {
$res = $serviciosReferencias->traerRecursosnecesarios();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarRoles($serviciosReferencias) {
$descripcion = $_POST['descripcion'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarRoles($descripcion,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarRoles($serviciosReferencias) {
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarRoles($id,$descripcion,$activo);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarRoles($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarRoles($id);
echo $res;
}

function traerRoles($serviciosReferencias) {
$res = $serviciosReferencias->traerRoles();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarSemaforos($serviciosReferencias) {
$color = $_POST['color'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$medida = $_POST['medida'];
$res = $serviciosReferencias->insertarSemaforos($color,$desde,$hasta,$medida);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarSemaforos($serviciosReferencias) {
$id = $_POST['id'];
$color = $_POST['color'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$medida = $_POST['medida'];
$res = $serviciosReferencias->modificarSemaforos($id,$color,$desde,$hasta,$medida);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarSemaforos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarSemaforos($id);
echo $res;
}

function traerSemaforos($serviciosReferencias) {
$res = $serviciosReferencias->traerSemaforos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarTipoclientes($serviciosReferencias) {
$tipocliente = $_POST['tipocliente'];
$res = $serviciosReferencias->insertarTipoclientes($tipocliente);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarTipoclientes($serviciosReferencias) {
$id = $_POST['id'];
$tipocliente = $_POST['tipocliente'];
$res = $serviciosReferencias->modificarTipoclientes($id,$tipocliente);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarTipoclientes($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipoclientes($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerTipoclientes($serviciosReferencias) {
$res = $serviciosReferencias->traerTipoclientes();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarTipoconceptos($serviciosReferencias) {
$tipoconcepto = $_POST['tipoconcepto'];
$res = $serviciosReferencias->insertarTipoconceptos($tipoconcepto);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarTipoconceptos($serviciosReferencias) {
$id = $_POST['id'];
$tipoconcepto = $_POST['tipoconcepto'];
$res = $serviciosReferencias->modificarTipoconceptos($id,$tipoconcepto);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarTipoconceptos($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipoconceptos($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerTipoconceptos($serviciosReferencias) {
$res = $serviciosReferencias->traerTipoconceptos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarTipomonedas($serviciosReferencias) {
$tipomoneda = $_POST['tipomoneda'];
$abreviatura = $_POST['abreviatura'];
$res = $serviciosReferencias->insertarTipomonedas($tipomoneda,$abreviatura);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarTipomonedas($serviciosReferencias) {
$id = $_POST['id'];
$tipomoneda = $_POST['tipomoneda'];
$abreviatura = $_POST['abreviatura'];
$res = $serviciosReferencias->modificarTipomonedas($id,$tipomoneda,$abreviatura);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarTipomonedas($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipomonedas($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerTipomonedas($serviciosReferencias) {
$res = $serviciosReferencias->traerTipomonedas();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarTipostrabajos($serviciosReferencias) {
$tipotrabajo = $_POST['tipotrabajo'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarTipostrabajos($tipotrabajo,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Hubo un error al insertar datos';
}
}

function modificarTipostrabajos($serviciosReferencias) {
$id = $_POST['id'];
$tipotrabajo = $_POST['tipotrabajo'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarTipostrabajos($id,$tipotrabajo,$activo);
if ($res == true) {
echo '';
} else {
echo 'Hubo un error al modificar datos';
}
}

function eliminarTipostrabajos($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipostrabajos($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerTipostrabajos($serviciosReferencias) {
$res = $serviciosReferencias->traerTipostrabajos();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

function insertarUnidadesnegocios($serviciosReferencias) {
  $unidadnegocio = trim($_POST['unidadnegocio']);

  if (isset($_POST['activo'])) {
    $activo	= 1;
  } else {
    $activo = 0;
  }

  if ($unidadnegocio != '') {
    $res = $serviciosReferencias->insertarUnidadesnegocios($unidadnegocio,$activo);

    if ((integer)$res > 0) {
      echo '';
    } else {
      echo 'Hubo un error al insertar datos';
    }
  } else {
    echo 'El campo Unidad de negocios es obligatorio';
  }

}

function modificarUnidadesnegocios($serviciosReferencias) {
  $id = $_POST['id'];
  $unidadnegocio = trim($_POST['unidadnegocio']);

  if (isset($_POST['activo'])) {
    $activo	= 1;
  } else {
    $activo = 0;
  }

  if ($unidadnegocio != '') {
    $res = $serviciosReferencias->modificarUnidadesnegocios($id,$unidadnegocio,$activo);

    if ($res == true) {
      echo '';
    } else {
      echo 'Hubo un error al modificar datos';
    }
  } else {
    echo 'El campo Unidad de negocios es obligatorio';
  }

}

function eliminarUnidadesnegocios($serviciosReferencias) {
  $id = $_POST['id'];
  $res = $serviciosReferencias->eliminarUnidadesnegocios($id);
  if ($res == true) {
    echo '';
  } else {
    echo 'Hubo un error al modificar datos';
  }
}

function traerUnidadesnegocios($serviciosReferencias) {
$res = $serviciosReferencias->traerUnidadesnegocios();
$ar = array();
while ($row = mysql_fetch_array($res)) {
array_push($ar, $row);
}
$resV['datos'] = $ar;
header('Content-type: application/json');
echo json_encode($resV);
}

/* Fin */

////////////////////////// FIN DE TRAER DATOS ////////////////////////////////////////////////////////////

//////////////////////////  BASICO  /////////////////////////////////////////////////////////////////////////

function toArray($query)
{
    $res = array();
    while ($row = @mysql_fetch_array($query)) {
        $res[] = $row;
    }
    return $res;
}


function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];

	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo $res;
	}
}


function insertarUsuario($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
   $refcontactos     =  $_POST['refcontactos '];

	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre,$refcontactos);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo $res;
	}
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
   $refcontactos     =  $_POST['refcontactos '];

	echo $serviciosUsuarios->modificarUsuario($id,$usuario,$password,$refroll,$email,$nombre,$refcontactos);
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	//$idempresa  =	$_POST['idempresa'];

	echo $serviciosUsuarios->login($email,$pass);
}


function devolverImagen($nroInput) {

	if( $_FILES['archivo'.$nroInput]['name'] != null && $_FILES['archivo'.$nroInput]['size'] > 0 ){
	// Nivel de errores
	  error_reporting(E_ALL);
	  $altura = 100;
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  //define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  $NAMETHUMB = "c:/windows/temp/thumbtemp";
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "portalinmobiliario");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  $mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["archivo".$nroInput]["name"];
	  $type = $_FILES["archivo".$nroInput]["type"];
	  $tmp_name = $_FILES["archivo".$nroInput]["tmp_name"];
	  $size = $_FILES["archivo".$nroInput]["size"];
	  // Verificamos si el archivo es una imagen válida
	  if(!in_array($type, $mimetypes))
		die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }

	  $datos = getimagesize($tmp_name);

	  $ratio = ($datos[1]/$altura);
	  $ancho = round($datos[0]/$ratio);
	  $thumb = imagecreatetruecolor($ancho, $altura);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $altura, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, $NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, $NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, $NAMETHUMB);
		  break;
	  }
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  $fp = fopen($NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize($NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);
	  // Borra archivos temporales si es que existen
	  //@unlink($tmp_name);
	  //@unlink(NAMETHUMB);
	} else {
		$tfoto = '';
		$type = '';
	}
	$tfoto = utf8_decode($tfoto);
	return array('tfoto' => $tfoto, 'type' => $type);
}


?>
