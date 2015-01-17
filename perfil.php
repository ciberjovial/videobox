<?php 
session_start(); 
if(!isset($_SESSION['usuario']))
{
	$mensaje="Usted no se ha Autentificado.";
	header("location:login.php?msg=$mensaje");
	die();
}
include("html.php"); 
include("funciones.php");
head();
menu();
?> 
<script src="jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    function numeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " 0123456789";
        especiales = [8,37,39,46];
     
        tecla_especial = false
        for(var i in especiales){
     if(key == especiales[i]){
         tecla_especial = true;
         break;
            }
        }
     
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
            return false;
    }
</script>
<div id="main">	
<?php

conectar();
?>	
<div class="box"> 

			<?php 
			
			
			ingreso_perfil();
$consulta=mysql_query("SELECT u.id , u.nombre, u.apellido, u.user, u.password, u.email, u.estado, c.dni, c.direccion, c.telefono , c.acercade from usuario u, cliente c WHERE u.id=c.id and u.`user` = '".$_SESSION['usuario']."'")or die("<b>ERROR. El servidor dijo: </b> " . mysql_error());
$r=mysql_fetch_array($consulta);

 ?>
<form  action="perfil.php" method="get" enctype="multipart/form-data">
<table class="mitabla">
  <tr>
	<td><label>Identificador</label></td>
	<td><input  name="iduser" type="text" size="5" value="<? echo($r['id']);?>" readonly="readonly"/></td>
  </tr> 
  <tr>
	<td><label>Username</label></td>
	<td><input  name="username" type="text" value="<? echo($r['user']);?>"readonly="readonly" /></td>
  </tr>
  <tr>
	<td><label>Contraseña</label></td>
	<td><input  name="passuser" type="password" size="20" value="<? echo($r['password']);?>"/></td>
  </tr>
  <tr>  
	<td><label>Nombres</label></td>
	<td><input  name="nombuser" type="text" size="35" value="<? echo($r['nombre']);?>"/></td>
  </tr>
  <tr>
	<td><label>Apellidos</label></td>
	<td><input  name="apeluser" type="text" size="35" value="<? echo($r['apellido']);?>" /></td>
  </tr>
  <tr>
	<td><label>Correo electrónico</label></td>
	<td><input  name="mailuser" type="text" size="35" value="<? echo($r['email']);?>"/></td>
  </tr>
  <input name="tipouser" type="hidden" value="1">
  <input name="statuser" type="hidden" value="1">
  <input name="idclie" type="hidden" value="<? echo($r[0])?>"/>

    
  <tr>
	<td><label>DNI</label></td>
	<td><input  name="dni" type="text" size="8" onkeypress="return numeros(event)" value="<? echo($r['dni']);?>"/></td>
  </tr> 
  
  <tr>  
	<td><label>Direccion</label></td>
	<td><input  name="direccion" type="text" size="35" value="<? echo($r['direccion']);?>"/></td>
  </tr>
  <tr>
	<td><label>Telefono</label></td>
	<td><input  name="telefono" type="text" size="10" value="<? echo($r['telefono']);?>"/></td>
  </tr>
  <tr>
	<td><label>Acerca de mi:</label></td>
	<td><input  name="acercade" type="text" size="45" value="<? echo($r['acercade']);?>"/></td>
  </tr>
 
 

  
</table>
 
	<tr><br/>
	    <br />
	    <input class="button" type="submit" value="Actualizar información"/>
        </p>		
        <br />
    </form>	

</div>
</div>
<?php 
footer();


?>