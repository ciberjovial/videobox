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

/*$idd=$_GET['msg'];
if(empty($_GET['msg']))
{
	$idd=$_SESSION['cat'];
	//echo(' OJOVACIO: ');echo($_SESSION['cat']);
}
else
{
	$_SESSION['cat']=$idd;
	//echo(' OJOLLENO: ');echo($_SESSION['cat']);
}*/
$idd=1; // ELIMINAR

ob_start("ob_gzhandler");
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//Las funciones ob_start y ob_end_flush te permiten escojer en qué momento enviar el resultado
// de un script al navegador. Si no las utilizamos estamos
//obligados a que nuestra primera línea de código sea session_start() u obtendremos un error
session_start();
//conectamos a la base de datos

?>	

<div class="box">
<?php
conectar();
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;


	if(!$carro || !isset($carro[md5($idd)]['identificador']) || $carro[md5($idd)]['identificador']!=md5($idd)){
	//si el producto no ha sido agregado, mostramos la imagen de no agregado, linkeada
	// a nuestra página de agregar producto y transmitíéndole a dicha
	//página el id del artículo y el identificador de la sesión
	?><a href="agregarcesta.php?<?php echo SID ?>&id=<?php echo $idd; ?>"><img src="css/productonoagregado.gif" border="0" title="Agregar a la Cesta"></a><?php }
	else
	//en caso contrario mostramos la otra imagen linkeada., a la página que sirve para borrar el artículo del carro.
	{?><a href="borrarcesta.php?<?php echo SID ?>&id=<?php echo $idd; ?>"><img src="css/productoagregado.gif" border="0" title="Quitar del Cesto"></a><?php } ?></td>
	


</div>

</div>
<?php
ob_end_flush();
footer();
?>
