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
$n=$_GET["n"]; //cantidad de medicamentos asignados
$total=$_GET["total"]; 
$pago=$_GET["pago"]; 
for ($i=1;$i<=$n;$i++)
{
	$x[$i]=$_GET["x$i"];
	$y[$i]=$_GET["y$i"];
}?>



<div class="box"> 
		<h3> Venta</h3>
		<blockquote>
			<p>La compra se realizó con exito de <?php echo $n; ?> articulos</p>
        </blockquote>
<?
conectar();
$consulta=mysql_query("select Id from pedido order by Id desc limit 0,1")or die("<b>ERROR#1. El servidor dijo: </b> " . mysql_error());
$r=mysql_fetch_array($consulta);
$aa=$r[0]+1;
//$total
$midate = date("Y-m-d H:i:s");
mysql_query("insert into pedido values ('$aa','$idd','','$midate','','0')")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());

conectar();
for ($i=1;$i<=$n;$i++)
{
	$consulta=mysql_query("select Id from detallepedido order by Id desc limit 0,1")or die("<b>ERROR#3.$i. El servidor dijo: </b> " . mysql_error());
	$s=mysql_fetch_array($consulta);
	$bb=$s[0]+1;
	//mysql_query("insert into detallepedido values ('$bb','$y[$i]','$r[0]+1','$x[$i]','','')")or die("<b>ERROR#4.$i. El servidor dijo: </b> " . 
	//mysql_query("insert into detallepedido values ('$bb','$y[$i]','$aa','$x[$i]','','')")or die("<b>ERROR#4.$i. El servidor dijo: </b> " . 
	mysql_query("insert into detallepedido values ('$bb','$y[$i]','$x[$i]','$aa','','".precioalq($x[$i])."')")or die("<b>ERROR#4.$i. El servidor dijo: </b> " . 
	
	mysql_error());
	$t=$t+1;
	
}
unset($_SESSION['carro']);
?>

</div>
</div>
<?php
footer();
?>