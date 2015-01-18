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
$idpedido = $_POST["idpedido"];
conectar();
$consulta=mysql_query("SELECT SUM(d.cantidad * d.preciounitario) AS importe,SUM(d.cantidad ) AS cantidad, d.preciounitario, p.titulo,p.duracion,p.imagen from detallepedido d , pelicula p WHERE d.pelicula_id = p.id and d.operacion_id = '".$idpedido."' GROUP BY d.pelicula_id,d.preciounitario
")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
?>
<form action="index.php" method="post"   name="grabarpedido" target="_self">
<table width="800" border="0" cellspacing="4">
 
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">Titulo</th>
    <th scope="col">Duracion</th>
    <th scope="col">Cantidad</th>
    <th scope="col">Precio unitario</th>
    <th scope="col">Importe</th>
  </tr>
<?php
$total = 0;
while ($r = mysql_fetch_assoc($consulta)) {
?>
  <tr align="center">
    <td><img src="img/pelicula/<?php echo $r['imagen'];?>" alt="" width="73" height="123" /></td>
    <td><?php echo $r['titulo']; ?></td>
    <td><?php echo $r['duracion']; ?></td>
    <td><?php echo $r['cantidad']; ?></td>
    <td><?php echo $r['preciounitario']; ?></td>
    <td align="right">S/. <?php echo number_format($r['importe'],2); ?></td>
  </tr>
  <?php
  $total += $r['importe'];
}
?>
<tr align="right">
 <td colspan="6"><b>Total de Pedido: </b>S/. <?php echo number_format($total,2); ?></td>
</tr>
  <?php
    if ($_POST["optx"] == "addpedido"){
		
				 echo "<input type=\"hidden\" name=\"idpedido\" value=" . $idpedido . " />";
		echo "<input type=\"hidden\" name=\"optx\" value=\"savepedido\" />";
		?>
<tr align="right">
 <td colspan="3"> <input name="cerrarventa" type="submit" value="Cerrar Venta" id="cerrarventa"></td>
  <td colspan="3"> <input name="anulaventa" type="submit" value="Anular Venta" id="anulaventa"></td>
</tr>		
		<?php
	}
  ?>
  <?php
    if ($_POST["optx"] == "vispedido"){
		
				 echo "<input type=\"hidden\" name=\"idpedido\" value=" . $idpedido . " />";
		echo "<input type=\"hidden\" name=\"optx\" value=\"savepedido\" />";
		?>
<tr align="right">
 <td colspan="3"> <input name="anulaventa" type="submit" value="Anular Venta" id="anulaventa"></td>
</tr>		
		<?php
	}
  ?>
</table>
</form>
</div>
<?php
footer();
?>
