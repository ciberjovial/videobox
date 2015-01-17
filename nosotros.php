<?php 
session_start();
include("html.php"); 
include("funciones.php");
head();
menu();

?> 
<div id="main">	
<?php

?>	
<div class="box"> 
<h3>Nuestro Sistema</h3>

	<p>
		<ul>
			<li>Regístrese como usuario completando los datos solicitados.  Recomendamos utilizar letras y números al ingresar su contraseña.</li>
			<li>Haga su pedido utilizando el "Carro de Pedidos".</li>
			<li>Si ya está registrado sólo necesita ingresar para hacer su pedido.</li>
			<li>Nosotros le llevaremos las películas y productos seleccionados a su domicilio.</li>
			<li>Si prefiere haremos la entrega en su oficina o lugar de trabajo.</li>
	</ul>
</p>
<p>
	<b>COMPRAS:</b><br />
	Toda compra es de acuerdo a los precios que se indican en cada película o producto.  El despacho es gratuito para las zonas que se indican más adelante.
</p>
<p> 
	<b>HORARIOS:</b><br />
	Atendemos en línea por internet las 24 horas.
</p>
<p>
	<b>DESPACHOS:</b><br />
	Los despachos se realizarán dentro de las 72 horas de recibido el pedido, de lunes a viernes en el horario de 3.00 p.m. a 7.00 p.m.
</p>
<p>
	<b>ZONAS DE ATENCION:</b><br />
	Atendemos con delivery los siguientes distritos:  Barranco, Breña, Jesús María, Lince, Magdalena, Miraflores, Pueblo Libre, San Isidro, San Miguel, Surco y Surquillo.<br />

	Si usted reside en otro distrito puede comunicarse con nosotros para coordinar la entrega.<br />

	Puede comunicarse con nosotros por e-mail a: ventas@videobox.com.pe
</p>
		<blockquote>
Todos los derechos reservados | Esta prohibido todo intento de reproducción total o parcial sin autorización de los desarrolladores.
    </blockquote>
</div>
</div>
<?php 
footer();
?>