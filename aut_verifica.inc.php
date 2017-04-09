<?php
error_reporting(0);
session_start();
require("conexion.php");
$redir = "http://".$_SERVER['HTTP_HOST']."/";
$con = new mysqli("$host", "$usuario", "$contrasena", "$base");
if ($con->connect_errno)
{
	echo '<script>location.href = "'.$redir.'?error_login=0"</script>';
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");

if (isset($_POST['user']) && isset($_POST['pass'])) 
{
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pass = md5(mysqli_real_escape_string($con, $_POST['pass']));
	$consulta_sql = "SELECT * FROM usuarios WHERE user= '$user'";
    $consulta = mysqli_query($con, $consulta_sql);
	$usuario_datos = mysqli_fetch_array($consulta);
	if ($usuario_datos['user'] != $user){
		session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=4';</script>";
		exit;
	}
	if ($usuario_datos['pass'] != $pass){
		session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=4';</script>";
		exit;
	}

	if (mysqli_num_rows($consulta) > 0)
    {
				$_SESSION["usuario"]=$usuario_datos['id_user'];
				echo '<script>location.href = "'.$_SERVER['PHP_SELF'].'"</script>';
				echo '<script>location.href = "'.$redir.'?error_login=0"</script>';
    }
    else
    {
			echo "<script languaje='JavaScript'>location.href='$redir?error_login=2';</script>";
			exit;
    }
}else {
	if (!isset($_SESSION['usuario'])){
		session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=5';</script>  Error cod.: 2 - Acceso incorrecto!";
		exit;
	}
}
echo '<script>location.href = "codigo.php"</script>';
?>