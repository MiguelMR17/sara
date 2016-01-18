$( 'document' ).ready(iniciar);
function iniciar()
{
	$( ".alertas" ).dialog({autoOpen: false,});
     
$("#new_butt").on('click',regis_show);
$("#vol_butt").on('click',volver);
$(".borrar").on('click',borrar);
$("#reg_butt").on('click',registrar);
}

function registrar(){
	var est=document.getElementById("Estado").value;
	var des=document.getElementById("Descripcion").value;
	var aula=document.getElementById("Aula").value;
	var cod=document.getElementById("Codigo").value;
	$( "#res_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/equipos/registrar/'+est+'/'+des+'/'+aula+'/'+cod,
		}
		)
	.done(function(){
			window.location.reload();
		});
}

function borrar(event){
	var user=event.target.id.substring(5);
	$.ajax(
		{
			url:'/sara/equipos/borrar_eq/'+user,
		}
		)
	.done(function(){
			window.location.reload();
		});
}

function regis_show(){
	$( "#reg_dial" ).dialog( "open" );
}

function volver(){
	window.location.href = '/sara/control/index/';
}