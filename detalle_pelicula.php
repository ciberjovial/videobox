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
    mensaje("Bienvenido <b>$user</b> al Sistema. | <b><a href=\"cerrar.php\">Cerrar Sesion</a></b> | <b><a href=\index.php\">Regresar al Inicio</a></b> | ID:$idd");
}
ob_start("ob_gzhandler");

?>	
<div class="box">
<form>
<?php  
	$idpelicula  = $_GET['idpelicula'];
	if(empty($_GET['idpelicula']))
	{
		$idpelicula=$_SESSION['peli'];
	}
	else
	{
		$_SESSION['peli']=$idpelicula;
	}
	
	
	conectar();
	$consulta=mysql_query("SELECT titulo, sinopsis , anio, duracion, stock, precioven, caracteristica, director_id, genero_id, imagen, ranking, nivel from pelicula WHERE id = '".$idpelicula."'")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	$r=mysql_fetch_array($consulta);
?>
<!-- <h3>id: <?php echo $idpelicula; ?></h3> -->

  <table width="100%"  cellpadding="5" cellspacing="10" class="mtable">
    <tr>
      <td width="150" align="center" rowspan="10"><img width="100%" height="100%" src="img/pelicula/<?php echo $r['imagen'];?>" alt="" width="118" height="140" /></td>
      
      <td width="150"><b>Titulo <?php echo htmlentities("Español", ENT_QUOTES,'UTF-8'); ?> </b></td>
      <td ><?php echo $r[0]; ?></td>
    </tr>
    <tr>
      <td><b>Titulo Ingles</b> </td>
      <td><?php echo $r['titulo']; ?></td>
    </tr>
    <tr>
      <td><b>Genero</b></td>
      <td><?php echo nombregenero($r['genero_id']); ?></td>
    </tr>
    <tr>
      <td><b>Actores</b></td>
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
      <td><b>A&ntilde;o</b></td>
      <td><?php echo $r['anio']; ?></td>
    </tr>
    <tr>
      <td><b>Duraci&oacute;n</b></td>
      <td><?php echo $r['duracion']; ?></td>
    </tr>
    <tr>
      <td><b>Director</b></td>
      <td><?php echo nombredirector($r['director_id']); ?></td>
    </tr>
    <tr>
      <td><b>Productor</b></td>
      <td><?php echo nombredirector($r['director_id']); ?></td>
    </tr>
    <tr>
      <td><b>Nivel</b></td>
      <td><?php echo $r['nivel']; ?></td>
    </tr>
    <tr>
      <td><b>Disponible</b></td>
      <td><?php echo respdisponible($r['stock']); ?></td>
    </tr>
    <tr>
      <td align="center">
	  <!-- AGREGAR O QUITAR DE LA CESTA -->
	  
	  <?php
		if(!isset($_SESSION['usuario']))
	{
		?>Para alquilar<br><b><a href=\"login.php\">Inicie Sesion</a></b>
		<?
	}
	else
	{
		conectar();
		if(isset($_SESSION['carro']))
		$carro=$_SESSION['carro'];else $carro=false;
		if(!$carro || !isset($carro[md5($idpelicula)]['identificador']) || $carro[md5($idpelicula)]['identificador']!=md5($idpelicula)){
		//si el producto no ha sido agregado, mostramos la imagen de no agregado, linkeada
		// a nuestra página de agregar producto y transmitíéndole a dicha
		//página el id del artículo y el identificador de la sesión
		?><a href="agregarcesta.php?<?php echo SID ?>&id=<?php echo $idpelicula; ?>"><img src="css/productonoagregado.gif" border="0" title="(+)"> Agregar a la cesta</a><?php }
		else
		//en caso contrario mostramos la otra imagen linkeada., a la página que sirve para borrar el artículo del carro.
		{?><a href="borrarcesta.php?<?php echo SID ?>&id=<?php echo $idpelicula; ?>"><img src="css/productoagregado.gif" border="0" title="(-)"> Quitar de la cesta</a><?php } 
	} ?>
	    
	  </td>
      <td><b>Precio</b></td>
      <td>S/. <?php echo $r['precioven']; ?></td>
    </tr>
    <tr>
      <td> </td>
      <td colspan="2" align="justify"><br /><b>Sinopsis</b></br> 
        <?php echo $r['sinopsis']; ?> <br /><br />
		</td>
    </tr>
    <tr>
		<td> </td>
      <td colspan="2" align="justify"><br /><b>Car&aacute;cteristicas Especiales</b><br />
      <?php echo $r['caracteristica']; ?><br /><br />
	  </td>
    </tr>
  </table>
</form>
</div>
<?php
footer();
?>
