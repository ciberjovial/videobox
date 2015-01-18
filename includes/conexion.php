<?php
function conectar()
{
		//mysql_connect("localhost","root","123456");
mysql_connect("localhost","root","13081416");  //lo cambie debido a que mi clave de base de datos es diferente , jimmy
	mysql_select_db("videobox");
}
function desconectar()
{
	mysql_close();
}
?>