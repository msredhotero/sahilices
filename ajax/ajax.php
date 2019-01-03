<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');
include ('../includes/funcionesNotificaciones.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias		= new ServiciosReferencias();
$serviciosNotificaciones	= new ServiciosNotificaciones();


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
	
	case 'traerTareasGeneralPorCountrieIncompletas':
		traerTareasGeneralPorCountrieIncompletas($serviciosNotificaciones);
	break;


		case 'insertarDelegados': 
		insertarDelegados($serviciosReferencias); 
		break; 
		case 'modificarDelegados': 
		modificarDelegados($serviciosReferencias); 
		break; 
		case 'eliminarDelegados': 
		eliminarDelegados($serviciosReferencias); 
		break; 
		case 'traerDelegados': 
		traerDelegados($serviciosReferencias); 
		break; 
		case 'traerDelegadosPorId': 
		traerDelegadosPorId($serviciosReferencias); 
		break; 
		case 'VinsertarDelegados': 
		insertarDelegados($serviciosReferencias); 
		break; 
		case 'VmodificarDelegados': 
		modificarDelegados($serviciosReferencias); 
		break; 
		case 'VeliminarDelegados': 
		eliminarDelegados($serviciosReferencias); 
		break; 
		case 'VtraerDelegados': 
		traerDelegados($serviciosReferencias); 
		break; 
		case 'VtraerDelegadosPorId': 
		VtraerDelegadosPorId($serviciosReferencias); 
		break; 
		case 'VguardarDelegado':
		VguardarDelegado($serviciosReferencias);
		break;

		case 'VtraerJugadoresClubPorCountrieActivos':
		VtraerJugadoresClubPorCountrieActivos($serviciosReferencias);
		break;
		case 'VtraerPaginasJugadoresPorClub':
		VtraerPaginasJugadoresPorClub($serviciosReferencias);
		break;

		case 'guardarJugadorClubSimple':
		guardarJugadorClubSimple($serviciosReferencias);
		break;

		case 'insertarJugadorespre':
			insertarJugadorespre($serviciosReferencias);
			break;
		case 'modificarJugadorespre':
			modificarJugadorespre($serviciosReferencias);
			break;
		case 'eliminarJugadorespre':
			eliminarJugadorespre($serviciosReferencias);
			break; 
		
		case 'VenviarMensaje':
			VenviarMensaje($serviciosNotificaciones);
			break;

		case 'modificarJugadorNuevo':
			modificarJugadorNuevo($serviciosReferencias, $serviciosFunciones, $serviciosUsuarios);
			break;
		case 'traerCountriesPorId':
			traerCountriesPorId($serviciosReferencias);
		break;
		case 'VmodificarCountries':
			VmodificarCountries($serviciosReferencias);
		break;
		case 'traerImgenCountry':
			traerImgenCountry($serviciosReferencias);
		break;
		case 'traerEquiposPorCountries':
			traerEquiposPorCountries($serviciosReferencias);
		break;
		case 'traerEquiposPorCountriesConFusion':
			traerEquiposPorCountriesConFusion($serviciosReferencias);
		break;

		case 'traerEquiposdelegadosEliminadosPorCountrie':
		traerEquiposdelegadosEliminadosPorCountrie($serviciosReferencias);
		break;
		case 'traerEquiposdelegadosPorCountrie':
		traerEquiposdelegadosPorCountrie($serviciosReferencias);
		break;
		case 'traerEquiposdelegadosMantenidosPorCountrie':
		traerEquiposdelegadosMantenidosPorCountrie($serviciosReferencias);
		break;

		case 'eliminarEquipoPasivo':
		eliminarEquipoPasivo($serviciosReferencias);
		break;
		case 'mantenerEquipoPasivo':
		mantenerEquipoPasivo($serviciosReferencias);
		break;

		case 'eliminarEquiposdelegados':
		eliminarEquiposdelegados($serviciosReferencias);
		break;
		case 'insertarEquiposdelegados':
		insertarEquiposdelegados($serviciosReferencias);
		break;
		case 'confirmarEquipos':
		confirmarEquipos($serviciosReferencias, $serviciosNotificaciones);
		break;

		case 'traerEquiposPorCountriesFinalizado':
		traerEquiposPorCountriesFinalizado($serviciosReferencias);
		break;

		case 'traerDefinicionesPorTemporadaCategoriaTipoJugador':
		traerDefinicionesPorTemporadaCategoriaTipoJugador($serviciosReferencias);
		break;

		case 'verFusion':
		verFusion($serviciosReferencias);
		break;
		case 'traerFusionPorEquiposDelegados':
		traerFusionPorEquiposDelegados($serviciosReferencias);
		break;

		case 'traerFusionesPorEquipo':
		traerFusionesPorEquipo($serviciosReferencias);
		break;
		case 'cambiarEstadoFusion':
		cambiarEstadoFusion($serviciosReferencias);
		break;
		case 'cambiarEstadoTareas':
		cambiarEstadoTareas($serviciosNotificaciones);
		break;

		case 'traerJugadoresPorCountries':
		traerJugadoresPorCountries($serviciosReferencias);
		break;
		case 'traerConectorActivosPorEquiposDelegado':
		traerConectorActivosPorEquiposDelegado($serviciosReferencias);
		break;
		case 'eliminarConectorDefinitivamenteDelegado':
		eliminarConectorDefinitivamenteDelegado($serviciosReferencias);
		break;
		case 'insertarConectorAjax':
		insertarConectorAjax($serviciosReferencias);
		break;
		
/* Fin */

}
/* Fin */

	function eliminarConectorDefinitivamenteDelegado($serviciosReferencias) {

		$id = $_POST['id']; 
	
		//verifico que no esta cargado en ningun fixture sino le doy una baja logica  //eliminarConector
		$res = $serviciosReferencias->eliminarConectorDefinitivamenteDelegado($id); 
		echo $res; 
	} 

	function traerConectorActivosPorEquiposDelegado($serviciosReferencias) {
		$refEquipos = $_POST['id'];
		$reftemporadas = $_POST['reftemporadas'];

		$res = $serviciosReferencias->traerConectorActivosPorEquiposDelegado($refEquipos, $reftemporadas, '');

		$cad = '';
		
		$habilitacionpendiente = '';
		while ($row = mysql_fetch_array($res)) {

			
			$cad .= '<div class="row">';

			$cad .= '<div class="col-lg-1 col-md-1 col-xs-2 col-sm-2">';
			if ($row['habilitacionpendiente'] == 'Si') {
				$cad .= '<p style="margin-top:6px; color:#FF5722;"><i class="material-icons">assignment_late</i></p>';
			} else {
				$cad .= '<p></p>';
			}
			$cad .= '</div>';

			$cad .= '<div class="col-lg-5 col-md-5 col-xs-8 col-sm-8">';
			if ($row['habilitacionpendiente'] == 'Si') {
				$cad .= '<h4>'.strtoupper($row['nombrecompleto']).'<h4>';
			} else {
				$cad .= '<h4>'.strtoupper($row['nombrecompleto']).'<h4>';
			}
			
			$cad .= '</div>';
			
			$cad .= '<div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">';
			$cad .= '<p>'.$row['nrodocumento'].' <b>Edad: '.$row['edad'].'</b></p>';
			$cad .= '</div>';
			
			$cad .= '<div class="col-lg-2 col-md-2 col-xs-6 col-sm-6">';
			$cad .= '<p>'.$row['tipojugador'].'</p>';
			$cad .= '</div>';
			
			$cad .= '<div class="col-lg-2 col-md-2 col-xs-6 col-sm-6">';
			$cad .= '<button type="button" id="'.$row['idconector'].'" class="btn bg-red btn-circle waves-effect waves-circle waves-float varEliminarJugador">
                        <i class="material-icons">remove_circle</i>
                    </button>';
			$cad .= '</div>';

			$cad .= '<hr></div>';

		}

		echo $cad;
	}

	function insertarConectorAjax($serviciosReferencias) { 
		$refjugadores = $_POST['refjugadores']; 
		$reftipojugadores = $_POST['reftipojugadores']; 
		$refequipos = $_POST['refequipos']; 
		$reftemporada = $_POST['reftemporada'];
		$refcountries = $_POST['refcountries'];
		$refcategorias = $_POST['refcategorias'];
		$habilita = $_POST['habilita'];

		$resJugador = $serviciosReferencias->traerJugadoresPorId($refjugadores);

		$refcountriesaux = mysql_result($resJugador,0,'refcountries'); 
		
		$refestados = 1;

		session_start();

		$contacto = $_SESSION['email_aif'];

		$refusuarios = $_SESSION['usua_aif'];

		$refusuarios = '';
		
		if ($refcountriesaux <> $refcountries) { 
			$refcountries = $refcountriesaux;
			$esfusion	= 1; 
		} else { 
			$esfusion = 0; 
		} 
		
		$activo	= 1; 

		$cad = '';
		
		//// verifico si el jugador ya fue cargado 1=existe, 0=no existe /////
		$existeJugador = $serviciosReferencias->existeConectorJugadorEquipo($reftemporada, $refjugadores, $refequipos);	
		
		///  verifico si cumple con la edad 	1=ok, 0=mal	/////
		$vEdad = $serviciosReferencias->verificaEdadCategoriaJugador($refjugadores, $refcategorias, $reftipojugadores);
		

		if ($existeJugador == 0) {
			if (($vEdad == 1) || ($habilita == 1)) {
				$res = $serviciosReferencias->insertarConectordelegados($reftemporada,$refusuarios,$refjugadores,$reftipojugadores,$refequipos,$refcountries,$refcategorias,$esfusion,$activo,$refestados, $habilita); 
				if ((integer)$res > 0) { 
					
					$cad = '';
					
					echo $cad; 
				} else { 
					echo 'Huvo un error al insertar datos';	 
				} 
			} else {
				echo 'El jugador no cumple con la edad';	
			}
		} else {
			echo 'El jugador ya fue cargado en este equipo';	
		}
		
	} 

	function traerJugadoresPorCountries($serviciosReferencias) {
		$lstcountries = $_POST['lstcountries'];

		$res = $serviciosReferencias->traerJugadoresPorCountries($lstcountries);

		$ar = array(); 
		
		while ($row = mysql_fetch_assoc($res)) { 

			$arNuevo = array('apyn'=> utf8_encode($row['apyn']),
						'nrodocumento'=>$row['nrodocumento'],
						'idjugador'=>$row['idjugador'],
						'fechanacimiento' => $row['fechanacimiento']
			);
			
			array_push($ar, $arNuevo); 

		} 
		
		$resV['datos'] = $ar; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}

	function cambiarEstadoTareas($serviciosNotificaciones) {
		$id = $_POST['idfusionequipo'];
		$refestados = $_POST['refestados'];

		$res = $serviciosNotificaciones->cambiarEstadoTareas(0,$refestados,$id,'dbfusionequipos');

		if ($res) { 
			$resV['error'] = false; 
			$resV['mensaje'] = 'Registro Modificado con exito!.'; 

		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo modificar el Registro!'; 
		} 

		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}

	function cambiarEstadoFusion($serviciosReferencias) {
		$id = $_POST['idfusionequipo'];
		$refestados = $_POST['refestados'];

		$res = $serviciosReferencias->cambiarEstadoFusion($id, $refestados);

		if ($res) { 
			$resV['error'] = false; 
			$resV['mensaje'] = 'Registro Modificado con exito!.'; 

			$cambio = $serviciosReferencias->cambiarEstadoTareas(0,3,$id,'dbfusionequipos');

		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo modificar el Registro!'; 
		} 

		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}

	function traerFusionesPorEquipo($serviciosReferencias) {
		$id = $_POST['idequipodelegado'];
		$idcountrie = $_POST['idcountrie'];

		$res = $serviciosReferencias->traerFusionesPorEquipo($id, $idcountrie);

		$ar = array(); 
		
		while ($row = mysql_fetch_assoc($res)) { 
			array_push($ar,  $row); 
		} 
		
		$resV['datos'] = $ar; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}

	function traerTareasGeneralPorCountrieIncompletas($serviciosNotificaciones) {
		$id = $_POST['idcountrie'];

		$res = $serviciosNotificaciones->traerTareasGeneralPorCountrieIncompletas($id);

		$cad = '';
		$porcentaje = 0;
		$cantidad = 0;
		while ($row = mysql_fetch_array($res)) { 
			$cantidad += 1;
			if ($row['idestadotarea'] == 1) {
				$porcentaje = 0;
			} else {
				if ($row['idestadotarea'] == 2) {
					$porcentaje = 20;
				} else {
					if ($row['idestadotarea'] == 3) {
						$porcentaje = 100;
					
					} else {
						if ($row['idestadotarea'] == 5) {
							$porcentaje = 85;
						
						} else {
							$porcentaje = 0;
						}
					}
					
				}
			}
			$cad .= '<li>
						<a href="'.$row['url'].$row['id1'].'" class=" waves-effect waves-block">
							<h4>
								'.$row['tarea'].'
								<small>'.$porcentaje.'%</small>
							</h4>
							<div class="progress">
								<div class="progress-bar '.$row['color'].'" role="progressbar" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$porcentaje.'%">
								</div>
							</div>
						</a>
					</li>';
		} 
		$cad .= '';
		
		
		//echo array('respuesta' => $cad, 'cantidad' => $cantidad);
		header('Content-type: application/json'); 
		echo json_encode(array('respuesta' => $cad, 'cantidad' => $cantidad));
	}


	function VtraerTareasIncompletasPorCountries($serviciosNotificaciones) {
		$id = $_POST['idcountrie'];

		$res = $serviciosNotificaciones->traerTareasIncompletasPorCountries($id);

		$ar = array(); 
		
		while ($row = mysql_fetch_assoc($res)) { 
			array_push($ar, $row); 
		} 
		
		$resV['datos'] = $ar; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}

	function traerFusionPorEquiposDelegados($serviciosReferencias) {
		$idequipodelegado = $_POST['idequipodelegado'];

		$res = $serviciosReferencias->traerFusionPorEquiposDelegados($idequipodelegado);

		$ar = array();
		$cad = '';

		while ($row = mysql_fetch_array($res)) { 
			//array_push($cad, $row['countrie'].'  - Estado: '.$row['estado'].'  ');
			$cad .= utf8_encode( $row['countrie'].'  - Estado: '.$row['estado'].'  
			');
		} 

		$ar = array($cad);

		$resV['error'] = false; 
		$resV['mensaje'] = 'Se Finalizo con Exito la carga de Equipos!'; 

		$resV['datos'] = $ar; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}

	function verFusion($serviciosReferencias) {
		$idequipo 	= $_POST['idequipodelegado'];
		$idcountrie 	= $_POST['idcountrie'];

		$res = $serviciosReferencias->traerFusionPorEquiposCountrie($idequipo, $idcountrie);

		$cad = '';

		while ($row = mysql_fetch_array($res)) { 
			$cad = array($row['countrie'].'  ');
		} 

		$resV['error'] = false; 
		$resV['mensaje'] = 'Se Finalizo con Exito la carga de Equipos!'; 

		$resV['datos'] = $cad; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}


	function traerDefinicionesPorTemporadaCategoriaTipoJugador($serviciosReferencias) {
		$idTemporada 	= $_POST['resTemporada'];
		$idCategoria 	= $_POST['resCategoria'];
		$idTipoJugador 	= $_POST['resTipoJugador'];
		
		$res = $serviciosReferencias->traerDefinicionesPorTemporadaCategoriaTipoJugador($idTemporada, $idCategoria, $idTipoJugador);	
		$cad = '';
		
		if (mysql_num_rows($res)>0) {
			$cad = array('Edad Minima: '.mysql_result($res,0,'edadminima').' - Edad Maxima: '.mysql_result($res,0,'edadmaxima'));
			$resV['error'] = false; 
			$resV['mensaje'] = 'Se Finalizo con Exito la carga de Equipos!'; 

			$resV['datos'] = $cad; 
		} else {
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se cargo la especificación para esta categoria!'; 
		}

		header('Content-type: application/json'); 
		echo json_encode($resV); 
		
	}



	function confirmarEquipos($serviciosReferencias, $serviciosNotificaciones) {
		session_start();

		$contacto = $_SESSION['email_aif'];

		$id = $_POST['idcabecera'];
		$idestado = 2;

		$res = $serviciosReferencias->modificarCabeceraconfirmacionEstado($id,$idestado);

		$resCabecera = $serviciosReferencias->traerCabeceraconfirmacionPorId($id);

		$idcountrie = mysql_result($resCabecera,0,'refcountries');
		$idtemporada = mysql_result($resCabecera,0,'reftemporadas');

		$resFusiones = $serviciosReferencias->traerFusionesPorCoutriePadre($idcountrie, $idtemporada);

		$refcountries 	= $idcountrie;
		$tarea 			= 'Aprobar Fusion con Equipo';
		$usuariocrea 	= $contacto;
		$fechacrea 		= date('Y-m-d');
		$usuariomodi 	= $contacto;
		$fechamodi 		= date('Y-m-d');
		$refestados 	= 1;
		$url 			= 'fusiones/index.php?id=';
		$id1 			= 0;
		$id2 			= 0;
		$id3 			= 0;

		while ($row = mysql_fetch_array($resFusiones)) {
			$tareas = $serviciosNotificaciones->insertarTareas($row['refcountries'], $tarea,$usuariocrea,$fechacrea,$usuariomodi, $fechamodi,$refestados,$url,$row['idfusionequipo'],$id2,$id3);
		}


		$resV['error'] = false; 
		$resV['mensaje'] = 'Se Finalizo con Exito la carga de Equipos!'; 

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}


	function insertarEquiposdelegados($serviciosReferencias) {
		$nombre = strtoupper( trim($_POST['nombre']));
		$idtemporada = $_POST['idtemporada'];
		$idusuario = $_POST['idusuario'];
		$idcountrie = $_POST['idcountrie'];
		$refcategorias = $_POST['refcategorias'];
		$refdivisiones = $_POST['refdivisiones'];
		$refcountries = $_POST['refcountries'];
		$nuevo = $_POST['nuevo'];

		$res = $serviciosReferencias->insertarEquiposdelegados($idtemporada,$idusuario,$idcountrie,$nombre,$refcategorias,$refdivisiones,'',1,1,$nuevo); 
		//die(var_dump($res));
		//$res = true;
		if ((integer)$res > 0) { 
			if ($refcountries != '') {
				$arFusion = explode(',', $refcountries);
				foreach ($arFusion as $valor) {
					$fusion = $serviciosReferencias->insertarFusionEquipos($res, $valor, 1, '');
				}
			}
			$resV['error'] = false; 
			$resV['mensaje'] = 'Registro Cargado con exito!.'; 
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo Cargar el Registro!'; 
		}

		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}


	function eliminarEquipoPasivo($serviciosReferencias) { 
		$id = $_POST['id'];
		$idtemporada = $_POST['idtemporada'];
		$idusuario = $_POST['idusuario'];
		
		$sqlExiste = "select idequipo from dbequiposdelegados where idequipo = ".$id." and reftemporadas =".$idtemporada;
		$resExiste = $serviciosReferencias->existeDevuelveId($sqlExiste);

		if ($resExiste == 0) {
			$res = $serviciosReferencias->eliminarEquipoPasivo($id, $idtemporada, $idusuario); 
			
			if ($res) { 
				$resV['error'] = false; 
				$resV['mensaje'] = 'Registro Eliminado con exito!.'; 
			} else { 
				$resV['error'] = true; 
				$resV['mensaje'] = 'No se pudo eliminar/mantener el Registro!'; 
			} 
		} else {
			$resV['error'] = true; 
			$resV['mensaje'] = 'Ya fue eliminado o fue marcado como estable!';
		}

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 


	function mantenerEquipoPasivo($serviciosReferencias) { 
		$id = $_POST['id'];
		$idtemporada = $_POST['idtemporada'];
		$idusuario = $_POST['idusuario'];
		$idcountrie = $_POST['idcountrie'];
		
		$sqlExiste = "select idequipo from dbequiposdelegados where idequipo = ".$id." and reftemporadas =".$idtemporada;
		$resExiste = $serviciosReferencias->existeDevuelveId($sqlExiste);

		if ($resExiste == 0) {
			$res = $serviciosReferencias->mantenerEquipoPasivo($id, $idtemporada, $idusuario, $idcountrie); 
			
			if ($res > 0) { 
				$resV['error'] = false; 
				$resV['mensaje'] = 'Registro cargado con exito!.'; 
			} else { 
				$resV['error'] = true; 
				$resV['mensaje'] = 'No se pudo cargar el Registro!'; 
			} 
		} else {
			$resV['error'] = true; 
			$resV['mensaje'] = 'Ya fue eliminado o fue marcado como estable!';
		}

		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 


	function eliminarEquiposdelegados($serviciosReferencias) { 
		$id = $_POST['id']; 

		$res = $serviciosReferencias->eliminarEquiposdelegados($id); 
		
		if ($res) { 
			$resV['mensaje'] = 'Registro Eliminado con exito!.'; 
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo eliminar el Registro!'; 
		} 
		
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}


	function traerEquiposPorCountriesFinalizado($serviciosReferencias) {
		$id = $_POST['idcountrie'];
		$idtemporada = $_POST['idtemporada'];

		$res = $serviciosReferencias->traerEquiposdelegadosPorCountrieFinalizado($id, $idtemporada); 
		
		$ar = array(); 
		
		while ($row = mysql_fetch_assoc($res)) { 
			array_push($ar, $row); 
		} 
		
		$resV['datos'] = $ar; 
		
		
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}

function traerEquiposdelegadosEliminadosPorCountrie($serviciosReferencias) {
	$id = $_POST['idcountrie'];
	$idtemporada = $_POST['idtemporada'];

	$res = $serviciosReferencias->traerEquiposdelegadosEliminadosPorCountrie($id, $idtemporada); 
	
	$ar = array(); 
	
	while ($row = mysql_fetch_assoc($res)) { 
		array_push($ar, $row); 
	} 
	
	$resV['datos'] = $ar; 
	
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 


}

function traerEquiposdelegadosMantenidosPorCountrie($serviciosReferencias) {
	$id = $_POST['idcountrie'];
	$idtemporada = $_POST['idtemporada'];

	$res = $serviciosReferencias->traerEquiposdelegadosMantenidosPorCountrie($id, $idtemporada); 
	
	$ar = array(); 
	
	while ($row = mysql_fetch_assoc($res)) { 
		array_push($ar, $row); 
	} 
	
	$resV['datos'] = $ar; 
	
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 


}


function traerEquiposdelegadosPorCountrie($serviciosReferencias) {
	$id = $_POST['idcountrie'];
	$idtemporada = $_POST['idtemporada'];
	$nuevo = $_POST['nuevo'];

	$res = $serviciosReferencias->traerEquiposdelegadosPorCountrie($id, $idtemporada, $nuevo); 
	
	$ar = array(); 
	
	while ($row = mysql_fetch_assoc($res)) { 
		array_push($ar, $row); 
	} 
	
	$resV['datos'] = $ar; 
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 


}

function traerEquiposPorCountries($serviciosReferencias) {
	$id = $_POST['idcountrie'];

	$res = $serviciosReferencias->traerEquiposPorCountries($id); 
	
	$ar = array(); 
	
	while ($row = mysql_fetch_assoc($res)) { 
		array_push($ar, $row); 
	} 
	
	$resV['datos'] = $ar; 
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 


}


function traerEquiposPorCountriesConFusion($serviciosReferencias) {
	$id = $_POST['idcountrie'];
	$idtemporada = $_POST['idtemporada'];

	$res = $serviciosReferencias->traerEquiposPorCountriesConFusion($id, $idtemporada); 
	
	$ar = array(); 
	
	while ($row = mysql_fetch_assoc($res)) { 
		array_push($ar, $row); 
	} 
	
	$resV['datos'] = $ar; 
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 


}



function traerImgenCountry($serviciosReferencias) {
	$id = $_POST['id'];

	$res = $serviciosReferencias->traerCountriesPorId($id);

	$imagen = mysql_result($res,0,'imagen');

	echo $imagen;
}

function validar_fecha_espanol($fecha){
	$valores = explode('-', str_replace('_','',$fecha));
	//die(var_dump((integer)$valores[1].(integer)$valores[2].(integer)$valores[0]));
	if(count($valores) == 3 && 
		checkdate((integer)$valores[1], (integer)$valores[2], (integer)$valores[0] &&
		strlen($valores[1]) == 2 &&
		strlen($valores[2]) == 2 &&
		strlen($valores[0]) == 4)){
		return true;
    }
	return false;
}


function modificarJugadorNuevo($serviciosReferencias, $serviciosFunciones, $serviciosUsuarios) {
	$id = $_POST['id'];

	$resResultado = $serviciosReferencias->traerJugadoresPrePorId($id);

	$modificar = "modificarJugadorespre";

	$idTabla = "idjugadorpre";

	/////////////////////// Opciones para la creacion del formulario  /////////////////////
	$tabla 			= "dbjugadorespre";

	$lblCambio	 	= array("reftipodocumentos","nrodocumento","fechanacimiento","fechaalta","fechabaja","refcountries","refusuarios","numeroserielote", "refestados");
	$lblreemplazo	= array("Tipo Documento","Nro Documento","Fecha Nacimiento","Fecha Alta","Fecha Baja","Countries","Usuario","Nro Serie Lote","Estado");


	$resTipoDoc 	= $serviciosReferencias->traerTipodocumentos();
	$cadRefj 	= $serviciosFunciones->devolverSelectBoxActivo($resTipoDoc,array(1),'',mysql_result($resResultado,0,'reftipodocumentos'));

	$resCountries 	= $serviciosReferencias->traerCountriesPorId(mysql_result($resResultado,0,'refcountries'));
	$cadRef2j 	= $serviciosFunciones->devolverSelectBox($resCountries,array(1),'');

	$resUsua = $serviciosUsuarios->traerUsuarioId(mysql_result($resResultado,0,'refusuarios'));
	$cadRef3j 	= $serviciosFunciones->devolverSelectBox($resUsua,array(3),'');

	$resEstado 	= $serviciosReferencias->traerEstadosPorId(mysql_result($resResultado,0,'refestados'));
	$cadRefE 	= $serviciosFunciones->devolverSelectBoxActivo($resEstado,array(1),'',mysql_result($resResultado,0,'refestados'));


	$refdescripcion = array(0 => $cadRefj,1 => $cadRef2j,2 => $cadRef3j, 3 => $cadRefE);
	$refCampo 	=  array("reftipodocumentos","refcountries","refusuarios","refestados");

	//////////////////////////////////////////////  FIN de los opciones //////////////////////////


	$formulario 	= $serviciosFunciones->camposTablaModificar($id, $idTabla, $modificar,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

	echo $formulario;

}



function insertarJugadorespre($serviciosReferencias) {
	$reftipodocumentos = $_POST['reftipodocumentos'];
	$nrodocumento = $_POST['nrodocumento'];
	$apellido = $_POST['apellido'];
	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$fechanacimiento = ($_POST['fechanacimiento']);
	$fechaalta = ($_POST['fechaalta']);
	$numeroserielote = $_POST['numeroserielote'];
	$refcountries = $_POST['refcountries'];
	$observaciones = $_POST['observaciones'];
	$refusuarios = $_POST['refusuarios'];
	
	if (($fechaalta == '') || ($fechanacimiento == '')) {
		echo 'Formato de fecha incorrecto';
	} else {
		if (($serviciosReferencias->existeJugador($nrodocumento) == 0) && ($serviciosReferencias->existeJugadorPre($nrodocumento) == 0)) {
			$res = $serviciosReferencias->insertarJugadorespre($reftipodocumentos,$nrodocumento,$apellido,$nombres,$email,$fechanacimiento,$fechaalta,$numeroserielote,$refcountries,$observaciones,$refusuarios); 
			
			if ((integer)$res > 0) { 
				echo $res; 
			} else { 
				echo 'Huvo un error al insertar datos ';	 
			} 
		} else {
			echo 'Ya existe ese numero de documento';	
		}
	}
}

function existeJugadorPre($serviciosReferencias) {
	$nrodocumento = $_POST['nrodocumento']; 
	
	$res = $serviciosReferencias->existeJugadorPre($nrodocumento);
	
	if ($res == 0) {
		echo '';	
	} else {
		echo 'Ya existe este Nro de Documento';	
	}
}


function modificarJugadorespre($serviciosReferencias) {
	$id = $_POST['id'];

	$errores = '';

	$reftipodocumentos = $_POST['reftipodocumentos'];
	
	$nrodocumento = trim($_POST['nrodocumento']);
	$apellido = trim($_POST['apellido']);
	$nombres = trim($_POST['nombres']);
	$fechanacimiento = str_replace('_','',$_POST['fechanacimiento']);
	if ($nrodocumento == '') {
		$errores .= 'Es obligatorio el nro de documento - ';
	}
	
	if ($apellido == '') {
		$errores .= 'Es obligatorio el apellido - ';
	}

	if ($nombres == '') {
		$errores .= 'Es obligatorio el nombre - ';
	}

	$email = $_POST['email'];
	
	$fechaalta = str_replace('_','',$_POST['fechaalta']);
	$numeroserielote = $_POST['numeroserielote'];
	$refcountries = $_POST['refcountries'];
	$observaciones = $_POST['observaciones'];
	$refusuarios = $_POST['refusuarios'];

	
	
	if ((validar_fecha_espanol($fechaalta) == false) || (validar_fecha_espanol($fechanacimiento) == false)) {
		
		$errores .= 'Formato de fecha incorrecto - ';

		echo trim($errores);
	} else {

		if ($errores == '') {
			$res = $serviciosReferencias->modificarJugadorespre($id,$reftipodocumentos,$nrodocumento,$apellido,$nombres,$email,$fechanacimiento,$fechaalta,$numeroserielote,$refcountries,$observaciones,$refusuarios);
			
			if ($res == true) {
				echo 1;
			} else {
				echo trim($res);
			}
		} else {
			echo trim($errores);
		}
		
	}
}


function eliminarJugadorespre($serviciosReferencias) {
	$id = $_POST['id'];

	$res = $serviciosReferencias->traerJugadoresprePorId($id);	

	if ( (integer)mysql_result($res, 0,'idusuario') > 0) {
		echo 'No se puede borrar el jugador ya que se registro como usuario en el sistema, comunicarse con la Asociacion para resolverlo.';

	} else {
		$res = $serviciosReferencias->eliminarJugadorespre($id);
		echo $res;
	}
} 

function VtraerPaginasJugadoresPorClub($serviciosReferencias) {
	$idclub = $_POST['idclub'];
	$busqueda = $_POST['busqueda'];

	$res = $serviciosReferencias->traerJugadoresClubPorCountrieActivos($idclub, $busqueda); 
	
	$ar = array(round(mysql_num_rows($res) / 10));

	$resV['datos'] = $ar; 
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 
}

function VtraerJugadoresClubPorCountrieActivos($serviciosReferencias) {
	$idclub = $_POST['idclub'];
	$pagina = $_POST['pagina'];
	$cantidad = $_POST['cantidad'];
	$busqueda = $_POST['busqueda'];

	$res = $serviciosReferencias->traerJugadoresClubPorCountrieActivosPaginador($idclub, $pagina, $cantidad, $busqueda); 
	$ar = array(); 

	while ($row = mysql_fetch_assoc($res)) { 
		$arNuevo = array('apellido'=> utf8_encode($row['apellido']),
						'nombres'=>utf8_encode($row['nombres']),
						'nrodocumento'=>$row['nrodocumento'],
						'idjugador'=>$row['idjugador'],
						'fechabajacheck'=> ($row['fechabajacheck'] == '0' ? false : true),
						'articulocheck'=> ($row['articulocheck'] == '0' ? false : true),
						'numeroserielote' => $row['numeroserielote']
		);
			
		array_push($ar, $arNuevo); 

	} 
	
	$resV['datos'] = $ar; 
	
	//die(var_dump($resV));

	header('Content-type: application/json; charset=utf-8'); 
	echo json_encode($resV);
}


function insertarDelegados($serviciosReferencias) { 
	$refusuarios = $_POST['refusuarios']; 
	$apellidos = $_POST['apellidos']; 
	$nombres = $_POST['nombres']; 
	$direccion = $_POST['direccion']; 
	$localidad = $_POST['localidad']; 
	$cp = $_POST['cp']; 
	$telefono = $_POST['telefono']; 
	$celular = $_POST['celular']; 
	$fax = $_POST['fax']; 
	$email1 = $_POST['email1']; 
	$email2 = $_POST['email2']; 
	$email3 = $_POST['email3']; 
	$email4 = $_POST['email4']; 
	$res = $serviciosReferencias->insertarDelegados($refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
	if ((integer)$res > 0) { 
	echo ''; 
	} else { 
	echo 'Huvo un error al insertar datos';	 
	} 
} 

function VguardarDelegado($serviciosReferencias) {
	
	$existe = $serviciosReferencias->existeDelegadoPorUsuario($_POST['refusuarios']);


	$refusuarios = $_POST['refusuarios']; 
	$apellidos = $_POST['apellidos']; 
	$nombres = $_POST['nombres']; 
	$direccion = $_POST['direccion']; 
	$localidad = $_POST['localidad']; 
	$cp = $_POST['cp']; 
	$telefono = $_POST['telefono']; 
	$celular = $_POST['celular']; 
	$fax = $_POST['fax']; 
	$email1 = $_POST['email1']; 
	$email2 = $_POST['email2']; 
	$email3 = $_POST['email3']; 
	$email4 = $_POST['email4']; 
	
	if ($existe > 0) {
		$id = $_POST['iddelegado']; 

		$res = $serviciosReferencias->modificarDelegados($id,$refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
		
		if ($res) { 
			$resV['mensaje'] = 'Registro Modificado con exito!.'; 
			$resV['error'] = false; 
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo modificar el Registro!'; 
		} 
	} else {
		$res = $serviciosReferencias->insertarDelegados($refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
		if ((integer)$res > 0) { 
			$resV['mensaje'] = 'Registro Cargado con exito!.'; 
			$resV['error'] = false;
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo cargar el Registro!'; 
		} 
	}
	
	
	header('Content-type: application/json'); 
	echo json_encode($resV); 
}


function guardarJugadorClubSimple($serviciosReferencias) {
	$idClub 		= $_POST['idclub'];
	$idJugador 		= $_POST['idjugador'];
	$numeroSerie 	= $_POST['numeroserielote'];
	$fechabaja 		= $_POST['fechabaja'];
	$articulo 		= $_POST['articulo'];

	if (trim($numeroSerie) == '') {
		$resV['error'] = true; 
		$resV['mensaje'] = 'No se pudo cargar el Registro!, Debe cargar el Nro de Serie/Lote'; 
	} else {
		$resTemporada = $serviciosReferencias->traerUltimaTemporada();
		$temporada = mysql_result($resTemporada,0,1);

		$existe = $serviciosReferencias->existeJugadoresclubPorClubJugador($idClub, $idJugador);

		if ($existe > 0) {
			/* modifico */
			$res = $serviciosReferencias->modificarJugadoresclub($existe,$idJugador,$fechabaja,$articulo,$numeroSerie,$temporada,$idClub);
			if ($res == true) {
				$resV['mensaje'] = 'Registro Modificado con exito!.'; 
				$resV['error'] = false; 
			} else {
				$resV['error'] = true; 
				$resV['mensaje'] = 'No se pudo cargar el Registro!'; 
			}
		} else {
			/* inserto */
			$res = $serviciosReferencias->insertarJugadoresclub($idJugador,$fechabaja,$articulo,$numeroSerie,$temporada,$idClub);

			if ($res >0) {
				$resV['mensaje'] = 'Registro Cargado con exito!.'; 
				$resV['error'] = false;
			} else {
				$resV['error'] = true; 
				$resV['mensaje'] = 'No se pudo cargar el Registro!'; 
			}
		}
	}
	

	header('Content-type: application/json'); 
	echo json_encode($resV); 

}

	function modificarDelegados($serviciosReferencias) { 
		$id = $_POST['id']; 
		$refusuarios = $_POST['refusuarios']; 
		$apellidos = $_POST['apellidos']; 
		$nombres = $_POST['nombres']; 
		$direccion = $_POST['direccion']; 
		$localidad = $_POST['localidad']; 
		$cp = $_POST['cp']; 
		$telefono = $_POST['telefono']; 
		$celular = $_POST['celular']; 
		$fax = $_POST['fax']; 
		$email1 = $_POST['email1']; 
		$email2 = $_POST['email2']; 
		$email3 = $_POST['email3']; 
		$email4 = $_POST['email4']; 
		$res = $serviciosReferencias->modificarDelegados($id,$refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
		if ($res == true) { 
		echo ''; 
		} else { 
		echo 'Huvo un error al modificar datos'; 
		} 
	} 

	function eliminarDelegados($serviciosReferencias) { 
		$id = $_POST['id']; 
		$res = $serviciosReferencias->eliminarDelegados($id); 
		echo $res; 
	} 

	function VenviarMensaje($serviciosNotificaciones) {
		$mensaje = trim($_POST['mensaje']); 
		$premensaje = trim($_POST['premensaje']); 
		$idpagina = 53; //ver el id cuando lo genera en cada base de datos 
		$autor = ''; 
		$destinatario = 'msredhotero@msn.com'; 
		$id1 = 0; 
		$id2 = 0; 
		$id3 = 0; 
		$icono = 'glyphicon glyphicon-warning-sign'; 
		$estilo = 'alert alert-warning'; 
		$fecha = date('Y-m-d H:i:s'); 
		$url = $_POST['url']; 


		if ($mensaje == '') {
			$resV['error'] = true; 
			$resV['mensaje'] = 'Debe escribir un mensaje! '; 
		} else {
			$res = $serviciosNotificaciones->insertarNotificaciones($premensaje.' '.$mensaje,$idpagina,$autor,$destinatario,$id1,$id2,$id3,$icono,$estilo,$fecha,$url); 

			if ((integer)$res > 0) { 
				$resV['error'] = false;
				$resV['mensaje'] = 'Registro Cargado con exito!.'; 
			} else { 
				$resV['error'] = true; 
				$resV['mensaje'] = 'No se pudo cargar el Registro! '; 
			}
		}
		 
		header('Content-type: application/json'); 
		echo json_encode($resV); 

	}

	function VinsertarDelegados($serviciosReferencias) { 
		$refusuarios = $_POST['refusuarios']; 
		$apellidos = $_POST['apellidos']; 
		$nombres = $_POST['nombres']; 
		$direccion = $_POST['direccion']; 
		$localidad = $_POST['localidad']; 
		$cp = $_POST['cp']; 
		$telefono = $_POST['telefono']; 
		$celular = $_POST['celular']; 
		$fax = $_POST['fax']; 
		$email1 = $_POST['email1']; 
		$email2 = $_POST['email2']; 
		$email3 = $_POST['email3']; 
		$email4 = $_POST['email4']; 
		$res = $serviciosReferencias->insertarDelegados($refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
		if ((integer)$res > 0) { 
			$resV['mensaje'] = 'Registro Cargado con exito!.'; 
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo cargar el Registro!'; 
		} 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 

	function VmodificarDelegados($serviciosReferencias) { 
		$id = $_POST['id']; 
		$refusuarios = $_POST['refusuarios']; 
		$apellidos = $_POST['apellidos']; 
		$nombres = $_POST['nombres']; 
		$direccion = $_POST['direccion']; 
		$localidad = $_POST['localidad']; 
		$cp = $_POST['cp']; 
		$telefono = $_POST['telefono']; 
		$celular = $_POST['celular']; 
		$fax = $_POST['fax']; 
		$email1 = $_POST['email1']; 
		$email2 = $_POST['email2']; 
		$email3 = $_POST['email3']; 
		$email4 = $_POST['email4']; 
		$res = $serviciosReferencias->modificarDelegados($id,$refusuarios,$apellidos,$nombres,$direccion,$localidad,$cp,$telefono,$celular,$fax,$email1,$email2,$email3,$email4); 
		if ($res) { 
		$resV['mensaje'] = 'Registro Modificado con exito!.'; 
		} else { 
		$resV['error'] = true; 
		$resV['mensaje'] = 'No se pudo modificar el Registro!'; 
		} 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 

	function VmodificarCountries($serviciosReferencias) {
		$id = $_POST['id'];
		$direccion = $_POST['direccion'];
		$telefonoadministrativo = $_POST['telefonoadministrativo'];
		$telefonocampo = $_POST['telefonocampo'];
		$email = $_POST['email'];

		$res = $serviciosReferencias->modificarCountry($id, $direccion, $telefonoadministrativo,$telefonocampo,$email); 
		
		if ($res) { 
			$resV['mensaje'] = 'Registro Modificado con exito!.'; 
		} else { 
			$resV['error'] = true; 
			$resV['mensaje'] = 'No se pudo modificar el Registro!'; 
		} 

		header('Content-type: application/json'); 
		echo json_encode($resV); 
		
	}

	function VeliminarDelegados($serviciosReferencias) { 
		$id = $_POST['id']; 
		$res = $serviciosReferencias->eliminarDelegados($id); 
		if ($res) { 
		$resV['mensaje'] = 'Registro Eliminado con exito!.'; 
		} else { 
		$resV['error'] = true; 
		$resV['mensaje'] = 'No se pudo eliminar el Registro!'; 
		} 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 

	function VtraerDelegados($serviciosReferencias) { 
		$res = $serviciosReferencias->VtraerDelegados(); 
		$ar = array(); 
		while ($row = mysql_fetch_array($res)) { 
			array_push($ar, $row); 
		} 
		$resV['datos'] = $ar; 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	} 


	function traerCountriesPorId($serviciosReferencias) {

		$id = $_POST['idcountrie'];

		$res = $serviciosReferencias->traerCountriesPorId($id); 
		$ar = array(); 
		while ($row = mysql_fetch_assoc($res)) { 
			array_push($ar, $row); 
		} 
		$resV['datos'] = $ar; 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}


	function VtraerDelegadosPorId($serviciosReferencias) { 

		$ar = array(); 


		$id = $_POST['iddelegado'];

		$res = $serviciosReferencias->traerDelegadosPorUsuario($id); 

		while ($row = mysql_fetch_assoc($res)) { 
			array_push($ar, $row); 
		} 

		$resV['datos'] = $ar; 
		header('Content-type: application/json'); 
		echo json_encode($resV); 
	}

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