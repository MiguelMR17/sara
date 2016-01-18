$( 'document' ).ready(iniciar);

var report=0;

function iniciar()
{
	$( ".alertas" ).dialog({autoOpen: false,});
     
$("#user_butt").on('click',user_rep);
$("#aula_butt").on('click',aula_rep);
$("#ocup_butt").on('click',ocup_rep);
$("#porc_butt").on('click',porc_rep);

$("#aula_ocup_butt").on('click',generar1);
$("#event_butt").on('click',generar2);

$("#vol_butt").on('click',volver);
}



function ocup_rep(){
	report=1;
	$( "#ocup_dial" ).dialog( "open" );
}

function porc_rep(){
	report=2;
	$( "#ocup_dial" ).dialog( "open" );
}

function aula_rep(){
    report=3;
	$( "#event_dial" ).dialog( "open" );
}

function user_rep(){
    report=4;
    $( "#event_dial" ).dialog( "open" );
}

function generar1(){
	var aula=document.getElementById("aula_ocup").value;
	$( "#ocup_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/report/generar'+report+'/'+aula,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			ocup_graf(rpta);
		});
}

function generar2(){
	var mes=document.getElementById("mes").value;
	$( "#event_dial" ).dialog( "close" );
		$.ajax(
		{
			url:'/sara/report/generar'+report+'/'+mes,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
            event_graf(rpta);
            for (x in rpta) {
                if(x!=="tipo" && x!=="mes"){
                    chart.series[0].addPoint([x,rpta[x]]);
                }                    
            }
		});
}


function volver(){
	window.location.href = '/sara/control/index/';
}


function ocup_graf(data) {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column'
        }, 
        title: {
            text: 'Ocupación por mes del aula '+data.aula
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Bloques ocupados'
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Ocupacion',
            data: [
                ['Enero', data[1]],
                ['Febrero', data[2]],
                ['Marzo', data[3]],
                ['Abril', data[4]],
                ['Mayo', data[5]],
                ['Junio', data[6]],
                ['Julio', data[7]],
                ['Agosto', data[8]],
                ['Septiembre', data[9]],
                ['Octubre', data[10]],
                ['Noviembre', data[11]],
                ['Diciembre', data[12]]
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
}

function event_graf(data) {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column'
        }, 
        title: {
            text: 'Eventos por '+data.tipo+' en el mes '+data.mes
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Eventos'
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Eventos',
            data: [],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
}