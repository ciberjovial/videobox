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
<?php  
$idpelicula  = $_POST['idpelicula'];
conectar();
$consulta=mysql_query("SELECT titulo, sinopsis , anio, duracion, stock, precioven, caracteristica, director_id, genero_id, imagen, ranking, nivel from pelicula WHERE id = '".$idpelicula."'")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
$r=mysql_fetch_array($consulta);
?>
<h3>id: <?php echo $idpelicula; ?></h3>
<form name="form1" method="post" action="">
  <table width="919" border="0" cellpadding="5" cellspacing="10">
    <tr>
      //<td width="107" rowspan="10"><img src="img/pelicula/<?php echo $r['imagen'];?>" alt="" width="118" height="140" /></td>
      
      <td width="178">Titulo <?php echo htmlentities("Español", ENT_QUOTES,'UTF-8'); ?> </td>
      <td width="281"><?php echo $r[0]; ?></td>
    </tr>
    <tr>
      <td>Titulo Ingles </td>
      <td><?php echo $r['titulo']; ?></td>
    </tr>
    <tr>
      <td>Genero</td>
      <td><?php echo nombregenero($r['genero_id']); ?></td>
    </tr>
    <tr>
      <td>Actores</td>
      <td> 
      <?php  
	  $consulta1 = mysql_query("SELECT detpel.actor_id, a.nombre,a.apellido from detallepelicula detpel, actor a WHERE detpel.actor_id = a.id and detpel.pelicula_id = '".$idpelicula."'")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	  while ($r1 = mysql_fetch_assoc($consulta1)) {
		  echo $r1['nombre']." ".$r1['apellido'].", ";
	  }
	  ?>
      </td>
    </tr>
    <tr>
      <td>A&ntilde;o</td>
      <td><?php echo $r['anio']; ?></td>
    </tr>
    <tr>
      <td>Duraci&oacute;n</td>
      <td><?php echo $r['duracion']; ?></td>
    </tr>
    <tr>
      <td>Director</td>
      <td><?php echo nombredirector($r['director_id']); ?></td>
    </tr>
    <tr>
      <td>Productor</td>
      <td><?php echo nombredirector($r['director_id']); ?></td>
    </tr>
    <tr>
      <td>Nivel</td>
      <td><?php echo $r['nivel']; ?></td>
    </tr>
    <tr>
      <td>Disponible</td>
      <td><?php echo respdisponible($r['stock']); ?></td>
    </tr>
    <tr>
      <td>Ver lista</td>
      <td>Precio</td>
      <td><?php echo $r['precioven']; ?></td>
    </tr>
    <tr>
      <td rowspan="2">&nbsp;</td>
      <td colspan="2"><p>Sinopsis</p>
        <p><?php echo $r['sinopsis']; ?> </p></td>
    </tr>
    <tr>
      <td height="25" colspan="2"><p>Car&aacute;cteristicas Especiales </p>
        <p><?php echo $r['caracteristica']; ?></p></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
<center><img src="css/colabora.jpg" /></center></div>
</div>
</div>
<?php
footer();
?>
