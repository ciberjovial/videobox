<?php
	session_start();
	$_SESSION['active']=false;
	session_destroy();
	$mensaje="Ahora estas desconectado.";
	header("location:login.php?msg=$mensaje");
?>