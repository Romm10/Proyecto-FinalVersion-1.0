<?php 
session_start();

$server = "localhost";
$usuario = "root";
$contraseña ="randy1234";   
$db = "terminalbus";


$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
or die ("error en la conexion");

$horasalida="";
$horallegada="";
$fecha="";

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
}else{
	
	$id=0;
}

if(isset($_GET["idh"])){
$idh=$_GET["idh"];
	
	$sql="SELECT * from horarios where id=".$idh;
$datos = mysqli_query($conexion, $sql)
or die ("error al traer los datos");

while ($info = mysqli_fetch_array($datos))
{
	$horasalida=$info['horasalida'];
    $horallegada=$info['horallegada'];
	$fecha=$info['fecha'];
}
	
}else{
	$idh=0;
	
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/us.css">
    <title>Horarios</title>
</head>
<body>
    <h1> Registro Horarios</h1>
	<form action="admin.php" method="post">
		<input type="submit" name="reg" value="Regresar">
    </form>
	
<center>
<table><tr><td>
<form name="Horarios" action="mantenimientohorario.php" method="post">
<table border="1">

<tr>
<td colspan="5"><label> Mantenimiento Horarios</label></td>
</tr>

<tr><td colspan="5"><label>Registrar Horario </label></td></tr>
<tr>
	<td><label>Hora Salida</label></td><td><input type="time" value="<?php echo $horasalida; ?>" maxlength="200" name="horasalida"></td>
	<td><label>Hora Llegada</label></td><td><input type="time" value="<?php echo $horallegada; ?>" maxlength="200" name="horallegada" >
	<input hidden="true" type="text"  name="id" value="<?php echo $id; ?>" ><input hidden="true" type="text"  name="idh" value="<?php echo $idh; ?>" ></td>
</tr>
<tr>
	<td><label>Fecha</label></td><td><input type="date" value="<?php echo $fecha; ?>" maxlength="200" name="fecha"></td>
</tr>

<tr><td colspan="5"><h3 ><font color="#F9070B"><?php if(isset($mensaje)){ echo $mensaje;}else{ echo "";} ?></font></h3></td></tr>
<tr><td colspan="5" align="center">
<input type="submit" value="Nuevo Horario" name="limpiardatos" >
<input type="submit" value="Registrar" name="grabardatos" >
<input type="submit" value="Modificar" name="modificardatos" >
<input type="submit" value="Eliminar" name="eliminardatos">
</td>
</tr>
	</table>
</form>
	<table>
<tr><td colspan="5"><label>Listado de Horarios </label></td></tr>

<tr>
	<td><label>ID</label></td>
	<td><label>Horario Salida</label></td>
	<td><label>Horario Llegada</label></td>
	<td><label>Fecha</label></td>
	
	
	
</tr>

<?php

$query="SELECT h.id, h.horasalida, h.horallegada,h.fecha FROM horarios h
		INNER JOIN registro r ON r.id = h.id_registro where h.id_registro=".$id;

$consulta=$conexion->query($query);
while ($extraido = mysqli_fetch_array($consulta))
{
	echo '<tr>';
	echo "<td><form  action=\"mantenimientohorario.php\" method=\"post\"><a href='horarios.php?editar=1&id=".$id."&idh=".$extraido['id']."'>".$extraido['id']."</a></form></td>";
	echo '<td>'.$extraido['horasalida']."</td>";
    echo '<td>'.$extraido['horallegada'].' </td>';
	echo '<td>'.$extraido['fecha'].' </td>';
	echo '</tr>';
}
mysqli_close ($conexion);

?>

</table>
</td></tr></table>
</center>
	
</body>
</html>