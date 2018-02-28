<?php 
include('Conexion.php');
//incluimos la conexion que creamos en otro archivo que asi nombramos con include
$conexion = conectar();
//creamos una variable  tipo conexion con la que almacenamos nuestra funcion conectar del archivo conexion.php
session_start();

$nombre = $_SESSION['user'];

$update =pg_query($conexion,"UPDATE \"Usuario\" set \"Estado_Cuenta\"='D' WHERE \"N_Usuario\"='$nombre'") or die("Error al actualizar");

pg_close($conexion);


if (isset($_SESSION['user'])) {

	session_destroy();
	header ("Location: index2.php");
}else{

	header ("Location: index2.php");
}

 ?>