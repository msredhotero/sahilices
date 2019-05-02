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

$resVar4 = $serviciosReferencias->traerEstadocotizacionPorIn(1);
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
											<button type="button" class="btn bg-light-green waves-effect btnNuevo" data-toggle="modal" data-target="#lgmNuevo">
												<i class="material-icons">add</i>
												<span>NUEVO CLIENTE</span>
											</button>

										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="alert alertEstadoCliente">
											<h4 class="lblEstado"></h4>
											<p class="lblComentario"></p>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Empresa:</label>
											<div class="form-line">
												<select class="form-control show-tick" name="refempresasaux" id="refempresasaux">
													<?php echo $cadEmpresas; ?>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<?php echo $frm; ?>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h4>Detalle de la Cotizacion</h4>
									</div>
								</div>
								<!-- buscador -->
								<div class="row">


									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="form-group">
											<label>Buscar Item</label>
											<div class="form-line buscarItem">
												<!--<input type="text" id="btnBuscar" name="lstItems" class="form-control" placeholder="Ingrese los datos de la busqueda"  />-->
												<div style="position: relative; height: 80px;">
													<input id="round" class="countrie" style="width: 100%; z-index:99999"/>
												</div>
												<div id="selction-ajax"></div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Cantidad:</label>
											<div class="form-line">
												<input type="text" id="cantidad" name="cantidad" class="form-control" value="1"  />
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Moneda</label>
											<div class="form-line">
												<select class="form-control show-tick" name="reftipomonedas" id="reftipomonedas">
													<?php echo $cadRefTM; ?>
												</select>
											</div>
										</div>
									</div>

								</div>
								<!-- fin buscador -->
								<!-- bonificaciones y otros -->
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Bonificación</label>
											<div class="input-group">
												<span class="input-group-addon">$</span>
												<div class="form-line">
													<input type="text" id="bonificacion" name="bonificacion" class="form-control" placeholder="Bonificacion" value="0"  />
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Precio Unitario</label>
											<div class="input-group">
												<span class="input-group-addon">$</span>
												<div class="form-line">
													<input type="text" id="precio" name="precio" class="form-control" placeholder="Bonificacion" value="0"  readonly/>
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Lista de Precio</label>
											<div class="input-group">
												<div class="form-line">
													<input type="number" class="reflistasaux form-control" id="reflistasaux" name="reflistasaux" readonly/>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<div class="form-group">
											<label>Aplica al total</label>
											<div class="input-group">
												<div class="">
													<div class="switch">
														<label><input type="checkbox" checked id="aplicatotal" name="aplicatotal"/><span class="lever switch-col-green"></span></label>
													</div>

												</div>
											</div>
										</div>
									</div>

								</div>
								<!-- fin bonificaciones y otros -->
								<!-- carro de compra -->
								<div class="row table-responsive">
									<table id="example" class="display table " style="width:100%">
										<thead>
											<tr>
												<th>Item</th>
												<th>Concepto</th>
												<th>Leyenda</th>
												<th>Cant.</th>
												<th>Precio Unit.</th>
												<th>Moneda</th>
												<th>% Bonif.</th>
												<th>Aplica</th>
												<th>SubTotal</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Item</th>
												<th>Concepto</th>
												<th>Leyenda</th>
												<th>Cant.</th>
												<th>Precio Unit.</th>
												<th>Moneda</th>
												<th>% Bonif.</th>
												<th>Aplica</th>
												<th>SubTotal</th>
												<th>Acciones</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<hr>
								<h4>Notas</h4>
								<div class="row table-responsive">
									<table id="example2" class="display table " style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Concepto</th>
												<th>Leyenda</th>
											</tr>
										</thead>
										<tbody id="lstNotas">

										</tbody>
									</table>
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-8 col-md-8">
										<div class="form-group">
											<label for="">Forma de Pago</label>
											<div class="form-line">
												<select class="form-control show-tick" name="refformapago" id="refformapago">
													<?php echo utf8_decode($cadRefFP); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<div class="form-group">
											<label for="">Validez de la oferta</label>
											<div class="form-line">
												<select class="form-control show-tick" name="refvalidez" id="refvalidez">
													<?php echo utf8_decode($cadRefV); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label for="">Plazos de entrega</label>
											<div class="form-line">
												<select class="form-control show-tick" name="refplazos" id="refplazos">
													<?php echo utf8_decode($cadRefE); ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="button-demo">
											<button type="button" class="btn bg-blue waves-effect btnNuevo">
												<i class="material-icons">save</i>
												<span>GUARDAR</span>
											</button>
											<button type="button" class="btn bg-brown waves-effect btnPreview">
												<i class="material-icons">print</i>
												<span>PREVISUALIZAR</span>
											</button>

										</div>
									</div>
								</div>
								<!-- fin carro de compra -->
								<input type="hidden" name="tiporeferencia" id="tiporeferencia" value="1">
								<input type="hidden" name="referencia1" id="referencia1" value="<?php echo $id; ?>">
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- NUEVO -->
	<form class="formulario" role="form" id="sign_in">
	   <div class="modal fade" id="lgmNuevo" tabindex="-1" role="dialog">
	       <div class="modal-dialog modal-lg" role="document">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <h4 class="modal-title" id="largeModalLabel">CREAR <?php echo strtoupper($singular); ?></h4>
	               </div>
	               <div class="modal-body demo-masked-input">
							<div class="row">
							<?php echo $frmUnidadNegocios; ?>
							</div>

	               </div>
	               <div class="modal-footer">
	                   <button type="submit" class="btn btn-primary waves-effect nuevo">GUARDAR</button>
	                   <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
	               </div>
	           </div>
	       </div>
	   </div>
		<input type="hidden" id="accion" name="accion" value="<?php echo $insertar; ?>"/>
	</form>

	<!-- MODIFICAR -->
		<form class="formulario formMod" role="form" id="sign_in">
		   <div class="modal fade" id="lgmModificar" tabindex="-1" role="dialog">
		       <div class="modal-dialog modal-lg" role="document">
		           <div class="modal-content">
		               <div class="modal-header">
		                   <h4 class="modal-title" id="largeModalLabel">MODIFICAR <?php echo strtoupper($singular); ?></h4>
		               </div>
		               <div class="modal-body">
								<div class="row frmAjaxModificar">

								</div>
		               </div>
		               <div class="modal-footer">
		                   <button type="button" class="btn btn-warning waves-effect modificar">MODIFICAR</button>
		                   <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
		               </div>
		           </div>
		       </div>
		   </div>
			<input type="hidden" id="accion" name="accion" value="<?php echo $modificar; ?>"/>
		</form>


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



		$(".button-demo").on("click",'.btnPreview', function(){
			window.open("../../reportes/rptPreviaCotizacionCompleta.php?id=<?php echo $id; ?>&idempresa=" + $('#refempresasaux').val() + '&idcliente=' + $('#refclientes').val() + '&idcontacto=' + $('#refcontactos').val() + '&idtrabajo=' + $('#reftipostrabajos').val() + '&idpago=' + $('#refformapago').val() + '&idplazoentrega=' + $('#refplazos').val() + '&idvalidez=' + $('#refvalidez').val() ,'_blank');
		});

		var table = $('#example').DataTable({
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "../../json/jstablasajax.php?tabla=cotizadorauxusuario&referencia1=<?php echo $id; ?>",
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

		var options = {

		  url: function(phrase) {
			return "../../json/traerItems.php";
		  },

		  getValue: function(element) {
			return element.name;
		  },

		  ajaxSettings: {
			dataType: "json",
			method: "POST",
			data: {
			  dataType: "json"
			}
		  },

		  preparePostData: function(data) {
			$('#selction-ajax').html('');
			data.phrase = $("#round").val();
			return data;
		  },

		  list: {
				onClickEvent: function() {
					var value = $("#round").getSelectedItemData().id;


					$('#selction-ajax').html('<button type="button" id="' + value + '" class="btn bg-green waves-effect agregarItem"> \
													<i class="material-icons">add</i> \
													<span>AGREGAR</span>');
					traerPrecioPorIdConcepto(value, $('#refclientes').val());
				},

				match: {
					enabled: true
				}
		  },
		  /*theme: "round",*/
		  requestDelay: 100
		};

		$("#round").easyAutocomplete(options);

		$(".buscarItem").on("click",'.agregarItem', function(){
			agregarItem(<?php echo $id; ?>, $(this).attr("id"), $('#cantidad').val(), $('#precio').val(), $('#bonificacion').val(), $('#reftipomonedas').val(), $('#refclientes').val(),$('#aplicatotal').prop("checked") ? 1 : 0);
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


		$("#sign_in").submit(function(e){
			e.preventDefault();
		});


		$('#iva').number( true, 2, '.', '' );
		$('#bonificacion').number( true, 2, '.', '' );
		$('#cantidad').number( true, 0, '', '' );

		$('#cantidad').change(function() {
			if ($(this).val() == '0') {
				$(this).val(1);
			}
		});

		$('#cantidad').focusout(function() {
			if ($(this).val() == '') {
				$(this).val(1);
			}
		});

		$('#bonificacion').focusout(function() {
			if ($(this).val() == '') {
				$(this).val(1);
			}
		});

		var $demoMaskedInput = $('.demo-masked-input');

		$demoMaskedInput.find('.date').inputmask('yyyy-mm-dd', { placeholder: '____-__-__' });

		function devolverEstadoCliente(id) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {accion: 'devolverEstadoCliente',idcliente: id},
				//mientras enviamos el archivo
				beforeSend: function(){
					$('.lblEstado').html('');
					$('.lblComentario').html('');
					$('.alertEstadoCliente').removeClass('bg-red');
					$('.alertEstadoCliente').removeClass('bg-green');
					$('.alertEstadoCliente').removeClass('bg-orange');
				},
				//una vez finalizado correctamente
				success: function(data){
					$('.lblEstado').html('Estado: ' + data.Estado);
					$('.lblComentario').html('Estado: ' + data.Comentario);
					$('.alertEstadoCliente').addClass( 'bg-'+data.Color);

					switch (data.Estado) {
						case 'Bueno':
							$('.reflistasaux').val(1);
							break;
						case 'Regular':
							$('.reflistasaux').val(2);
							break;
						case 'Malo':
							$('.reflistasaux').val(3);
							break;
					}


				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});
		}

		devolverEstadoCliente($('#refclientes').val());

		$('#refclientes').change(function() {
			devolverEstadoCliente($(this).val());
		});

		function traerPrecioPorIdConcepto(idconcepto,idcliente) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {
					accion: 'traerPrecioPorIdConcepto',
					idconcepto: idconcepto,
					idcliente: idcliente
				},
				//mientras enviamos el archivo
				beforeSend: function(){
					$('.frmAjaxModificar').html('');
				},
				//una vez finalizado correctamente
				success: function(data){

					$('#precio').val(data);
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});

		}

		function agregarItem(id, refconceptos, cantidad, preciounitario, porcentajebonificado, reftipomonedas, refclientes, aplicatotal) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {
					accion: 'agregarItemUsuario',
					id: id,
					refconceptos: refconceptos,
					cantidad: cantidad,
					preciounitario: preciounitario,
					porcentajebonificado: porcentajebonificado,
					reftipomonedas: reftipomonedas,
					refclientes: refclientes,
					aplicatotal: aplicatotal
				},
				//mientras enviamos el archivo
				beforeSend: function(){
					$('.round').val('');
				},
				//una vez finalizado correctamente
				success: function(data){

					table.ajax.reload();
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});

		}

		traerContactosPorCliente($('#refclientes').val());

		$('#refclientes').change(function() {
			traerContactosPorCliente($(this).val());

		});


		function traerContactosPorCliente(id) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {
					accion: 'traerContactosPorCliente',
					refclientes: id
				},
				//mientras enviamos el archivo
				beforeSend: function(){
					$('#refcontactos').html('');
				},
				//una vez finalizado correctamente
				success: function(data){
					$.each(data, function(i, item) {

						$('#refcontactos').append('<option value="' + item.idcontacto + '">' + item.apellido + item.nombre + ' - Planta: ' + item.planta + ' - Sector: ' + item.sector + '</option>');
					});
					//$('#refcontactos').find('option:selected').prop('disabled', true);
      			$('#refcontactos').selectpicker('refresh');
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});
		}

		traerNotasPorTipoTrabajo($('#reftipostrabajos').val());

		$('#reftipostrabajos').change(function() {
			traerNotasPorTipoTrabajo($(this).val());
		});

		function traerNotasPorTipoTrabajo(id) {
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: {
					accion: 'traerTipotrabajoconceptosPorTipoTrabajo',
					id: id
				},
				//mientras enviamos el archivo
				beforeSend: function(){
					$('#lstNotas').html('');
				},
				//una vez finalizado correctamente
				success: function(data){
					$.each(data, function(i, item) {

						$('#lstNotas').append('<tr><td>' + (i + 1) + '</td><td>' + item.concepto + '</td><td>' + item.leyenda + '</td>');
					})
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});
		}

		setInterval(function() {
			verificarSemaforo();
		},25000);


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
				data: {accion: 'eliminarCotizaciondetallesaux', id: id},
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
			frmAjaxModificar(idTable);
			$('#lgmModificar').modal();
		});//fin del boton modificar

		$('.btnNuevo').click(function(){

			//información del formulario
			var formData = new FormData($(".form")[0]);
			var message = "";
			//hacemos la petición ajax
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){

				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
						swal({
								title: "Respuesta",
								text: "Registro Creado con exito!!",
								type: "success",
								timer: 1500,
								showConfirmButton: false
						});

						//$('#lgmNuevo').modal('hide');
						//$('#unidadnegocio').val('');
						//table.ajax.reload();
					} else {
						swal({
								title: "Respuesta",
								text: data,
								type: "error",
								timer: 2500,
								showConfirmButton: false
						});


					}
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});
		});


		$('.modificar').click(function(){

			//información del formulario
			var formData = new FormData($(".formulario")[1]);
			var message = "";
			//hacemos la petición ajax
			$.ajax({
				url: '../../ajax/ajax.php',
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){

				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
						swal({
								title: "Respuesta",
								text: "Registro Modificado con exito!!",
								type: "success",
								timer: 1500,
								showConfirmButton: false
						});

						//$('#lgmModificar').modal('hide');
						//table.ajax.reload();
					} else {
						swal({
								title: "Respuesta",
								text: data,
								type: "error",
								timer: 2500,
								showConfirmButton: false
						});


					}
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
					$("#load").html('');
				}
			});
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
