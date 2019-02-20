Estructura de archivos
=======================

Carpeta "ajax":
Solo contiene un archivo importante que es el ajax.php y funciona como un medio de comunicacion entre los datos de la base de datos y el cliente.
Las validaciones se hacen todas en este lugar.
Puede devolver un string como un jason, dependiendo la ocacion.

Carpeta "includes":
- "base.php" sirve para generar la interfaz grafica y para cargar los archivos css y js.
- "funciones.php" sirve para armar los formularios de insert y update, y para formularios de solo consulta. Tambien para hacer algunas grillas.
- "functionesHTML.php" sirve para armar el menu solamente.
- "functionesSeguridad.php" para determinar el accedo a cada pagina.
- "funcionesUsuarios.php" para toda la parte de usuarios, perfiles. Para loguearse y registrarse en caso de ser necesario.
- "functionesNotificaciones.php" para las notificaciones en la interfaz grafica.
- "appconfig.php" para la cadena de conexion a la base mysql.
- "validadores.php" contiene algunas validaciones.

Carpeta "dashboard":
Contiene todas las pantallas.

Carpeta "json":
- "jstablasajax.php" contiene todas las llamadas para generar las grillas

Carpeta "reportes":
Archivos .php donde se van a ejecutar los reportes con la libreria fpdf

============================================================================================================
word que envio el cliente esta en la carpeta "sql" se llama memoria_descriptiva_oportunidades-y-cotizaciones
============================================================================================================


BASE DE DATOS
=======================

dbclientes
dbconceptos
dbconceptosviaticos
dbcontactos
dbempleados
dblistasprecios
dbnotificaciones
dboportunidades
dbplantas
dbsectores
dbusuarios              // tabla de usuario, esta basica tambien.
dbusuariosperfiles
predio_menu             // esta tabla genera el menu y el acceso por tipo perfil, el campo "permiso (string)", esta muy basico habria que mejorarlo.
tbcargos
tbconfiguracion         // solo para el nombre del sistema.
tbestadocotizacion
tbestados
tbformularios
tbmotivosoportunidades
tbrecursosnecesarios
tbroles
tbsemaforos
tbtipoclientes
tbtipoconceptos
tbtipomonedas
tbtipostrabajos
tbunidadesnegocios
