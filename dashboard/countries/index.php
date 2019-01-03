<?php


session_start();

if (!isset($_SESSION['usua_aif']))
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
$serviciosSeguridad->seguridadRuta($_SESSION['refroll_aif'], '../countries/');
//*** FIN  ****/

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_aif'],"Countries",$_SESSION['refroll_aif'],$_SESSION['email_aif']);

$configuracion = $serviciosReferencias->traerConfiguracion();

$tituloWeb = mysql_result($configuracion,0,'sistema');

$breadCumbs = '<a class="navbar-brand" href="../index.php">Dashboard</a><a href="javascript:void(0)" class="navbar-brand"><i class="material-icons">navigate_next</i></a><a class="navbar-brand active" href="index.php">Countries</a>';

$club = $serviciosReferencias->traerNombreCountryPorId($_SESSION['idclub_aif']);
/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Country";

$plural = "Countries";

$eliminar = "eliminarJugadoresclub";

$insertar = "insertarJugadoresclub";

$tituloWeb = "Gestión: AIF";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbjugadoresclub";

$lblCambio	 	= array("");
$lblreemplazo	= array("");


$cadRef 	= '';

$refdescripcion = array();
$refCampo 	=  array();
//////////////////////////////////////////////  FIN de los opciones //////////////////////////



$tabla 			= "dbdelegados";

$lblCambio	 	= array("refusuarios","email1","email2","email3","email4");
$lblreemplazo	= array("Usuario","Email de Contacto 1","Email de Contacto 2","Email de Contacto 3","Email de Contacto 4");


$resModelo 	= $serviciosReferencias->traerUsuariosPorId($_SESSION['usuaid_aif']);
$cadRef 	= $serviciosFunciones->devolverSelectBox($resModelo,array(5),'');

$refdescripcion = array(0 => $cadRef);
$refCampo 	=  array("refusuarios");

$frmPerfil 	= $serviciosFunciones->camposTabla($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);


$resTemporadas = $serviciosReferencias->traerUltimaTemporada(); 

if (mysql_num_rows($resTemporadas)>0) {
    $ultimaTemporada = mysql_result($resTemporadas,0,0);    
} else {
    $ultimaTemporada = 0;   
}




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

	<!-- VUE JS -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

	<!-- axios -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script src="https://unpkg.com/vue-swal"></script>

	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

	<!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <style>
        .alert > i{ vertical-align: middle !important; }

		
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
		<p>Please wait...</p>
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
<?php echo $baseHTML->cargarSECTION($_SESSION['usua_aif'], $_SESSION['nombre_aif'], $resMenu,'../../'); ?>
<main id="app">
<section class="content" style="margin-top:-15px;">

	<div class="container-fluid">
		<div class="row clearfix">

        	<div class="row">

			
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card ">
						<div class="header bg-blue">
							<h2>
								Country: <?php echo $club; ?>
							</h2>
							<ul class="header-dropdown m-r--5">
								<li class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="material-icons">more_vert</i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li><a href="javascript:void(0);" @click="showModal = true">Realizar Consulta</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="body table-responsive">
							<div class="row">
                                
                                <div class="col-xs-6 col-md-6 col-lg-6">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <img v-bind:src="activeCountry.imagen" class="img-responsive">
                                    </a>
                                </div>
                                

                            </div>
							<form v-on:submit.prevent="guardarCountry" class="form" id="formCountry">

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<label class="form-label">Dirección</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" :value="activeCountry.direccion" v-modal="activeCountry.direccion" id="direccion" name="direccion" />
                                            
                                        </div>
                                    </div>
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<label class="form-label">Tel. Administrativo</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" :value="activeCountry.telefonoadministrativo" v-modal="activeCountry.telefonoadministrativo" id="telefonoadministrativo" name="telefonoadministrativo" />
                                            
                                        </div>
                                    </div>
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<label class="form-label">Tel. Campo</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" :value="activeCountry.telefonocampo" v-modal="activeCountry.telefonocampo" id="telefonocampo" name="telefonocampo" />
                                            
                                        </div>
                                    </div>
								</div>
								

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<label class="form-label">Email</label>
                                        <div class="form-line">
                                            <input type="email" class="form-control" :value="activeCountry.email" v-modal="activeCountry.email" id="email" name="email" />
                                            
                                        </div>
                                    </div>
								</div>
								<input type="hidden" value="VmodificarCountries" name="accion" id="accion" />
								<input type="hidden" id="id" name="id" :value="<?php echo $_SESSION['idclub_aif']; ?>"/>
							
							<div>
							<div class="button-demo">
								<button type="submit" class="btn bg-light-blue waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>GUARDAR</span>
                                </button>

							</div>
							</form>
							</div>							
						</div>
					</div>
				</div>
				

			</div>

            
            

		</div>


		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							SELECCIONE LA IMAGEN DEL ESCUDO DEL COUNTRY PARA SUBIR
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);">Action</a></li>
									<li><a href="javascript:void(0);">Another action</a></li>
									<li><a href="javascript:void(0);">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						<form action="subir.php" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
							<div class="dz-message">
								<div class="drag-icon-cph">
									<i class="material-icons">touch_app</i>
								</div>
								<h3>Arrastre y suelte una imagen aqui o haga click y busque una imagen en su ordenador.</h3>
								
							</div>
							<div class="fallback">
								<input name="file" type="file" id="archivos" />
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	


</section>


<?php echo $baseHTML->cargarArchivosJS('../../'); ?>
<!-- Wait Me Plugin Js -->
<script src="../../plugins/waitme/waitMe.js"></script>

<!-- Custom Js -->
<script src="../../js/pages/cards/colored.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Dropzone Plugin Js -->
<script src="../../plugins/dropzone/dropzone.js"></script>

<!-- Modal Large Size -->
<transition name="fade">
<form class="form" @submit.prevent="guardarDelegado">
<?php //echo $baseHTML->modalHTML('modalPerfil','Perfil','GUARDAR','Ingrese sus datos personales y los Email de los contactos','frmPerfil',$frmPerfil,'iddelegado','Delegados','VguardarDelegado'); ?>
</form>
</transition>


<form class="form" @submit.prevent="realizarConsulta">
<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              default header
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
			  <h4>Ingrese su consulta y en la brevedad se comunicarán con usted</h4>
			  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label class="form-label">Mensaje</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" class="form-control" id="mensaje" name="mensaje" />
							
						</div>
					</div>
				</div>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
			<button class="btn bg-grey waves-effect" @click="$emit('close')">
                CANCELAR
			  </button>
			  <button type="button" class="btn bg-green waves-effect" @click="enviarConsulta()">
					<i class="material-icons">send</i>
					<span>ENVIAR</span>
				</button>

            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>
</form>

  
  <!-- use the modal component, pass in the prop -->
  <modal v-if="showModal" @close="showModal = false">
    <!--
      you can use custom content here to overwrite
      default content
    -->
    <h3 slot="header">Realizar Consulta</h3>
  </modal>


</main>




<script>

	function traerImagen() {
		$.ajax({
			data:  {id: <?php echo $_SESSION['idclub_aif']; ?>, 
					accion: 'traerImgenCountry'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					
			},
			success:  function (response) {

				$(".thumbnail img").attr("src",response);
					
			}
		});
	}

	Dropzone.prototype.defaultOptions.dictFileTooBig = "Este archivo es muy grande ({{filesize}}MiB). Peso Maximo: {{maxFilesize}}MiB.";

	Dropzone.options.frmFileUpload = {
		maxFilesize: 2,
		addRemoveLinks: true,
		acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
		accept: function(file, done) {
			done();
		},
		init: function() {
			this.on('success', function( file, resp ){
				traerImagen();
				swal("Correcto!", resp.replace("1", ""), "success");
			});

			this.on('error', function( file, resp ){
				swal("Error!", resp.replace("1", ""), "warning");
			});
		}
	};

	var myDropzone = new Dropzone("#archivos", {
		url: 'subir.php'
	});

	$(document).ready(function(){

		var $demoMaskedInput = $('.demo-masked-input');

		//Date
		$demoMaskedInput.find('.date').inputmask('yyyy-mm-dd', { placeholder: '____-__-__' });

		

	});
</script>




<script>
	const paramsGetDelegado = new URLSearchParams();
    paramsGetDelegado.append('accion','VtraerDelegadosPorId');
	paramsGetDelegado.append('iddelegado',<?php echo $_SESSION['usuaid_aif']; ?>);
	
	const paramsGetCountry = new URLSearchParams();
    paramsGetCountry.append('accion','traerCountriesPorId');
	paramsGetCountry.append('idcountrie',<?php echo $_SESSION['idclub_aif']; ?>);
	

	Vue.component('modal', {
		template: '#modal-template',
		methods: {
			enviarConsulta () {
				
				paramsNotificacion.set('mensaje',$('#mensaje').val());
				
				axios.post('../../ajax/ajax.php', paramsNotificacion)
				.then(res => {
					//this.setMensajes(res)
					

					if (!res.data.error) {
						this.$swal("Ok!", res.data.mensaje, "success")
						this.$emit('close')
					} else {
						this.$swal("Error!", res.data.mensaje, "error")
					}
					
				});
			}
		}
	})

	const app = new Vue({
		el: "#app",
		data: {
			pag: 1,
			idclub: 5,
			activeClass: 'waves-effect',
			errorMensaje: '',
			successMensaje: '',
			activeDelegados: {},
			activeCountry: {},
			showModal: false	
			
		},
		mounted () {
			this.getDelegado()
			this.getCountry()
		},
		computed: {
			
		},
		methods: {

			setMensajes (res) {
				this.getDelegado()

				if (res.data.error) {
					this.errorMensaje = res.data.mensaje
				} else {
					this.successMensaje = res.data.mensaje
				}

				setTimeout(() => {
					this.errorMensaje = ''
					this.successMensaje = ''
				}, 3000);

			},
			getDelegado () {
					axios.post('../../ajax/ajax.php',paramsGetDelegado)
					.then(res => {
                        
                        //this.$refs['ref_nombres'].value = res.data.datos[0].nombres
						this.activeDelegados = res.data.datos[0]
					})
			},
			guardarDelegado (e) {
				axios.post('../../ajax/ajax.php', new FormData(e.target))
				.then(res => {
					//this.setMensajes(res)

					if (!res.data.error) {
						this.$swal("Ok!", res.data.mensaje, "success")
					} else {
						this.$swal("Error!", res.data.mensaje, "error")
					}
					
				});

				
			},
			getCountry () {
					axios.post('../../ajax/ajax.php',paramsGetCountry)
					.then(res => {
                        
                        //this.$refs['ref_nombres'].value = res.data.datos[0].nombres
						this.activeCountry = res.data.datos[0]
					})
			},
			guardarCountry (e) {
				axios.post('../../ajax/ajax.php', new FormData(e.target))
				.then(res => {
					//this.setMensajes(res)

					if (!res.data.error) {
						this.$swal("Ok!", res.data.mensaje, "success")
					} else {
						this.$swal("Error!", res.data.mensaje, "error")
					}
					
				});

				
			}
		}
	})
</script>
</body>
<?php } ?>
</html>


