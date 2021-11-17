 
<?php
$server = "localhost";
$usuario = "root";
$contraseña ="randy1234";   
$db = "terminalbus";
$idcompra=0;
$conexion = mysqli_connect($server, $usuario, $contraseña, $db);
$sqlboleto=mysqli_query($conexion,"SELECT max(id_compra) IdBoleto from compra ");
	
	$result_sqlboleto=mysqli_num_rows($sqlboleto);
	if($result_sqlboleto == 0){
		//header('location: usuarios.php');
	}else{
	while($databoleto=mysqli_fetch_array($sqlboleto)){
		$idcompra =  $databoleto['IdBoleto'];
	}
	
	
	
	$sql=mysqli_query($conexion,"SELECT r.salida, r.destino, r.precio,
			   h.horasalida, h.horallegada, h.fecha ,
			   c.id_compra, c.nombre, c.fechac
	    FROM compra c
		INNER JOIN registro r ON c.id_registro = r.id 
		INNER JOIN horarios h ON c.id_horarios = h.id
		WHERE c.id_compra=".$idcompra);
		
	//$datos=mysqli_fetch_array($sql);
	
	$result_sql=mysqli_num_rows($sql);
	
	if($result_sql == 0){
		//header('location: usuarios.php');
	}else{
		while($data=mysqli_fetch_array($sql)){
			
			$idcompra =  $data['id_compra'];
			$fechac = $data['fechac'];
			$nombre = $data['nombre'];
			$salida = $data['salida'];
			$horasalida = $data['horasalida'];
			$destino= $data['destino'];
			$horallegada= $data['horallegada'];
			$dia= $data['fecha'];
			$precio= $data['precio'];
		}
	}
	
	
	
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/us.css">

</head>

<body>

<center>
<table><tr><td>
<table border="0">

<tr>
<td colspan="4"><label><center>////:::....::..::MI BOLETO::..::....:::\\\\</center></label></td>
</tr>

<tr>
<td ><label>Fecha</label></td><td colspan="3"><input type="text" value="<?php echo $fechac; ?>" name="fechac"></td>
</tr>

<tr>
	<td colspan="4"><label>Nombre Cliente</label></td>
	<tr><td colspan="4"><input type="text" value="<?php echo $nombre; ?>" name="nombre"><h3 ><font color="#F9070B"></font></h3></td></tr>
	
	<td colspan="4"><label>Origen</label></td>
	<tr><td colspan="4"><input type="text" value="<?php echo $salida; ?>" name="salida"><h3 ><font color="#F9070B"></font></h3></td></tr>
	
	<tr><td><label>Hora salida</label></td><td colspan="3"><input type="decimal" value="<?php echo $horasalida; ?>" name="horasalida"></td></tr>
	
	<td colspan="4"><label>Destino</label></td>
	<tr><td colspan="4"><input type="text" value="<?php echo $destino; ?>" name="destino"><h3 ><font color="#F9070B"></font></h3></td></tr>
	
	<tr><td><label>Hora Llegada</label></td><td colspan="3"><input type="decimal" value="<?php echo $horallegada; ?>" name="horallegada"></td></tr>
	
	<tr><td><label>Dia</label></td><td colspan="3"><input type="decimal" value="<?php echo $dia; ?>" name="dia"></td></tr>
	
	<tr><td><label>Precio</label></td><td colspan="3"><input type="decimal" value="<?php echo $precio; ?>" name="precio"></td></tr>
</tr>
<?php


?>


</table>
	
</td></tr></table>

	<form action="usuarios.php" method="post">
		<input type="submit" name="atras" value="Regresar">
    </form>
	
	<form action="" method="post">
		<input type="submit" name="impri" value="Imprimir">
    </form>

</center>

</body>
</html>