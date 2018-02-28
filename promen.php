<?php 
include("Conexion.php");
$conexion = conectar(); 
session_start();
if (isset($_POST['enviar'])) {
	$user = $_SESSION['user'];
	$msn = $_POST['mensaje'];

$inseratar = pg_query($conexion,
"INSERT INTO \"chat\" VALUES (Default,'$user','$msn')") 
or die("Error al insertar");
header("Location: index.php");

}else{

	echo "Error";
}


pg_close($conexion);
 ?>