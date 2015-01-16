<?
include("funciones.php");
include("html.php"); 
head();
?>
<div id="main">	
<div class="box">
			<h3> Identifiquese</h3>
<?php if(isset($_GET['msg']) && !empty($_GET['msg'])):?>
			
			<blockquote>
				<p><?php echo $_GET['msg']; ?></p>
			</blockquote>
			
		<?php endif; ?>
		<form name="loginform" id="loginform" action="verificar.php" method="post">
		<table class="mitabla">
  		<tr>
			<td><label>Nombre de Usuario</label></td>
			<td><input type="text" name="usuario" id="user_login" class="input" value="" size="20" tabindex="1" /></td>
		</tr>
		<tr>
			<td><label>Clave</label></td>
			<td><input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="2" /></td>
		</tr>
</table>
			<p class="submit">
				<input type="submit" name="login_boton" id="login_boton" class="button-primary" value="Acceder" tabindex="3" />
			</p>
			¿No estas Resistrado?. <a href="registro.php">Registrate</a>			
		</form>
		
		</div>
</div>


<?php
footer();
?>
