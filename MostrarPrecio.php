<?php 
$server = "localhost";
$usuario = "root";
$contraseña ="randy1234";   
$db = "terminalbus";

$id=$_POST["id"];

$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
or die ("error en la conexion");

$consulta = mysqli_query($conexion, "SELECT * from registro where id=$id")
or die ("error al traer los datos");

while ($extraido = mysqli_fetch_array($consulta))
{
	echo $extraido['precio'];
}
mysqli_close ($conexion);

?>