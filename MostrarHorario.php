<?php 
$server = "localhost";
$usuario = "root";
$contraseña ="randy1234";   
$db = "terminalbus";

$id=$_POST["id"];

$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
or die ("error en la conexion");
$sql="SELECT * from horarios where id_registro=$id";
$consulta = mysqli_query($conexion,$sql )
or die ("error al traer los datos".$sql);
$lista="<select name='horario'>";
while ($extraido = mysqli_fetch_array($consulta))
{
	
$lista = $lista."<option value=\"".$extraido['id']."\">Salida: ".$extraido['horallegada']." Llegada: ".$extraido['horasalida']."</option>";
}
$lista = $lista."</select>"; 
echo $lista;

?>