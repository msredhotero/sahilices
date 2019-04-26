<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosReferencias {


function traerPrecioPorIdConcepto($idconcepto, $idcliente) {
	$resEstadoCliente = $this->traerClienteestadosPorCliente($idcliente);

	$resListaPrecio = $this->traerListaspreciosPorConcepto($idconcepto);

	$precio = 0;

	if (mysql_num_rows($resListaPrecio)>0) {
		switch (mysql_result($resEstadoCliente,0,'refestados')) {
			case 1:
				$precio = mysql_result($resListaPrecio,0,'precio1');
				break;
			case 2:
				$precio = mysql_result($resListaPrecio,0,'precio2');
				break;
			case 3:
				$precio = mysql_result($resListaPrecio,0,'precio3');
				break;
			default:

				$precio = mysql_result($resListaPrecio,0,'precio4');

				break;
		}
	} else {
		$precio = 0;
	}

	return $precio;
}

/* PARA Cotizaciondetallesaux TABLA AUXILIAR PARA GUARDAR LOS ITEMS */

function insertarCotizaciondetallesaux($refoportunidad,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja,$concepto,$leyenda,$refcotizaciones) {
$sql = "insert into dbcotizaciondetallesaux(idcotizaciondetalleaux,refoportunidad,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,cargavieja,concepto,leyenda,refcotizaciones)
values ('',".$refoportunidad.",".$refconceptos.",".$cantidad.",".$preciounitario.",".$porcentajebonificado.",".$reftipomonedas.",".$rango.",".$aplicatotal.",".$cargavieja.",'".($concepto)."','".($leyenda)."',".$refcotizaciones.")";
$res = $this->query($sql,1);
return $res;
}


function modificarCotizaciondetallesaux($id,$refoportunidad,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja,$concepto,$leyenda) {
$sql = "update dbcotizaciondetallesaux
set
refoportunidad = ".$refoportunidad.",refconceptos = ".$refconceptos.",cantidad = ".$cantidad.",preciounitario = ".$preciounitario.",porcentajebonificado = ".$porcentajebonificado.",reftipomonedas = ".$reftipomonedas.",rango = ".$rango.",aplicatotal = ".$aplicatotal.",cargavieja = ".$cargavieja.",concepto = '".($concepto)."',leyenda = '".($leyenda)."'
where idcotizaciondetalleaux =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarCotizaciondetallesaux($id) {
$sql = "delete from dbcotizaciondetallesaux where idcotizaciondetalleaux =".$id;
$res = $this->query($sql,0);
return $res;
}

function eliminarCotizaciondetallesauxPorOportunidad($idoportunidad) {
$sql = "delete from dbcotizaciondetallesaux where refoportunidad =".$idoportunidad;
$res = $this->query($sql,0);
return $res;
}


function traerCotizaciondetallesaux() {
$sql = "select
c.idcotizaciondetalleaux,
c.refoportunidad,
c.refconceptos,
c.cantidad,
c.preciounitario,
c.porcentajebonificado,
c.reftipomonedas,
c.rango,
c.aplicatotal,
c.cargavieja,
c.concepto,
c.leyenda
from dbcotizaciondetallesaux c
order by 1";
$res = $this->query($sql,0);
return $res;
}

function traerCotizaciondetallesauxPorOportunidad($idoportunidad) {
	$sql = "select
			@rownum:=@rownum+1 as 'item', t.*
			from (select
	c.idcotizaciondetalleaux,
	co.concepto,
	co.leyenda,
	c.cantidad,
	c.preciounitario,
	tm.tipomoneda,
	c.porcentajebonificado,
	c.cantidad * c.preciounitario - (c.cantidad * c.preciounitario * c.porcentajebonificado / 100) as subtotal,
	c.reftipomonedas,
	c.rango,
	c.aplicatotal,
	c.cargavieja,
	c.refoportunidad,
	c.refconceptos,
	tm.simbolo
	from dbcotizaciondetallesaux c
	inner join dbconceptos co on co.idconcepto = c.refconceptos
	inner join tbtipomonedas tm on tm.idtipomoneda = c.reftipomonedas
	where c.refoportunidad = ".$idoportunidad."
	) t,(SELECT @rownum:=0) r";

	$res = $this->query($sql,0);
	return $res;
}


function traerCotizaciondetallesauxPorOportunidadajax($idoportunidad, $length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = " and co.concepto like '%".$busqueda."%' or co.leyenda like '%".$busqueda."%' or c.cantidad like '%".$busqueda."%'";
	}


	$sql = "select
			t.idcotizaciondetalleaux, @rownum:=@rownum+1 as 'item', t.*
			from (select
	c.idcotizaciondetalleaux,
	co.concepto,
	SUBSTRING(co.leyenda, 1, 40) as leyenda,
	c.cantidad,
	c.preciounitario,
	tm.tipomoneda,
	c.porcentajebonificado,
	ROUND(c.cantidad * c.preciounitario - (c.cantidad * c.preciounitario * c.porcentajebonificado / 100),2) as subtotal,
	c.reftipomonedas,
	c.rango,
	c.aplicatotal,
	c.cargavieja,
	c.refoportunidad,
	c.refconceptos
	from dbcotizaciondetallesaux c
	inner join dbconceptos co on co.idconcepto = c.refconceptos
	inner join tbtipomonedas tm on tm.idtipomoneda = c.reftipomonedas
	where c.refoportunidad = ".$idoportunidad.$where."
	) t,(SELECT @rownum:=0) r
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerCotizaciondetallesauxPorUsuario($idoportunidad) {
	$sql = "select
			@rownum:=@rownum+1 as 'item', t.*
			from (select
	c.idcotizaciondetalleaux,
	co.concepto,
	co.leyenda,
	c.cantidad,
	c.preciounitario,
	tm.tipomoneda,
	c.porcentajebonificado,
	c.cantidad * c.preciounitario - (c.cantidad * c.preciounitario * c.porcentajebonificado / 100) as subtotal,
	c.reftipomonedas,
	c.rango,
	c.aplicatotal,
	c.cargavieja,
	c.refoportunidad,
	c.refconceptos,
	tm.simbolo
	from dbcotizaciondetallesaux c
	inner join dbconceptos co on co.idconcepto = c.refconceptos
	inner join tbtipomonedas tm on tm.idtipomoneda = c.reftipomonedas
	where c.refcotizaciones = ".$idoportunidad."
	) t,(SELECT @rownum:=0) r";

	$res = $this->query($sql,0);
	return $res;
}

function traerCotizacionDetallePorTipoConceptoajax($idcotizacion, $idtipoconcepto, $length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = " and co.concepto like '%".$busqueda."%' or co.leyenda like '%".$busqueda."%' or c.cantidad like '%".$busqueda."%'";
	}

	$sql = "select
			t.idcotizaciondetalle, @rownum:=@rownum+1 as 'item', t.*
			from (select
				c.idcotizaciondetalle,
				co.concepto,
				SUBSTRING(co.leyenda, 1, 40) as leyenda,
				c.cantidad,
				c.preciounitario,
				tm.tipomoneda,
				c.porcentajebonificado,
				ROUND(c.cantidad * c.preciounitario - (c.cantidad * c.preciounitario * c.porcentajebonificado / 100),2) as subtotal,
				c.reftipomonedas,
				c.rango,
				c.aplicatotal,
				c.cargavieja,
				c.refconceptos
			FROM
				 dbcotizaciondetalles c
					  INNER JOIN
				 tbtipomonedas tm ON tm.idtipomoneda = c.reftipomonedas
					  INNER JOIN
				 dbconceptos co ON co.idconcepto = c.refconceptos
					  INNER JOIN
				 tbtipoconceptos tc ON tc.idtipoconcepto = co.reftipoconceptos
			WHERE
				 c.refcotizaciones = ".$idcotizacion."
					  AND tc.idtipoconcepto = ".$idtipoconcepto.$where."
				  	) t,(SELECT @rownum:=0) r
				  	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerCotizaciondetallesauxPorUsuarioajax($idoportunidad, $length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = " and co.concepto like '%".$busqueda."%' or co.leyenda like '%".$busqueda."%' or c.cantidad like '%".$busqueda."%'";
	}


	$sql = "select
			t.idcotizaciondetalleaux, @rownum:=@rownum+1 as 'item', t.*
			from (select
	c.idcotizaciondetalleaux,
	co.concepto,
	SUBSTRING(co.leyenda, 1, 40) as leyenda,
	c.cantidad,
	c.preciounitario,
	tm.tipomoneda,
	c.porcentajebonificado,
	ROUND(c.cantidad * c.preciounitario - (c.cantidad * c.preciounitario * c.porcentajebonificado / 100),2) as subtotal,
	c.reftipomonedas,
	c.rango,
	c.aplicatotal,
	c.cargavieja,
	c.refoportunidad,
	c.refconceptos
	from dbcotizaciondetallesaux c
	inner join dbconceptos co on co.idconcepto = c.refconceptos
	inner join tbtipomonedas tm on tm.idtipomoneda = c.reftipomonedas
	where c.refcotizaciones = ".$idoportunidad.$where."
	) t,(SELECT @rownum:=0) r
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerCotizaciondetallesauxPorId($id) {
$sql = "select idcotizaciondetalleaux,refoportunidad,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,cargavieja,concepto,leyenda from dbcotizaciondetallesaux where idcotizaciondetalleaux =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbcotizaciondetallesaux*/

	/* PARA Tipotrabajoconceptos */

	function existeDupla($reftipostrabajos,$refconceptos) {
		$sql = "select * from dbtipotrabajoconceptos where reftipostrabajos = ".$reftipostrabajos." and refconceptos = ".$refconceptos;
		return $this->existe($sql);
	}

	function insertarTipotrabajoconceptos($reftipostrabajos,$refconceptos) {
	$sql = "insert into dbtipotrabajoconceptos(idtipotrabajoconcepto,reftipostrabajos,refconceptos)
	values ('',".$reftipostrabajos.",".$refconceptos.")";
	$res = $this->query($sql,1);
	return $res;
	}


	function modificarTipotrabajoconceptos($id,$reftipostrabajos,$refconceptos) {
	$sql = "update dbtipotrabajoconceptos
	set
	reftipostrabajos = ".$reftipostrabajos.",refconceptos = ".$refconceptos."
	where idtipotrabajoconcepto =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function eliminarTipotrabajoconceptos($id) {
	$sql = "delete from dbtipotrabajoconceptos where idtipotrabajoconcepto =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function traerTipotrabajoconceptos() {
	$sql = "select
	t.idtipotrabajoconcepto,
	t.reftipostrabajos,
	t.refconceptos
	from dbtipotrabajoconceptos t
	inner join tbtipostrabajos tip ON tip.idtipotrabajo = t.reftipostrabajos
	inner join dbconceptos con ON con.idconcepto = t.refconceptos
	inner join tbtipoconceptos ti ON ti.idtipoconcepto = con.reftipoconceptos
	order by 1";
	$res = $this->query($sql,0);
	return $res;
	}


	function traerTipotrabajoconceptosPorId($id) {
	$sql = "select idtipotrabajoconcepto,reftipostrabajos,refconceptos from dbtipotrabajoconceptos where idtipotrabajoconcepto =".$id;
	$res = $this->query($sql,0);
	return $res;
	}

	function traerTipotrabajoconceptosPorTipoTrabajo($id) {
		$sql = "select
		t.idtipotrabajoconcepto,
		tip.tipotrabajo,
		con.concepto,
		con.abreviatura,
		con.leyenda,
		t.reftipostrabajos,
		t.refconceptos
		from dbtipotrabajoconceptos t
		inner join tbtipostrabajos tip ON tip.idtipotrabajo = t.reftipostrabajos
		inner join dbconceptos con ON con.idconcepto = t.refconceptos
		inner join tbtipoconceptos ti ON ti.idtipoconcepto = con.reftipoconceptos
		where t.reftipostrabajos = ".$id."
		order by 1";
		$res = $this->query($sql,0);
		return $res;
	}

	function traerTipotrabajoconceptosPorTipoTrabajoajax($idtipotrabajo, $length, $start, $busqueda) {
		$where = '';

		$busqueda = str_replace("'","",$busqueda);
		if ($busqueda != '') {
			$where = " and con.concepto like '%".$busqueda."%' or con.abreviatura '%".$busqueda."%' or con.leyenda like '%".$busqueda."%'";
		}

		$sql = "select
		t.idtipotrabajoconcepto,
		tip.tipotrabajo,
		con.concepto,
		con.abreviatura,
		con.leyenda,
		t.reftipostrabajos,
		t.refconceptos
		from dbtipotrabajoconceptos t
		inner join tbtipostrabajos tip ON tip.idtipotrabajo = t.reftipostrabajos
		inner join dbconceptos con ON con.idconcepto = t.refconceptos
		inner join tbtipoconceptos ti ON ti.idtipoconcepto = con.reftipoconceptos
		where tip.idtipotrabajo =".$idtipotrabajo.$where."
		order by con.leyenda
		limit ".$start.",".$length;

		$res = $this->query($sql,0);
		return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: dbtipotrabajoconceptos*/


/* PARA Clienteestados */

function insertarClienteestados($refclientes,$refestados,$comentarios) {
$sql = "insert into dbclienteestados(idclienteestado,refclientes,refestados,comentarios)
values ('',".$refclientes.",".$refestados.",'".($comentarios)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarClienteestados($id,$refclientes,$refestados,$comentarios) {
$sql = "update dbclienteestados
set
refclientes = ".$refclientes.",refestados = ".$refestados.",comentarios = '".($comentarios)."'
where idclienteestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarClienteestados($id) {
$sql = "delete from dbclienteestados where idclienteestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerClienteestados() {
$sql = "select
c.idclienteestado,
c.refclientes,
c.refestados,
c.comentarios
from dbclienteestados c
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerClienteestadosPorId($id) {
$sql = "select idclienteestado,refclientes,refestados,comentarios from dbclienteestados where idclienteestado =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerClienteestadosPorCliente($idcliente) {
$sql = "select idclienteestado,refclientes,refestados,comentarios from dbclienteestados where refclientes =".$idcliente;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbclienteestados*/


	/* PARA Cotizaciondetalles */

	function insertarCotizaciondetalles($refcotizaciones,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja, $concepto, $leyenda) {
		$sql = "insert into dbcotizaciondetalles(idcotizaciondetalle,refcotizaciones,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,cargavieja, concepto, leyenda)
		values ('',".$refcotizaciones.",".$refconceptos.",".$cantidad.",".$preciounitario.",".$porcentajebonificado.",".$reftipomonedas.",".$rango.",".$aplicatotal.",".$cargavieja.",'".$concepto."','".$leyenda."')";

		$res = $this->query($sql,1);
		return $res;
	}


	function modificarCotizaciondetalles($id,$refcotizaciones,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$cargavieja) {

		$sql = "update dbcotizaciondetalles
		set
		refcotizaciones = ".$refcotizaciones.",refconceptos = ".$refconceptos.",cantidad = ".$cantidad.",preciounitario = ".$preciounitario.",porcentajebonificado = ".$porcentajebonificado.",reftipomonedas = ".$reftipomonedas.",rango = ".$rango.",aplicatotal = ".$aplicatotal.",cargavieja = ".$cargavieja."
		where idcotizaciondetalle =".$id;

		$res = $this->query($sql,0);
		return $res;
	}

	function modificarCotizacionDetalleLeyendasPorId($id, $concepto, $leyenda) {
		$sql = "update dbcotizaciondetalles
		set
		concepto = '".$concepto."',
		leyenda = '".$leyenda."'
		where idcotizaciondetalle =".$id;

		$res = $this->query($sql,0);
		return $res;
	}


	function eliminarCotizaciondetalles($id) {
		$sql = "delete from dbcotizaciondetalles where idcotizaciondetalle =".$id;
		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizaciondetalles() {
		$sql = "select
		c.idcotizaciondetalle,
		c.refcotizaciones,
		c.refconceptos,
		c.cantidad,
		c.preciounitario,
		c.porcentajebonificado,
		c.reftipomonedas,
		c.rango,
		c.aplicatotal,
		c.cargavieja,
		c.concepto,
		c.leyenda
		from dbcotizaciondetalles c
		order by 1";
		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizacionDetallePorTipoConcepto($idcotizacion, $idtipoconcepto) {
		$sql = "SELECT
				    c.refconceptos,
				    c.concepto,
				    c.leyenda,
				    c.cantidad,
				    c.preciounitario,
				    c.porcentajebonificado,
				    c.reftipomonedas,
				    c.rango,
				    c.aplicatotal,
				    c.cargavieja,
				    c.idcotizaciondetalle,
				    c.refcotizaciones
				FROM
				    dbcotizaciondetalles c
				        INNER JOIN
				    tbtipomonedas tm ON tm.idtipomoneda = c.reftipomonedas
				        INNER JOIN
				    dbconceptos cc ON cc.idconcepto = c.refconceptos
				        INNER JOIN
				    tbtipoconceptos tc ON tc.idtipoconcepto = cc.reftipoconceptos
				WHERE
				    c.refcotizaciones = ".$idcotizacion."
				        AND tc.idtipoconcepto = ".$idtipoconcepto;

		$res = $this->query($sql,0);
  		return $res;
	}


	function traerCotizaciondetallesPorId($id) {
		$sql = "select idcotizaciondetalle,refcotizaciones,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,cargavieja, concepto, leyenda from dbcotizaciondetalles where idcotizaciondetalle =".$id;
		$res = $this->query($sql,0);
		return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: dbcotizaciondetalles*/



	/* PARA Cotizaciones */

	function insertarCotizaciones($refclientes,$refestados,$refcontactos,$refmotivosoportunidades,$reftipostrabajos,$refusuarios,$observaciones,$usuariomodi,$refempresas,$reflistas) {
		$sql = "insert into dbcotizaciones(idcotizacion,refclientes,refestadocotizacion,refcontactos,refmotivosoportunidades,reftipostrabajos,refusuarios,observaciones,usuariomodi,refempresas,reflistas)
		values ('',".$refclientes.",".$refestados.",".$refcontactos.",".$refmotivosoportunidades.",".$reftipostrabajos.",".$refusuarios.",'".($observaciones)."',now(),now(),'".($usuariomodi)."',".$refempresas.",".$reflistas.")";

		$res = $this->query($sql,1);
		return $res;
	}


	function modificarCotizaciones($id,$refclientes,$refestados,$refcontactos,$refmotivosoportunidades,$reftipostrabajos,$refusuarios,$observaciones,$usuariomodi,$refempresas,$reflistas) {
		$sql = "update dbcotizaciones
		set
		refclientes = ".$refclientes.",refestadocotizacion = ".$refestados.",refcontactos = ".$refcontactos.",refmotivosoportunidades = ".$refmotivosoportunidades.",reftipostrabajos = ".$reftipostrabajos.",refusuarios = ".$refusuarios.",observaciones = '".($observaciones)."',,fechamodi = now(),usuariomodi = '".($usuariomodi)."',refempresas = ".$refempresas.",reflistas = ".$reflistas."
		where idcotizacion =".$id;

		$res = $this->query($sql,0);
		return $res;
	}


	function eliminarCotizaciones($id) {
		$sql = "delete from dbcotizaciones where idcotizacion =".$id;
		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizaciones() {
		$sql = "select
		c.idcotizacion,
		c.refclientes,
		c.refestadocotizacion,
		c.refcontactos,
		c.refmotivosoportunidades,
		c.reftipostrabajos,
		c.refusuarios,
		c.observaciones,
		c.fechacrea,
		c.fechamodi,
		c.usuariomodi,
		c.refempresas,
		c.reflistas
		from dbcotizaciones c
		order by 1";

		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizacionesajax($length, $start, $busqueda) {
		$where = '';

		$busqueda = str_replace("'","",$busqueda);
		if ($busqueda != '') {
			$where = " where clie.razonsocial like '%".$busqueda."%' or tt.tipotrabajo like '%".$busqueda."%' or co.razonsocial like '%".$busqueda."%'";
		}

		$sql = "select
		c.idcotizacion,
		clie.razonsocial,
		tt.tipotrabajo,
		co.razonsocial as operador,
		c.fechacrea,
		c.fechamodi,
		est.estadocotizacion,
		c.refclientes,
		c.refestadocotizacion,
		c.refcontactos,
		c.refmotivosoportunidades,
		c.reftipostrabajos,
		c.refusuarios,
		c.observaciones,
		c.usuariomodi,
		c.refempresas,
		c.reflistas
		from dbcotizaciones c
		inner join tbconfiguracion co ON co.idconfiguracion = c.refempresas
		inner join dbclientes clie ON clie.idcliente = c.refclientes
		inner join tbtipostrabajos tt ON tt.idtipotrabajo = c.reftipostrabajos
		inner join dbusuarios u ON u.idusuario = c.refusuarios
		inner join tbestadocotizacion est ON est.idestadocotizacion = c.refestadocotizacion
		".$where."
		order by c.fechacrea
		limit ".$start.",".$length;

		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizacionesPorId($id) {
		$sql = "select idcotizacion,refclientes,refestadocotizacion,refcontactos,refmotivosoportunidades,reftipostrabajos,refusuarios,observaciones,fechacrea,fechamodi,usuariomodi,refempresas,reflistas from dbcotizaciones where idcotizacion =".$id;

		$res = $this->query($sql,0);
		return $res;
	}

	function traerUltimos5ClientesCotizaciones() {
		$sql = "select
		DISTINCT (cl.razonsocial)
		from dbcotizaciones c
		inner join dbclientes cl ON c.refclientes = cl.idcliente
		order by c.idcotizacion desc
		limit 6
		";
		$res = $this->query($sql,0);
		return $res;
	}

	function traerCotizacionesActivas() {
		$sql = "select count(*)
		from dbcotizaciones c
		where refestadocotizacion in (1,2)
		";
		$res = $this->query($sql,0);
		return $res;
	}

	function traerCotizacionesEstadistica() {
        $sql = "select (select count(*) FROM dbcotizaciones where DAY(fechacrea) = DAY(NOW())) as Hoy,
        (select count(*) FROM dbcotizaciones where DAY(fechacrea) = DAY(NOW())-1) as Ayer,
        (select count(*) FROM dbcotizaciones where YEAR(fechacrea) = YEAR(NOW()) AND WEEKOFYEAR(fechacrea) = (WEEKOFYEAR(NOW())-1)) as SemanaPasada,
        (select count(*) FROM dbcotizaciones where YEAR(fechacrea) = YEAR(NOW()) AND MONTH(fechacrea) = (MONTH(NOW())-1)) as MesPasado,
        (select count(*) FROM dbcotizaciones where YEAR(fechacrea) = YEAR(NOW())-1) as AnioPasado,
        (select count(*) FROM dbcotizaciones) as Todo from dbcotizaciones
        ";
        $res = $this->query($sql,0);
        return $res;
    }

    function traerEstadosCotizaciones() {
        $sql = "select ec.estadocotizacion, count(*)
        from dbcotizaciones d
        inner join tbestadocotizacion ec on d.refestadocotizacion=ec.idestadocotizacion
        group by ec.estadocotizacion
        ";
        $res = $this->query($sql,0);
        return $res;
    }




	/* Fin */
	/* /* Fin de la Tabla: dbcotizaciones*/


	/* PARA Cotizacionmovimientos */

	function copiarDetallePorId($id, $usuario) {
		$sql = "insert into dbcotizacionmovimientos(idcotizacionmovimiento,refcotizaciondetalles,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,fechacrea,usuariocrea,concepto,leyenda,refestadocotizacion)
		select
		'',cd.idcotizaciondetalle,cd.refconceptos,cd.cantidad,cd.preciounitario,cd.porcentajebonificado,cd.reftipomonedas,cd.rango,cd.aplicatotal,'".date('Y-d-m H:i:s')."','".$usuario."',cd.concepto,cd.leyenda,c.refestadocotizacion
		from dbcotizaciondetalles cd
		inner join dbcotizaciones c on c.idcotizacion = cd.refcotizaciones
		where cd.idcotizaciondetalle = ".$id;

		$res = $this->query($sql,1);
		return $res;
	}

	function insertarCotizacionmovimientos($refcotizaciondetalles,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$fechacrea,$usuariocrea,$concepto,$leyenda,$refestadocotizacion) {
		$sql = "insert into dbcotizacionmovimientos(idcotizacionmovimiento,refcotizaciondetalles,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,fechacrea,usuariocrea,concepto,leyenda,refestadocotizacion)
		values ('',".$refcotizaciondetalles.",".$refconceptos.",".$cantidad.",".$preciounitario.",".$porcentajebonificado.",".$reftipomonedas.",".$rango.",".$aplicatotal.",".$fechacrea.",'".$usuariocrea."','".$concepto."','".$leyenda."',".$refestadocotizacion.")";

		$res = $this->query($sql,1);
		return $res;
	}


	function modificarCotizacionmovimientos($id,$refcotizaciondetalles,$refconceptos,$cantidad,$preciounitario,$porcentajebonificado,$reftipomonedas,$rango,$aplicatotal,$fechacrea,$usuariocrea) {
		$sql = "update dbcotizacionmovimientos
		set
		refcotizaciondetalles = ".$refcotizaciondetalles.",refconceptos = ".$refconceptos.",cantidad = ".$cantidad.",preciounitario = ".$preciounitario.",porcentajebonificado = ".$porcentajebonificado.",reftipomonedas = ".$reftipomonedas.",rango = ".$rango.",aplicatotal = ".$aplicatotal.",fechacrea = ".$fechacrea.",usuariocrea = '".($usuariocrea)."'
		where idcotizacionmovimiento =".$id;

		$res = $this->query($sql,0);
		return $res;
	}


	function eliminarCotizacionmovimientos($id) {
		$sql = "delete from dbcotizacionmovimientos where idcotizacionmovimiento =".$id;

		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizacionmovimientos() {
		$sql = "select
		c.idcotizacionmovimiento,
		c.refcotizaciondetalles,
		c.refconceptos,
		c.cantidad,
		c.preciounitario,
		c.porcentajebonificado,
		c.reftipomonedas,
		c.rango,
		c.aplicatotal,
		c.fechacrea,
		c.usuariocrea
		from dbcotizacionmovimientos c
		order by 1";

		$res = $this->query($sql,0);
		return $res;
	}


	function traerCotizacionmovimientosPorId($id) {
		$sql = "select idcotizacionmovimiento,refcotizaciondetalles,refconceptos,cantidad,preciounitario,porcentajebonificado,reftipomonedas,rango,aplicatotal,fechacrea,usuariocrea from dbcotizacionmovimientos where idcotizacionmovimiento =".$id;

		$res = $this->query($sql,0);
		return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: dbcotizacionmovimientos*/

	function traerCantidadOportunidadesSemaforo($refsemaforos) {
		$sql = "SELECT count(*) FROM dboportunidades
					where refsemaforos = ".$refsemaforos;
		$res = $this->query($sql);
		return $res;
	}

	/* PARA Oportunidades */

	function insertarOportunidades($empresa,$contacto,$telefono,$email,$comentarios,$reftipostrabajos,$refmotivosoportunidades,$observaciones,$refusuarios,$refestados,$refcotizaciones,$refsemaforos,$refestadocotizacion) {
		$sql = "insert into dboportunidades(idoportunidad,empresa,contacto,telefono,email,comentarios,reftipostrabajos,refmotivosoportunidades,observaciones,refusuarios,refestados,refestadocotizacion,refcotizaciones,refsemaforos)
		values ('','".$empresa."','".$contacto."','".$telefono."','".$email."','".$comentarios."',".$reftipostrabajos.",".$refmotivosoportunidades.",'".$observaciones."',".$refusuarios.",".$refestados.",".$refestadocotizacion.",".$refcotizaciones.",".$refsemaforos.")";
		$res = $this->query($sql,1);
		return $res;
	}


	function modificarOportunidades($id,$empresa,$contacto,$telefono,$email,$comentarios,$reftipostrabajos,$refmotivosoportunidades,$observaciones,$refusuarios,$refestados,$refcotizaciones,$refsemaforos,$refestadocotizacion) {
		$sql = "update dboportunidades
		set
		empresa = '".$empresa."',contacto = '".$contacto."',telefono = '".$telefono."',email = '".$email."',comentarios = '".$comentarios."',reftipostrabajos = ".$reftipostrabajos.",refmotivosoportunidades = ".$refmotivosoportunidades.",observaciones = '".$observaciones."',refusuarios = ".$refusuarios.",refestados = ".$refestados.",refestadocotizacion = ".$refestadocotizacion.",refcotizaciones = ".$refcotizaciones.",refsemaforos = ".$refsemaforos."
		where idoportunidad =".$id;
		$res = $this->query($sql,0);
		return $res;
	}

	function modificarEstadoOportunidad($idoportunidad, $idestado) {
		$sql = "update dboportunidades
					set refestados = ".$idestado."
					where idoportunidad = ".$idoportunidad;

		$res = $this->query($sql,0);
		return $res;
	}


	function modificarSemaforoOportunidad($idoportunidad, $idsemaforo) {
		$sql = "update dboportunidades
					set refsemaforos = ".$idsemaforo."
					where idoportunidad = ".$idoportunidad;

		$res = $this->query($sql,0);
		return $res;
	}

	function modificarEstadoCotizacionOportunidad($idoportunidad, $idcotizacion) {
		$sql = "update dboportunidades
					set refcotizaciones = ".$idcotizacion."
					where idoportunidad = ".$idoportunidad;

		$res = $this->query($sql,0);
		return $res;
	}


	function eliminarOportunidades($id) {
		$sql = "delete from dboportunidades where idoportunidad =".$id;
		$res = $this->query($sql,0);
		return $res;
	}

	function traerOportunidadesajax($length, $start, $busqueda) {

		$where = '';

		$busqueda = str_replace("'","",$busqueda);
		if ($busqueda != '') {
			$where = "where o.empresa like '%".$busqueda."%' or o.contacto like '%".$busqueda."%' or o.telefono like '%".$busqueda."%' or o.email like '%".$busqueda."%' or tip.tipotrabajo like '%".$busqueda."%' or mot.motivo like '%".$busqueda."%' or est.estado like '%".$busqueda."%'";
		}

		$sql = "select
			o.idoportunidad,
			o.empresa,
			o.contacto,
			o.telefono,
			o.email,
			tip.tipotrabajo,
			mot.motivo,
			o.comentarios,
			est.estado,
			ec.estadocotizacion,
			usu.nombrecompleto,
			o.fechacreacion,
			sem.color as semaforo,
			est.color,
			o.reftipostrabajos,
			o.refmotivosoportunidades,
			o.observaciones,
			o.refusuarios,
			o.refestados,
			o.refestadocotizacion,
			o.refcotizaciones,
			o.refsemaforos
		from dboportunidades o
		inner join tbtipostrabajos tip ON tip.idtipotrabajo = o.reftipostrabajos
		inner join tbmotivosoportunidades mot ON mot.idmotivooportunidad = o.refmotivosoportunidades
		inner join tbestados est ON est.idestado = o.refestados
		inner join tbestadocotizacion ec ON ec.idestadocotizacion = o.refestadocotizacion
		inner join dbusuarios usu ON usu.idusuario = o.refusuarios
		inner join tbsemaforos sem ON sem.idsemaforo = o.refsemaforos
		".$where."
		order by o.fechacreacion desc
		limit ".$start.",".$length;
		$res = $this->query($sql,0);
		return $res;
	}

	function traerOportunidades() {
		$sql = "select
			o.idoportunidad,
			o.empresa,
			o.contacto,
			o.telefono,
			o.email,
			tip.tipotrabajo,
			mot.motivo,
			o.comentarios,
			est.estado,
			ec.estadocotizacion,
			sem.color as semaforo,
			est.color,
			o.reftipostrabajos,
			o.refmotivosoportunidades,
			o.observaciones,
			o.refusuarios,
			o.refestados,
			o.refestadocotizacion,
			o.refcotizaciones,
			o.refsemaforos,
			o.fechacreacion
		from dboportunidades o
		inner join tbtipostrabajos tip ON tip.idtipotrabajo = o.reftipostrabajos
		inner join tbmotivosoportunidades mot ON mot.idmotivooportunidad = o.refmotivosoportunidades
		inner join tbestados est ON est.idestado = o.refestados
		inner join tbestadocotizacion ec ON ec.idestadocotizacion = o.refestadocotizacion
		inner join dbusuarios usu ON usu.idusuario = o.refusuarios
		inner join tbsemaforos sem ON sem.idsemaforo = o.refsemaforos
		order by o.fechacreacion desc";
		$res = $this->query($sql,0);
		return $res;
	}

	function traerOportunidadesActivas() {
		$sql = "select
			o.idoportunidad,
			o.empresa,
			o.contacto,
			o.telefono,
			o.email,
			tip.tipotrabajo,
			mot.motivo,
			o.comentarios,
			est.estado,
			ec.estadocotizacion,
			sem.color as semaforo,
			est.color,
			o.reftipostrabajos,
			o.refmotivosoportunidades,
			o.observaciones,
			o.refusuarios,
			o.refestados,
			o.refestadocotizacion,
			o.refcotizaciones,
			o.refsemaforos,
			o.fechacreacion,
			DATEDIFF(now(), o.fechacreacion) mora
		from dboportunidades o
		inner join tbtipostrabajos tip ON tip.idtipotrabajo = o.reftipostrabajos
		inner join tbmotivosoportunidades mot ON mot.idmotivooportunidad = o.refmotivosoportunidades
		inner join tbestados est ON est.idestado = o.refestados
		inner join dbusuarios usu ON usu.idusuario = o.refusuarios
		inner join tbestadocotizacion ec ON ec.idestadocotizacion = o.refestadocotizacion
		inner join tbsemaforos sem ON sem.idsemaforo = o.refsemaforos
		where o.refcotizaciones = 0
		order by o.fechacreacion desc";
		$res = $this->query($sql,0);
		return $res;
	}


	function traerOportunidadesPorId($id) {
		$sql = "select idoportunidad,empresa,contacto,telefono,email,comentarios,reftipostrabajos,refmotivosoportunidades,observaciones,refusuarios,refestados,refestadocotizacion,refcotizaciones,refsemaforos,fechacreacion from dboportunidades where idoportunidad =".$id;
		$res = $this->query($sql,0);
		return $res;
	}

    function traerDemoraOportunidades() {
        $sql = "select count(*)
        from dboportunidades
        where refsemaforos = 2";
        $res = $this->query($sql,0);
        return $res;
    }

    function traerOportunidadesSinAtender() {
        $sql = "select count(*)
        from dboportunidades
        where refsemaforos = 3";
        $res = $this->query($sql,0);
        return $res;
    }

     function traerOportunidadesEstadistica() {
        $sql = "select  (select count(*) FROM dboportunidades where DAY(fechacreacion) = DAY(NOW())) as Hoy,
		(select count(*) FROM dboportunidades where DAY(fechacreacion) = DAY(NOW())-1) as Ayer,
        (select count(*) FROM dboportunidades where YEAR(fechacreacion) = YEAR(NOW()) AND WEEKOFYEAR(fechacreacion) = (WEEKOFYEAR(NOW())-1))
        as SemanaPasada
        from dboportunidades
        ";
        $res = $this->query($sql,0);
        return $res;
    }

/* Fin */
/* Fin de la Tabla: dboportunidades*/

	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}

	function sanear_string($string)
	{

		$string = trim($string);

		$string = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$string
		);

		$string = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$string
		);

		$string = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$string
		);

		$string = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$string
		);

		$string = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$string
		);

		$string = str_replace(
			array('ñ', 'Ñ', 'ç', 'Ç'),
			array('n', 'N', 'c', 'C',),
			$string
		);



		return $string;
	}

	function borrarDirecctorio($dir) {
        array_map('unlink', glob($dir."/*.*"));

    }

	function borrarArchivos($directorio) {

        $res =  $this->borrarDirecctorio("./".$directorio);

        rmdir("./".$directorio);

        return '';
	}

	function existe($sql) {

	    $res = $this->query($sql,0);

	    if (mysql_num_rows($res)>0) {
	        return 1;
	    }
	    return 0;
	}

	function existeDevuelveId($sql) {

	    $res = $this->query($sql,0);

	    if (mysql_num_rows($res)>0) {
	        return mysql_result($res,0,0);
	    }
	    return 0;
	}


	function devolverIdEstado($tabla,$id, $idlbl) {
		$sql = "select refestados
				from ".$tabla."
				where ".$idlbl." = ".$id;

		$res = $this->existeDevuelveId($sql);
		return $res;
	}





	function insertarConfiguracion($razonsocial,$empresa,$sistema,$direccion,$telefono,$email) {
	$sql = "insert into tbconfiguracion(idconfiguracion,razonsocial,empresa,sistema,direccion,telefono,email)
	values ('','".($razonsocial)."','".($empresa)."','".($sistema)."','".($direccion)."','".($telefono)."','".($email)."')";
	$res = $this->query($sql,1);
	return $res;
	}


	function modificarConfiguracion($id,$razonsocial,$empresa,$sistema,$direccion,$telefono,$email) {
	$sql = "update tbconfiguracion
	set
	razonsocial = '".($razonsocial)."',empresa = '".($empresa)."',sistema = '".($sistema)."',direccion = '".($direccion)."',telefono = '".($telefono)."',email = '".($email)."'
	where idconfiguracion =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function eliminarConfiguracion($id) {
	$sql = "delete from tbconfiguracion where idconfiguracion =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function traerConfiguracion() {
	$sql = "select
	c.idconfiguracion,
	c.razonsocial,
	c.empresa,
	c.sistema,
	c.direccion,
	c.telefono,
	c.email
	from tbconfiguracion c
	order by 1";
	$res = $this->query($sql,0);
	return $res;
	}


	function traerConfiguracionPorId($id) {
	$sql = "select idconfiguracion,razonsocial,empresa,sistema,direccion,telefono,email,cuit,convenio,observaciones from tbconfiguracion where idconfiguracion =".$id;
	$res = $this->query($sql,0);
	return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: tbconfiguracion*/






/* PARA Clientes */

function devolverEstadoCliente($idcliente) {
	$sql = "SELECT
			    est.estado, ce.comentarios, est.color
			FROM
			    dbclienteestados ce
			        INNER JOIN
			    tbestados est ON est.idestado = ce.refestados
			WHERE
			    ce.refclientes =  ".$idcliente;
	$res = $this->query($sql,0);
	return $res;
}

function insertarClientes($razonsocial,$cuit,$direccion,$email,$telefono) {
	$sql = "insert into dbclientes(idcliente,razonsocial,cuit,direccion,email,telefono)
	values ('','".$razonsocial."','".$cuit."','".$direccion."','".$email."','".$telefono."')";
	$res = $this->query($sql,1);

	$this->insertarClienteestados($res,2,'Cliente Nuevo');

	return $res;
}


function modificarClientes($id,$razonsocial,$cuit,$direccion,$email,$telefono) {
$sql = "update dbclientes
set
razonsocial = '".($razonsocial)."',cuit = '".($cuit)."',direccion = '".($direccion)."',email = '".($email)."',telefono = '".($telefono)."'
where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarClientes($id) {
$sql = "delete from dbclientes where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerClientesajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where c.razonsocial like '%".$busqueda."%' or c.cuit like '%".$busqueda."%' or c.direccion like '%".$busqueda."%' or c.email like '%".$busqueda."%' or c.telefono like '%".$busqueda."%'";
	}

	$sql = "select
	c.idcliente,
	c.razonsocial,
	c.cuit,
	c.direccion,
	c.email,
	c.telefono
	from dbclientes c
	".$where."
	order by c.razonsocial
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerClientes() {
$sql = "select
c.idcliente,
c.razonsocial,
c.cuit,
c.direccion,
c.email,
c.telefono
from dbclientes c
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerClientesPorId($id) {
$sql = "select idcliente,razonsocial,cuit,direccion,email,telefono from dbclientes where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbclientes*/


/* PARA Conceptos */

function insertarConceptos($reftipoconceptos,$concepto,$abreviatura,$leyenda,$activo) {
$sql = "insert into dbconceptos(idconcepto,reftipoconceptos,concepto,abreviatura,leyenda,activo)
values ('',".$reftipoconceptos.",'".($concepto)."','".($abreviatura)."','".($leyenda)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarConceptos($id,$reftipoconceptos,$concepto,$abreviatura,$leyenda,$activo) {
$sql = "update dbconceptos
set
reftipoconceptos = ".$reftipoconceptos.", concepto = '".($concepto)."',abreviatura = '".($abreviatura)."',leyenda = '".($leyenda)."',activo = ".$activo."
where idconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarConceptos($id) {
$sql = "delete from dbconceptos where idconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerConceptosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where c.concepto like '%".$busqueda."%' or c.abreviatura like '%".$busqueda."%' or c.leyenda like '%".$busqueda."%' or (case when c.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
	}

	$sql = "select
	c.idconcepto,
	tc.tipoconcepto,
	c.concepto,
	c.abreviatura,
	c.leyenda,
	(case when c.activo = 1 then 'Si' else 'No' end) as activo
	from dbconceptos c
	inner join tbtipoconceptos tc on tc.idtipoconcepto = c.reftipoconceptos
	".$where."
	order by c.concepto
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerConceptos() {
	$sql = "select
	c.idconcepto,
	c.concepto,
	c.abreviatura,
	c.leyenda,
	tc.tipoconcepto,
	(case when c.activo = 1 then 'Si' else 'No' end) as activo
	from dbconceptos c
	inner join tbtipoconceptos tc on tc.idtipoconcepto = c.reftipoconceptos
	order by 1";

	$res = $this->query($sql,0);
	return $res;
}

function traerConceptosPorTipo($idtipoconcepto) {
	$sql = "select
	c.idconcepto,
	c.concepto,
	c.abreviatura,
	c.leyenda,
	tc.tipoconcepto,
	(case when c.activo = 1 then 'Si' else 'No' end) as activo
	from dbconceptos c
	inner join tbtipoconceptos tc on tc.idtipoconcepto = c.reftipoconceptos
	where tc.idtipoconcepto = ".$idtipoconcepto."
	order by 1";

	$res = $this->query($sql,0);
	return $res;
}


function traerConceptosPorId($id) {
$sql = "select idconcepto,reftipoconceptos,concepto,abreviatura,leyenda,activo from dbconceptos where idconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}

function devolverConcepto($id,$valor) {
	$sql = "select idconcepto,reftipoconceptos,concepto,abreviatura,leyenda,activo from dbconceptos where idconcepto =".$id;

	$res = $this->query($sql,0);
	if (mysql_num_rows($res)>0) {
		return mysql_result($res,0,$valor);
	}
	return '';
}

/* Fin */
/* /* Fin de la Tabla: dbconceptos*/


/* PARA Conceptosviaticos */

function insertarConceptosviaticos($refconceptos,$valor,$formula) {
$sql = "insert into dbconceptosviaticos(idconceptoviatico,refconceptos,valor,formula)
values ('',".$refconceptos.",".$valor.",'".($formula)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarConceptosviaticos($id,$refconceptos,$valor,$formula) {
$sql = "update dbconceptosviaticos
set
refconceptos = ".$refconceptos.",valor = ".$valor.",formula = '".($formula)."'
where idconceptoviatico =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarConceptosviaticos($id) {
$sql = "delete from dbconceptosviaticos where idconceptoviatico =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerConceptosviaticos() {
$sql = "select
c.idconceptoviatico,
c.refconceptos,
c.valor,
c.formula
from dbconceptosviaticos c
inner join dbconceptos con ON con.idconcepto = c.refconceptos
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerConceptosviaticosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where con.concepto like '%".$busqueda."%' or c.formula like '%".$busqueda."%'";
	}

	$sql = "select
	c.idconceptoviatico,
	con.concepto,
	c.valor,
	c.formula,
	c.refconceptos
	from dbconceptosviaticos c
	inner join dbconceptos con ON con.idconcepto = c.refconceptos
	".$where."
	order by con.concepto
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerConceptosviaticosPorId($id) {
$sql = "select idconceptoviatico,refconceptos,valor,formula from dbconceptosviaticos where idconceptoviatico =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbconceptosviaticos*/


/* PARA Contactos */

function insertarContactos($refsectores,$apellido,$nombre,$nrodocumento,$email,$telefono) {
$sql = "insert into dbcontactos(idcontacto,refsectores,apellido,nombre,nrodocumento,email,telefono)
values ('',".$refsectores.",'".($apellido)."','".($nombre)."',".$nrodocumento.",'".($email)."','".($telefono)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarContactos($id,$refsectores,$apellido,$nombre,$nrodocumento,$email,$telefono) {
$sql = "update dbcontactos
set
refsectores = ".$refsectores.",apellido = '".($apellido)."',nombre = '".($nombre)."',nrodocumento = ".$nrodocumento.",email = '".($email)."',telefono = '".($telefono)."'
where idcontacto =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarContactos($id) {
$sql = "delete from dbcontactos where idcontacto =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerContactos() {
$sql = "select
c.idcontacto,
c.refsectores,
c.apellido,
c.nombre,
c.nrodocumento,
pl.planta,
sec.sector,
c.email,
c.telefono
from dbcontactos c
inner join dbsectores sec ON sec.idsector = c.refsectores
inner join dbplantas pl ON pl.idplanta = sec.refplantas
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerContactosPorCliente($idcliente) {
$sql = "select
c.idcontacto,
c.refsectores,
c.apellido,
c.nombre,
c.nrodocumento,
c.email,
c.telefono,
sec.sector,
pl.planta
from dbcontactos c
inner join dbsectores sec ON sec.idsector = c.refsectores
inner join dbplantas pl ON pl.idplanta = sec.refplantas
where pl.refclientes = ".$idcliente."
order by c.apellido, c.nombre";
$res = $this->query($sql,0);
return $res;
}



function traerContactosajaxPorCliente($length, $start, $busqueda, $idcliente) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "and pl.planta like '%".$busqueda."%' or sec.sector like '%".$busqueda."%' or c.apellido like '%".$busqueda."%' or c.nombre like '%".$busqueda."%' or c.nrodocumento like '%".$busqueda."%' or c.email like '%".$busqueda."%' or c.telefono like '%".$busqueda."%'";
	}

	$sql = "select
	c.idcontacto,
	pl.planta,
	sec.sector,
	c.apellido,
	c.nombre,
	c.nrodocumento,
	c.email,
	c.telefono,
	c.refsectores
	from dbcontactos c
	inner join dbsectores sec ON sec.idsector = c.refsectores
	inner join dbplantas pl ON pl.idplanta = sec.refplantas
	where pl.refclientes = ".$idcliente." ".$where."
	order by c.apellido, c.nombre
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerContactosPorId($id) {
$sql = "select idcontacto,refsectores,apellido,nombre,nrodocumento,email,telefono from dbcontactos where idcontacto =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* Fin de la Tabla: dbcontactos*/


/* PARA Empleados */

function existeEmpleado($nroDocumento) {
    $sql = "select idempleado from dbempleados where nrodocumento = ".$nroDocumento;
    $res = $this->query($sql,0);

    if (mysql_num_rows($res)>0) {
        return 1;
    }
    return 0;
}

function existeEmpleadoModificar($nroDocumento, $id) {
    $sql = "select idempleado from dbempleados where nrodocumento = ".$nroDocumento." and idempleado <> ".$id;
    $res = $this->query($sql,0);

    if (mysql_num_rows($res)>0) {
        return 1;
    }
    return 0;
}

function insertarEmpleados($apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo) {
$sql = "insert into dbempleados(idempleado,apellido,nombre,nrodocumento,cuit,fechanacimiento,domicilio,telefonofijo,telefonomovil,sexo,email,activo)
values ('','".($apellido)."','".($nombre)."',".$nrodocumento.",'".($cuit)."','".($fechanacimiento)."','".($domicilio)."','".($telefonofijo)."','".($telefonomovil)."','".($sexo)."','".($email)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarEmpleados($id,$apellido,$nombre,$nrodocumento,$cuit,$fechanacimiento,$domicilio,$telefonofijo,$telefonomovil,$sexo,$email,$activo) {
$sql = "update dbempleados
set
apellido = '".($apellido)."',nombre = '".($nombre)."',nrodocumento = ".$nrodocumento.",cuit = '".($cuit)."',fechanacimiento = '".($fechanacimiento)."',domicilio = '".($domicilio)."',telefonofijo = '".($telefonofijo)."',telefonomovil = '".($telefonomovil)."',sexo = '".($sexo)."',email = '".($email)."',activo = ".$activo." where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEmpleados($id) {
$sql = "delete from dbempleados where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEmpleadosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where e.apellido like '%".$busqueda."%' or e.nombre like '%".$busqueda."%' or e.nrodocumento like '%".$busqueda."%' or e.cuit like '%".$busqueda."%' or e.fechanacimiento like '%".$busqueda."%' or e.telefonomovil like '%".$busqueda."%' or e.email like '%".$busqueda."%' or (case when e.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
	}

	$sql = "select
	e.idempleado,
	e.apellido,
	e.nombre,
	e.nrodocumento,
	e.cuit,
	e.fechanacimiento,
	e.telefonomovil,
	e.email,
	(case when e.activo = 1 then 'Si' else 'No' end) as activo
	from dbempleados e
	".$where."
	order by e.apellido, e.nombre
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerEmpleados() {
$sql = "select
e.idempleado,
e.apellido,
e.nombre,
e.nrodocumento,
e.cuit,
e.fechanacimiento,
e.telefonomovil,
e.email,
(case when e.activo = 1 then 'Si' else 'No' end) as activo
from dbempleados e
order by e.apellido, e.nombre";
$res = $this->query($sql,0);
return $res;
}


function traerEmpleadosPorId($id) {
$sql = "select idempleado,apellido,nombre,nrodocumento,cuit,fechanacimiento,domicilio,telefonofijo,telefonomovil,sexo,email,activo from dbempleados where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbempleados*/

/* PARA Usuarios */

function insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo,$refunidadesnegocios,$refsector,$imgurl) {

$sql = "insert into dbusuarios(idusuario,usuario,password,refroles,email,nombrecompleto,refcontactos,activo,refunidadesnegocios,refsector,imgurl)
values ('','".($usuario)."','".($password)."','".($refroles)."','".($email)."','".($nombrecompleto)."','".($refcontactos)."','".($activo)."','".($refunidadesnegocios)."','".($refsector)."','".($imgurl)."')";
$res = $this->query($sql,1);

return $res;

}


function modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto,$refcontactos,$activo,$refunidadesnegocios,$refsector,$imgurl) {

$sql = "update dbusuarios
set
usuario = '".($usuario)."',password = '".($password)."',refroles = '".($refroles)."',email = '".($email)."',nombrecompleto = '".($nombrecompleto)."',refcontactos = '".($refcontactos)."',activo = '".$activo."',refunidadesnegocios = '".($refunidadesnegocios)."',refsector = '".($refsector)."',imgurl = '".($imgurl)."'
where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUsuarios($id) {

$sql = "delete from dbusuarios where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUsuariosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("@","",$busqueda);
	if ($busqueda != '') {
		$where = "where u.usuario like '%".$busqueda."%' or u.email like '%".$busqueda."%' or u.nombrecompleto like '%".$busqueda."%' or (case when u.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
	}

	$sql = "select
	u.idusuario,
	u.usuario,
	u.password,
	r.descripcion as refroles,
	u.email,
	u.nombrecompleto,
	concat(cc.apellido, ' ', cc.nombre) as contacto,
	ss.sector as refsector,

	(case when u.activo = 1 then 'Si' else 'No' end) as activo

	from dbusuarios u
	left join dbcontactos cc on cc.idcontacto = u.refcontactos
	left join dbsectores ss on ss.idsector = u.refsector
	left join tbunidadesnegocios n on n.idunidadnegocio = u.refunidadesnegocios
	inner join tbroles r on r.idrol = u.refroles
	".$where."
	order by u.usuario
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerUsuarios() {
	$sql = "select
	u.idusuario,
	u.usuario,
	u.password,
	u.refroles,
	u.email,
	u.nombrecompleto,
	u.refcontactos,
	u.refsector,
	(case when u.activo = 1 then 'Si' else 'No' end) as activo
	from dbusuarios u
	order by 1";

	$res = $this->query($sql,0);
	return $res;
}

/*
function traerUsuarioPorId($id) {
$sql = "select idconcepto,concepto,abreviatura,leyenda,activo from dbconceptos where idconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}
*/

/* Fin */
/* /* Fin de la Tabla: dbusuarios*/

/* PARA Listasprecios */

function insertarListasprecios($nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta) {
$sql = "insert into dblistasprecios(idlistaprecio,nombre,refconceptos,precio1,precio2,precio3,precio4,iva,vigenciadesde,vigenciahasta)
values ('','".($nombre)."',".$refconceptos.",".$precio1.",".$precio2.",".$precio3.",".$precio4.",".$iva.",'".($vigenciadesde)."','".($vigenciahasta)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarListasprecios($id,$nombre,$refconceptos,$precio1,$precio2,$precio3,$precio4,$iva,$vigenciadesde,$vigenciahasta) {
$sql = "update dblistasprecios
set
nombre = '".($nombre)."',refconceptos = ".$refconceptos.",precio1 = ".$precio1.",precio2 = ".$precio2.",precio3 = ".$precio3.",precio4 = ".$precio4.",iva = ".$iva.",vigenciadesde = '".($vigenciadesde)."',vigenciahasta = '".($vigenciahasta)."'
where idlistaprecio =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarListasprecios($id) {
$sql = "delete from dblistasprecios where idlistaprecio =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerListaspreciosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where l.nombre like '%".$busqueda."%' and con.concepto like '%".$busqueda."%' and l.precio1 like '%".$busqueda."%' and l.precio2 like '%".$busqueda."%' and l.precio3 like '%".$busqueda."%' and l.precio4 like '%".$busqueda."%'";
	}

	$sql = "select
	l.idlistaprecio,
	l.nombre,
	con.concepto,
	l.precio1,
	l.precio2,
	l.precio3,
	l.precio4,
	l.iva,
	l.vigenciadesde,
	l.vigenciahasta
	from dblistasprecios l
	inner join dbconceptos con ON con.idconcepto = l.refconceptos
	".$where."
	order by l.nombre
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerListasprecios() {
$sql = "select
l.idlistaprecio,
l.nombre,
con.concepto,
l.precio1,
l.precio2,
l.precio3,
l.precio4,
l.iva,
l.vigenciadesde,
l.vigenciahasta,
l.refconceptos
from dblistasprecios l
inner join dbconceptos con ON con.idconcepto = l.refconceptos
order by l.nombre";
$res = $this->query($sql,0);
return $res;
}


function traerListaspreciosPorId($id) {
$sql = "select idlistaprecio,nombre,refconceptos,precio1,precio2,precio3,precio4,iva,vigenciadesde,vigenciahasta from dblistasprecios where idlistaprecio =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerListaspreciosPorConcepto($idconcepto) {
$sql = "select idlistaprecio,nombre,refconceptos,precio1,precio2,precio3,precio4,iva,vigenciadesde,vigenciahasta from dblistasprecios where refconceptos =".$idconcepto;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dblistasprecios*/


/* PARA Plantas */

function insertarPlantas($refclientes,$planta) {
$sql = "insert into dbplantas(idplanta,refclientes,planta)
values ('',".$refclientes.",'".($planta)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarPlantas($id,$refclientes,$planta) {
$sql = "update dbplantas
set
refclientes = ".$refclientes.",planta = '".($planta)."'
where idplanta =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarPlantas($id) {
$sql = "delete from dbplantas where idplanta =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerPlantas() {
$sql = "select
p.idplanta,
p.refclientes,
p.planta
from dbplantas p
inner join dbclientes cli ON cli.idcliente = p.refclientes
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerPlantasPorCliente($idcliente) {
$sql = "select
p.idplanta,
p.refclientes,
p.planta
from dbplantas p
inner join dbclientes cli ON cli.idcliente = p.refclientes
where p.refclientes = ".$idcliente."
order by p.planta";
$res = $this->query($sql,0);
return $res;
}


function traerPlantasajaxPorCliente($length, $start, $busqueda, $idcliente) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "and p.planta like '%".$busqueda."%'";
	}

	$sql = "select
	p.idplanta,
	p.planta
	from dbplantas p
	inner join dbclientes cli ON cli.idcliente = p.refclientes
	where p.refclientes = ".$idcliente." ".$where."
	order by p.planta
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerPlantasPorId($id) {
$sql = "select idplanta,refclientes,planta from dbplantas where idplanta =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbplantas*/


/* PARA Sectores */

function insertarSectores($refplantas,$sector) {
$sql = "insert into dbsectores(idsector,refplantas,sector)
values ('',".$refplantas.",'".($sector)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarSectores($id,$refplantas,$sector) {
$sql = "update dbsectores
set
refplantas = ".$refplantas.",sector = '".($sector)."'
where idsector =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarSectores($id) {
$sql = "delete from dbsectores where idsector =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerSectores() {
$sql = "select
s.idsector,
s.refplantas,
s.sector
from dbsectores s
inner join dbplantas pla ON pla.idplanta = s.refplantas
inner join dbclientes cl ON cl.idcliente = pla.refclientes
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerSectoresPorCliente($idcliente) {
$sql = "select
s.idsector,
s.refplantas,
s.sector,
pla.planta
from dbsectores s
inner join dbplantas pla ON pla.idplanta = s.refplantas
inner join dbclientes cl ON cl.idcliente = pla.refclientes
where cl.idcliente = ".$idcliente."
order by pla.planta,s.sector";
$res = $this->query($sql,0);
return $res;
}


function traerSectoresajaxPorCliente($length, $start, $busqueda, $idcliente) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "and s.sector like '%".$busqueda."%' or s.planta like '%".$busqueda."%'";
	}

	$sql = "select
	s.idsector,
	pla.planta,
	s.sector,
	s.refplantas
	from dbsectores s
	inner join dbplantas pla ON pla.idplanta = s.refplantas
	inner join dbclientes cl ON cl.idcliente = pla.refclientes
	where cl.idcliente = ".$idcliente." ".$where."
	order by s.sector
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerSectoresPorId($id) {
$sql = "select idsector,refplantas,sector from dbsectores where idsector =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbsectores*/


/* PARA Estados */

function insertarEstados($estado,$color,$icono,$orden,$valor,$refformularios) {
$sql = "insert into tbestados(idestado,estado,color,icono,orden,valor,refformularios)
values ('','".($estado)."','".($color)."','".($icono)."',".$orden.",".$valor.",".$refformularios.")";
$res = $this->query($sql,1);
return $res;
}


function modificarEstados($id,$estado,$color,$icono,$orden,$valor,$refformularios) {
$sql = "update tbestados
set
estado = '".($estado)."',color = '".($color)."',icono = '".($icono)."',orden = ".$orden.",valor = ".$valor.",refformularios = ".$refformularios."
where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEstados($id) {
$sql = "delete from tbestados where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEstados() {
$sql = "select
e.idestado,
e.estado,
e.color,
e.icono,
e.orden,
e.valor,
e.refformularios
from tbestados e
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerEstadosPorId($id) {
$sql = "select idestado,estado,color,icono,orden,valor,refformularios from tbestados where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerEstadosInId($in) {
$sql = "select idestado,estado,color,icono,orden,valor,refformularios from tbestados where idestado in (".$in.")";
$res = $this->query($sql,0);
return $res;
}

function traerEstadosPorFormulario($in) {
$sql = "select idestado,estado,color,icono,orden,valor,refformularios from tbestados where refformularios in (".$in.")";
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbestados*/


/* PARA Formularios */

function insertarFormularios($formulario) {
$sql = "insert into tbformularios(idformulario,formulario)
values ('','".($formulario)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarFormularios($id,$formulario) {
$sql = "update tbformularios
set
formulario = '".($formulario)."'
where idformulario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarFormularios($id) {
$sql = "delete from tbformularios where idformulario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerFormularios() {
$sql = "select
f.idformulario,
f.formulario
from tbformularios f
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerFormulariosPorId($id) {
$sql = "select idformulario,formulario from tbformularios where idformulario =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbformularios*/


/* PARA Motivosoportunidades */

function insertarMotivosoportunidades($motivo,$activo) {
$sql = "insert into tbmotivosoportunidades(idmotivooportunidad,motivo,activo)
values ('','".($motivo)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarMotivosoportunidades($id,$motivo,$activo) {
$sql = "update tbmotivosoportunidades
set
motivo = '".($motivo)."',activo = ".$activo."
where idmotivooportunidad =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarMotivosoportunidades($id) {
$sql = "delete from tbmotivosoportunidades where idmotivooportunidad =".$id;
$res = $this->query($sql,0);
return $res;
}



function traerMotivosoportunidadesajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where m.motivo like '%".$busqueda."%' or (case when m.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
	}

	$sql = "select
	m.idmotivooportunidad,
	m.motivo,
	(case when m.activo = 1 then 'Si' else 'No' end) activo
	from tbmotivosoportunidades m
	".$where."
	order by m.motivo
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}



function traerMotivosoportunidades() {
$sql = "select
m.idmotivooportunidad,
m.motivo,
(case when m.activo = 1 then 'Si' else 'No' end) activo
from tbmotivosoportunidades m
order by m.motivo";
$res = $this->query($sql,0);
return $res;
}



function traerMotivosoportunidadesActivos() {
$sql = "select
m.idmotivooportunidad,
m.motivo,
(case when m.activo = 1 then 'Si' else 'No' end) activo
from tbmotivosoportunidades m
where m.activo = 1
order by m.motivo";
$res = $this->query($sql,0);
return $res;
}


function traerMotivosoportunidadesPorId($id) {
$sql = "select idmotivooportunidad,motivo,activo from tbmotivosoportunidades where idmotivooportunidad =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbmotivosoportunidades*/


/* PARA Recursosnecesarios */

function insertarRecursosnecesarios($recursonecesario,$letra) {
$sql = "insert into tbrecursosnecesarios(idrecursonecesario,recursonecesario,letra)
values ('','".($recursonecesario)."','".($letra)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarRecursosnecesarios($id,$recursonecesario,$letra) {
$sql = "update tbrecursosnecesarios
set
recursonecesario = '".($recursonecesario)."',letra = '".($letra)."'
where idrecursonecesario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarRecursosnecesarios($id) {
$sql = "delete from tbrecursosnecesarios where idrecursonecesario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerRecursosnecesariosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where r.recursonecesario like '%".$busqueda."%' or r.letra = '%".$busqueda."%'";
	}

	$sql = "select
	r.idrecursonecesario,
	r.recursonecesario,
	r.letra
	from tbrecursosnecesarios r
	".$where."
	order by r.recursonecesario
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerRecursosnecesarios() {
$sql = "select
r.idrecursonecesario,
r.recursonecesario,
r.letra
from tbrecursosnecesarios r
order by r.recursonecesario";
$res = $this->query($sql,0);
return $res;
}


function traerRecursosnecesariosPorId($id) {
$sql = "select idrecursonecesario,recursonecesario,letra from tbrecursosnecesarios where idrecursonecesario =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbrecursosnecesarios*/


/* PARA Semaforos */

function insertarSemaforos($color,$desde,$hasta,$medida) {
$sql = "insert into tbsemaforos(idsemaforo,color,desde,hasta,medida)
values ('','".($color)."',".$desde.",".$hasta.",'".($medida)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarSemaforos($id,$color,$desde,$hasta,$medida) {
$sql = "update tbsemaforos
set
color = '".($color)."',desde = ".$desde.",hasta = ".$hasta.",medida = '".($medida)."'
where idsemaforo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarSemaforos($id) {
$sql = "delete from tbsemaforos where idsemaforo =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerSemaforos() {
$sql = "select
s.idsemaforo,
s.color,
s.desde,
s.hasta,
s.medida
from tbsemaforos s
order by 1";
$res = $this->query($sql,0);
return $res;
}


function devolverSemaforosPorDias($dias) {
	$sql = "select
	s.idsemaforo,
	s.color,
	s.desde,
	s.hasta,
	s.medida
	from tbsemaforos s
	where ".$dias." between s.desde and s.hasta";
	$res = $this->query($sql,0);
	return mysql_result($res,0,0);
}


function traerSemaforosPorId($id) {
$sql = "select idsemaforo,color,desde,hasta,medida from tbsemaforos where idsemaforo =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerSemaforosPorIdDias($id) {
$sql = "select idsemaforo,color,desde, concat(hasta,' dias') as hasta,medida from tbsemaforos where idsemaforo =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbsemaforos*/


/* PARA Tipoclientes */

function insertarTipoclientes($tipocliente) {
$sql = "insert into tbtipoclientes(idtipocliente,tipocliente)
values ('','".($tipocliente)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipoclientes($id,$tipocliente) {
$sql = "update tbtipoclientes
set
tipocliente = '".($tipocliente)."'
where idtipocliente =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipoclientes($id) {
$sql = "delete from tbtipoclientes where idtipocliente =".$id;
$res = $this->query($sql,0);
return $res;
}




function traerTipoclientesajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where t.tipocliente like '%".$busqueda."%'";
	}

	$sql = "select
	t.idtipocliente,
	t.tipocliente
	from tbtipoclientes t
	".$where."
	order by t.tipocliente
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerTipoclientes() {
$sql = "select
t.idtipocliente,
t.tipocliente
from tbtipoclientes t
order by t.tipocliente";
$res = $this->query($sql,0);
return $res;
}


function traerTipoclientesPorId($id) {
$sql = "select idtipocliente,tipocliente from tbtipoclientes where idtipocliente =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbtipoclientes*/


/* PARA Estadocotizacion */

function insertarEstadocotizacion($estadocotizacion) {
$sql = "insert into tbestadocotizacion(idestadocotizacion,estadocotizacion)
values ('','".($estadocotizacion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarEstadocotizacion($id,$estadocotizacion) {
$sql = "update tbestadocotizacion
set
estadocotizacion = '".($estadocotizacion)."'
where idestadocotizacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEstadocotizacion($id) {
$sql = "delete from tbestadocotizacion where idestadocotizacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEstadocotizacion() {
$sql = "select
e.idestadocotizacion,
e.estadocotizacion
from tbestadocotizacion e
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerEstadocotizacionPorId($id) {
$sql = "select idestadocotizacion,estadocotizacion from tbestadocotizacion where idestadocotizacion =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbestadocotizacion*/

/* PARA Tipoconceptos */

function insertarTipoconceptos($tipoconcepto) {
$sql = "insert into tbtipoconceptos(idtipoconcepto,tipoconcepto)
values ('','".($tipoconcepto)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipoconceptos($id,$tipoconcepto) {
$sql = "update tbtipoconceptos
set
tipoconcepto = '".($tipoconcepto)."'
where idtipoconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipoconceptos($id) {
$sql = "delete from tbtipoconceptos where idtipoconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipoconceptosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where t.tipoconcepto like '%".$busqueda."%'";
	}

	$sql = "select
	t.idtipoconcepto,
	t.tipoconcepto
	from tbtipoconceptos t
	".$where."
	order by t.tipoconcepto
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}


function traerTipoconceptos() {
$sql = "select
t.idtipoconcepto,
t.tipoconcepto
from tbtipoconceptos t
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTipoconceptosPorId($id) {
$sql = "select idtipoconcepto,tipoconcepto from tbtipoconceptos where idtipoconcepto =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbtipoconceptos*/


/* PARA Tipomonedas */

function insertarTipomonedas($tipomoneda,$abreviatura) {
$sql = "insert into tbtipomonedas(idtipomoneda,tipomoneda,abreviatura)
values ('','".($tipomoneda)."','".($abreviatura)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipomonedas($id,$tipomoneda,$abreviatura) {
$sql = "update tbtipomonedas
set
tipomoneda = '".($tipomoneda)."',abreviatura = '".($abreviatura)."'
where idtipomoneda =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipomonedas($id) {
$sql = "delete from tbtipomonedas where idtipomoneda =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipomonedasajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where t.tipomoneda like '%".$busqueda."%' or t.abreviatura like '%".$busqueda."%'";
	}

	$sql = "select
	t.idtipomoneda,
	t.tipomoneda,
	t.abreviatura
	from tbtipomonedas t
	".$where."
	order by t.abreviatura
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerTipomonedas() {
$sql = "select
t.idtipomoneda,
t.tipomoneda,
t.abreviatura
from tbtipomonedas t
order by t.abreviatura";
$res = $this->query($sql,0);
return $res;
}


function traerTipomonedasPorId($id) {
$sql = "select idtipomoneda,tipomoneda,abreviatura from tbtipomonedas where idtipomoneda =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbtipomonedas*/


/* PARA Tipostrabajos */

function insertarTipostrabajos($tipotrabajo,$activo) {
$sql = "insert into tbtipostrabajos(idtipotrabajo,tipotrabajo,activo)
values ('','".($tipotrabajo)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarTipostrabajos($id,$tipotrabajo,$activo) {
$sql = "update tbtipostrabajos
set
tipotrabajo = '".($tipotrabajo)."',activo = ".$activo."
where idtipotrabajo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipostrabajos($id) {
$sql = "delete from tbtipostrabajos where idtipotrabajo =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerTipostrabajosajax($length, $start, $busqueda) {

	$where = '';

	$busqueda = str_replace("'","",$busqueda);
	if ($busqueda != '') {
		$where = "where t.tipotrabajo like '%".$busqueda."%' or (case when t.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
	}

	$sql = "select
	t.idtipotrabajo,
	t.tipotrabajo,
	(case when t.activo = 1 then 'Si' else 'No' end) activo
	from tbtipostrabajos t
	".$where."
	order by t.tipotrabajo
	limit ".$start.",".$length;

	$res = $this->query($sql,0);
	return $res;
}

function traerTipostrabajos() {
$sql = "select
t.idtipotrabajo,
t.tipotrabajo,
(case when t.activo = 1 then 'Si' else 'No' end) activo
from tbtipostrabajos t
order by t.tipotrabajo";
$res = $this->query($sql,0);
return $res;
}


function traerTipostrabajosPorId($id) {
$sql = "select idtipotrabajo,tipotrabajo,activo from tbtipostrabajos where idtipotrabajo =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbtipostrabajos*/


/* PARA Unidadesnegocios */

function insertarUnidadesnegocios($unidadnegocio,$activo) {
$sql = "insert into tbunidadesnegocios(idunidadnegocio,unidadnegocio,activo)
values ('','".($unidadnegocio)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarUnidadesnegocios($id,$unidadnegocio,$activo) {
$sql = "update tbunidadesnegocios
set
unidadnegocio = '".($unidadnegocio)."',activo = ".$activo."
where idunidadnegocio =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUnidadesnegocios($id) {
$sql = "delete from tbunidadesnegocios where idunidadnegocio =".$id;
$res = $this->query($sql,0);
return $res;
}


	function traerUnidadesnegocios() {
		$sql = "select
		u.idunidadnegocio,
		u.unidadnegocio,
		(case when u.activo = 1 then 'Si' else 'No' end) activo
		from tbunidadesnegocios u
		order by u.unidadnegocio";
		$res = $this->query($sql,0);
		return $res;
	}

	function traerUnidadesnegociosajax($length, $start, $busqueda) {

		$where = '';

		$busqueda = str_replace("'","",$busqueda);
		if ($busqueda != '') {
			$where = "where u.unidadnegocio like '%".$busqueda."%' or (case when u.activo = 1 then 'Si' else 'No' end) = '".$busqueda."'";
		}

		$sql = "select
		u.idunidadnegocio,
		u.unidadnegocio,
		(case when u.activo = 1 then 'Si' else 'No' end) activo
		from tbunidadesnegocios u
		".$where."
		order by u.unidadnegocio
		limit ".$start.",".$length;

		$res = $this->query($sql,0);
		return $res;
	}


function traerUnidadesnegociosPorId($id) {
$sql = "select idunidadnegocio,unidadnegocio,activo from tbunidadesnegocios where idunidadnegocio =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* Fin de la Tabla: tbunidadesnegocios*/





	/* PARA Horarios */

	function insertarHorarios($hora) {
	$sql = "insert into tbhorarios(idtbhorario,hora)
	values ('',".$hora.")";
	$res = $this->query($sql,1);
	return $res;
	}


	function modificarHorarios($id,$hora) {
	$sql = "update tbhorarios
	set
	hora = ".$hora."
	where idtbhorario =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function eliminarHorarios($id) {
	$sql = "delete from tbhorarios where idtbhorario =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function traerHorarios() {
	$sql = "select
	h.idtbhorario,
	h.hora
	from tbhorarios h
	order by 1";
	$res = $this->query($sql,0);
	return $res;
	}


	function traerHorariosPorId($id) {
	$sql = "select idtbhorario,hora from tbhorarios where idtbhorario =".$id;
	$res = $this->query($sql,0);
	return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: tbhorarios*/


	/* PARA Meses */

	function insertarMeses($nombremes) {
	$sql = "insert into tbmeses(mes,nombremes)
	values ('','".($nombremes)."')";
	$res = $this->query($sql,1);
	return $res;
	}


	function modificarMeses($id,$nombremes) {
	$sql = "update tbmeses
	set
	nombremes = '".($nombremes)."'
	where mes =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function eliminarMeses($id) {
	$sql = "delete from tbmeses where mes =".$id;
	$res = $this->query($sql,0);
	return $res;
	}


	function traerMeses() {
	$sql = "select
	m.mes,
	m.nombremes
	from tbmeses m
	order by 1";
	$res = $this->query($sql,0);
	return $res;
	}


	function traerMesesPorId($id) {
	$sql = "select mes,nombremes from tbmeses where mes =".$id;
	$res = $this->query($sql,0);
	return $res;
	}

	/* Fin */
	/* /* Fin de la Tabla: tbmeses*/


	/* PARA Auditoria */

	   function insertarAuditoria($tabla,$operacion,$campo,$valornuevo,$valorviejo,$id,$usuario) {
	      $sql = "insert into dbauditoria(idauditoria,tabla,operacion,campo,valornuevo,valorviejo,id,usuario,fecha)
	      values ('','".$tabla."','".$operacion."','".$campo."','".$valornuevo."','".$valorviejo."',".$id.",'".$usuario."',now())";
	      $res = $this->query($sql,1);
	      return $res;
	   }

	   function insertAuditoria($tabla, $operacion,$id,$usuario) {
	      $sql = "SHOW COLUMNS FROM ".$tabla;
	      $res = $this->query($sql,0);

	      $idnombre = mysql_result($res,0,0);

	      while ($row = mysql_fetch_array($res)) {

	         $sqlValor = "SELECT ".$row[0].' from '.$tabla.' where '.$idnombre.' = '.$id;
	         $resValor = $this->query($sqlValor,0);
	         $valornuevo = mysql_result($resValor,0,0);
	         $valorviejo = '';
	         $insert = $this->insertarAuditoria($tabla,$operacion,$row[0],$valornuevo,$valorviejo,$id,$usuario);
	      }

	      return $insert;
	   }

	   function modiAuditoria($tabla, $operacion,$id,$usuario) {
	      $sql = "SHOW COLUMNS FROM ".$tabla;
	      $res = $this->query($sql,0);

	      $idnombre = mysql_result($res,0,0);

	      while ($row = mysql_fetch_array($res)) {

	         $sqlValor = "SELECT ".$row[0].' from '.$tabla.' where '.$idnombre.' = '.$id;
	         $resValor = $this->query($sqlValor,0);
	         $valornuevo = '';
	         $valorviejo = mysql_result($resValor,0,0);
	         $insert = $this->insertarAuditoria($tabla,$operacion,$row[0],$valornuevo,$valorviejo,$id,$usuario);
	      }
	   }


	   function traerAuditoria() {
	   $sql = "select
	   a.idauditoria,
	   a.tabla,
	   a.operacion,
	   a.campo,
	   a.valornuevo,
	   a.valorviejo,
	   a.id,
	   a.usuario,
	   a.fecha
	   from dbauditoria a
	   order by 1";
	   $res = $this->query($sql,0);
	   return $res;
	   }


	   function traerAuditoriaPorId($id) {
	   $sql = "select idauditoria,tabla,operacion,campo,valornuevo,valorviejo,id,usuario,fecha from dbauditoria where idauditoria =".$id;
	   $res = $this->query($sql,0);
	   return $res;
	   }

	/* Fin */
	/* /* Fin de la Tabla: dbauditoria*/


function query($sql,$accion) {



		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];

		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());

		mysql_select_db($database);

		        $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}

	}

}

?>
