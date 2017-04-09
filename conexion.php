<?php
$host = "localhost";
$contrasena ="";
$usuario = "root";
$base ="comedor";

error_reporting(E_ALL ^ E_DEPRECATED);
/*******************************************/
$base_votaciones = $base;
$conexion = mysql_connect("$host", "$usuario", "$contrasena");
mysql_select_db("$base", $conexion);
$link = mysql_connect("$host","$usuario","$contrasena");
mysql_select_db("$base",$link);	
mysql_query ("SET NAMES 'utf8'");


?>
                            
                            
                            
                            