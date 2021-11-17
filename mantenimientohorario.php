<?php

include("conexion.php");
$id = $_POST["id"];
$horasalida = $_POST["horasalida"];
$horallegada = $_POST["horallegada"];
$idh = $_POST["idh"];
$fecha = $_POST["fecha"];


	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: horarios.php?id=".$id);
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	
	{
//echo "$id".$horasalida."n".$horallegada;		
	if($id>0){

		if($horasalida==null or $horallegada==null){
			
			$mensaje="Llena los Campos vacios!!";	
		header("Location: horarios.php?msje=".$mensaje."&id=".$id);
		}else{
		
	$sqlgrabar = "INSERT INTO horarios(id_registro, horasalida, horallegada, fecha) values ($id, '$horasalida','$horallegada', '$fecha')";
if(mysqli_query($conexion,$sqlgrabar))
{
	header("Location: horarios.php?id=".$id);
}else 
{
	echo "$id".$horasalida."n".$horallegada."Error".$sqlgrabar;	
	//echo "Error: " .$sql."<br>".mysql_error($conn);
}	
	
		}
	}else{
			$mensaje="Llena los Campos vacios!!";	
		header("Location: horarios.php?msje=".$mensaje);
	
		
	}


		
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificardatos']))
	
	{
		if($idh>0){
			$sqlmodificar = "UPDATE horarios SET horasalida='$horasalida',horallegada='$horallegada',fecha='$fecha' WHERE id=$idh";

if(mysqli_query($conexion,$sqlmodificar))
{
	header("Location: horarios.php?id=".$id);
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}		else{
			$mensaje="Primero Seleccione un ruta a Modificar";
			header("Location: horarios.php?msje=".$mensaje."&id=".$id);
			
		}
		
	}
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminardatos']))
	
	{
		if($id>0){
		
			$sqleliminar = "DELETE FROM horarios WHERE id=$idh";

if(mysqli_query($conexion,$sqleliminar))
{
	header("Location: horarios.php?id=".$id);
}else 
{
	//echo "Error: " .$sql."<br>".mysql_error($conn);
}
		}else{
			$mensaje="Primero Seleccione un ruta a Eliminar";
			header("Location: horarios.php?msje=".$mensaje."&id=".$id);
		}
		
		
	}

?>