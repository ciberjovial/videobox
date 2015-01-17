<?
session_start(); 

if(!isset($_SESSION['usuario']))
{
	$mensaje="Usted no se ha Autentificado.";
	header("location:login.php?msg=$mensaje");
	die();
}
$user=strtoupper($_SESSION['usuario']);
$idd=$_SESSION['codigo'];

include("funciones.php");
include("html.php"); 
head();
menu();

?>

<div id="main">	
<?php
comprobar_secion();
$id=$_GET['msg'];

session_start();
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

?>	
<?php 
if($carro){
?>
</center>
<div class="box">   

<table class="mtable">
	<tr>
		<th class="first"><strong>ID</strong></th>
		<th>Nombre</th>
		<th>Precio</th>
		<th colspan="2" align="center">Cantidad de Unidades</th>
    	<th>Borrar</th>
   		<th>Actualizar</th>
	</tr>
 <?php
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  $suma=0;
   $j=1;
   foreach($carro as $k => $v){
   $subto=$v['cantidad']*$v['precio'];
   $suma=$suma+$subto;
   $contador++;
  
    ?>
  <form name="a<?php echo $v['identificador'] ?>" method="post" action="agregarcesta.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
    <tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'> 
	<td><?php echo $v['id'] ?><?php $x[$j]=$v['id'];?></td>
	
      <td><?php echo $v['producto'] ?></td>
      <td><?php echo $v['precio'] ?></td>
	  
	   
      <td width="43" align="center"><?php echo $v['cantidad'] ?><?php  $y[$j]=$v['cantidad'];?></td>
	  
      <td width="136" align="center"> 
        <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="8">
        <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>
      <td align="center"><a href="borrarcesta.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>"><img src="css/borrar.gif" border="0"></a></td>
      <td align="center"> 
        <input name="imageField" type="image" src="css/refrescar.png" border="0"></td>

  </tr></form>
  
  <?php $j=$j+1; }?>
</table>
<form name="a" action="comprar.php" method="get" enctype="multipart/form-data">

<div align="center"><span class="prod">Total de Artículos: <?php echo count($carro); ?></span> 
</div><br>
<div align="center"><span class="prod">Total: S/. <?php echo number_format($suma,2); ?></span> 
</div><br>
<div align="center"><span class="prod">Continuar la selección de productos</span> 
  <a href="index.php?<?php echo SID;?>"><img src="css/icon/continuar.gif" border="0"></a> 
</div>
Elija el Tipo de Pago:<br />
<table class="mitabla">
<tr>
	<th >Tarjeta de Crédito o Débito</th>
	<th >Contra Reembolso</th>
	<th >Transferencia Bancaria</th>
</tr>
<tr>
	<td ><input type=radio name=pago value=Tarjeta checked="checked"><img src="css/tarjeta.gif" /></td>
	<td ><input type=radio name=pago value=Reembolso ><img src="css/reembolso.gif" /></td>
	<td ><input type=radio name=pago value=Transferencia><img src="css/transferencia.gif" /></td>
</tr>
</table>
<? for ($h=1;$h<=count($carro);$h++)
{ ?>
	<input type="hidden" name="x<?php  echo $h?>" value="<?php  echo $x[$h];?>" >
	<input type="hidden" name="y<?php  echo $h?>" value="<?php  echo $y[$h];?>" >
<? } ?>
<input name="n" type="hidden" value="<?php  echo count($carro);?>" >
<input name="total" type="hidden" value="<?php  echo number_format($suma,2);?>" >
<input class="button" type="submit" value="Realizar Compra"/>
</form>
 
<?php }else{ ?>
<p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="index.php?<?php echo SID;?>"><br><img src="css/icon/continuar.gif" width="13" height="13" border="0"></a> 
  <?php }?>
</p>


</table> 
</div>
</div>
<?php	
 
?>
</div>
<?php
footer();
?>
