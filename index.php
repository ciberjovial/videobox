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
<h3>Lista Inicial</h3>   
<p><br />
  <?
conectar();
$consulta=mysql_query("SELECT id, titulo, sinopsis from pelicula")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());


?>
</p>

<?
while ($r = mysql_fetch_assoc($consulta)) {
	$idpelicula = $r['id'];
?>
<form action="detalle_pelicula.php" method="post" enctype="application/x-www-form-urlencoded" name="pelidet" target="_self" id="pelidet">
  <table width="852" border="0" cellspacing="1">
    <tr>
      <td width="184" rowspan="3"><img src="css/boxbg.jpg" alt="" width="50" height="46" /></td>
      <td width="661">Titulo: <?php echo $r['titulo']; ?></td>
    </tr>
    <tr>
      <td><p>Sinopsis:</p>
        
        <?php echo $r['sinopsis']; ?>
        </td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="verdetalle" id="verdetalle" value="Ver Detalle &gt;&gt;" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?
  echo "<input type=\"hidden\" name=\"idpelicula\" value=" . $idpelicula . " />";
   ?>
</form>
  <?
   }
  ?>
  
<p>&nbsp; </p>
<center><img src="css/colabora.jpg" /></center></div>
</div>
</div>
<?php
footer();
?>
