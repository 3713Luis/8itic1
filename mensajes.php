<?php 
include("Conexion.php");
$conexion = conectar();
session_start();

if (isset($_SESSION['user'])) {
	
	$consulta = pg_query($conexion,
	"SELECT * FROM \"chat\" ORDER BY \"id_chat\"") 
	or die("Error en la cnsulta");
	
	
	
	

		while ($extraer = pg_fetch_array($consulta)) {
			echo "<br>";
			echo "<strong>";
			echo $extraer['usuario'] . ":" . " ";
			echo "</strong>";

			echo $extraer['mensaje'];
		}


	}




?>