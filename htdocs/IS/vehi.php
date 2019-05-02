<?php
	header("Content-Type: text/html;charset=utf-8");
	$opcion=$_POST['bot'];
	$id=$_POST['id'];
	$indice=$opcion[0]-1;

	if($opcion[1] == 0){
		$mysqli = new mysqli("localhost","root","root","RB");
		$query="select * from vehiculo where id = '".$id[$indice]."'";
		$resultado = $mysqli->query($query);
		while($fila = $resultado->fetch_assoc()){
			$placa=utf8_encode($fila['placa']);
			$tipo=utf8_encode($fila['tipo']);
			$marca=utf8_encode($fila['marca']);
			$submarca=utf8_encode($fila['submarca']);
			$modelo=$fila['modelo'];
			$km=$fila['km'];
			$fechakm=utf8_encode($fila['fechakm']);
			$noseguro=utf8_encode($fila['noseguro']);
			$nombseguro=utf8_encode($fila['nombseguro']);
			$fechaseguro=utf8_encode($fila['fechaseguro']);
			$observaciones=utf8_encode($fila['observaciones']);
			$estado=utf8_encode($fila['estado']);
			$nprovisional=utf8_encode($fila['nprovisional']);
			$idCorralon=utf8_encode($fila['idCorralon']);
			$noeconomico=utf8_encode($fila['noeconomico']);
			$identifica=$fila['id'];
		#echo $fila['nombre'];
		}
		echo "
<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Consulta datos de vehículo</title> 
		<link rel='stylesheet' href = 'estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
            <script src='jquery-1.11.2.js'></script>
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
<script>
     function fetch(){
     var get = document.getElementById('get').value;
     document.getElementById('put').value = get;
 }
    </script>
					<!--<h1>Agregar producto</h1>-->
		<form action = '' type='submin' method = 'post' class = 'form-register'>
               <h1 class= 'form-titulo'><b>Consultar datos de vehículo</b></h1>
              <center>
      <nav>


      </nav></center><br>



               <section>
			<div class = 'medicamento-inputs' id= 'header'>
			
			<p>
				<div class='contenedor-inputs'>
				
                    <label class='input-48'>Tipo de veh&iacute;culo</label><label class='input-48'>Id de Corralón</label><br>
				
                <span>
				<input type = 'text' name = 'tipo' value = '".$tipo."' class = 'input-48' required readonly='readonly'/>
       <select name='corralon' class='corralon' required/>
       <option value = '".$idCorralon."'>".$idCorralon."</option>
                           ";
                            
    echo "</select>
			</span>
				
            
               <span id= 'lot'>";
                         if($tipo!="Carrito"&&$tipo!="Carreta"){
                          echo "<br><br>
                          <label class='input-48'>Tipo de identificador</label><label class='input-48'>Identificador de vehículo</label><br>";
                          if($placa=="NULL"&&$noeconomico=="NULL"&&$nprovisional!="NULL"){
                          	echo "<select name='tipoid' class='input-48' required/>
                          		<option value=2>N&uacutemero provisional</option>
                          	</select>
                          	<input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$nprovisional."' readonly='readonly' required />
                                         <br><br>
                          	";
                          }
                            if($placa=="NULL"&&$noeconomico!="NULL"&&$nprovisional=="NULL"){
                          	echo "<select name='tipoid' class='input-48' required/>
                          		<option value=0>Número económico</option>
                          	</select>
                          	<input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$noeconomico."' readonly='readonly' required />
                                         <br><br>
                          	";
                          }
                            if($placa!="NULL"&&$noeconomico=="NULL"&&$nprovisional=="NULL"){
                          	echo "<select name='tipoid' class='input-48' required/>
                          		<option value=1>Placa</option>
                          	</select>
                        <input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$placa."' readonly='readonly' required />
                                         <br><br>
                          	";
                          }
                          
            
                        }
         
	echo	"</span>";
                
            
          if($tipo!="Carrito"&&$tipo!="Carreta"){

               echo " <span id =nom>
                    <label class='input-48'>Marca</label><label class='input-48'>Submarca</label><br>
                    <select class='input-48' name='marca' id='marca' required/>
                    <option value = '".$marca."'>".$marca."</option>
                    ";
                         
                         
                           echo "
                            </select>
                        <select name='submarca' id='submarca' required/>
                          <option value = '".$submarca."'>".$submarca."</option>
                        </select>
                </span>";
              }
echo "<br><br>";
          if($tipo!="Carrito"&&$tipo!="Carreta"){

                echo "<span id =a>
                    <label class='input-48'>Modelo</label><label class='input-48'>Estado del veh&iacute;culo</label><br>
				<input type = 'number' name = 'modelo' class = 'input-48' min='1950' max='2019' placeholder='Modelo' value = '".$modelo."' pattern='[0-9]*' readonly='readonly' required/>
        <select name='estado' class='input-48' required/>
          <option value='".$estado."'>".$estado."</option>
        </select>
                </span>
                <br><br>";
              }else{
                echo "<label class='input-48'>Estado del veh&iacute;culo</label><br>
                <select name='estado' class='input-48' required/>
          <option value='".$estado."'>".$estado."</option>

        </select>";
              }

echo "<span id =b>";

                          if($tipo!="Carrito"&&$tipo!="Carreta"){
                            echo"
                         <label class='input-48'>Kilometraje recorrido</label><label class='input-48'>Fecha de registro de kilometraje</label><br>
					<input type = 'number' name = 'km' class = 'input-48' placeholder='Kilometraje' value = '".$km."' readonly='readonly' required/>
                         <input type = 'date' name = 'fechakm' placeholder = 'Ultima fecha registrada' min = '2019-02-7' max = '2900-06-25' step = '1' class = 'input-48' value = '".$fechakm."' readonly='readonly' />
                                         <br><br>";
                       }
                       else{

                       }
                       
                echo "</span>";
          if($tipo!="Carrito"&&$tipo!="Carreta"){
            echo "
                <span id= 'lot'>
                     <label class='input-48'>N&uacute;mero de poliza de seguro</label><label class='input-48'>Nombre de la aseguradora</label><br>											
				<input type = 'number' name = 'poliza' placeholder = 'Número de poliza de seguro' class = 'input-48' value = '".$noseguro."' readonly='readonly' />
        <select class='input-48' name='aseguradora' id='aseguradora' required/>
        <option value = '".$nombseguro."'>".$nombseguro."</option>
        ";
                         
                            echo "
                            </select>
                    
               </span>
                <br><br>";
              }
            if($tipo!="Carrito"&&$tipo!="Carreta"){
                echo "
                <span id='f'>
                     <label class='input-48'>Fecha de caducidad del seguro</label><br>
				<input type = 'date' name = 'fechaseg' placeholder = 'Fecha de caducidad del seguro' min = '2019-03-7' max = '2900-06-25' step = '1' class = 'input-48' value = '".$fechaseguro."' readonly= 'readonly' />
                </span>"; 
              }
                echo "
                <br><br>
                <label>Contenedores</label>
                <div class='container'>  
                <div class='form-group'>  
                     <form name='add_name' id='add_name'>  
                          <div class='table-responsive'>  
                              <table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                        <th>Uso del contenedor</th>
                                        <th>Capacidad</th>
                                        <th>Unidad de volumen</th>
                                        <th></th>
                                   </tr>
                                   <tr>";
                            $conexion = new mysqli("localhost","root","root", "RB") or die("No se pudo establecer conexion");
                            $query="SELECT * FROM contenedor WHERE idvehiculo = '".$identifica."'";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                            while ($row = $resultado->fetch_assoc()) {
                              echo "
                              <td><select name='name[]' class='form-control name_list' class='input-20' required>
                              <option value ='".utf8_decode($row['uso'])."'>".utf8_decode($row['uso'])."</option>
                              </td>
                              <td><input type='number' name='name2[]' placeholder='Capacidad' class='form-control name_list' class='input-20' value = '".utf8_decode($row['capacidad'])."' required/></td>
                              <td><select name = 'fpeso[]' class='input-26' >
						              <option value = '".utf8_decode($row['um'])."'>".utf8_decode($row['um'])."</option>
                                  </select></td></tr>
                              ";
                            }
                            mysqli_close($conexion);

                                   echo "  
                              </table>  
                          </div>  
                    </form>  
                </div> 
               </div>
               <center>
               <label>Observaciones</label><br>
               <input type = 'text'  value = '".$observaciones."' readonly='readonly' style='width: 75%; border-style: solid; border-width: 5px; height: 100px;' >

               </textarea><br><br><br>
               </center>
               <center>   
<a href='ConsultaVehiculos.html'><input type='button' value='Regresar' class='btn-agregar'></a>
</center>
               </div></p></div>
          </section>
		</form>

	</body>
</html>";
	}
	else{
		if($opcion[1] == 1){
			header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
			$conexion = mysqli_connect('localhost', 'root', 'root');
	
			$insertar = "DELETE from contenedor where idvehiculo = '".$id[$indice]."'";
	mysqli_select_db($conexion, 'RB');
			#echo $insertar;

			$aber= mysqli_query($conexion, $insertar);
      $insertar = "DELETE from vehiculo where id = '".$id[$indice]."'";
$aber= mysqli_query($conexion, $insertar);
			if(!$aber){
				echo'<script type="text/javascript">
        		alert("'."Error".'");
       			</script>';
				header('Refresh: 0.1; URL=ConsultaVehiculos.html');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaVehiculos.html');

			echo'<script type="text/javascript">
        	alert("'."Eliminación completada".'");
        	</script>';
			}
			
		mysqli_close($conexion);



			}


		else{
		$mysqli = new mysqli("localhost","root","root","RB");
    $query="select * from vehiculo where id = '".$id[$indice]."'";
    $resultado = $mysqli->query($query);
			
		while($fila = $resultado->fetch_assoc()){
			$placa=utf8_encode($fila['placa']);
      $tipo=utf8_encode($fila['tipo']);
      $marca=utf8_encode($fila['marca']);
      $submarca=utf8_encode($fila['submarca']);
      $modelo=$fila['modelo'];
      $km=$fila['km'];
      $fechakm=utf8_encode($fila['fechakm']);
      $noseguro=utf8_encode($fila['noseguro']);
      $nombseguro=utf8_encode($fila['nombseguro']);
      $fechaseguro=utf8_encode($fila['fechaseguro']);
      $observaciones=utf8_encode($fila['observaciones']);
      $estado=utf8_encode($fila['estado']);
      $nprovisional=utf8_encode($fila['nprovisional']);
      $idCorralon=utf8_encode($fila['idCorralon']);
      $noeconomico=utf8_encode($fila['noeconomico']);
      $identifica=$fila['id'];
		#echo $fila['nombre'];
	}

		echo "<!DOCTYPE html>
<html lang = 'es'>
	<head>
		<meta charset = 'UTF-8'>
		<title>Cambiar datos de vehículo</title> 
		<link rel='stylesheet' href = 'estilos.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' /> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
            <script src='jquery-1.11.2.js'></script>
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
    <script language='javascript'>
      $(document).ready(function() {
        $('#marca').change(function (){
          $('#marca option:selected').each(function(){
            var marca=$('#marca').val()
            
            $.post('subm.php', { marca: marca }, function(data){ $('#submarca').html(data);
          });
        });
      })
    });
    
</script>
   
	</head>
	<body>
<script>
     function fetch(){
     var get = document.getElementById('get').value;
     document.getElementById('put').value = get;
 }
    </script>
					<!--<h1>Agregar producto</h1>-->
		<form action = 'ActualizarVehiculo.php' type='submin' method = 'post' class = 'form-register'>
               <h1 class= 'form-titulo'><b>Cambiar datos de vehículo</b></h1>
              <center>
      <nav>


      </nav></center><br>



               <section>
			<div class = 'medicamento-inputs' id= 'header'>
			
			<p>
				<div class='contenedor-inputs'>
				<label>Número</label><br><input type = 'text' name = 'idento' class = 'input-48' required readonly='readonly' value = '".$identifica."' /><br><br>
                    <label class='input-48'>Tipo de veh&iacute;culo</label><label class='input-48'>Id de Corralón</label><br>
				
                <span>
				<input type = 'text' name = 'tipo' class = 'input-48' required readonly='readonly' value = '".$tipo."' />
       <select name='corralon' class='corralon' required/>";

                            $conexion = new mysqli("localhost","root","root", "RB") or die("No se pudo establecer conexion");
                            $query="SELECT id FROM corralon";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                               echo "<option value = '".$idCorralon."'>".$idCorralon."</option>";
                              
                            while ($row = $resultado->fetch_assoc()) {
                              if(utf8_decode($row['id'])!=$idCorralon){
                              echo "<option value = '".utf8_decode($row['id'])."'>".utf8_decode($row['id'])."</option>";}
                            }
                            mysqli_close($conexion);
                            
    echo "</select>
			</span>
				
            
               <span id= 'lot'>";
                         if($tipo!="Carrito"&&$tipo!="Carreta"){
                          echo "                <br><br>
<label class='input-48'>Tipo de identificador</label><label class='input-48'>Identificador de vehículo</label><br>
                           <select name='tipoid' class='input-48' required/>";
                           if($noeconomico!="NULL"){
                            echo "<option value=0>Número económico</option>
                                  <option value=1>Placa</option>
                                  <option value=2>N&uacutemero provisional</option>
                                   </select>
                         <input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$noeconomico."' required />
                          ";
                           }
                           else{
                            if($placa!="NULL"){
                              echo "<option value=1>Placa</option>
                                  <option value=0>Número económico</option>
                                  <option value=2>N&uacutemero provisional</option>
                                   </select>
                         <input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$placa."' required />
                              ";
                            }
                            else{
                               echo "<option value=2>Número provisional</option>
                                  <option value=0>Número económico</option>
                                  <option value=1>Placa</option>
                                   </select>
                         <input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' value = '".$nprovisional."' required />
                              ";
                            }
                           }
                           echo"<br><br>";
                        }
         
	echo	"</span>";
                
            
          if($tipo!="Carrito"&&$tipo!="Carreta"){

               echo " <span id =nom>
                    <label class='input-48'>Marca</label><label class='input-48'>Submarca</label><br>
                    <select class='input-48' name='marca' id='marca' required/>";
                         
                         $conexion = new mysqli("localhost","root","root", "RB") or die("No se pudo establecer conexion");
                            $query="SELECT * FROM marca";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                              echo "<option value = '".$marca."'>".$marca."</option>";
                            while ($row = $resultado->fetch_assoc()) {
                              if(utf8_decode($row['marca'])!=$marca){
                              echo "<option value = '".utf8_decode($row['marca'])."'>".utf8_decode($row['marca'])."</option>";}
                            }
                            mysqli_close($conexion);
                            echo "
                            </select>
                        <select name='submarca' id='submarca' required/>
                          <option value = '".$submarca."' >".$submarca."</option>
                        </select>
                </span>";
              }
echo "<br><br>";
          if($tipo!="Carrito"&&$tipo!="Carreta"){

                echo "<span id =a>
                    <label class='input-48'>Modelo</label><label class='input-48'>Estado del veh&iacute;culo</label><br>
				<input type = 'number' name = 'modelo' class = 'input-48' min='1950' max='2019' placeholder='Modelo' pattern='[0-9]' value = '".$modelo."' required/>
        <select name='estado' class='input-48' required/>";
        if($estado=="activo"){
          echo "
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>";
        }
        else{
          if($estado=="inactivo"){
             echo "
          <option value='inactivo'>Inactivo</option>
          <option value='activo'>Activo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>";
          }
          else{
             echo "
             <option value='reparacion'>Reparaci&oacute;n</option>
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>";
          }
        }
        echo "
        </select>
                </span>
                <br><br>";
              }else{
                echo "<label class='input-48'>Estado del veh&iacute;culo</label><br>
                <select name='estado' class='input-48' required/>";
                if($estado=="activo"){
          echo "
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>";
        }
        else{
          if($estado=="inactivo"){
             echo "
          <option value='inactivo'>Inactivo</option>
          <option value='activo'>Activo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>";
          }
          else{
             echo "
             <option value='reparacion'>Reparaci&oacute;n</option>
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>";
          }
        }
          echo"
        </select>";
              }

echo "<span id =b>";

                          if($tipo!="Carrito"&&$tipo!="Carreta"){
                            echo"
                         <label class='input-48'>Kilometraje recorrido</label><label class='input-48'>Fecha de registro de kilometraje</label><br>
					<input type = 'number' name = 'km' class = 'input-48' placeholder='Kilometraje' value = '".$km."' required/>
                         <input type = 'date' name = 'fechakm' placeholder = 'Ultima fecha registrada' min = '2019-02-7' max = '2900-06-25' step = '1' class = 'input-48' value = '".$fechakm."' required/>
                                         <br><br>";
                       }
                       else{

                       }
                       
                echo "</span>";
          if($tipo!="Carrito"&&$tipo!="Carreta"){
            echo "
                <span id= 'lot'>
                     <label class='input-48'>N&uacute;mero de poliza de seguro</label><label class='input-48'>Nombre de la aseguradora</label><br>											
				<input type = 'number' name = 'poliza' placeholder = 'Número de poliza de seguro' value = '".$noseguro."' class = 'input-48' required/>
        <select class='input-48' name='aseguradora' id='aseguradora' required/>";
                         $conexion = new mysqli("localhost","root","root", "RB") or die("No se pudo establecer conexion");
                            $query="SELECT nombre FROM aseguradora";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                              echo "<option value = '".$nombseguro."'>".$nombseguro."</option>";
                            while ($row = $resultado->fetch_assoc()) {
                              if(utf8_decode($row['nombre'])!=$nombseguro){
                              echo "<option value = '".utf8_decode($row['nombre'])."'>".utf8_decode($row['nombre'])."</option>";}
                            }
                            mysqli_close($conexion);
                            echo "
                            </select>
                    
               </span>
                <br><br>";
              }
            if($tipo!="Carrito"&&$tipo!="Carreta"){
                echo "
                <span id='f'>
                     <label class='input-48'>Fecha de caducidad del seguro</label><br>
				<input type = 'date' name = 'fechaseg' placeholder = 'Fecha de caducidad del seguro' min = '2019-03-7' max = '2900-06-25' step = '1' class = 'input-48' value = '".$fechaseguro."' required/>
                </span>"; 
              }
                echo "
                <br><br>
                <label>Contenedores</label>
                <div class='container'>  
                <div class='form-group'>  
                     <form name='add_name' id='add_name'>  
                          <div class='table-responsive'>  
                              <table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                        <th>Uso del contenedor</th>
                                        <th>Capacidad</th>
                                        <th>Unidad de volumen</th>
                                        
                                   </tr>
                                   <tr>";
                            $conexion = new mysqli("localhost","root","root", "RB") or die("No se pudo establecer conexion");
                            $query="SELECT * FROM contenedor WHERE idvehiculo = '".$identifica."'";
                            $resultado=$conexion->query($query);
                            $i=1;
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                            while ($row = $resultado->fetch_assoc()) {
                              echo "
                              <td><select name='name[]' class='form-control name_list' class='input-20' required>
                              <option value ='".utf8_decode($row['uso'])."'>".utf8_decode($row['uso'])."</option>
                              </td>
                              <td><input type='number' name='name2[]' placeholder='Capacidad' class='form-control name_list' class='input-20' value = '".utf8_decode($row['capacidad'])."' required/></td>
                              <td><select name = 'fpeso[]' class='input-26' >";
                              if(utf8_decode($row['um'])=="CC"){
                                  echo "<option value = 'CC'>CC</option>
                                        <option value = 'MC'>MC</option>";
                              }else{echo "<option value = 'MC'>MC</option>
                                                  <option value = 'CC'>CC</option>";

                              }
                              echo "
                                  </select></td>
                                  </tr>
                              ";
                              $i=$i+1;
                            }
                            mysqli_close($conexion);

                                   echo "  
                              </table>  
                          </div>  
                    </form>  
                </div> 
               </div>
               <center>";

               echo" 
               <label>Observaciones</label><br>
               <input type = 'text'  name='observ' value = '".$observaciones."' style='width: 75%; border-style: solid; border-width: 5px; height: 100px;' >

               </textarea><br><br><br>
               </center>    
<a href='ConsultaVehiculos.html'><input type='button' value='Regresar' class='btn-agregar'></a>
	<input type = 'submit' value = 'Actualizar' class = 'btn-agregar' required/>
               </div></p></div>
          </section>
		</form>

	</body>
</html>";

				}
		}
			
?>

