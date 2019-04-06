$(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

    /*initRealTimeChart();*/
    initDonutChart();
    initSparkline();
});

var realtime = 'on';


function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}

function initDonutChart() {
    $.ajax({
                url: '../ajax/ajax.php',
                type: 'POST',
                // Form data
                //datos del formulario
                data: {accion: 'traerEstadosCotizaciones'},
                //mientras enviamos el archivo
                beforeSend: function(){

                },
                //una vez finalizado correctamente
                success: function(data){

               
                  if (data.dato) {
                    var result=data.datos[0];

                       if(data.datos.length == 0){
                           Morris.Donut({
                            element: 'donut_chart',
                            data: [{
                                label: 'Sin Datos',
                                value: 0
                            }],
                            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
                            formatter: function (y) {
                                return y + '%'
                            }
                        });
                       }else{
                        var miArray=[];
                        var total=0;
                        //Me quedo con el total de las cotizaciones.
                        for (var i = 0; i < data.datos.length; i++) {
                            total+=(parseInt(data.datos[i][1]));
                        }
                        //Creo cada ojeto del array y al valor le saco el porcentaje en funcion del total.
                        for (var i = 0; i < data.datos.length; i++) {
                            miArray.push({'label':data.datos[i][0] ,'value':((parseInt(data.datos[i][1]))*100/total)});
                        }
                        Morris.Donut({

                            element: 'donut_chart',
                            data: miArray
                           ,
                            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
                            formatter: function (y) {
                                return y + '%'
                            }
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

var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}
