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
	conectar();
		$consulta=mysql_query("SELECT id, cliente_id, empleado_id, fecha, estado from pedido WHERE estado != 0")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	?>	
    
  <table width="800" border="0" cellspacing="0">
  <tr>
    <th scope="col" colspan=4>Registro de Ventas</th> 
  </tr>
  <tr>
    <th width="30" height="40" scope="col">Id</th>
    <th width="220" height="40" scope="col">Cliente</th>
    <th width="220" height="40" scope="col">Fecha</th>
    <th width="40" height="40" scope="col">Importe</th>
  </tr>
  <?php
  $totalventa = 0;
  $totalnulos = 0;
  while ($r = mysql_fetch_assoc($consulta)) {
  ?>	
  <form action="vender.php" method="post"   name="enviarpedido" target="_self">
  <tr>
    <td><input name="enviar pedido" type="submit" value="<?php echo $r['id']; ?>" /></td>
    <?php
	if($r['estado'] == 2){
	?>
    <td><span style="color:rgb(204, 0, 0);text-decoration: line-through;"><?php echo nombrecliente($r['cliente_id']); ?></span></td>
    <td><span style="color:rgb(204, 0, 0);text-decoration: line-through;"><?php echo $r['fecha']; ?></span></td>
    <td><span style="color:rgb(204, 0, 0);text-decoration: line-through;">S/. <?php echo number_format(importeb($r['id']),2); ?></span></td>
    <?php
	$totalnulos +=1;
	} else {
	?>
    <td><?php echo nombrecliente($r['cliente_id']); ?></td>
    <td><?php echo $r['fecha']; ?></td>
    <td>S/. <?php echo number_format(importeb($r['id']),2); ?></td>    
     <?php
	 $totalventa += importeb($r['id']);
	echo "<input type=\"hidden\" name=\"optx\" value=\"vispedido\" />";
	}  
	
	?>
  </tr>
      <?php
		 echo "<input type=\"hidden\" name=\"idpedido\" value=" . $r['id'] . " />";
		
		 ?>
  </form>
  <?php
  }
  
  
  ?>	 
     <tr align="center">
     <td height="40" colspan="2">Total anuladas : <?php echo $totalnulos; ?></td>
    <td colspan="2">Monto de venta: S/. <?php echo number_format($totalventa,2); ?></td>
     </tr>
</table>
</div>
<?php
footer();
?>
