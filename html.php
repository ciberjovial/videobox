<?php
function head($estilo="estilo.css")
{
	$tipouser = $_SESSION['tipouser'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="Description" content="Sistema." />
	<meta name="Keywords" content="Sistema" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Author" content="Hugo Barraza Vizcarra- manuel_brrz@hotmail.com" />
	<link rel="stylesheet" href="css/<?php echo $estilo ?>" type="text/css" />
	<title>VIDEOBOX</title>
</head>
<body>
<div id="header">
  <div id="header-content">
	<h1 id="logo-text"><img src="logo.png"><br /><a href="index.php" title=""><span></span></a></h1>
    <h2 id="slogan">ALQUILER Y COMPRA DE VIDEOS</h2>
    <div id="header-links">
<p><a href="index.php">Inicio</a> | <a href="contacto.php">Contacto</a></p>       
    </div>
  </div>
</div>
<div id="nav-wrap">
  <div id="nav">
    <ul>
        <?php 
           if ($tipouser == 2) {
		 ?>
	  <li id="current"><a href="index.php"> INICIO</a></li>
      <li><a href="rptventa.php"> Ver Reporte</a></li>
         <?php 
		   } elseif($tipouser == 3) {
		 ?>
	      <li id="current"><a href="index.php"> INICIO</a></li> 
         <?php 			   
			}else {
			    ?>
               	  <li id="current"><a href="index.php"> INICIO</a></li>
      <li><a href="perfil.php"> Mi Perfil</a></li>
	  <li><a href="nosotros.php"> Nuestro sistema</a></li>
	  <li><a href="vercesta.php"><img src="css/cesta.png" align="absmiddle"/> Mi cesta</a></li>
          <?php  
			   }
		 ?>
    </ul>
  </div>
</div>
<div id="content-wrap">
<div id="content"> 	
<?php
}
function menu($m=1)
{
if($m==0)
{

?>  
 <div id="sidebar" >
      <div class="sep">
      </div>
      <div class="sidebox">
        <h1>Sistema </h1>
        <p></p>
      </div>
 </div>
<?
}
else{
?>
	<div id="sidebar" >
		<div class="sep">
       </div>
        <h1>Generos</h1>
        <div class="sidebox">
        <ul class="sidemenu">
				<img src="css/lado.png" alt="" />
                <?php
                 conectar();
                 $consulta=mysql_query("SELECT id,nombre FROM genero")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
                 while ($r = mysql_fetch_assoc($consulta)) {
				 ?>
                 <li><a href="index.php?idgenero=<?php echo $r['id'];?>">.                   <?php echo $r['nombre'];?></a></li>
                <?php
				 }
				?>
        </div>
		<br />
				
      </div>
<?php
}
}
	
function footer()
{
?>
<p></p>
</div>
</div>
</div>
<span>

<div id="footer-wrap">
  <div id="footer-bottom">
	<p>&copy; 2015 | VIDEOBOX | Todos los derechos reservados</p>
  </div>
  </span>
</div>
</body>
</html>
<?php
}
function mensaje($mensaje="<p>Ingrese sus Nombre de Usuario y Contrase?a Por favor <b><a href=\"../index.php\">Regresar a la Portada</a></b></p>")
{
   	echo $mensaje;
} 

?>