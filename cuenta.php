<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION['usuario'])){
		echo "<script>window.location='index.php'</script>";
	}
	$n2 = mysql_query("select * from usuarios where id_user  = '".$_SESSION["usuario"]."' ", $conexion) or die(mysql_error());
	$n3 = mysql_fetch_assoc($n2);
	if (isset($_POST["nombre"])){
		
		if ($_POST["pass"] == ""){
			$pass = $n3["pass"];
		}else{
			$pass = md5($_POST["pass"]);
		}
		$consulta = "
		UPDATE `usuarios` SET 
		`nombre`='".$_POST["nombre"]."',
		`user`='".$_POST["usuario"]."',
		`email`='".$_POST["email"]."',
		`pass`= '$pass'
		where id_user  = '".$_SESSION["usuario"]."' 
		";
		//echo $consulta;
		$n2 = mysql_query($consulta, $conexion) or die(mysql_error());
		echo "<script>window.location='codigo.php'</script>";
	}
	
	
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
	</head>
	<body>
        <div class="card card-container">

            <form class="form-signin" method="POST" action="cuenta.php">
    
				Cedula: <br>
				<input type="num" value="<?php echo $n3['cedula']; ?>" name="cedula" id="inputPassword" class="form-control" placeholder="Cedula" required disabled>
				Nombre:<br>
				<input type="text" value="<?php echo $n3['nombre']; ?>" name="nombre" id="inputPassword" class="form-control" placeholder="Nombre" required autofocus >
				Usuario:<br>
				<input type="text" value="<?php echo  $n3['user']; ?>" name="usuario" id="inputPassword" class="form-control" placeholder="Usuario" required>
				Email:<br>
				<input type="email" value="<?php echo $n3['email']; ?>" name="email"  id="inputEmail" class="form-control" placeholder="Email" required >
                Nueva Contraseña:<br>
				<input type="password" name="pass" value="" class="form-control" placeholder="Nueva contraseña">
			 Tipo:<br>
			 <?php 
			 if($n3['tipo'] == 1){
				$id = 1;
				$tipo = "Estudiante Regular";
			 }
			 if($n3['tipo'] == 2){
				$id = 2;
				$tipo = "Profesor";
			 }
			 if($n3['tipo'] == 3){
				$id = 1;
				$tipo = "Estudiante Becado";
			 }
			 if($n3['tipo'] == 0){
				$id = 0;
				$tipo = "ADMINISTRADOR";
			 }
			 ?>
			<select name="tipo" class="form-control" >
				<?php echo "<option value='$id'>$tipo</option>"; ?>
				<?php if ($n3['tipo'] != 3 & $n3['tipo'] != 0 ){ ?>
				<option value="1">Estudiante</option>
				<option value="2">Profesor</option>
				<?php } ?>
			</select>
			
			
		<br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">GUARDAR</button>
			<br>	
			Si eres un estudiante becado, dirigete a algun representante o auxiliar para la activacion.	
				
            </form><!-- /form -->

        </div><!-- /card-container -->
	</body>
</html>