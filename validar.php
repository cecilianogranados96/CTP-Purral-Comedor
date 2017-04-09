<?php 
	include "conexion.php";
	session_start();
	

	$consulta1="	SELECT historial.fecha,historial.id_user_h,codigos.codigo,codigos.id_codigo from 
historial,codigos where codigos.codigo = '".$_GET['valor']."' and codigos.user = historial.id_user_h and
 MONTH(fecha) = ".date('m')." and DAY(fecha) = ".date('j')."
 ";
	$resEmp1 = mysql_query($consulta1, $conexion) or die(mysql_error());
	 //echo $consulta1;
	if (mysql_num_rows($resEmp1) != 0){
		echo "<script>window.location='index.php?invalido=2'</script>";
	}
		

	$consulta="select * from codigos where codigo = '".$_GET['valor']."' ";
	$resEmp = mysql_query($consulta, $conexion) or die(mysql_error());
	$q = mysql_fetch_assoc($resEmp);
	
	if (mysql_num_rows($resEmp) == 0){
		echo "<script>window.location='index.php?invalido=1'</script>";
	}else {
		$n2 = mysql_query("select tipo,id_user from usuarios where id_user = '".$q['user']."' ", $conexion) or die(mysql_error());
		$n3 = mysql_fetch_assoc($n2);
		echo "<script>window.location='index.php?tipo=".$n3['tipo']."&codigo=".$_GET['valor']."'</script>";
	}
?>