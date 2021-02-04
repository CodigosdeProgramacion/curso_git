<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contacto</title>
	</head>
	<body>
		
		<h1>Contactanos</h1>
		
		<form method="post" action="guarda_contacto.php" autocomplete="off">
			Nombre <input type="text" id="nombre" name="nombre" />
			<br />
			Correo <input type="email" id="correo" name="correo" />
			<br />
			Mensaje <textarea id="mensaje" name="mensaje"></textarea>
			<br />
			<button id="enviar" name="enviar">Enviar</button>
		</form>
		
		<a href="index.html">Regresar</a>
		
	</body>
</html>