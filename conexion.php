<?php
function conectar()
{
	mysql_connect("localhost","root","123456");
	mysql_select_db("mydb");
}
function desconectar()
{
	mysql_close();
}
?>