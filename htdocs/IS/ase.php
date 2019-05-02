<?php
	header("Content-Type: text/html;charset=utf-8");
	$opcion=$_POST['bot'];
	$nombre=$_POST['nombre'];
	$indice=$opcion[0]-1;

	if($opcion[1] == 0){
		$mysqli = new mysqli("localhost","root","root","RB");
		$query="select * from aseguradora where nombre = '".$nombre[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$nom=$fila['nombre'];
			$rfc=$fila['rfc'];
			$rz=$fila['rz'];
			$nconsulta=$fila['nconsulta'];
			$nsiniestro=$fila['nsiniestro'];
			$estado=$fila['estado'];
			$municipio=$fila['municipio'];
			$colonia=$fila['colonia'];
			$calle=utf8_encode($fila['calle']);
			$nexterior=$fila['nexterior'];
			$ninterior=$fila['ninterior'];
			$cp=$fila['cp'];
		#echo $fila['nombre'];
	}

		echo "<!DOCTYPE html>
				<html lang = 'es'>
				<head>
		<meta charset = 'UTF-8'>
		<title>Consulta de datos de aseguradora</title> 
		<link rel='stylesheet' href = 'estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        <style type='text/css'>
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

		<h1 class=  'form-titulo'><b>Consulta de datos de aseguradora</b></h1>
		<center>
			<nav>
				<a href='inicio.html'>Inicio</a>
				<a href='altasE.html'>Alta de vehículo</a>
				<a href='bajas.html'>Bajas</a>
				<a href='consultas.html'>Consultas</a>
				<a href='cambios'>Cambios</a>
			</nav>
		</center>
		<br>


		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>Nombre</label><label class='input-48'>RFC</label><br>
                    <input type = 'text' name = 'nombre' class = 'input-48' placeholder = 'Nombre' value = '".$nom."' readonly='readonly' required/>
                    <input type = 'text' name = 'rfc' class = 'input-48' placeholder = 'RFC' value= '".$rfc."'  readonly='readonly' required />
            </span>
            <br><br>
            <span>
            	 <label class='input-48'>Razón social</label><br>
                    <input type = 'text' name = 'rz' class = 'input-48' placeholder = 'Razón social' value = '".$rz."' readonly='readonly' required/><br>
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número de consulta</label><label class='input-48'>Número en caso de siniestro</label><br>
                    <input type = 'number' name = 'ncons' class = 'input-48' placeholder = 'Número de consulta' value = '".$nconsulta."' readonly='readonly' required/>
                    <input type = 'number' name = 'nsins' class = 'input-48' placeholder = 'Número en caso de siniestro' value = '".$nsiniestro."' readonly='readonly' required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
            		    <option value = '".$estado."'>".$estado."</option>
          				
        			</select>
                    <input type = 'text' name = 'municipio' class = 'input-48' placeholder = 'Municipio' value = '".$municipio."'  readonly='readonly' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Colonia</label><label class='input-48'>Calle</label><br>
            		<input type = 'text' name = 'colonia' class = 'input-48' placeholder = 'Colonia' value = '".$colonia."' readonly='readonly' required/>
                    <input type = 'text' name = 'calle' class = 'input-48' placeholder = 'Calle' value = '".$calle."' required readonly='readonly' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número exterior</label><label class='input-48'>Número interior</label><br>
            		<input type = 'number'  min='0' name = 'exterior' class = 'input-48' placeholder = 'Número exterior' value = '".$nexterior."' readonly='readonly' required/>
                    <input type = 'number' min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' value = '".$ninterior."' readonly='readonly' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><br>
            		<input pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' value = '".$cp."' readonly='readonly' required/>
            </span>
             <br><br>
             <center>
             <a href='ConsultaAseguradoras.html'><input type='button' value='Regresar' class='btn-agregar'></a></center>

        </div>
		</section>
	</body>
</html>
";
	}
	else{
		if($opcion[1] == 1){
			header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
			$conexion = mysqli_connect('localhost', 'root', 'root');
	
			$insertar = "DELETE from aseguradora where nombre = '".$nombre[$indice]."'";
	mysqli_select_db($conexion, 'RB');
			#echo $insertar;

			$aber= mysqli_query($conexion, $insertar);
			if(!$aber){
				echo'<script type="text/javascript">
        		alert("'."Error".'");
       			</script>';
				header('Refresh: 0.1; URL=ConsultaAseguradoras.html');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaAseguradoras.html');

			echo'<script type="text/javascript">
        	alert("'."Eliminación completada".'");
        	</script>';
			}
			
		mysqli_close($conexion);



			}
		else{
			$mysqli = new mysqli("localhost","root","root","RB");
		$query="select * from aseguradora where nombre = '".$nombre[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$nom=$fila['nombre'];
			$rfc=$fila['rfc'];
			$rz=$fila['rz'];
			$nconsulta=$fila['nconsulta'];
			$nsiniestro=$fila['nsiniestro'];
			$estado=$fila['estado'];
			$municipio=$fila['municipio'];
			$colonia=$fila['colonia'];
			$calle=utf8_encode($fila['calle']);
			$nexterior=$fila['nexterior'];
			$ninterior=$fila['ninterior'];
			$cp=$fila['cp'];
		#echo $fila['nombre'];
	}

		echo "<!DOCTYPE html>
				<html lang = 'es'>
				<head>
		<meta charset = 'UTF-8'>
		<title>Cambios de datos aseguradora</title> 
		<link rel='stylesheet' href = 'estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        <style type='text/css'>
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

		<h1 class=  'form-titulo'><b>Cambios de datos aseguradora</b></h1>
		<center>
			<nav>
				<a href='inicio.html'>Inicio</a>
				<a href='altasE.html'>Alta de vehículo</a>
				<a href='bajas.html'>Bajas</a>
				<a href='consultas.html'>Consultas</a>
				<a href='cambios'>Cambios</a>
			</nav>
		</center>
		<br>

	<form action = 'ActualizarAseguradora.php' type='submin' method = 'post' class = 'form-register'>
		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>Nombre</label><label class='input-48'>RFC</label><br>
                    <input type = 'text' name = 'nombre' class = 'input-48' placeholder = 'Nombre' value = '".$nom."' readonly='readonly' required/>
                    <input type = 'text' name = 'rfc' class = 'input-48' placeholder = 'RFC' value= '".$rfc."' required />
            </span>
            <br><br>
            <span>
            	 <label class='input-48'>Razón social</label><br>
                    <input type = 'text' name = 'rz' class = 'input-48' placeholder = 'Razón social' value = '".$rz."' required/><br>
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número de consulta</label><label class='input-48'>Número en caso de siniestro</label><br>
                    <input type = 'number' name = 'ncons' class = 'input-48' placeholder = 'Número de consulta' value = '".$nconsulta."' required/>
                    <input type = 'number' name = 'nsins' class = 'input-48' placeholder = 'Número en caso de siniestro' value = '".$nsiniestro."' required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
            		    <option value = '".$estado."'>".$estado."</option>
          				<option value='Aguascalientes'>Aguascalientes</option>
          				<option value='Baja california'>Baja california</option>
          				<option value='Baja california sur'>Baja california sur</option>
          				<option value='Campeche'>Campeche</option>
          				<option value='Chiapas'>Chiapas</option>
          				<option value='Chihuahua'>Chihuahua</option>
          				<option value='CDMX'>Ciudad de México</option>
          				<option value='Coahuila'>Coahuila</option>
          				<option value='Colima'>Colima</option>
          				<option value='Durango'>Durango</option>
          				<option value='Guanajuato'>Guanajuato</option>
          				<option value='Guerrero'>Guerrero</option>
          				<option value='Hidalgo'>Hidalgo</option>
          				<option value='Jalisco'>Jalisco</option>
          				<option value='Mexico'>México</option>
          				<option value='Michoacan'>Michoacán</option>
          				<option value='Morelos'>Morelos</option>
          				<option value='Nayarit'>Nayarit</option>
          				<option value='Nuevo leon'>Nuevo león</option>
          				<option value='Oaxaca'>Oaxaca</option>
          				<option value='Puebla'>Puebla</option>
          				<option value='Queretaro'>Querétaro</option>
          				<option value='Quintana roo'>Quintana roo</option>
          				<option value='San luis potosi'>San luis potosí</option>
          				<option value='Sinaloa'>Sinaloa</option>
          				<option value='Sonora'>Sonora</option>
          				<option value='Tabasco'>Tabasco</option>
          				<option value='Tamaulipas'>Tamaulipas</option>
          				<option value='Tlaxcala'>Tlaxcala</option>
          				<option value='Veracruz'>Veracruz</option>
          				<option value='Yucatan'>Yucatán</option>
          				<option value='Zacatecas'>Zacatecas</option>
        			</select>
                    <input type = 'text' name = 'municipio' class = 'input-48' placeholder = 'Municipio' value = '".$municipio."' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Colonia</label><label class='input-48'>Calle</label><br>
            		<input type = 'text' name = 'colonia' class = 'input-48' placeholder = 'Colonia' value = '".$colonia."' required/>
                    <input type = 'text' name = 'calle' class = 'input-48' placeholder = 'Calle' value = '".$calle."' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número exterior</label><label class='input-48'>Número interior</label><br>
            		<input type = 'number'  min='0' name = 'exterior' class = 'input-48' placeholder = 'Número exterior' value = '".$nexterior."' required/>
                    <input type = 'number' min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' value = '".$ninterior."' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><br>
            		<input pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' value = '".$cp."' required/>
            </span>
             <br><br>
             <a href='ConsultaAseguradoras.html'><input type='button' value='Regresar' class='btn-agregar'></a>
				<input type = 'submit' value = 'Aceptar' class = 'btn-agregar' required/>
        </div>
		</section>
	</form>
	</body>
</html>
";
				}
		}
			
?>


