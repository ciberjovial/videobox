<?php require_once('includes/conexion.php'); ?>
<?php
ob_start();
session_start();
conectar();
$usuario=mysql_real_escape_string(stripslashes($_POST['usuario']));
$pwd=mysql_real_escape_string(stripslashes($_POST['pwd']));
if(isset($usuario) && empty($usuario))
{
	$mensaje="Escriba un nombre usuario";
	header("location:login.php?msg=$mensaje");
	die();
}
if(isset($pwd) && empty($pwd))
{
	$mensaje="Escriba su clave secreta";
	header("location:login.php?msg=$mensaje");
	die();
}
$data=mysql_query("SELECT id,tipo FROM usuario where user='$usuario' and password='$pwd'");
$r=mysql_fetch_array($data);
	if(mysql_num_rows($data) >0){
		$_SESSION['session']=true;
		$_SESSION['usuario']=$usuario;//datos correctos -> logeamos =)
		$_SESSION['codigo']=($r[0]);
		$_SESSION['tipouser']=($r[1]);
		
		$midate = date("Y-m-d H:i:s");
		mysql_query("UPDATE usuario SET lastlogin='$midate' WHERE id='$r[0]'")or die("<b>ERROR#1. El servidor dijo: </b> " . mysql_error());
		header("Location: index.php");
		
		}
	else {
		$mensaje="Los datos ingresados son incorrectos";
		header("location:login.php?msg=$mensaje");
	}
	

desconectar();
ob_end_flush();
?>
