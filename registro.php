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

			<?php ingreso_user();
$consulta=mysql_query("select Id from cliente order by Id desc limit 0,1")or die("<b>ERROR. El servidor dijo: </b> " . mysql_error());
$r=mysql_fetch_array($consulta);
 ?>
<form  action="registro.php" method="get" enctype="multipart/form-data">
<table class="mitabla">
  <tr>
	<td><label>Identificador</label></td>
	<td><input  name="iduser" type="text" size="5" value="<? echo($r[0])+1;?>" readonly="readonly"/></td>
  </tr> 
  <tr>
	<td><label>Username</label></td>
	<td><input  name="username" type="text" /></td>
  </tr>
  <tr>
	<td><label>Contraseña</label></td>
	<td><input  name="passuser" type="password" size="20"/></td>
  </tr>
  <tr>  
	<td><label>Nombres</label></td>
	<td><input  name="nombuser" type="text" size="35" /></td>
  </tr>
  <tr>
	<td><label>Apellidos</label></td>
	<td><input  name="apeluser" type="text" size="35" /></td>
  </tr>
  <tr>
	<td><label>Correo electrónico</label></td>
	<td><input  name="mailuser" type="text" size="35" value="@hotmail.com"/></td>
  </tr>
</table>
 
	<tr><br/>
	    <br />
	    <input class="button" type="submit" value="Guardar"/>
        </p>		
        <br />
    </form>	

</div>
</div>
<?php 
footer();
?>