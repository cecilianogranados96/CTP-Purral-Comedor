<?php 
	include "conexion.php";
	session_start();
	if (isset($_SESSION['usuario'])){
		$queEmp = "SELECT * FROM usuarios where id_user = '".$_SESSION["usuario"]."'";
		$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
		$totEmp = mysql_num_rows($resEmp);
		$rowEmp = mysql_fetch_assoc($resEmp);
		if ($rowEmp["tipo"] ==0){
			echo "<script>window.location='panel.php'</script>";
		}else{
			echo "<script>window.location='codigo.php'</script>";
		}
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
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <form class="form-signin" method="POST" action="aut_verifica.inc.php">
                <span id="reauth-email" class="reauth-email"></span>
				Usuario:<br>
                <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Digite su usuario" required autofocus>
				Contraseña:<br>
			  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Contraseña" required>
<br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form><!-- /form -->
			<center><hr><br><br>
			   <a href="registrar.php" class="btn btn-danger">
				Registrarse
            </a><br><br>
            <a href="olvido.php" class="btn btn-primary">
				Olvido la contraseña
            </a><br><br>
		   <hr>
		   
		    <BR>(TEC - 2017)
        </div><!-- /card-container -->
    </div><!-- /container -->
	</body>
</html>