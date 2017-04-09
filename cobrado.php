<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION["COBRADO"])){
		echo "<script>window.location='index.php?invalido=1'</script>";
	}
?>
<html lang="es">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>COMEDOR INSTITUCIONAL</title>
		<script>
		function validar(esto){
			console.log(document.getElementById("numero").value);
			cuantas = esto.length;
			if (cuantas == 4){
				 window.location='validar.php?valor='+document.getElementById("numero").value;
			}
		}
		</script>
	</head>
	<body>
        <div class="card card-container">
			<div class="alert alert-success">
			<center><h1>COBRADO CON EXITO</h1></center>
			</div>
		<BR><BR>
		<center>
		  <a href="index.php" class="btn btn-success">Inicio</a>
		</center>	
        </div><!-- /card-container -->
	</body>
</html>