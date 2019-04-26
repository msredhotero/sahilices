<?php


session_start();

if (!isset($_SESSION['usua_sahilices']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesReferencias.php');
include ('../../includes/base.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();
$baseHTML = new BaseHTML();

//*** SEGURIDAD ****/
include ('../../includes/funcionesSeguridad.php');
$serviciosSeguridad = new ServiciosSeguridad();
$serviciosSeguridad->seguridadRuta($_SESSION['refroll_sahilices'], '../cotizaciones/');
//*** FIN  ****/

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_sahilices'],"Cotizaciones",$_SESSION['refroll_sahilices'],$_SESSION['email_sahilices']);

$configuracion = $serviciosReferencias->traerConfiguracion();

$cadEmpresas = $serviciosFunciones->devolverSelectBox($configuracion,array(1),'');

$tituloWeb = mysql_result($configuracion,0,'sistema');

$breadCumbs = '<a class="navbar-brand" href="../index.php">Dashboard</a>';

/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Cotizacion";

$plural = "Cotizaciones";

$eliminar = "eliminarCotizaciones";

$insertar = "insertarCotizaciones";

$modificar = "modificarCotizaciones";

//////////////////////// Fin opciones ////////////////////////////////////////////////

$id = $_SESSION['usuaid_sahilices'];

/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbcotizaciones";

$lblCambio	 	= array('refclientes','refmotivosoportunidades','refcontactos','refestadocotizacion','reftipostrabajos','refusuarios','reflistas');
$lblreemplazo	= array('Cliente','Motivo de Oportunidad','Contacto','Estado','Tipo de Trabajo','Usuario','Lista de Precio');


$resVar1 = $serviciosReferencias->traerTipostrabajos();
$cadRef1 	= $serviciosFunciones->devolverSelectBox($resVar1,array(1),'');

$resVar2 = $serviciosReferencias->traerMotivosoportunidades();
$cadRef2 	= $serviciosFunciones->devolverSelectBox($resVar2,array(1),'');

$resVar3 = $serviciosUsuario->traerUsuarioId($_SESSION['usuaid_sahilices']);
$cadRef3 	= $serviciosFunciones->devolverSelectBox($resVar3,array(1),'');

$resVar4 = $serviciosReferencias->traerEstadosPorFormulario(1);
$cadRef4 	= $serviciosFunciones->devolverSelectBox($resVar4,array(1),'');

$resVar5 = $serviciosReferencias->traerClientes();
$cadRef5 	= $serviciosFunciones->devolverSelectBox($resVar5,array(1),' ');

$resVar6 = $serviciosReferencias->traerContactos();
$cadRef6 	= $serviciosFunciones->devolverSelectBox($resVar6,array(2,3,4,5,6),' ');

$refdescripcion = array(0=>$cadRef5,
								1=>$cadRef2,
								2=>$cadRef6,
								3=>$cadRef4,
								4=>$cadRef1,
								5=>$cadRef3);
$refCampo 	=  array('refclientes','refmotivosoportunidades','refcontactos','refestadocotizacion','reftipostrabajos','refusuarios');

$frm 	= $serviciosFunciones->camposTablaViejo($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$resVarTM = $serviciosReferencias->traerTipomonedas();
$cadRefTM 	= $serviciosFunciones->devolverSelectBox($resVarTM,array(2),'');

// formas de pago
$resFormaPago = $serviciosReferencias->traerConceptosPorTipo(3);
$cadRefFP 	= $serviciosFunciones->devolverSelectBox($resFormaPago,array(3),'');

// plazos de entrega
$resEntrega = $serviciosReferencias->traerConceptosPorTipo(5);
$cadRefE 	= $serviciosFunciones->devolverSelectBox($resEntrega,array(3),'');

// validez
$resValidez = $serviciosReferencias->traerConceptosPorTipo(4);
$cadRefV 	= $serviciosFunciones->devolverSelectBox($resValidez,array(3),'');

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?php echo $tituloWeb; ?></title>
	<!-- Favicon-->
	<link rel="icon" href="../../favicon.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<?php echo $baseHTML->cargarArchivosCSS('../../'); ?>

	<link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />
	<link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

	<!-- Dropzone Css -->
	<link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">


	<link rel="stylesheet" href="../../DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../../DataTables/DataTables-1.10.18/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../../DataTables/DataTables-1.10.18/css/dataTables.jqueryui.min.css">
	<link rel="stylesheet" href="../../DataTables/DataTables-1.10.18/css/jquery.dataTables.css">

	<link rel="stylesheet" href="../../css/easy-autocomplete.min.css">
	<link rel="stylesheet" href="../../css/easy-autocomplete.themes.min.css">

	<style>
		.alert > i{ vertical-align: middle !important; }
		.btn-circle-chico {
			border: none;
			outline: none !important;
			overflow: hidden;
			width: 10px;
			height: 10px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			border-radius: 50%;
		}
		.btn-chico {
			display: inline-block;
			padding: 6px 6px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: normal;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		.alignRight { text-align: right; }
		.alignCenter { text-align: center; }
		.alignLeft { text-align: left; }
		.easy-autocomplete-container { z-index: 99999999}
	</style>


</head>



<body class="theme-red">

<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">
		<div class="preloader">
			<div class="spinner-layer pl-red">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
		<p>Cargando...</p>
	</div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
	<div class="search-icon">
		<i class="material-icons">search</i>
	</div>
	<input type="text" placeholder="Ingrese palabras...">
	<div class="close-search">
		<i class="material-icons">close</i>
	</div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<?php echo $baseHTML->cargarNAV($breadCumbs); ?>
<!-- #Top Bar -->
<?php echo $baseHTML->cargarSECTION($_SESSION['usua_sahilices'], $_SESSION['nombre_sahilices'], $resMenu,'../../'); ?>

<section class="content" style="margin-top:-45px;">

	<div class="container-fluid">
		<div class="row clearfix">

			<div class="row">


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card ">
						<div class="header bg-indigo">
							<h2>
								<?php echo strtoupper($plural); ?>
							</h2>
							<ul class="header-dropdown m-r--5">
								<li class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="material-icons">more_vert</i>
									</a>
									<ul class="dropdown-menu pull-right">

									</ul>
								</li>
							</ul>
						</div>
						<div class="body table-responsive">
							<form class="form" id="formCountry">

								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="button-demo">
											<button type="button" class="btn bg-light-green waves-effect btnNuevo">
												<i class="material-icons">add</i>
												<span>NUEVO</span>
											</button>

										</div>
									</div>

								</div>

								<div class="row" style="padding: 5px 20px;">

									<table id="example" class="display table " style="width:100%">
										<thead>
											<tr>
												<th>Empresa</th>
												<th>Tipo Trabajo</th>
												<th>Operador</th>
												<th>Fecha</th>
												<th>Ult. Modi.</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Empresa</th>
												<th>Tipo Trabajo</th>
												<th>Operador</th>
												<th>Fecha</th>
												<th>Ult. Modi.</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<!-- ELIMINAR -->
		<form class="formulario" role="form" id="sign_in">
		   <div class="modal fade" id="lgmEliminar" tabindex="-1" role="dialog">
		       <div class="modal-dialog modal-lg" role="document">
		           <div class="modal-content">
		               <div class="modal-header">
		                   <h4 class="modal-title" id="largeModalLabel">ELIMINAR <?php echo strtoupper($singular); ?></h4>
		               </div>
		               <div class="modal-body">
										 <p>¿Esta seguro que desea eliminar el registro?</p>
										 <small>* Si este registro esta relacionado con algun otro dato no se podría eliminar.</small>
		               </div>
		               <div class="modal-footer">
		                   <button type="button" class="btn btn-danger waves-effect eliminar">ELIMINAR</button>
		                   <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
		               </div>
		           </div>
		       </div>
		   </div>
			<input type="hidden" id="accion" name="accion" value="<?php echo $eliminar; ?>"/>
			<input type="hidden" name="ideliminar" id="ideliminar" value="0">
		</form>


<?php echo $baseHTML->cargarArchivosJS('../../'); ?>
<!-- Wait Me Plugin Js -->
<script src="../../plugins/waitme/waitMe.js"></script>

<script src="../../js/jquery.easy-autocomplete.min.js"></script>
<!-- Custom Js -->
<script src="../../js/pages/cards/colored.js"></script>

<script src="../../plugins/jquery-validation/jquery.validate.js"></script>

<script src="../../js/pages/examples/sign-in.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<script src="../../DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>



<script>
	$(document).ready(function(){



		$("#example").on("click",'.btnPreview', function(){
			window.open("../../reportes/rptPreviaCotizacionCompleta.php?id=<?php echo $id; ?>&idempresa=" + $('#refempresasaux').val() + '&idcliente=' + $('#refclientes').val() + '&idcontacto=' + $('#refcontactos').val() + '&idtrabajo=' + $('#reftipostrabajos').val() + '&idpago=' + $('#refformapago').val() + '&idplazoentrega=' + $('#refplazos').val() + '&idvalidez=' + $('#refvalidez').val() ,'_blank');
		});

		var table = $('#example').DataTable({
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "../../json/jstablasajax.php?tabla=cotizador",
			"language": {
				"emptyTable":     "No hay datos cargados",
				"info":           "Mostrar _START_ hasta _END_ del total de _TOTAL_ filas",
				"infoEmpty":      "Mostrar 0 hasta 0 del total de 0 filas",
				"infoFiltered":   "(filtrados del total de _MAX_ filas)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrar _MENU_ filas",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Buscar:",
				"zeroRecords":    "No se encontraron resultados",
				"paginate": {
					"first":      "Primero",
					"last":       "Ultimo",
					"next":       "Siguiente",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": activate to sort column ascending",
					"sortDescending": ": activate to sort column descending"
				}
			}
		});



		$('.maximizar').click(function() {
			if ($('.icomarcos').text() == 'web') {
				$('#marcos').show();
				$('.content').css('marginLeft', '315px');
				$('.icomarcos').html('aspect_ratio');
			} else {
				$('#marcos').hide();
				$('.content').css('marginLeft', '15px');
				$('.icomarcos').html('web');
			}

		});



		setInterval(function() {
			verificarSemaforo();
		},35000);


		function verificarSemaforo() {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {accion: 'verificarSemaforos'},
				//mientras enviamos el archivo
				beforeSend: function(){

				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '1') {
						table.ajax.reload();
					}
				},
				//si ha ocurrido un error
				error: function(){
					swal({
							title: "Respuesta",
							text: 'Actualice la pagina',
							type: "error",
							timer: 2000,
							showConfirmButton: false
					});

				}
			});
		}

		function frmAjaxEliminar(id) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {accion: 'eliminarCotizacion', id: id},
				//mientras enviamos el archivo
				beforeSend: function(){

				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
						swal({
								title: "Respuesta",
								text: "Registro Eliminado con exito!!",
								type: "success",
								timer: 1500,
								showConfirmButton: false
						});
						$('#lgmEliminar').modal('toggle');
						table.ajax.reload();
					} else {
						swal({
								title: "Respuesta",
								text: data,
								type: "error",
								timer: 2000,
								showConfirmButton: false
						});

					}
				},
				//si ha ocurrido un error
				error: function(){
					swal({
							title: "Respuesta",
							text: 'Actualice la pagina',
							type: "error",
							timer: 2000,
							showConfirmButton: false
					});

				}
			});

		}

		$("#example").on("click",'.btnEliminar', function(){
			idTable =  $(this).attr("id");
			$('#ideliminar').val(idTable);
			$('#lgmEliminar').modal();
		});//fin del boton eliminar

		$('.eliminar').click(function() {
			frmAjaxEliminar($('#ideliminar').val());
		});

		$("#example").on("click",'.btnModificar', function(){
			idTable =  $(this).attr("id");
			window.location.href = "modificar.php?id="+idTable;
		});//fin del boton modificar

		$('.btnNuevo').click(function(){
			window.location.href = "nuevo.php";

		});


		function traerNotificaciones() {
			$.ajax({
			dataType: "json",
			data:  {
				accion: 'traerNotificacionesPorRol',
				altura: '../'
			},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('.notificaciones').html('');
			},
			success:  function (response) {
				$('.notificaciones').html(response.respuesta);
				$('.notificaciones-cantidad').html(response.cantidad);
			}
			});
		}

      traerNotificaciones();

      setInterval(function() {
          traerNotificaciones();
      },5000);
	});
</script>








</body>
<?php } ?>
</html>
