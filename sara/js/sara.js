$( 'document' ).ready(iniciar);

var salon=0;
var realtime=true;

function iniciar()
{
	$(".libre_butt").on('click',selec_salon);
	$('.libre_butt').tooltip(); 
	$( ".alertas" ).dialog({autoOpen: false,});
	
	$("#res_butt").on('click',res_salon);
	$("#lib_butt").on('click',lib_salon);
	$("#ale_butt").on('click',ale_salon);
	$("#ayu_butt").on('click',ayu_salon);
	$("#inh_butt").on('click',inh_salon);
	$("#reh_butt").on('click',reh_salon);
	$(".desh_butt").on('click',inhab_open);

	$("#now_butt").on('click',ahora);
	$("#users_butt").on('click',usuarios);
	$("#equip_butt").on('click',equipos);
	$("#repor_butt").on('click',reportes);
	$("#logout_butt").on('click',logout);

	$("#hora").on('change',actualizar);
	$( "#day" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '2015:3000',
      dateFormat: "dd/mm/yy",
      onSelect: actualizar,
    });
    iniPusher();
    autoRecarga();
    
}

function autoRecarga(){
	if(realtime){
		ahora();
	}
	var now=new Date();
	var time=(((2-now.getHours()%2)*60-now.getMinutes())*60-now.getSeconds())*1000;
	window.setTimeout(autoRecarga, time);
}


function iniPusher()
{
	var pusher = new Pusher('7bb943dc969576596a62');
	var channel = pusher.subscribe('eventos');
	channel.bind('ocupar', ocupar);
	channel.bind('liberar', liberar);
	channel.bind('ayuda', ayuda);
	channel.bind('alerta', alerta);	
	channel.bind('cerrar', cerrar);	
}

function lib_salon(){
	document.getElementById("s"+salon).className="libre_butt";
	$("#s"+salon).tooltip( "disable" );
	var hora=document.getElementById("hora").value;
	var dia=document.getElementById("day").value;
	$( "#lib_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/desreservar/'+salon+'/'+hora+'/'+dia,
		}
		)
}

function inh_salon(){
	document.getElementById("s"+salon).className="inhab_butt";
	$("#s"+salon).tooltip( "disable" );
	$( "#inh_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/inhabilitar/'+salon,
		}
		)
}

function reh_salon(){
$( "#reh_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/rehabilitar/'+salon,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			if(rpta.estado==0){
				document.getElementById("s"+rpta.salon).className="libre_butt";
			}
			else if(rpta.estado==1){
				document.getElementById("s"+rpta.salon).className="reserv_butt";
			}
			else{
				estado(rpta);
			}	
		});
}

function ale_salon(){
	$( "#ale_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/alertOK/'+salon,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			if(rpta.estado==0){
				document.getElementById("s"+rpta.salon).className="libre_butt";
			}
			else if(rpta.estado==1){
				document.getElementById("s"+rpta.salon).className="reserv_butt";
			}
			else{
				estado(rpta);
			}	
		});
}

function ayu_salon(){
	$( "#ayu_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/ayudaOK/'+salon,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			if(rpta.estado==0){
				document.getElementById("s"+rpta.salon).className="libre_butt";
			}
			else if(rpta.estado==1){
				document.getElementById("s"+rpta.salon).className="reserv_butt";
			}
			else{
				estado(rpta);
			}				
		});

}

function ocupar(data){
	if(realtime){
		document.getElementById("s"+data.salon).className="ocup_butt";
	}	
}

function liberar(data){
	if(realtime){
		document.getElementById("s"+data.salon).className="libre_butt";
	}
}
function cerrar(data){
	if(realtime){
		document.getElementById("s"+data.salon).className="reserv_butt";
	}
}
function ayuda(data){
	if(realtime){
		document.getElementById("s"+data.salon).className="ayuda_butt";
	}
}
function alerta(data){
	if(realtime){
		document.getElementById("s"+data.salon).className="alert_butt";
	}
}

function reportes(){
	window.location.href = '/sara/report';
}

function usuarios(){
	window.location.href = '/sara/user';
}

function equipos(){
	window.location.href = '/sara/equipos';
}

function logout(){
	window.location.href = '/sara/autent/logout';
}

function before(){
	var now=new Date();
	var selec=$("#day").datepicker( 'getDate' );
	if(selec.getFullYear()>now.getFullYear() || selec.getMonth()>now.getMonth()|| selec.getDate()>now.getDate() ){
		return 0;
	}
	else if(selec.toDateString()==now.toDateString() && document.getElementById("hora").value>=now.getHours()-1){
		return 0;
	}
	else{
		return 1;
	}
}

function check_now(){
	var now=new Date();
	if($("#day").datepicker( 'getDate' ).toDateString()==now.toDateString()){
		if(document.getElementById("hora").value==now.getHours() || document.getElementById("hora").value==now.getHours()-1){
			realtime=true;
			return true;
		}
	}
	realtime=false;	
	return false;
}

function ahora(){
	var now=new Date();
	$( "#day" ).datepicker('setDate', now);
	var hora=now.getHours();
	if(hora%2!=0){
		hora--;
	}
	if(hora<6 || hora>20){
		$( "#horario_dial" ).dialog( "open" );
	}
	document.getElementById("hora").value=hora;
	actualizar();
}

function selec_salon(event){
	if(!before()){

		salon=event.target.id.substring(1);
		if(event.target.className=="libre_butt"){
			$( "#res_dial" ).dialog( "open" );
		}
		else if(event.target.className=="reserv_butt"){
			$( "#lib_dial" ).dialog( "open" );
		}
		else if(event.target.className=="alert_butt"){
			$( "#ale_dial" ).dialog( "open" );
		}
		else if(event.target.className=="ayuda_butt"){
			$( "#ayu_dial" ).dialog( "open" );
		}
		else if(event.target.className=="inhab_butt"){
			$( "#reh_dial" ).dialog( "open" );
		}	
	}
}

function inhab_open(event){
	$(".alertas").dialog("close");
	$( "#inh_dial" ).dialog( "open" );
}

function res_salon(){
	var cc=document.getElementById("Cedula").value;
	var curso=document.getElementById("Curso").value;
	var hora=document.getElementById("hora").value;
	var dia=document.getElementById("day").value;
	$( "#res_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/control/reservar/'+cc+'/'+salon+'/'+curso+'/'+hora+'/'+dia,
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			if(rpta.ok==0){
				document.getElementById("reserva_dial").innerHTML="El aula se reservo correctamente.";
				document.getElementById("s"+salon).className="reserv_butt";
				$("#s"+salon).tooltip( "option", "content", "Docente: "+rpta.nombre+"<br>Curso: "+curso );
				$("#s"+salon).tooltip( "enable");
			}
			else if(rpta.ok==1){
				document.getElementById("reserva_dial").innerHTML="La identificacion no corresponde a un docente registrado.";
			}
			else if(rpta.ok==2){
				document.getElementById("reserva_dial").innerHTML="El aula ya esta reservada en ese horario.";
			}
			else if(rpta.ok==3){
				document.getElementById("reserva_dial").innerHTML="El docente ya ha reservado otra aula en ese horario.";
			}
			$( "#reserva_dial" ).dialog( "open" );

		});
}

function actualizar(){
	var x=document.getElementById("hora").value;
	var y=document.getElementById("day").value;

	$.ajax(
	{
		url:'/sara/control/getReservas/'+x+'/'+y,
		type:'post',
		dataType:'json',
	}
	)
	.done(
	function(rpta)
	{	
		var aulas = new Object();
		for (var i = 1; i <= 18; i++) {
			aulas[100+i]=0;
		};
		for (var i = 1; i <= 18; i++) {
			aulas[200+i]=0;
		};
		for (var i = 0; i < rpta.length; i++){
			aulas[rpta[i][0]]=1;			
			$("#s"+rpta[i][0]).tooltip( "option", "content", "Docente: "+rpta[i][1]+"<br>Curso: "+rpta[i][2] );	
			$("#s"+rpta[i][0]).tooltip( "enable");
		};
		for (var i = 101; i <= 118; i++) {
			if(aulas[i]==0){
				document.getElementById("s"+i).className="libre_butt";
				$("#s"+i).tooltip( "disable" );
			}
			else{
				document.getElementById("s"+i).className="reserv_butt";
			}
		};
		for (var i = 201; i <= 218; i++) {
			if(aulas[i]==0){
				document.getElementById("s"+i).className="libre_butt";
				$("#s"+i).tooltip( "disable");
			}
			else{
				document.getElementById("s"+i).className="reserv_butt";
			}
		};
		if(check_now()){
			setEventos();
		}
	});
}

function setEventos(){
	$.ajax(
		{
			url:'/sara/control/eventosActuales/',
			type:'post',
			dataType:'json',
		}
		)
		.done(
		function(rpta)
		{	
			var dato = new Object();
			for (var i = 0; i < rpta.length; i++){
				dato.salon=rpta[i][0];
				dato.estado=rpta[i][1];
				estado(dato);				
			};
		});
}

function estado(dato){
	if(dato.estado%3==0){
		document.getElementById("s"+dato.salon).className="alert_butt";
	}
	else if(dato.estado%5==0){
		document.getElementById("s"+dato.salon).className="ayuda_butt";
	}	
	else if(dato.estado%7==0){
		document.getElementById("s"+dato.salon).className="inhab_butt";
	}			
	else if(dato.estado%2==0){
		document.getElementById("s"+dato.salon).className="ocup_butt";				
	}
}


//******************************************************************************************************
