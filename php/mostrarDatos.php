<?php 
	include "conexion.php";
	$conexion = conexion();


	$sql = "SELECT * from t_persona ORDER by id DESC";
	$result= $conexion->query($sql);

	$tabla = "";


	while ($datos=$result->fetch_assoc()) {
		$id = $datos['id'];
		$tabla=$tabla.'<tr>
							<td>'.$datos['nombre'].'</td>
							<td>'.$datos['paterno'].'</td>
							<td>'.$datos['materno'].'</td>
							<td>'.$datos['telefono'].'</td>
							<td>
								<span class="btn btn-warning btn-sm"  data-toggle="modal" 
								data-target="#modalActualizar" onclick="editarDatos('.$datos['id'].')">
								<li class="fas fa-edit"></li>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" id="delete" onclick="eliminarDatos('.$datos['id'].')" >
								<li class="fas fa-trash-alt"></li>
								</span>
							</td>
						</tr>  ';
		}

		$conexion->close();

		echo '<table class="table table-stripped" id="userTable">
		<thead>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>pellido materno</th>
			<th>Telefono</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</thead> 
		<tbody>'.$tabla.'</tbody>';




?>

<script>
	$("#userTable").DataTable();
</script>