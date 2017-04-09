<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION['usuario'])){
		echo "<script>window.location='index.php'</script>";
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
            <li><a href="aut_logout.php">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
	
	<br><br><br><br>
	
<form class="form-horizontal" action="usuarios.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Buscar Usuario</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="buscar">Buscar</label>  
  <div class="col-md-4">
  <input id="buscar" name="buscar" type="text" placeholder="Digite el nombre" class="form-control input-md">
  <span class="help-block">Digite el nombre del usuario para buscar</span>  
  </div>
</div><center>
	<button type="submit" class="btn btn-primary">Buscar</button>
</fieldset>
</form>

	
	
	
	<table class="table table-striped">
	<tr>
	<td>
		<b><center>NOMBRE
	</td>
		<td>
		<b><center>Tipo
	</td>
	
		<td>
		<b><center>Editar
	</td>
	
	
	</tr>
	
<?php 

if(isset($_POST['buscar'])){
	$queEmp = "SELECT * FROM usuarios where nombre like '%".$_POST['buscar']."%' limit 50 ";	
}else{	
	$queEmp = "SELECT * FROM usuarios limit 50 ";	
}

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
if ($totEmp> 0) {
echo "";
while ($rowEmp = mysql_fetch_assoc($resEmp)) {


			 if($rowEmp['tipo'] == 1){
				$id = 1;
				$tipo = "Estudiante Regular";
			 }
			 if($rowEmp['tipo'] == 2){
				$id = 2;
				$tipo = "Profesor";
			 }
			 if($rowEmp['tipo'] == 3){
				$id = 1;
				$tipo = "Estudiante Becado";
			 }
			 if($rowEmp['tipo'] == 0){
				$id = 0;
				$tipo = "ADMINISTRADOR";
			 }
			 
			 
			 
echo "
	<tr>
	<td>
		<center>".$rowEmp['nombre']."
	</td>
		<td>
		<center>".$tipo."
	</td>
	<td>
		<center>
		<a href='cuenta_mod.php?id=".$rowEmp['id_user']."' class='btn btn-success'>Editar</a>
		
	</td>
	</tr>";
 }}  
	  ?>
	  
	  
	
	</table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>
