<?
session_start(); 

$user=strtoupper($_SESSION['usuario']);
$idd=$_SESSION['codigo'];

include("funciones.php");
include("html.php"); 
head();
menu();

?>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<div id="main">	
<?php
if(!isset($_SESSION['usuario']))
{
	mensaje("Bienvenido <b>INVITADO</b> al Sistema. | <b><a href=\"login.php\">Iniciar Sesion</a></b> | <b><a href=\"registro.php\">Registrarse</a></b>");
}
else
{
    mensaje("Bienvenido <b>$user</b> al Sistema. | <b><a href=\"cerrar.php\">Cerrar Sesion</a></b> | <b><a href=\"index.php\">Regresar al Inicio</a></b> | ID:$idd");
}

?>	
<div class="box">
 <?php
 if ($_GET['optx'] == "edit"){
	  
	 $consulta=mysql_query("SELECT nombre,apellido,email,`password` FROM usuario WHERE id = '".$_GET['idusuario']."'")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	$r=mysql_fetch_array($consulta);
	 ?>
     <form action="index.php" method="post" enctype="application/x-www-form-urlencoded" name="edicionusuario" target="_self">
     <table width="800" border="0" cellspacing="4">
  <tr>
    <td width="337">Nombre</td>
    <td width="445">
      <input type="text" name="nombreuser"  value="<? echo $r['nombre'];?>"></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><input type="text" name="apellidouser"  value="<? echo $r['apellido'];?>"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="passworduser"  value="<? echo $r['password'];?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="emailuser"  value="<? echo $r['email'];?>"></td>
  </tr>
  <input name="idusuario" type="hidden" value="<? echo($_GET['idusuario']);?>"/>
  <tr align="center">
  
    <td colspan="2"><input type="submit" name="editaruser" id="editaruser" value="Enviar"></td>
    </tr>
</table>
</form>
	 <?php
	 
	 
	 
	 
	 }
?>
 
 
  <?php
 if ($_GET['optx'] == "addd"){
	 
	 ?>
     <form action="index.php" method="post" enctype="application/x-www-form-urlencoded" name="edicionusuario" target="_self">
     <table width="800" border="0" cellspacing="4">
       <tr>
    <td width="337">Usuario</td>
    <td width="445">
      <input type="text" name="nuser"></td>
  </tr>
  <tr>
    <td width="337">Nombre</td>
    <td width="445">
      <input type="text" name="nombreuser"></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><input type="text" name="apellidouser"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="passworduser"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="emailuser"></td>
  </tr>

  <tr align="center">
  
    <td colspan="2"><input type="submit" name="insertuser" id="insertuser" value="Enviar"></td>
    </tr>
</table>
</form>	 
   <?php
 	 }
?>
 
 
</div>
<?php
footer();
?>
