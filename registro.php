<?php 

include("html.php"); 
include("funciones.php");
head();
menu();
?> 
<div id="main">	
<?php

conectar();
?>	
<div class="box"> 
		<h3> Registrate</h3>
		<blockquote>
			<p><?php ingreso_doctor();
$consulta=mysql_query("select Id from cliente order by Id desc limit 0,1")or die("<b>Error. El servidor dijo: </b> " . mysql_error());
$r=mysql_fetch_array($consulta);
 ?></p>
        </blockquote>
<form  action="registro.php" method="get" enctype="multipart/form-data">
<table class="mitabla">
  <tr>
	<td><label>Codigo de Registro</label></td>
	<td><input  name="codemp" type="text"  value="<? echo($r[0])+1;?>" readonly="readonly"/></td>
  </tr> 
    <tr>
	<td><label>Username</label></td>
	<td><input  name="usedoc" type="text" size="35" /></td>
  </tr>
  <tr>
	<td><label>Nombres</label></td>
	<td><input  name="nomdoc" type="text" size="35" /></td>
  </tr>
  <tr>
	<td><label>Apellidos</label></td>
	<td><input  name="apedoc" type="text" size="40" /></td>
  </tr>
  <tr>
    <td><label>Celular </label></td>
	<td><input  name="celdoc" type="text" size="20" /></td>
  </tr>
  <tr>
	<td><label>Correo electrónico</label></td>
	<td><input  name="cordoc" type="text" size="40" value="@hotmail.com"/></td>
  </tr>
  <tr>
	<td><label>Contraseña (Password) </label></td>
	<td><input  name="condoc" type="password" size="20"/></td>
  </tr>
  <tr>
	<td><label>Pais</label></td>
	<td><input  name="paidoc" type="text" size="40"/></td>
  </tr>
    <tr>
	<td><label>Provincia</label></td>
	<td><input  name="prodoc" type="text" size="40"/></td>
  </tr>
  <tr>
	<td><label>Direccion</label></td>
	<td><input  name="dirdoc" type="text" size="40"/></td>
  </tr>
  </table>
 
	<tr><br/>
	    <br />
	    <input class="button" type="submit" value="Ingresar Doctor"/>
        </p>		
        <br />
    </form>	

</div>
</div>
<?php 
footer();
?>