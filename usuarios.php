<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/us.css">
<link rel="icon" href="IMG/autobusa.png">
<script src="js/jquery-3.6.0.min.js"></script>
<script src="jsfunciones.js"></script>
 <title>Usuario</title>
</head>

<body>
<h1> Hola Vendedor</h1>

	<form action="cerrar_sesion.php" method="post">
		<input type="submit" name="sesion" value="Cerrar Sesion">
    </form>
<form action="compra.php" method="post">
<center>
	<table><tr><td>
<table border="1">

<tr>
<td colspan="5"><label>Venta de Boletos</label></td>
</tr>

<tr><td colspan="5"><label>Registrar</label></td></tr>
<tr>
	<td><label>Fecha Compra</label></td><td colspan="4"><input type="date" value="" maxlength="200" size="10" name="fechac"></td>
	
</tr>
<tr>
	<td><label>Nombre Cliente</label></td><td> <input type="text" value="" maxlength="200" name="nombre"></td>
</tr>

<tr>
	<td><label>Ruta</label></td><td>
<div id="id">
<label> <select name="rutas" id="ruta" >
<?php
include 'conexion.php';

$consulta="SELECT * FROM registro";
$ejecutar=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

?>

<?php foreach($ejecutar as $opciones):?>

<option value="<?php echo $opciones ['id'] ?>"><?php echo $opciones['salida']."-".$opciones['destino']?></option>

<?php endforeach ?>

</select></label>
</div> </td>

</tr>

<tr>
	<td><label>Precio</label></td><td><div id="mPrecio"></div> </td>
</tr>

<tr>
	<td><label>Horario</label></td><td><div id="mHorarios" ></div></td>
</tr>

<tr><td colspan="5" align="center">
	<input  type="submit" value="Comprar Boleto" name="register" >

</tr>
</table>
</form>

<form action="ticket.php" method="post">
<tr><td colspan="5" align="center">

<input type="submit" value="Ver Ticket" name="ver" >
</tr>
</form>

</td></tr></table>
</center>
</body>
</html>
