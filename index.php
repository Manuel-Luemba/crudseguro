<!DOCTYPE html>
<html>
<head>
	<title>Crud seguro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/js/propper.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/all.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.all.js"></script>
	<script src="assets/js/funciones.js"></script>
	<script src="assets/js/dataTables.min.js"></script>
	<style type="text/css">
		.container{
			margin-top: 6em;
		}

		form{
			
			display: inline;
		}
		form > div, span {
			
			display: inline-block;
		}

		section , div> {
			margin: 0px;
		}

		.ok{
			float:right;
		}
		

		
	</style>
</head>
<body style="background-color:#017EA1">
	<div class="container" id="cuadro">
		<div class="row" >
			<div class="col-sm-12" >

				<div class="card bg-light mb-3">
					<div class="card-header"> 
						<li class="fa fa-lock"></li><strong>Consultas seguras con php & mysql</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-right" >
									<span class="btn btn-primary btn-md ok" id="agregar" data-toggle="modal" data-target="#modalInsertar">
										<li class="fas fa-plus-circle"  ></li> Agregar nuevo</span>
										<br>
									</form>
								</section>

								<div id="tablaDatos">

								</div>


							</div>
						</div>
					</div>

					<div class="card-footer text-muted text-right">
						Facultad Autodidacta @2020
						<script>
						</script>
					</div>
				</div>

			</div>
		</div>
		<!--Inicio do Modal de Insertar-->
		<!--Modal-->
		<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insertar datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmagregarDatos">
						<label for="nombre">Nombre</label>
						<input type="text" id="nombre" name="nombre" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1)" class="form-control form-control-sm">
						<label for="materno">Apellido paterno</label>
						<input type="text" id="materno" name="materno" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1)" class="form-control form-control-sm">
						<label for="paterno">Apellido materno</label>
						<input type="text" id="paterno" name="paterno" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1).toLowerCase" class="form-control form-control-sm">
						<label>Numero do Bi</label>
						<input type="text" id="bi" name="bi" class="form-control form-control-sm ">
						<label for="telefono">Telefono</label>
						<input type="text" id="telefono" name="telefono"  maxlength="9" pattern="[9]{1}[1-9]{1}[0-9]{1}-[0-9]{3}-[0-9]{3}" class="form-control form-control-sm">

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatos()">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--Termina modal de insertar -->


	<!--Inicio modal de actualizar -->
	<!--button trigger modal -->

	<!-- Modal -->
	
	<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> 
			<div class="modal-body">
				<form id="frmagregarDatosu">
					<input type="idu" id="idu" name="idu" hidden>
					<label>Nombre</label>
					<input type="text" id="nombreu" name="nombreu" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1).toLowerCase()" class="form-control form-control-sm">
					<label>Apellido paterno</label>
					<input type="text" id="paternou" name="paternou" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1).toLowerCase" class="form-control form-control-sm">
					<label>Apellido materno</label>
					<input type="text" id="maternou" name="maternou" onkeypress="onlyletter()" onblur="limpia()" onkeyup="this.value=this.value.charAt(0).toUpperCase()+ this.value.slice(1).toLowerCase" class="form-control form-control-sm">
					<label>Telefono</label>
					<input type="text" id="telefonou" name="telefonou" maxlength="9" pattern="[9]{1}[1-9]{1}[0-9]{1}-[0-9]{3}-[0-9]{3}" " class="form-control form-control-sm">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-warning"  data-dismiss="modal" id="btnGuardarDatos" onclick="actualizarDatos()">Actualizar</button>
			</div>
		</div>
	</div>
</div>s
<script type="text/javascript">
	//$("#telefono").keyup(function(){
		 //this.value = this.value.replace(/[^9]{1}[1-9]{1}[0-9]{7}/g,'')
		//this.value = this.value.replace(/[^0-9]/g,'');
	//});


	$(document).ready(function(){

		$("#bi").mask('000000000SS000');
		$("#bi").keyup(function(){
			$("#bi").val(this.value.toUpperCase());
		})
		$("#telefono").mask('000-000-000');
		$("#telefonou").mask('000-000-000');


		mostrarDatos();
		onlyletter();
		onlynumber();




/*
		function eliminarDatos1(idNombre){
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
*/
	});


</script>
</body>
</html>