<?php
function conectar()
{
	mysql_connect("localhost","root","123456");
	mysql_select_db("videobox");
}
function desconectar()
{
	mysql_close();
}
?>