<?php 

function conectar(){

	$cadena="host='localhost' 
		port='5432' 
		dbname='IdealDate' 
		user='postgres'
		password='123'";

$conexion = pg_connect($cadena) or die("Error de conexion" . pg_last_error());


return $conexion;
}



/*La conexion en el arreglo de los datos de la base las variables tendran que ser exactamente como estan declaradas es decir: host, port, dbname, user, password.
Tambein se configuro XAMPP y se quito el ';'  a las lineas:
extension=pdo_pgsql
extension=pdo_sqlite
extension=pgsql
Lo anterior se encontro en el boton config de Apache en los servicios de XAMPP y despues en php(php.ini)
*/





 ?>