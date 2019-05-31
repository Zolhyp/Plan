<?php 
	session_start();
  if($_SESSION['nombre']) {

	} else {
	    header("Location: index.php"); 
	}
?>

<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Registrar aseguradora</title> 
		<link rel="stylesheet" href = "../css/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
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

		<h1 class=  "form-titulo"><b>Registrar aseguradora</b></h1>
		
		<br>

	<form action = "aseguradora.php" type="submin" method = "post" class = "form-register">
		<section>
		<div class = "medicamento-inputs" id= "header">
			<span>
                <label class="input-48">Nombre</label><label class="input-48">RFC</label><br>
                    <input type = "text" name = "nombre" class = "input-48" placeholder = "Nombre" required/>
                    <input type = "text" name = "rfc" class = "input-48" placeholder = "RFC" required />
            </span>
            <br><br>
            <span>
            	 <label class="input-48">Razón social</label><br>
                    <input type = "text" name = "rz" class = "input-48" placeholder = "Razón social" required/><br>
            </span>
             <br><br>
            <span>
            	<label class="input-48">Número de consulta</label><label class="input-48">Número en caso de siniestro</label><br>
                    <input type = "number" name = "ncons" class = "input-48" placeholder = "Número de consulta" required/>
                    <input type = "number" name = "nsins" class = "input-48" placeholder = "Número en caso de siniestro" required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class="input-48">Estado</label><label class="input-48">Municipio</label><br>
            		<select name="estado" class="input-48" required/>
          				<option value="Aguascalientes">Aguascalientes</option>
          				<option value="Baja california">Baja california</option>
          				<option value="Baja california sur">Baja california sur</option>
          				<option value="Campeche">Campeche</option>
          				<option value="Chiapas">Chiapas</option>
          				<option value="Chihuahua">Chihuahua</option>
          				<option value="CDMX">Ciudad de México</option>
          				<option value="Coahuila">Coahuila</option>
          				<option value="Colima">Colima</option>
          				<option value="Durango">Durango</option>
          				<option value="Guanajuato">Guanajuato</option>
          				<option value="Guerrero">Guerrero</option>
          				<option value="Hidalgo">Hidalgo</option>
          				<option value="Jalisco">Jalisco</option>
          				<option value="Mexico">México</option>
          				<option value="Michoacan">Michoacán</option>
          				<option value="Morelos">Morelos</option>
          				<option value="Nayarit">Nayarit</option>
          				<option value="Nuevo leon">Nuevo león</option>
          				<option value="Oaxaca">Oaxaca</option>
          				<option value="Puebla">Puebla</option>
          				<option value="Queretaro">Querétaro</option>
          				<option value="Quintana roo">Quintana roo</option>
          				<option value="San luis potosi">San luis potosí</option>
          				<option value="Sinaloa">Sinaloa</option>
          				<option value="Sonora">Sonora</option>
          				<option value="Tabasco">Tabasco</option>
          				<option value="Tamaulipas">Tamaulipas</option>
          				<option value="Tlaxcala">Tlaxcala</option>
          				<option value="Veracruz">Veracruz</option>
          				<option value="Yucatan">Yucatán</option>
          				<option value="Zacatecas">Zacatecas</option>
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
             <a href="../inicio.php"><input type="button" value="Regresar" class="btn-agregar"></a>
				<input type = "submit" value = "Registrar" class = "btn-agregar" required/>
        </div>
		</section>
	</form>
	</body>
</html>
