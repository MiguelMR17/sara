$( 'document' ).ready(iniciar);
function iniciar()
{
//	$( ".alertas" ).dialog({autoOpen: false,});
    $("#log_butt").on('click', login)

}

function login(){
	document.getElementById("mensaje").innerHTML="";
	var user=document.getElementById("usuario").value;
	var clave=document.getElementById("clave").value;
	if(user==""){
		document.getElementById("mensaje").innerHTML+="No ha llenado el campo de usuario<br>";
	}
	if(clave==""){
		document.getElementById("mensaje").innerHTML+="No ha llenado el campo de clave<br>";
	}
	if(document.getElementById("mensaje").innerHTML==""){
		$.ajax(
		{
			url:'/sara/autent/login/'+user+'/'+clave,
			type:'post',
			dataType:'json',
		}
		)
		.done(function(rpta){
			if(rpta.mensaje=="OK"){
				window.location.href = '/sara/control';
			}
			else{
				document.getElementById("mensaje").innerHTML=rpta.mensaje;
			}			
		});
	}	
}