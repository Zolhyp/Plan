<?php 
	session_start();
	if($_SESSION['nombre']) {

	} else {
	    header("Location: ../index.php"); 
	}
?>
<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Consulta de aseguradoras</title> 
		<link rel="stylesheet" href = "../css/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <style type="../css/text/css">
			tab{padding-left: 15em}
			tab2{padding-left: 8.2em}
			tab3{padding-left: 8.4em}
			tab4{padding-left: 34.5em}
			tab5{padding-left: 31em}
			tab6{padding-left: 40em}
			tab7{padding-left: 41em}
			tab8{padding-left: 8em}
			tab9{padding-left: 38em}
		</style>
   
	</head>
	<body>

		<h1 class=  "form-titulo"><b>Consulta de aseguradoras</b></h1>
		<center>
		</center>
		<br>

		<section>
		<div class = "medicamento-inputs" id= "header">
				<div class="contenedor-inputs">

			<div class="form-1-2">
				<label for="caja_busqueda">Buscar:</label><br>
				<input type="text" name="caja_busqueda" id="caja_busqueda"></input>
			</div>

			<div id="datos">
			</div>
			</div>
			</div>
		</section>
<br>
		<center>
			<a href="../inicio.php"><input type="button" value="Regresar" class="btn-agregar"></a>
			</center>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>
