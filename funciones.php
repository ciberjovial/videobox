<?php
/*****************************************************
	AUTOR		:		Hugo Barraza Vizcarra  
	CONTACTO	:		manuel_brrz@hotmail.com
	VERSION		:      	0.1	
*******************************************************/ 

#------------------------
#Inicio de las funciones usadas
#-----------------------
#Conexion db
#------------------------
include("includes/conexion.php");
#-------------------------
#Fecha
#------------------------
function obtenerfecha()
{
/*EL NUMERO DEL DIA*/
$dia=date("d");

/*OBTENGO EL STRING DEL MES*/
$mes=date("F");
if ($mes=="January") $mes="01"; if ($mes=="February") $mes="02";
if ($mes=="March") $mes="03"; if ($mes=="April") $mes="04";
if ($mes=="May") $mes="05"; if ($mes=="June") $mes="06";
if ($mes=="July") $mes="07"; if ($mes=="August") $mes="08";
if ($mes=="September")$mes="09"; if ($mes=="October") $mes="10";
if ($mes=="November") $mes="11"; if ($mes=="December") $mes="12";

/*FINALMENTE EL AÑO*/
$ano=date("Y");

/*RETORNAMOS LA FECHA ENTERA*/
echo "$ano-$mes-$dia";
}


#-----------------
#Comprobar sesion
#-----------------
function comprobar_secion(){
//if (session_is_registered("valid_user"))
if(!isset($_SESSION['usuario']))
{
		//$url=$direccion_aplicacion.'login';
		//header("location url");
	$mensaje="Usted no se ha Autentidentificado.";
	header("location:login.php?msg=$mensaje");
		die();
}
$user=strtoupper($_SESSION['usuario']);
$idd=$_SESSION['codigo'];
$cargo=$_SESSION['cargo'];
mensaje("Bienvenido <b>$user</b> al Sistema. |<b><a href=\"cerrar.php\"> 
			 Cerrar Sesion</a></b> | <b><a href=\"index.php\">Regresar al Inicio</a></b> | ID:$idd");
}

#--------------
#Validar Email
#--------------
function validar_email($correo){
  if (ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$",$correo))
    return true;
  else 
    return false;
}

#-----------------------------------------
#Realizar el nuevo ingreso de un cliente
#-----------------------------------------
function ingreso_user(){
conectar();
if(!empty($_GET['nomdoc']) && !empty($_GET['condoc']) 
		  ){
	$codemp=$_GET['codemp'];
	$nomdoc=$_GET['nomdoc'];
	$apedoc=$_GET['apedoc'];
	$celdoc=$_GET['celdoc'];
	$cordoc=$_GET['cordoc'];
	$condoc=$_GET['condoc'];
	$paidoc=$_GET['paidoc'];
	$prodoc=$_GET['prodoc'];
	$dirdoc=$_GET['dirdoc'];
	$usedoc=$_GET['usedoc'];

	mysql_query("insert into cliente values ('$codemp','$nomdoc','$apedoc','$cordoc','$paidoc','$prodoc','$dirdoc','$celdoc','$condoc','$usedoc')")or die("<b>Error1. El servidor dijo: </b> " . mysql_error());
	blockquote("ok","Se inserto el nuevo Usuario <b>$usedoc</b> correctamente</b>");
}
else{
	if(empty($_GET['codemp']))
		{
			blockquote("alert","Ingrese todos sus datos porfavor");
		}
		else
		{
			blockquote("error","Ingrese sus datos correctamente");				
		}
	
}
}

function blockquote($est,$msj)
			{
				switch ($est) {
				  case 'alert':
					 echo "<blockquote><p><img style='margin-right: 10px; float:left;' src='css/icon/alert.gif' /> ".$msj."</p></blockquote>";
					 break;
				  case 'error':
					echo "<blockquote class='blockquote_error'><p><img style='margin-right: 10px; float:left;' src='css/icon/error.png' /> ".$msj."</p></blockquote>";
					break;
				  case 'ok':
					echo "<blockquote class='blockquote_ok'><p><img style='margin-right: 10px; float:left;' src='css/icon/ok.gif' /> ".$msj."</p></blockquote>";
					break;
				  default:
					echo "No se que es ".$est;
				} 
			}
#------------------------
#Fin - Funciones
#------------------------
?>