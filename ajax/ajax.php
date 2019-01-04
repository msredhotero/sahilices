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
        modificarUsuario($serviciosUsuarios);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
		break;


   case 'insertarClientes':
      insertarClientes($serviciosReferencias);
   break;
   case 'modificarClientes':
      modificarClientes($serviciosReferencias);
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
      modificarEmpleados($serviciosReferencias);
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
      insertarListasprecios($serviciosReferencias);
   break;
   case 'modificarListasprecios':
      modificarListasprecios($serviciosReferencias);
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
   insertarUsuarios($serviciosReferencias);
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
      frmAjaxModificar($serviciosFunciones, $serviciosReferencias);
   break;

/* Fin */

}
/* Fin */


function frmAjaxModificar($serviciosFunciones, $serviciosReferencias) {
   $tabla = $_POST['tabla'];
   $id = $_POST['id'];

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
            $modificar = "modificarEmpleados";
            $idTabla = "idempleado";

            $lblCambio	 	= array('nrodocumento','fechanacimiento','telefonofijo','telefonomovil');
            $lblreemplazo	= array('Nro Documento','Fecha Nacimiento','Tel. Fijo','Tel. Movil');

            $cadRef 	= '';

            $refdescripcion = array();
            $refCampo 	=  array();
            break;

      default:
         // code...
         break;
   }

   $formulario = $serviciosFunciones->camposTablaModificar($id, $idTabla,$modificar,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

   echo $formulario;
}


/* PARA Unidadesnegocios */

function insertarClientes($serviciosReferencias) {
$razonsocial = $_POST['razonsocial'];
$cuit = $_POST['cuit'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$res = $serviciosReferencias->insertarClientes($razonsocial,$cuit,$direccion,$email,$telefono);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}

function modificarClientes($serviciosReferencias) {
$id = $_POST['id'];
$razonsocial = $_POST['razonsocial'];
$cuit = $_POST['cuit'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$res = $serviciosReferencias->modificarClientes($id,$razonsocial,$cuit,$direccion,$email,$telefono);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarClientes($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarClientes($id);
echo $res;
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
$concepto = $_POST['concepto'];
$abreviatura = $_POST['abreviatura'];
$leyenda = $_POST['leyenda'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarConceptos($concepto,$abreviatura,$leyenda,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}

function modificarConceptos($serviciosReferencias) {
$id = $_POST['id'];
$concepto = $_POST['concepto'];
$abreviatura = $_POST['abreviatura'];
$leyenda = $_POST['leyenda'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarConceptos($id,$concepto,$abreviatura,$leyenda,$activo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarConceptos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarConceptos($id);
echo $res;
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarConceptosviaticos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarConceptosviaticos($id);
echo $res;
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarContactos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarContactos($id);
echo $res;
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

   $apellido = ($serviciosValidador->validaRequerido($_POST['apellido']) == true ? $_POST['apellido'] : $error.= 'El campo apellido es obligatorio');
   $nombre = ($serviciosValidador->validaRequerido($_POST['nombre']) == true ? $_POST['nombre'] : $error.= 'El campo nombre es obligatorio');
   $nrodocumento = $_POST['nrodocumento'];
   $cuit = $_POST['cuit'];
   $fechanacimiento = $_POST['fechanacimiento'];
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

   $existe = $serviciosReferencias->existeEmpleado($nrodocumento);

   if ($error != '') {
      echo $error;
   } else {
      if ($existe != 0) {
         echo 'Ya existe el Nro de documento ingresado';
      } else {
         $res = $serviciosReferencias->insertarEmpleados($apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo);

         if ((integer)$res > 0) {
            echo '';
         } else {
            echo 'Huvo un error al insertar datos';
         }
      }
   }

}

function modificarEmpleados($serviciosReferencias) {
$id = $_POST['id'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$cuit = $_POST['cuit'];
$fechanacimiento = $_POST['fechanacimiento'];
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
$res = $serviciosReferencias->modificarEmpleados($id,$apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarEmpleados($serviciosReferencias) {
   $id = $_POST['id'];

   $res = $serviciosReferencias->eliminarEmpleados($id);

   if ($res == true) {
      echo '';
   } else {
      echo 'Huvo un error al modificar datos';
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

function insertarListasprecios($serviciosReferencias) {
$nombre = $_POST['nombre'];
$refconceptos = $_POST['refconceptos'];
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$precio4 = $_POST['precio4'];
$iva = $_POST['iva'];
$vigenciadesde = $_POST['vigenciadesde'];
$vigenciahasta = $_POST['vigenciahasta'];
$res = $serviciosReferencias->insertarListasprecios($nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}

function modificarListasprecios($serviciosReferencias) {
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$refconceptos = $_POST['refconceptos'];
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$precio4 = $_POST['precio4'];
$iva = $_POST['iva'];
$vigenciadesde = $_POST['vigenciadesde'];
$vigenciahasta = $_POST['vigenciahasta'];
$res = $serviciosReferencias->modificarListasprecios($id,$nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarListasprecios($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarListasprecios($id);
echo $res;
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarPlantas($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPlantas($id);
echo $res;
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarSectores($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarSectores($id);
echo $res;
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

function insertarUsuarios($serviciosReferencias) {
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$refroles = $_POST['refroles'];
$email = $_POST['email'];
$nombrecompleto = $_POST['nombrecompleto'];
$refcontactos = $_POST['refcontactos'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}

function modificarUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$refroles = $_POST['refroles'];
$email = $_POST['email'];
$nombrecompleto = $_POST['nombrecompleto'];
$refcontactos = $_POST['refcontactos'];
if (isset($_POST['activo'])) {
$activo	= 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
}
}

function modificarFormularios($serviciosReferencias) {
$id = $_POST['id'];
$formulario = $_POST['formulario'];
$res = $serviciosReferencias->modificarFormularios($id,$formulario);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarMotivosoportunidades($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarMotivosoportunidades($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarRecursosnecesarios($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarRecursosnecesarios($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
}
}

function modificarTipoclientes($serviciosReferencias) {
$id = $_POST['id'];
$tipocliente = $_POST['tipocliente'];
$res = $serviciosReferencias->modificarTipoclientes($id,$tipocliente);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarTipoclientes($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipoclientes($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
}
}

function modificarTipoconceptos($serviciosReferencias) {
$id = $_POST['id'];
$tipoconcepto = $_POST['tipoconcepto'];
$res = $serviciosReferencias->modificarTipoconceptos($id,$tipoconcepto);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}

function eliminarTipoconceptos($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipoconceptos($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarTipomonedas($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipomonedas($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
echo 'Huvo un error al insertar datos';
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
echo 'Huvo un error al modificar datos';
}
}

function eliminarTipostrabajos($serviciosReferencias) {
  $id = $_POST['id'];

  $res = $serviciosReferencias->eliminarTipostrabajos($id);

  if ($res == true) {
    echo '';
  } else {
    echo 'Huvo un error al modificar datos';
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
      echo 'Huvo un error al insertar datos';
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
      echo 'Huvo un error al modificar datos';
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
    echo 'Huvo un error al modificar datos';
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

	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
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

	echo $serviciosUsuarios->modificarUsuario($id,$usuario,$password,$refroll,$email,$nombre);
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
