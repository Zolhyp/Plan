<?php
  session_start();
  if($_SESSION['nombre']) {

  } else {
      header("Location: ../index.php"); 
  }
	$i=1;
	$mysqli = new mysqli("localhost","root","root","SRB");

	$salida="";
	$query="select curp, nombre, app, tel from actor where tipo='administradorc' and idCorralon='".$_SESSION['idCorralon']."'";
	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query ="select curp, nombre, app, tel from administrador where nombre like '%$q%' and tipo='administradorc'";
	}
	$resultado = $mysqli->query($query);
	if($resultado->num_rows > 0){
		$salida = "<br><label class='input-48'>Conductores</label><br>
                		<div class='form-group'>  
                     		<form name='formulario' id='formulario' action = 'admi.php' type='submin' method = 'post' >  
                          		<div class='table-responsive'>  
                              	<table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                   		<th>CURP</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Teléfono</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                   </tr>";
		while($fila = $resultado->fetch_assoc()){
			$salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'curp[]' class='form-control name_list' style='width: 100%;' value = ".utf8_decode($fila['curp'])." readonly='readonly'/></td>
                           <td><input type='text' name = 'nombre[]' class='form-control name_list' style='width: 100%;' value = ".utf8_encode($fila['nombre'])." readonly='readonly'/></td>
                           <td><input type='text' name = 'app[]' class='form-control name_list' style='width: 100%;' value = ".utf8_encode($fila['app'])." readonly='readonly'/></td>
                           <td><input type='text' name = 'tel[]' class='form-control name_list' style='width: 100%;' value = ".utf8_encode($fila['tel'])." readonly='readonly'/></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-trash-alt' value='".$i."1' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-edit' value='".$i."2' ></button></td>
                           </tr>";
			$i=$i+1;
		}
		$salida.="            </table>  
                          </div>  
                    </form>  
                </div> 
               </div>";
	}
	else{
	$salida="No hay administradores que coincidan";
	}
	echo $salida;

	$mysqli->close();
?>