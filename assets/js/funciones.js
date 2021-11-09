function mostrarDatos(){
	$.ajax({
		url:"php/mostrarDatos.php",
		success:function(r){
			const element = document.querySelector('#tablaDatos');
			element.classList.add('animated','bounceInRight');
			setTimeout(function() {
				element.classList.remove('animated','bounceInRight');
			}, 3000);
			$('#tablaDatos').html(r);

		}


	});
}



function agregarDatos(){
	if ($('#nombre').val()=="") {
		swal("Debes agregar un nombre");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmagregarDatos').serialize(),
		url:"php/agregarDatos.php",
		success:function(r){
			if (r==1) {
				$('#frmagregarDatos')[0].reset();
				mostrarDatos();
				swal("Exito!","Agregado correctamente ","success");
				$("#modalInsertar").modal('hidden');
			}else{
				swal("Erro fatal", "Fallo al agregar","error");
 			}


		}

		
	});
}


function editarDatos(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:"php/Datosupdate.php",
		success:function(r){
			datos =jQuery.parseJSON(r);
			$('#idu').val(datos['id']);
			$('#nombreu').val(datos['nombre']);
			$('#paternou').val(datos['paterno']);
			$('#maternou').val(datos['materno']);
			$('#telefonou').val(datos['telefono']);
			

		}
	});

}

function actualizarDatos() {
	if ($('#nombreu').val() == '') {
		swal("Debes agregar un nombre!!");
		return false;
	}
	$.ajax({
		type: "POST",
		data: $('#frmagregarDatosu').serialize(),
		url: "php/actualizarDatos.php",
		success: function (r) {
			if (r == 1) {
				mostrarDatos();
				swal("Exito!", "Actualizado correctamente ", "success");
			} else {
				swal("Erro fatal", "Fallo al actualizar", "error");
			}
		}
	});
}

function eliminarDatos(idNombre){
	swal({
		title: "Estás seguro de eliminar este registro?",
		text: "una vez que elimines este registro, no podra ser recuperado!!!",
		type:"warning",
		showCancelButton:true,
		confirmButtonColor:"#3085d6",
		confirmButtonText:"Sí, borralo!",
		cancelButtonText:"Cancelar",
		cancelButtonColor:"#d33",
		closeOnConfirm:false,
		closeOnCancel:false,
		showLoaderOnConfirm:true,
		preConfirm:function(){
			return new Promise(function(resolve){
				$.ajax({
					url: "php/delete.php",
					method: "POST",
					data: 'id='+idNombre
				}).done(function (r) {

					swal('Deleted!', "xnbcccc", "success");
					mostrarDatos();

				}).fail(function(){
					swal('Oops...', 'Something went wrong with ajax !', 'error');

				});
			});
		}, allowOutsideClick: false
	});
}


function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   var regex = /^[0-9]+$/;

   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}


function onlyletter(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode(key);
   //var regex = /^[0-9.,]+$/;
   var regex = /^[a-zA-Z]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
function limpia() {
	var val = document.getElementById("telefono").value;
	var tam = val.length;
	for(i = 0; i < tam; i++) {
		if(!isNaN(val[i]))
			document.getElementById("telefono").value = '';
	}
}


function limpianumber() {
	var val = document.getElementById("telefono").value;
	var tam = val.length;
	for(i = 0; i < tam; i++) {
		if(isNaN(val[i]))
			document.getElementById("telefono").value = '';
	}
}




