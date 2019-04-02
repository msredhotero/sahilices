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
                        console.log(data.datos);
                       if(data.datos.length ==0){
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
                          var facturado =data.datos[3];
                          var adjudicado=data.datos[1];
                          var noAdjudicado=data.datos[2];
                          var anulado=data.datos[4];
                          var otro=data.datos[0];  
                       
                         Morris.Donut({
                            element: 'donut_chart',
                            data: [{
                                label: 'FACTURADO',
                                value: facturado
                            }, {
                                label: 'ADJUDICADO',
                                value: adjudicado
                            }, {
                                label: 'NO ADJUDICADO',
                                value: noAdjudicado
                            }, {
                                label: 'ANULADO',
                                value: anulado
                            },
                            {
                                label: 'OTRO',
                                value: otro
                            }],
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
