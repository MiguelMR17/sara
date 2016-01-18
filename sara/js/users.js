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
	var nom=document.getElementById("Nombre").value;
	var ape=document.getElementById("Apellidos").value;
	var doc=document.getElementById("Documento").value;
	var tipo=document.getElementById("Tipo").value;
	$( "#res_dial" ).dialog( "close" );
	$.ajax(
		{
			url:'/sara/user/registrar/'+nom+'/'+ape+'/'+doc+'/'+tipo,
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
			url:'/sara/user/borrar_user/'+user,
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