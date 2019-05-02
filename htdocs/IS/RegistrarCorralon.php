<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Registrar corralón</title> 
		<link rel="stylesheet" href = "estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <style type="text/css">
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

		<h1 class=  "form-titulo"><b>Registrar corralón</b></h1>
		<center>
			<nav>
				<a href="inicio.html">Inicio</a>
				<a href="altasE.html">Alta de vehículo</a>
				<a href="bajas.html">Bajas</a>
				<a href="consultas.html">Consultas</a>
				<a href="cambios">Cambios</a>
			</nav>
		</center>
		<br>

	<form action = "corralon.php" type="submin" method = "post" class = "form-register">
		<section>
		<div class = "medicamento-inputs" id= "header">
			<span>
                <label class="input-48">Identificador</label><label class="input-48">Teléfono</label><br>
                    <input type = "text" name = "ident" class = "input-48" placeholder = "Identificador" required/>
                    <input type = "text" name = "tel" class = "input-48" placeholder = "Teléfono" required />
            </span>
            <br><br>
            <span>
              <label><b>Persona a cargo:</b></label><br>
            	 <label class="input-48">Nombre(s)</label><label class="input-48">Apellido paterno</label><br>
                    <input type = "text" name = "nom" class = "input-48" placeholder = "Nombre(s)" required/>
                    <input type = "text" name = "app" class = "input-48" placeholder = "Apellido paterno" required/><br>
            </span>
             <br><br>
            <span>
                <label class="input-48">Apellido materno</label><br>
                    <input type = "text" name = "apm" class = "input-48" placeholder = "Apellido materno" required/><br>
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class="input-48">Estado</label><label class="input-48">Municipio</label><br>
            		<select name="estado" class="input-48" required/>
          				<option value="CDMX">Ciudad de México</option>
          				<option value="Guanajuato">Guanajuato</option>
          				<option value="Hidalgo">Hidalgo</option>
          				<option value="México">México</option>
          				<option value="Michoacán">Michoacán</option>
          				<option value="Morelos">Morelos</option>
          				<option value="Puebla">Puebla</option>
          				<option value="Querétaro">Querétaro</option>
          				<option value="Tlaxcala">Tlaxcala</option>
        			</select>
                    <input type = "text" name = "municipio" class = "input-48" placeholder = "Municipio" required />
            </span>
             <br><br>
            <span>
            	<label class="input-48">Colonia</label><label class="input-48">Calle</label><br>
            		<input type = "text" name = "colonia" class = "input-48" placeholder = "Colonia" required/>
                    <input type = "text" name = "calle" class = "input-48" placeholder = "Calle" required />
            </span>
             <br><br>
            <span>
            	<label class="input-48">Número exterior</label><label class="input-48">Número interior</label><br>
            		<input type = "number"  min="0" name = "exterior" class = "input-48" placeholder = "Número exterior" required/>
                    <input type = "number" value=0 min="0" name = "interior" class = "input-48" placeholder = "Número interior" />
            </span>
             <br><br>
            <span>
            	<label class="input-48">Código postal</label><br>
            		<input pattern="[0-9][0-9][0-9][0-9][0-9]" type = "text" name = "cp" size="5" class = "input-48" placeholder = "Código postal" required/>
            </span>
             <br><br>
             <a href="inicio.html"><input type="button" value="Regresar" class="btn-agregar"></a>
				<input type = "submit" value = "Registrar" class = "btn-agregar" required/>
        </div>
		</section>
	</form>
	</body>
</html>
