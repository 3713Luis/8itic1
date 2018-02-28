<?php 
session_start();

if (isset($_SESSION['user'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<center><strong>Sesión Iniciada como <?php echo $_SESSION['user']?></strong>
<table>	
<form action="promen.php" method="POST">
<tr>
<td><iframe src="mensajes.php" name="iframe" width="700" height="400"></iframe>
</td>
</tr>
<tr>
	<td>
		<input type="text" size="90" name="mensaje"> 
		<button type="submit" name="enviar">Enviar Mensaje</button>
	</td>
</tr>
</form>
</table>


	<form action="CerrarSesion.php">
	<input type="submit" name="cerrar" id="cerrar" value="Cerrar Sesión">
	</form>
	</center>
</body>
</html>

<?php
}else{
	echo "Primero inicia sesión";
}
?>





 