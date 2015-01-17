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
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
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
<center>
  <img src="img/baner1.jpg" width="785" height="32" />
</center>
</div>
</center>
<div class="box">
<h3>Lista Inicial</h3>   
<p><br />
  <?
conectar();
$consulta=mysql_query("SELECT id, titulo, sinopsis, imagen from pelicula")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());


?>
</p>

<?
while ($r = mysql_fetch_assoc($consulta)) {
	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="594" border="0">
    <tr>
      <td width="88" rowspan="3"> <img src="img/pelicula/<?php echo $r['imagen'];?>" alt="" width="118" height="140" /></td>
      <td width="405">Titulo:<?php echo $r['titulo']; ?></td>
    </tr>
    <tr>
      <td><p>Sinopsis:</p>
        <p>&nbsp;</p>
        <tr><td aling="justify"><?php echo $r['sinopsis']; ?></td></tr>
        </td>
    </tr>
    <tr>
      <td><input type="submit" name="verdetalle" id="verdetalle" value="Ver Detalle >>" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?
  }
  ?>
</form>
<p>&nbsp; </p>
<center><img src="css/colabora.jpg" /></center></div>
</div>
</div>
<?php
footer();
?>
