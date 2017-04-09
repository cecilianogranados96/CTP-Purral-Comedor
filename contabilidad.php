<?php 
	include "conexion.php";
	session_start();
	if (!isset($_SESSION['usuario'])){
		echo "<script>window.location='index.php'</script>";
	}
	
	function get_mes($numero){
						switch ($numero) {
						case 1:
							return "Enero";
							break;
						case 2:
							return "Febrero";
							break;
						case 3:
							return "Marzo";
							break;
						case 4:
							return "Abril";
							break;
						case 5:
							return "Mayo";
							break;
						case 6:
							return "Junio";
							break;
						case 7:
							return "Julio";
							break;
						case 8:
							return "Agosto";
							break;
						case 9:
							return "Setiembre";
							break;
						case 10:
							return "Octubre";
							break;
						case 11:
							return "Nomviembre";
							break;
						case 12:
							return "Diciembre";
							break;
						default:
							return date('m');
							break;
					}
	}
	
			
			if (!isset($_GET['mes'])){
				$mes = date('m');
			}else{
				$mes = $_GET['mes'];
			}
function opt_mes($mes){
	include "conexion.php";
	$resEmp = mysql_query("SELECT historial.id_historial,usuarios.id_user,usuarios.tipo,montos.tipo,SUM(montos.monto) AS suma,usuarios.nombre, historial.fecha from historial,usuarios,montos 
	where historial.id_user_h = usuarios.id_user and usuarios.tipo = montos.tipo and
	MONTH(historial.fecha) = $mes", $conexion) or die(mysql_error());
	$rowEmp = mysql_fetch_assoc($resEmp);
	if ($rowEmp['suma'] == ""){
		return 0;
	}else{
		return $rowEmp['suma'];
	}
}	 
//////////////////////////////////////////////////////////////////

$dia = date('d');
$resEmp2 = mysql_query("SELECT historial.id_historial,usuarios.id_user,usuarios.tipo,montos.tipo,SUM(montos.monto) AS suma,usuarios.nombre, historial.fecha from historial,usuarios,montos 
where historial.id_user_h = usuarios.id_user and usuarios.tipo = montos.tipo and
DAY(historial.fecha) = $dia and MONTH(historial.fecha) = '".date('m')."' ", $conexion) or die(mysql_error());
$monto_d = 0; 
$rowEmp2 = mysql_fetch_assoc($resEmp2);
$monto_d = $rowEmp2['suma'];		 


//////////////////////////////////////////////////////////////////
$resEmp3 = mysql_query("SELECT historial.id_historial,usuarios.id_user,usuarios.tipo,montos.tipo,SUM(montos.monto) AS suma,usuarios.nombre, historial.fecha from historial,usuarios,montos 
where historial.id_user_h = usuarios.id_user and usuarios.tipo = montos.tipo", $conexion) or die(mysql_error());
$monto_h = 0; 
$rowEmp3 = mysql_fetch_assoc($resEmp3);
$monto_h = $rowEmp3['suma'];		 
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
            <li><a href="usuarios.php">Usuarios</a></li>
            <li class="active" ><a href="contabilidad.php">Contabilidad</a></li>
			<li><a href="cuenta_panel.php">Cuenta</a></li>
            <li><a href="aut_logout.php">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
	<br><br><br><br>	  
      <div class="starter-template">
			<h1><center>Contabilidad<center></h1>
			<table class="table  table-striped ">
				<tr>
					<td>
						<h1><center>Hoy</center></h1>
					</td>
					<td>
						<h1><center>Mes (<?php echo get_mes($mes); ?>)</center></h1>
					</td>
					<td>
						<h1><center>Historico (total)</center></h1>
					</td>
				</tr>
				<tr>
					<td>
						<h1><center>₡<?php echo $monto_d; ?>
					</td>
					<td>
						<h1><center>₡<?php echo opt_mes($mes); ?>
					</td>
					<td>
						<h1><center>₡<?php echo $monto_h; ?>
					</td>
				</tr>	
			</table>
			
			<br><hr>
			
			<table class="table  table-striped">
				<tr>
					<td><center>Enero</center></td>
					<td><center>Febrero</center></td>
					<td><center>Marzo</center></td>
					<td><center>Abril</center></td>
					<td><center>Mayo</center></td>
					<td><center>Junio</center></td>
					<td><center>Julio</center></td>
					<td><center>Agosto</center></td>
					<td><center>Setiembre</center></td>
					<td><center>Octubre</center></td>
					<td><center>Noviembre</center></td>
					<td><center>Diciembre</center></td>			
				</tr>
				<tr>
					<td>₡<?php echo opt_mes(1); ?></td>
					<td>₡<?php echo opt_mes(2); ?></td>
					<td>₡<?php echo opt_mes(3); ?></td>
					<td>₡<?php echo opt_mes(4); ?></td>
					<td>₡<?php echo opt_mes(5); ?></td>
					<td>₡<?php echo opt_mes(6); ?></td>
					<td>₡<?php echo opt_mes(7); ?></td>
					<td>₡<?php echo opt_mes(8); ?></td>
					<td>₡<?php echo opt_mes(9); ?></td>
					<td>₡<?php echo opt_mes(10); ?></td>
					<td>₡<?php echo opt_mes(11); ?></td>
					<td>₡<?php echo opt_mes(12); ?></td>		
				</tr>
				<tr>
					<td><a href="descargar.php?mes=1" class="btn btn-success btn-sm" target="_black">Descargar<br> Enero</a></td>
					<td><a href="descargar.php?mes=2" class="btn btn-success btn-sm" target="_black">Descargar<br> Febrero</a></td>
					<td><a href="descargar.php?mes=3" class="btn btn-success btn-sm" target="_black">Descargar<br> Marzo</a></td>
					<td><a href="descargar.php?mes=4" class="btn btn-success btn-sm" target="_black">Descargar<br> Abril</a></td>
					<td><a href="descargar.php?mes=5" class="btn btn-success btn-sm" target="_black">Descargar<br> Mayo</a></td>
					<td><a href="descargar.php?mes=6" class="btn btn-success btn-sm" target="_black">Descargar<br> Junio</a></td>
					<td><a href="descargar.php?mes=7" class="btn btn-success btn-sm" target="_black">Descargar<br> Julio</a></td>
					<td><a href="descargar.php?mes=8" class="btn btn-success btn-sm" target="_black">Descargar<br> Agosto</a></td>
					<td><a href="descargar.php?mes=9" class="btn btn-success btn-sm" target="_black">Descargar<br> Setiembre</a></td>
					<td><a href="descargar.php?mes=10" class="btn btn-success btn-sm" target="_black">Descargar<br> Octubre</a></td>
					<td><a href="descargar.php?mes=11" class="btn btn-success btn-sm" target="_black">Descargar<br> Noviembre</a></td>
					<td><a href="descargar.php?mes=12" class="btn btn-success btn-sm" target="_black">Descargar<br> Diciembre</a></td>
				</tr>
			</table>
	</div>

	  
	  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>
