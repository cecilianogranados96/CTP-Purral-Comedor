<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION['usuario'])){
		echo "<script>window.location='index.php'</script>";
	}
	$n2 = mysql_query("select * from usuarios where id_user  = '".$_GET["id"]."' ", $conexion) or die(mysql_error());
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
		`tipo`='".$_POST["tipo"]."',
		`pass`= '$pass'
		where id_user  = '".$_GET["id"]."' 
		";
		//echo $consulta;
		$n2 = mysql_query($consulta, $conexion) or die(mysql_error());
		echo "<script>window.location='cuenta_mod.php?id=".$_GET["id"]."'</script>";
	}
	
	
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Comedor Estudiantil</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Comedor Estudiantil</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="usuarios.php">Usuarios</a></li>
            <li><a href="contabilidad.php">Contabilidad</a></li>
			<li><a href="cuenta_panel.php">Cuenta</a></li>
            <li><a href="aut_logout.ph">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">


	
	<br><br><br><br>
	
            <form class="form-signin" method="POST" action="cuenta_mod.php?id=<?php echo $_GET["id"];?>">
    
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
		
				<option value="1">Estudiante</option>
				<option value="2">Profesor</option>
				<option value="3">Estudiante Becado</option>
				<option value="0">ADMINISTRADOR</option>
				
		
			</select>
			
			
		<br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">GUARDAR</button>
			<br>	
			Si eres un estudiante becado, dirigete a algun representante o auxiliar para la activacion.	
				
            </form><!-- /form -->
	
	

	
	
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>
