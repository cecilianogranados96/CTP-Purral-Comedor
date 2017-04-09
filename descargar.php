<?php
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
	header('Content-type: application/vnd.ms-excel;charset=utf-8');
	header("Content-Disposition: attachment; filename=Reporte Comedor - ".get_mes($_GET['mes']).".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	include "conexion.php";
		
	
	
	$consulta = "SELECT historial.id_historial,usuarios.id_user,usuarios.tipo,montos.tipo,montos.monto,usuarios.nombre, historial.fecha from historial,usuarios,montos where historial.id_user_h = usuarios.id_user and usuarios.tipo = montos.tipo and
	MONTH(historial.fecha) = '".$_GET['mes']."' ORDER BY  historial.fecha ";
	$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
		function opt_tipo($tipo){
					if($tipo == 1){
						return "Estudiante Regular";
					 } if($tipo == 2){
						return "Profesor";
					 } if($tipo == 3){
						return "Estudiante Becado";
					 } if($tipo == 0){
						return "ADMINISTRADOR";
					 }
		}
		$print = "<h1>Reporte mes de ".get_mes($_GET['mes'])."</h1>";
		
			$print .= "<table>";
			
			$print .= "<tr>";
			$print .= "<td><b>NOMBRE<b></td>";
			$print .= "<td><b>TIPO<b></td>";
			$print .= "<td><b>MONTO<b></td>";
			$print .= "<td><b>FECHA<b></td>";
			$print .= "</tr>";		
		while ($rowEmp = mysql_fetch_assoc($resultado)){
			$print .= "<tr>";
			$print .= "<td>".$rowEmp['nombre']."</td>";
			$print .= "<td>".opt_tipo($rowEmp['tipo'])."</td>";
			$print .= "<td>".$rowEmp['monto']."</td>";
			$print .= "<td>".$rowEmp['fecha']."</td>";
			$print .= "</tr>";		
		}
		$print .= "</table>";
		echo $print;
?>