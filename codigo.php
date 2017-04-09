<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION['usuario'])){
		echo "<script>window.location='index.php'</script>";
	}

	$n2 = mysql_query("select nombre,tipo from usuarios where id_user  = '".$_SESSION["usuario"]."' ", $conexion) or die(mysql_error());
	$n3 = mysql_fetch_assoc($n2);
	$nombre = $n3['nombre'];
			 if($n3['tipo'] == 1){
			
				$tipo = "Estudiante Regular";
			 }
			 if($n3['tipo'] == 2){
	
				$tipo = "Profesor";
			 }
			 if($n3['tipo'] == 3){

				$tipo = "Estudiante Becado";
			 }
			 if($n3['tipo'] == 0){
				$id = 0;
				$tipo = "ADMINISTRADOR";
			 }			 
	$queEmp = "select * from codigos where user  = '".$_SESSION["usuario"]."' ";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$rowEmp = mysql_fetch_assoc($resEmp);
	if ( mysql_num_rows($resEmp) != 0){
		$numero =  $rowEmp['codigo'];
	}else{
		$numero = rand(1000,9999); 
		$q = "INSERT INTO `codigos`(`codigo`, `user`) VALUES ('$numero','".$_SESSION["usuario"]."')";
		$resEmp = mysql_query($q, $conexion) or die(mysql_error());
	}
	
	
?>

	<html lang="es">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>COMEDOR INSTITUCIONAL</title>
	</head>
	<body>
    <div class="container">
        <div class="card card-container">
            <table class="table">
			<tr>
			<td>
						
            <a href="cuenta.php" class="btn btn-primary">
				Modificar Cuenta
            </a>
			</td>
				<td>
			<a href="aut_logout.php" class="btn btn-danger">
				Salir
            </a>
			</td>
			</tr>
			</table>
			
            <p id="profile-name" class="profile-name-card"><?php echo $nombre; ?></p>
			<p id="profile-name" class="profile-name-card"><?php echo $tipo; ?></p>
			<br>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
				<h1><center><?php echo $numero; ?></center></h1>
				<br>
            </form>
			<center>
				<a href="aut_logout.php" class="btn btn-warning">
				Digitar Codigo
            </a>
			
							<br><br>
			*Codigo de identificacion unico.
		
		
		
        </div><!-- /card-container -->
    </div><!-- /container -->
	</body>
</html>