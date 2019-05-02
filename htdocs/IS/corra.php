<?php
	header("Content-Type: text/html;charset=utf-8");
	$opcion=$_POST['bot'];
	$id=$_POST['id'];
	$indice=$opcion[0]-1;

	if($opcion[1] == 0){
		$mysqli = new mysqli("localhost","root","root","RB");
		$query="select * from corralon where id = '".$id[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$id= utf8_encode($fila['id']);
			$nombre= utf8_encode($fila['nombre']);
			$apm= utf8_encode($fila['apm']);
			$app= utf8_encode($fila['app']);
			$tel= $fila['tel'];
			$estado= utf8_encode($fila['estado']);
			$municipio= utf8_encode($fila['municipio']);
			$colonia= utf8_encode($fila['colonia']);
			$calle= utf8_encode($fila['calle']);
			$nexterior= $fila['nexterior'];
			$ninterior= $fila['ninterior'];
			$cp= $fila['cp'];
		#echo $fila['nombre'];
	}

		echo "<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Registrar corralón</title> 
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

		<h1 class=  'form-titulo'><b>Consulta datos de corralón</b></h1>
		<br>

	<form action = '' type='submin' method = 'post' class = 'form-register'>
		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>Identificador</label><label class='input-48'>Teléfono</label><br>
                    <input type = 'text' value='".$id."' name = 'ident' class = 'input-48' placeholder = 'Identificador' required readonly='readonly'/>
                    <input value=".$tel." readonly='readonly' type = 'text' name = 'tel' class = 'input-48' placeholder = 'Teléfono' required />
            </span>
            <br><br>
            <span>
              <label><b>Persona a cargo:</b></label><br>
            	 <label class='input-48'>Nombre(s)</label><label class='input-48'>Apellido paterno</label><br>
                    <input type = 'text' value='".$nombre."' name = 'nom' class = 'input-48' placeholder = 'Nombre(s)' readonly='readonly' required/>
                    <input value='".$app."' type = 'text' name = 'app' class = 'input-48' readonly='readonly' placeholder = 'Apellido paterno' required/><br>
            </span>
             <br><br>
            <span>
                <label class='input-48'>Apellido materno</label><br>
                    <input readonly='readonly' value='".$apm."' type = 'text' name = 'apm' class = 'input-48' placeholder = 'Apellido materno' required/><br>
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
            			<option value='".$estado."'>".$estado."</option>
        			</select>
                    <input readonly='readonly' type = 'text' value='".$municipio."' name = 'municipio' class = 'input-48' placeholder = 'Municipio' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Colonia</label><label class='input-48'>Calle</label><br>
            		<input value='".$colonia."' readonly='readonly' type = 'text' name = 'colonia' class = 'input-48' placeholder = 'Colonia' required/>
                    <input value='".$calle."' readonly='readonly' type = 'text' name = 'calle' class = 'input-48' placeholder = 'Calle' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número exterior</label><label class='input-48'>Número interior</label><br>
            		<input value=".$nexterior." readonly='readonly' type = 'number'  min='0' name = 'exterior' class = 'input-48' placeholder = 'Número exterior' required/>
                    <input value=".$ninterior." readonly='readonly' type = 'number' min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><br>
            		<input value='".$cp."' readonly='readonly' pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' required/>
            </span>
             <br><br>
             <center>
             <a href='ConsultaCorralones.html'><input type='button' value='Regresar' class='btn-agregar'></a>
             </center>
        </div>
		</section>
	</form>
	</body>
</html>
";
	}
	else{
		if($opcion[1] == 1){
			header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
			$conexion = mysqli_connect('localhost', 'root', 'root');
	
			$insertar = "DELETE from corralon where id = '".$id[$indice]."'";
	mysqli_select_db($conexion, 'RB');
			#echo $insertar;

			$aber= mysqli_query($conexion, $insertar);
			if(!$aber){
				echo'<script type="text/javascript">
        		alert("'."Error".'");
       			</script>';
				header('Refresh: 0.1; URL=ConsultaCorralones.html');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaCorralones.html');

			echo'<script type="text/javascript">
        	alert("'."Eliminación completada".'");
        	</script>';
			}
			
		mysqli_close($conexion);



			}


		else{$mysqli = new mysqli("localhost","root","root","RB");
		$query="select * from corralon where id = '".$id[$indice]."'";
		$resultado = $mysqli->query($query);
			
		while($fila = $resultado->fetch_assoc()){
			$id= utf8_encode($fila['id']);
			$nombre= utf8_encode($fila['nombre']);
			$apm= utf8_encode($fila['apm']);
			$app= utf8_encode($fila['app']);
			$tel= $fila['tel'];
			$estado= utf8_encode($fila['estado']);
			$municipio= utf8_encode($fila['municipio']);
			$colonia= utf8_encode($fila['colonia']);
			$calle= utf8_encode($fila['calle']);
			$nexterior= $fila['nexterior'];
			$ninterior= $fila['ninterior'];
			$cp= $fila['cp'];
		#echo $fila['nombre'];
	}

		echo "<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Actualizar datos de corralón</title> 
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

		<h1 class=  'form-titulo'><b>Actualizar datos de corralón</b></h1>
		<br>

	<form action = 'ActualizarCorralon.php' type='submin' method = 'post' class = 'form-register'>
		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>Identificador</label><label class='input-48'>Teléfono</label><br>
                    <input value=".$id." type = 'text' name = 'ident' class = 'input-48' placeholder = 'Identificador' required/>
                    <input value='".$tel."' type = 'text' name = 'tel' class = 'input-48' placeholder = 'Teléfono' required />
            </span>
            <br><br>
            <span>
              <label><b>Persona a cargo:</b></label><br>
            	 <label class='input-48'>Nombre(s)</label><label class='input-48'>Apellido paterno</label><br>
                    <input value='".$nombre."' type = 'text' name = 'nom' class = 'input-48' placeholder = 'Nombre(s)' required/>
                    <input value='".$app."' type = 'text' name = 'app' class = 'input-48' placeholder = 'Apellido paterno' required/><br>
            </span>
             <br><br>
            <span>
                <label class='input-48'>Apellido materno</label><br>
                    <input value='".$apm."' type = 'text' name = 'apm' class = 'input-48' placeholder = 'Apellido materno' required/><br>
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
            			<option value='".$estado."'>".$estado."</option>
          				<option value='CDMX'>Ciudad de México</option>
          				<option value='Guanajuato'>Guanajuato</option>
          				<option value='Hidalgo'>Hidalgo</option>
          				<option value='México'>México</option>
          				<option value='Michoacán'>Michoacán</option>
          				<option value='Morelos'>Morelos</option>
          				<option value='Puebla'>Puebla</option>
          				<option value='Querétaro'>Querétaro</option>
          				<option value='Tlaxcala'>Tlaxcala</option>
        			</select>
                    <input value='".$municipio."' type = 'text' name = 'municipio' class = 'input-48' placeholder = 'Municipio' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Colonia</label><label class='input-48'>Calle</label><br>
            		<input value='".$colonia."' type = 'text' name = 'colonia' class = 'input-48' placeholder = 'Colonia' required/>
                    <input type = 'text' value='".$calle."' name = 'calle' class = 'input-48' placeholder = 'Calle' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número exterior</label><label class='input-48'>Número interior</label><br>
            		<input type = 'number'  value=".$nexterior." min='0' name = 'exterior' class = 'input-48' placeholder = 'Número exterior' required/>
                    <input type = 'number' value=".$ninterior." min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><br>
            		<input pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' value='".$cp."' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' required/>
            </span>
             <br><br>
             <a href='ConsultaCorralones.html'><input type='button' value='Regresar' class='btn-agregar'></a>
				<input type = 'submit' value = 'Actualizar' class = 'btn-agregar' required/>
        </div>
		</section>
	</form>
	</body>
</html>
";
				}
		}
			
?>


