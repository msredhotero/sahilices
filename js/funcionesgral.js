$( document ).ready(function() {

   function modificarCotizacionDetalleLeyendasPorId(id, concepto, leyenda) {
      $.ajax({
         dataType: "json",
         data:  {
            accion: 'modificarCotizacionDetalleLeyendasPorId',
            id: id,
            concepto: concepto,
            leyenda: leyenda
         },
         url:   '../../ajax/ajax.php',
         type:  'post',
         beforeSend: function () {

         },
         success:  function (response) {
            swal({
                  title: "Respuesta",
                  text: "Registro Eliminado con exito!!",
                  type: "success",
                  timer: 1500,
                  showConfirmButton: false
            });
         }
      });
   }

});
