 <?php 
include('Conexion.php');
//incluimos la conexion que creamos en otro archivo que asi nombramos con include
$conexion = conectar();
//creamos una variable  tipo conexion con la que almacenamos nuestra funcion conectar del archivo conexion.php

$Usuario = $_POST['user'];

$consulta=pg_query($conexion,
	"SELECT * FROM \"Usuario\" WHERE \"N_Usuario\"='$Usuario'") or die("Error al consultar");
/*En la sentencia anterior las hay que tomar en cuenta que postgres utiliza
una forma de consulta muy estricta con las comillas para las columnas simre se pondran entre comillas dobles y la comparacion de valores sera entre comillas simples y como toda la sentencia esta contenida en comillas simples tendremos que ocupar las barras invertidas para que nos  escapemos de las comillas y 
podamos realizar la consulta*/


while ($extraido=pg_fetch_array($consulta)) {
	
	$Usuario = $extraido["N_Usuario"];
	$pass = $extraido["pass"];
	$estado = $extraido["Estado_Cuenta"];

}
if ($estado == "C") {
	echo "Esta cuenta esta ocupada";
	header("Location: index2.php");
}else{

$password = $_POST['pass'];
$user = $_POST['user'];
//declaramos otras dos variables que recogeran ahora el valor de los datos que vienen del formulario
if ($pass == $password && $user == $Usuario) {	
//comparamos los datos  del formulario con los de la base de datos para saber si si exstwe el usuario y ccontraseña	
session_start();
$_SESSION['user']=$_POST['user'];
$_SESSION['pass']=$_POST['pass'];
//se inicia la session par almacenar el valor en todo el tiempo de uso y se almacenan en las variables session los datos enviados del from

header("Location: index.php");
$update = pg_query($conexion,"UPDATE \"Usuario\" set \"Estado_Cuenta\"='C' WHERE \"N_Usuario\"='$Usuario'") or die("Error al actualizar");

}else{
header("Location: index2.php");
}	
}
//creamos el while declarando en la condicion una vriable que recogera el valor de la consulta y las almacenamos en las nuevas variables Usuario y pass

pg_close($conexion);
 ?>
