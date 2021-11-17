<?php

include("conexion.php");

$id = $_POST["id"];
$salida = $_POST["salida"];
$destino = $_POST["destino"];
$precio = $_POST["precio"];


	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: admin.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	
	{
	if($id>0){
	$mensaje="Haz Clic en Nueva Ruta luego en el boton Guardar!!";	
		header("Location: admin.php?msje=".$mensaje);
	}else{
		if($salida==null or $destino==null or $precio==null){
			
			$mensaje="Llena los Campos vacios!!";	
		header("Location: admin.php?msje=".$mensaje);
		}else{
		
	$sqlgrabar = "INSERT INTO registro( salida, destino, precio) values ( '$salida','$destino','$precio')";
		}
	}

if(mysqli_query($conexion,$sqlgrabar))
{
	header("Location: admin.php");
}else 
{
	//echo "Error: " .$sql."<br>".mysql_error($conn);
}
		
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificardatos']))
	
	{
		if($id>0){
			$sqlmodificar = "UPDATE registro SET salida='$salida',destino='$destino',precio='$precio' WHERE id=$id";

if(mysqli_query($conexion,$sqlmodificar))
{
	header("Location: admin.php");
}else 
{
	//echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}		else{
			$mensaje="Primero Seleccione un ruta a Modificar";
			header("Location: admin.php?msje=".$mensaje);
			
		}
		
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminardatos']))
	
	{
		if($id>0){
		
			$sqleliminar = "DELETE FROM registro WHERE id=$id";

if(mysqli_query($conexion,$sqleliminar))
{
	header("Location: admin.php");
}else 
{
	//echo "Error: " .$sql."<br>".mysql_error($conn);
}
		}else{
			$mensaje="Primero Seleccione un ruta a Eliminar";
			header("Location: admin.php?msje=".$mensaje);
		}
		
		
	}

?>