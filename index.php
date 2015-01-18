<?
session_start(); 

$user=strtoupper($_SESSION['usuario']);
$idd=$_SESSION['codigo'];
$add=$_GET['add'];
$tipouser = $_SESSION['tipouser'];
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
</center>
<div class="box">
<?php
if ($tipouser == 2) {  // si el tipo de usuario es cajero
	if ($_POST["optx"] == "savepedido"){
		$idpedido = $_POST["idpedido"];
		//echo $idpedido;
		conectar();
		if ($_POST[cerrarventa]) { 
		    mysql_query("UPDATE pedido SET estado='1', empleado_id='$idd' WHERE id='$idpedido'")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());
		 }
		 
		if ($_POST[anulaventa]) { 
		    mysql_query("UPDATE pedido SET estado='2', empleado_id='$idd' WHERE id='$idpedido'")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());
		 }		 
		//mysql_query("UPDATE pedido SET estado='1' WHERE id='$idpedido'")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());
	}
	conectar();
		$consulta=mysql_query("SELECT id, cliente_id, empleado_id, fecha from pedido WHERE estado = 0")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	?>	
	
    <table width="800" border="0" cellspacing="0">
  <tr>
    <th scope="col" colspan=4>Ventas vigentes</th> 
  </tr>
  <tr>
    <th width="30" height="40" scope="col">Id</th>
    <th width="220" height="40" scope="col">Cliente</th>
    <th width="220" height="40" scope="col">Fecha</th>
    <th width="40" height="40" scope="col">Importe</th>
  </tr>
  <?php
  while ($r = mysql_fetch_assoc($consulta)) {
  ?>	
  <form action="vender.php" method="post"   name="enviarpedido" target="_self">
  <tr>
    <td><input name="enviar pedido" type="submit" value="<?php echo $r['id']; ?>" /></td>
    <td><?php echo nombrecliente($r['cliente_id']); ?></td>
    <td><?php echo $r['fecha']; ?></td>
    <td>S/. <?php echo number_format(importeb($r['id']),2); ?></td>
  </tr>
      <?php
		 echo "<input type=\"hidden\" name=\"idpedido\" value=" . $r['id'] . " />";
		echo "<input type=\"hidden\" name=\"optx\" value=\"addpedido\" />";
		 ?>
  </form>
  <?php
  }
  ?>	  
</table>

	<?php

	 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
} 
elseif($tipouser == 3) {  //si fuera administrador
	if ($_POST[insertuser]) { 
	$nuser = $_POST["nuser"];
	$idusuario = $_POST["idusuario"];
	$nombreuser = $_POST["nombreuser"];
	$apellidouser = $_POST["apellidouser"];
	$passworduser = $_POST["passworduser"];
	$emailuser =  $_POST["emailuser"];
	conectar();
	
	if(!empty($nuser) && !empty($passworduser)) {
			    mysql_query("INSERT INTO usuario (user, nombre, apellido,password,email,estado,tipo)
VALUES ('$nuser', '$nombreuser', '$apellidouser','$passworduser','$emailuser','1','2')")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());
	}
	

	
	
	}
	
	
	
	
	if ($_POST[editaruser]) { 
	$idusuario = $_POST["idusuario"];
	$nombreuser = $_POST["nombreuser"];
	$apellidouser = $_POST["apellidouser"];
	$passworduser = $_POST["passworduser"];
	$emailuser =  $_POST["emailuser"];
	
	conectar();
	    mysql_query("UPDATE usuario SET nombre='$nombreuser', apellido='$apellidouser', email = '$emailuser', `password` = '$passworduser' WHERE id='$idusuario'")or die("<b>ERROR#2. El servidor dijo: </b> " . mysql_error());
	}
	
	
	?>	
	<table width="800" border="0" cellspacing="4">
  <tr align="center">
    <th height="33" colspan="5" scope="col"><a href="usuarios.php?&optx=addd">Ingresar nuevo usuario</a></th> 
  </tr>
  <tr>
    <th height="27" scope="col">Usuario</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th scope="col">Estado</th>
    <th scope="col">Perfil</th>
  </tr>
  <?php
  $estado = array('0'=>"Inactivo",'1'=>"Activo");
  $perfil = array('0'=>"Administrador",'1'=>"Cliente",'2'=>"Cajero");
  conectar();
  $consulta=mysql_query("SELECT id,tipo,nombre,apellido,`user`,estado FROM usuario WHERE tipo != 1")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
  
  while ($r = mysql_fetch_assoc($consulta)) {
  ?>	
  <tr>
    <td><a href="usuarios.php?&optx=edit&idusuario=<?php echo $r['id'];?>"><?php echo $r['user']; ?></a></td>
    <td><?php echo $r['nombre']; ?></td>
    <td><?php echo $r['apellido']; ?></td>
    <td><?php echo ($estado[$r['estado']]); ?></td>
    <td><?php echo $perfil[$r['tipo']]; ?></td>
  </tr>
   <?php
  }
   ?>	
</table>

	 <?php
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

else {     // si el usuario no es cajero

?>	

  <?
conectar();
if (isset($_GET['idgenero'])){
	 
	 
	$consulta=mysql_query("SELECT id, titulo, sinopsis, imagen from pelicula where genero_id='".$_GET['idgenero']."'")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	
	?>
    <h1><b><?php echo nombregenero($_GET['idgenero']); ?></b></h1>
<?
	} else {
		$consulta=mysql_query("SELECT id, titulo, sinopsis, imagen from pelicula")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
		}

?>
<?
while ($r = mysql_fetch_assoc($consulta)) {
	$idpelicula = $r['id'];
?>
<form action="detalle_pelicula.php" method="get" enctype="application/x-www-form-urlencoded">
  <table width="100%" border="0" cellspacing="1">
    <tr>
      <td width="140" rowspan="3"><img src="img/pelicula/<?php echo $r['imagen'];?>" alt="" width="118" height="170" /></td>
      <td><b>Titulo: <?php echo $r['titulo']; ?></b> </td>
    </tr>
    <tr>
      <td align="justify"><br />Sinopsis: <br /><br />
        <?php echo $r['sinopsis']; ?><br /><br />
      </td>
    </tr>
    <tr>
      <td align="right"><input class="button" type="submit" value="Ver Detalle &gt;&gt;" /></td>
    </tr>
  </table>
  
  <?
  echo "<input type=\"hidden\" name=\"idpelicula\" value=" . $idpelicula . " />";
   ?>
</form>
  <?
   }
  ?>
  
<?php

} // fin de condicion de tipo de usuario
?>	  
  
</div>
</div>
</div>
<?php
footer();
?>
