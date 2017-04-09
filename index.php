<?php 
	include "conexion.php";
	session_start();

?>
<html lang="en">
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
      	
	<?php if(isset($_GET['tipo'])){
			if($_GET['tipo'] == 1){
				$tipo = "Estudiante Regular";
			}
			if($_GET['tipo'] == 2){
				$tipo = "Profesor";
			}
			if($_GET['tipo'] == 3){
				$tipo = "Estudiante Becado";
			}
			if($_GET['tipo'] == 0){
				$tipo = "ADMINISTRADOR";
			}
			$consulta="select * from montos where tipo = '".$_GET['tipo']."' ";
			$resEmp = mysql_query($consulta, $conexion) or die(mysql_error());
			$q = mysql_fetch_assoc($resEmp);
			echo "<h2><center>".$tipo."</h2>"; 
			
			echo "<h1><center>Monto: ₡ ".$q['monto']."</h1>"; 
			
			echo '<h1><center><a href="cobrar.php?codigo='.$_GET['codigo'].'" class="btn btn-success" >Cobrar</a></h1>';	
		
		}else{
			if(isset($_GET['invalido'])){
				if ($_GET['invalido'] == 1)
					echo "<div class='alert alert-danger'><center>CODIGO INVALIDO</center></div>";
				if ($_GET['invalido'] == 2)
					echo "<div class='alert alert-danger'><center>CODIGO USADO EL DIA DE HOY</center></div>";
			}
			echo '<table class="table">
			<tr>
				<td>		
					<a href="inc_ses.php" class="btn btn-success">Olvido el Codigo</a>
				</td>
				<td>
					  <a href="registrar.php" class="btn btn-info">Registrarse</a>
				</td>
			</tr>
			</table>	
			<form class="form-signin" action="validar.php" method="post" name="formulario1" >
                <input type="tel" name="numero" id="numero" onkeyup="validar(this.value)" class="form-control"  placeholder="Digite codigo" required autofocus>
            </form>';
		}
			?>
			*Digite el codigo asignado por el sistema, Si no tiene un codigo registrese.

        </div><!-- /card-container -->
	</body>
</html>