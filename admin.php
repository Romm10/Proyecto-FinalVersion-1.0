<?php 
session_start();

$server = "localhost";
$usuario = "root";
$contraseña ="randy1234";   
$db = "terminalbus";



$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
or die ("error en la conexion");

$salida="";
$destino="";
$precio="";

if(isset($_GET["msje"])){
	$mensaje=$_GET["msje"];
}

if(isset($_GET["editar"])){
	
$editar=  $_GET["editar"];
}else{
	
	$editar=0;
}
if(isset($_GET["id"])){
$id=$_GET["id"];
	
	$datos = mysqli_query($conexion, "SELECT * from registro where id=".$id)
or die ("error al traer los datos");

while ($info = mysqli_fetch_array($datos))
{
	$salida=$info['salida'];
    $destino=$info['destino'];
	$precio=$info['precio'];
}
	
}else{
	$id=0;
	
}


?>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/us.css">
<link rel="icon" href="IMG/autobusa.png">
 <title>Administrador</title>
</head>

<body>
<h1> Hola Administrador</h1>

	<form action="cerrar_sesion.php" method="post">
		<input type="submit" name="sesion" value="Cerrar Sesion">
    </form>
	

<center>
	<table><tr><td>
<form name="Mantenimiento" action="mantenimiento.php" method="post">
<table border="1">

<tr>
<td colspan="5"><label>Mantenimiento de Rutas</label></td>
</tr>

<tr><td colspan="5"><label>Registrar Ruta </label></td></tr>
<tr>
	<td><label>Origen</label></td><td><input type="text" value="<?php echo $salida; ?>" maxlength="200" name="salida"></td>
	<td><label>Destino</label></td><td><input type="text" value="<?php echo $destino; ?>" maxlength="200" name="destino" ></td>
</tr>
<tr>
	<td><label>Precio</label></td><td colspan="4"><input type="decimal" value="<?php  echo $precio; ?>" maxlength="200" size="10" name="precio"><input  hidden="true" type="text"  name="id" value="<?php echo $id; ?>" ></td>
	
</tr>
<tr><td colspan="5"><h3 ><font color="#F9070B"><?php if(isset($mensaje)){ echo $mensaje;}else{ echo "";} ?></font></h3></td></tr>
<tr><td colspan="5" align="center">
<input type="submit" value="Nueva Ruta" name="limpiardatos" >
<input type="submit" value="Registrar" name="grabardatos" >
<input type="submit" value="Modificar" name="modificardatos" >
<input type="submit" value="Eliminar" name="eliminardatos">
</td>
</tr>
	</table>
</form>
	<table>
<tr><td colspan="5"><label>Listado de Rutas </label></td></tr>

<tr>
	<td><label>ID</label></td>
	<td><label>Origen</label></td>
	<td><label>Destino</label></td>
	<td><label>Precio</label></td>
	<td><label>Horario</label></td>
	
</tr>

<?php


$consulta = mysqli_query($conexion, "SELECT * from registro")
or die ("error al traer los datos");

while ($extraido = mysqli_fetch_array($consulta))
{
	echo '<tr>';
	echo "<td><form  action=\"mantenimiento.php\" method=\"post\"><a href='admin.php?editar=1&id=".$extraido['id']."'>".$extraido['id']."</a></form></td>";
	echo '<td>' .$extraido['salida'].' </td>';
    echo '<td>' .$extraido['destino'].' </td>';
	echo '<td>' .$extraido['precio'].' </td>';
	echo '<td>';
    echo '<form action="horarios.php?id='.$extraido['id'].' " method="POST">';
	echo '<input type="submit" value="Horario" ></form></td>';
	echo '</tr>';
}
mysqli_close ($conexion);

?>

<?php
/*$server = "localhost";
$usuario = "root";
$contraseña ="";   
$db = "terminalbus";

$conexion = mysqli_connect($server, $usuario, $contraseña, $db);
if(empty($_GET['id']))
{
	
}
	$id=$_GET['id'];
	$sql=mysqli_query($conexion,"SELECT r.id, r.salida, r.destino, r.precio
	FROM registro r
	WHERE id= $id");
	
	$result_sql=mysqli_num_rows($sql);
	
	if($result_sql == 0){
		
	}else{
		while($data=mysqli_fetch_array($sql)){
			
			$id =  $data['id'];
			$salida = $data['salida'];
			$destino = $data['destino'];
			$precio = $data['precio'];
		}
	}*/

?>

</table>
</td></tr></table>
</center>
</body>
</html>
