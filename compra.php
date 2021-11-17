<?php 

include("conexion.php");
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])) {
    if (strlen($_POST['rutas']) >= 1 && strlen($_POST['horario']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['fechac']) >= 1) {

	    $id_registro = trim($_POST['rutas']);
		$id_horarios = trim($_POST['horario']);
		$nombre = trim($_POST['nombre']);
		$fechac = trim($_POST['fechac']);
	    $consulta = "INSERT INTO compra(id_registro, id_horarios, nombre, fechac) VALUES ('$id_registro','$id_horarios','$nombre','$fechac')";

	    $resultado = mysqli_query($conexion,$consulta);
	if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Compra Exitosa!</h3>
           <?php
		   //header("location: usuarios.php");
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ocurrio un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Complete los campos!</h3>
           <?php
    }

	
	
}

?>