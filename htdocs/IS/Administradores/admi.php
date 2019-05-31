<?php
	header("Content-Type: text/html;charset=utf-8");
	$opcion=$_POST['bot'];
	$curp=$_POST['curp'];
	$indice=$opcion[0]-1;

	if($opcion[1] == 0){
		$mysqli = new mysqli("localhost","root","root","SRB");
		$query="select * from actor where curp = '".$curp[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$nom=utf8_encode($fila['nombre']);
			$curp=$fila['curp'];
			$app=utf8_encode($fila['app']);
			$apm=utf8_encode($fila['apm']);
			$edad=$fila['edad'];
			$tel=$fila['tel'];
			$estado=utf8_encode($fila['estado']);
			$municipio=utf8_encode($fila['municipio']);
			$colonia=utf8_encode($fila['colonia']);
			$calle=utf8_encode($fila['calle']);
			$nexterior=$fila['nexterior'];
			$ninterior=$fila['ninterior'];
			$cp=$fila['cp'];
			$corralon=$fila['idCorralon'];
		#echo $fila['nombre'];
		}

		echo "<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Consultar datos administrador</title> 
		<link rel='stylesheet' href = '../css/estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        <style type='../css/text/css'>
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

		<h1 class=  'form-titulo'><b>Consultar datos administrador</b></h1>
		<br>

	
		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>CURP</label><label class='input-48'>Nombre(s)</label><br>
                    <input type = 'text' name = 'curp' class = 'input-48' placeholder = 'CURP' value = '".$curp."' readonly='readonly' required/>
                    <input type = 'text' name = 'nombre' class = 'input-48' placeholder = 'Nombre'value = '".$nom."' readonly='readonly' required />
            </span>
            <br><br>
            <span>
            	 <label class='input-48'>Apellido paterno</label><label class='input-48'>Apellido materno</label><br>
                    <input type = 'text' name = 'app' class = 'input-48' placeholder = 'Apellido paterno' value = '".$app."' readonly='readonly' required/>
                    <input type = 'text' name = 'apm' class = 'input-48' placeholder = 'Apellido materno' value = '".$apm."' readonly='readonly' required/><br>
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Edad</label><label class='input-48'>Teléfono</label><br>
                    <input type = 'number' min=0 name = 'edad' class = 'input-48' placeholder = 'Edad' value = '".$edad."' readonly='readonly' required/>
                    <input type = 'text' name = 'tel' class = 'input-48' placeholder = 'Teléfono' value = '".$tel."' readonly='readonly' required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
          				<option value = '".$estado."' >".$estado."</option>
        			</select>
                    <input type = 'text' name = 'municipio' class = 'input-48' placeholder = 'Municipio' value = '".$municipio."' readonly='readonly' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Colonia</label><label class='input-48'>Calle</label><br>
            		<input type = 'text' name = 'colonia' class = 'input-48' placeholder = 'Colonia' value = '".$colonia."' readonly='readonly' required/>
                    <input type = 'text' name = 'calle' class = 'input-48' placeholder = 'Calle' value = '".$calle."' readonly='readonly' required />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Número exterior</label><label class='input-48'>Número interior</label><br>
            		<input type = 'number'  min='0' name = 'exterior' class = 'input-48' placeholder = 'Número exterior' value = '".$nexterior."' readonly='readonly' required/>
                    <input type = 'number' value=0 min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' value = '".$ninterior."' readonly='readonly' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><label>Id de Corralón</label><br>
            		<input pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' value = '".$cp."' readonly='readonly' required/>
            		<input type = 'text' name = 'corralon' class = 'input-48' placeholder = 'Id de corralón' value = '".$corralon."' readonly='readonly' />
            </span>
             <br><br>
             <center>
             <a href='ConsultaAdministradores.php'><input type='button' value='Regresar' class='btn-agregar'></a>
        	 </center>
        </div>
		</section>
	</body>
</html>";
	}
	else{
		if($opcion[1] == 1){
			header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
			$conexion = mysqli_connect('localhost', 'root', 'root');
	
			$insertar = "DELETE from actor where curp = '".$curp[$indice]."'";
			mysqli_select_db($conexion, 'SRB');
			#echo $insertar;

			$aber= mysqli_query($conexion, $insertar);
			if(!$aber){
				echo'<script type="text/javascript">
        		alert("'."Error".'");
       			</script>';
				header('Refresh: 0.1; URL=ConsultaAdministradores.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaAdministradores.php');

			echo'<script type="text/javascript">
        	alert("'."Eliminación completada".'");
        	</script>';
			}
			
		mysqli_close($conexion);



			}
		else{
			$mysqli = new mysqli("localhost","root","root","SRB");
		$query="select * from actor where curp = '".$curp[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$nom=utf8_encode($fila['nombre']);
			$curp=$fila['curp'];
			$app=utf8_encode($fila['app']);
			$apm=utf8_encode($fila['apm']);
			$edad=$fila['edad'];
			$tel=$fila['tel'];
			$estado=utf8_encode($fila['estado']);
			$municipio=utf8_encode($fila['municipio']);
			$colonia=utf8_encode($fila['colonia']);
			$calle=utf8_encode($fila['calle']);
			$nexterior=$fila['nexterior'];
			$ninterior=$fila['ninterior'];
			$cp=$fila['cp'];
			$corralon=$fila['idCorralon'];
		#echo $fila['nombre'];
		}

		echo "<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Cambiar datos administrador</title> 
		<link rel='stylesheet' href = '../css/estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        <style type='../css/text/css'>
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

		<h1 class=  'form-titulo'><b>Cambiar datos administrador</b></h1>
		
		<br>

	<form action = 'ActualizarAdministrador.php' type='submin' method = 'post' class = 'form-register'>
		<section>
		<div class = 'medicamento-inputs' id= 'header'>
			<span>
                <label class='input-48'>CURP</label><label class='input-48'>Nombre(s)</label><br>
                    <input type = 'text' name = 'curp' class = 'input-48' placeholder = 'CURP' value = '".$curp."' readonly='readonly' required/>
                    <input type = 'text' name = 'nombre' class = 'input-48' placeholder = 'Nombre'value = '".$nom."' required />
            </span>
            <br><br>
            <span>
            	 <label class='input-48'>Apellido paterno</label><label class='input-48'>Apellido materno</label><br>
                    <input type = 'text' name = 'app' class = 'input-48' placeholder = 'Apellido paterno' value = '".$app."' required/>
                    <input type = 'text' name = 'apm' class = 'input-48' placeholder = 'Apellido materno' value = '".$apm."' required/><br>
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Edad</label><label class='input-48'>Teléfono</label><br>
                    <input type = 'number' min=0 name = 'edad' class = 'input-48' placeholder = 'Edad' value = '".$edad."' required/>
                    <input type = 'text' name = 'tel' class = 'input-48' placeholder = 'Teléfono' value = '".$tel."' required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
            	<label class='input-48'>Estado</label><label class='input-48'>Municipio</label><br>
            		<select name='estado' class='input-48' required/>
          				<option value = '".$estado."' >".$estado."</option>
          				<option value='CDMX'>Ciudad de México</option>
          				<option value='Guanajuato'>Guanajuato</option>
          				<option value='Hidalgo'>Hidalgo</option>
          				<option value='México'>México</option>
          				<option value='Michoacán'>Michoacán</option>
          				<option value='Morelos'>Morelos</option>
          				<option value='Puebla'>Puebla</option>
          				<option value='Queretaro'>Querétaro</option>
          				<option value='Tlaxcala'>Tlaxcala</option>
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
                    <input type = 'number' value=0 min='0' name = 'interior' class = 'input-48' placeholder = 'Número interior' value = '".$ninterior."' />
            </span>
             <br><br>
            <span>
            	<label class='input-48'>Código postal</label><label>Id de Corralón</label><br>
            		<input pattern='[0-9][0-9][0-9][0-9][0-9]' type = 'text' name = 'cp' size='5' class = 'input-48' placeholder = 'Código postal' value = '".$cp."' required/>
            		<input type = 'text' name = 'corralon' class = 'input-48' placeholder = 'Id de corralón' value = '".$corralon."' readonly='readonly' />
            </span>
             <br><br>
            
             <a href='ConsultaAdministradores.php'><input type='button' value='Regresar' class='btn-agregar'></a>
        	 <input type = 'submit' value = 'Actualizar' class = 'btn-agregar' required/>
        </div>
		</section>
		</form>
	</body>
</html>";
				}
		}
			
?>


