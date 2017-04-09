<?php 
	include "conexion.php";
	session_start();
	$consulta="select * from codigos where codigo = '".$_GET['codigo']."' ";
	$resEmp = mysql_query($consulta, $conexion) or die(mysql_error());
	$q = mysql_fetch_assoc($resEmp);
	$n2 = mysql_query("INSERT INTO `historial`(`id_user_h`) VALUES ('".$q['user']."')", $conexion) or die(mysql_error());
	$_SESSION["COBRADO"]= 1 ;
	echo "<script>window.location='cobrado.php'</script>";
	
?>