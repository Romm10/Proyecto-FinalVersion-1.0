<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","randy1234","terminalbus");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:admin.php");

}else
if($filas['id_cargo']==2){ //usuario
header("location:usuarios.php");

}
else{
  //        $alert = '<div class="alert alert-danger" role="alert">
//              Usuario o Contraseña Incorrecta
//            </div>';
           header('location: ./401.php');
        session_destroy();
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>