<?
session_start(); 


$user=strtoupper($_SESSION['usuario']);
$idd=$_SESSION['codigo'];
$add=$_GET['add'];

include("funciones.php");
include("html.php"); 
head();
menu();

?>
<link href="css/estilo_biblioteca.css" rel="stylesheet" type="text/css" />
<div id="main">	
<?php
if(!isset($_SESSION['usuario']))
{
mensaje("Bienvenido INVITADO al Sistema. |<b><a href=\"login.php\"> 
			 Iniciar Sesion</a></b> | <b><a href=\"registro.php\">Registrarse</a></b>");
}
else
{
    mensaje("Bienvenido <b>$user</b> al Sistema. |<b><a href=\"cerrar.php\"> 
			 Cerrar Sesion</a></b> | <b><a href=\index.php\">Regresar al Inicio</a></b> | ID:$idd");
}
?>	
<div class="box">
<center><img src="css/banner.png" /></center>
</div>
</center>
<div class="box">
<h3>Lista Inicial</h3>   <br />
conectar();

<center><img src="css/colabora.jpg" /></center></div>
</div>
</div>
<?php
footer();
?>
