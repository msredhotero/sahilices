<?php


include ('../includes/funciones.php');
include ('../includes/funcionesReferencias.php');

$serviciosFunciones = new Servicios();
$serviciosReferencias 	= new ServiciosReferencias();

$tabla = $_GET['tabla'];
$draw = $_GET['sEcho'];
$start = $_GET['iDisplayStart'];
$length = $_GET['iDisplayLength'];
$busqueda = $_GET['sSearch'];

function armarAcciones($id,$label='',$class,$icon) {
	$cad = "";

	for ($j=0; $j<count($class); $j++) {
		$cad .= '<button type="button" class="btn '.$class[$j].' btn-circle waves-effect waves-circle waves-float '.$label[$j].'" id="'.$id.'">
				<i class="material-icons">'.$icon[$j].'</i>
			</button> ';
	}

	return $cad;
}

switch ($tabla) {
	case 'unidadnegocio':
		$resAjax = $serviciosReferencias->traerUnidadesnegociosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerUnidadesnegocios();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 2;

		break;
	case 'tipostrabajos':
		$resAjax = $serviciosReferencias->traerTipostrabajosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerTipostrabajos();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 2;

		break;
	case 'tipomonedas':
		$resAjax = $serviciosReferencias->traerTipomonedasajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerTipomonedas();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 2;

		break;
	case 'tipoconceptos':
		$resAjax = $serviciosReferencias->traerTipoconceptosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerTipoconceptos();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 1;

		break;
	case 'tipoclientes':
		$resAjax = $serviciosReferencias->traerTipoclientesajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerTipoclientes();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 1;

		break;
	case 'motivosoportunidades':
		$resAjax = $serviciosReferencias->traerMotivosoportunidadesajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerMotivosoportunidades();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 2;

		break;
	case 'recursosnecesarios':
		$resAjax = $serviciosReferencias->traerRecursosnecesariosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerRecursosnecesarios();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 2;

		break;
	case 'empleados':
		$resAjax = $serviciosReferencias->traerEmpleadosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerEmpleados();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 8;

		break;
	case 'conceptos':
		$resAjax = $serviciosReferencias->traerConceptosajax($length, $start, $busqueda);
		$res = $serviciosReferencias->traerConceptos();
		$label = array('btnModificar','btnEliminar');
		$class = array('bg-amber','bg-red');
		$icon = array('create','delete');
		$indiceID = 0;
		$empieza = 1;
		$termina = 4;

		break;

	default:
		// code...
		break;
}


$cantidadFilas = mysql_num_rows($res);


header("content-type: Access-Control-Allow-Origin: *");

$ar = array();
$arAux = array();
$cad = '';
$id = 0;
	while ($row = mysql_fetch_array($resAjax)) {
		//$id = $row[$indiceID];

		for ($i=$empieza;$i<=$termina;$i++) {
			array_push($arAux, $row[$i]);
		}

		array_push($arAux, armarAcciones($row[0],$label,$class,$icon));

		array_push($ar, $arAux);

		$arAux = array();
		//die(var_dump($ar));
	}

$cad = substr($cad, 0, -1);

$data = '{ "sEcho" : '.$draw.', "iTotalRecords" : '.$cantidadFilas.', "iTotalDisplayRecords" : 10, "aaData" : ['.$cad.']}';

//echo "[".substr($cad,0,-1)."]";
echo json_encode(array(
			"draw"            => $draw,
			"recordsTotal"    => $cantidadFilas,
			"recordsFiltered" => $cantidadFilas,
			"data"            => $ar
		));

?>
