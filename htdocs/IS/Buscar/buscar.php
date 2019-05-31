<?php
	$i=1;
	$mysqli = new mysqli("localhost","root","root","SRB");
	$salida="";
	$query="select nombre, rfc, nconsulta, nsiniestro from aseguradora";
	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query ="select nombre, rfc, nconsulta, nsiniestro from aseguradora where nombre like '%$q%'";
	}
	$resultado = $mysqli->query($query);
	if($resultado->num_rows > 0){
		$salida = "<br><label class='input-48'>Aseguradoras</label><br>
                		<div class='form-group'>  
                     		<form name='formulario' id='formulario' action = '../Aseguradoras/ase.php' type='submin' method = 'post' >  
                          		<div class='table-responsive'>  
                              	<table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                   		<th>Nombre</th>
                                        <th>RFC</th>
                                        <th>Consulta</th>
                                        <th>Siniestro</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                   </tr>";
		while($fila = $resultado->fetch_assoc()){
			$salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'nombre[]' class='form-control name_list' style='width: 100%;' value = ".$fila['nombre']." readonly='readonly'/></td>
                           <td><input type='text' name = 'rfc[]' class='form-control name_list' style='width: 100%;' value = ".$fila['rfc']." readonly='readonly'/></td>
                           <td><input type='text' name = 'nconsulta[]' class='form-control name_list' style='width: 100%;' value = ".$fila['nconsulta']." readonly='readonly'/></td>
                           <td><input type='text' name = 'nsiniestro[]' class='form-control name_list' style='width: 100%;' value = ".$fila['nsiniestro']." readonly='readonly'/></td>
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
	$salida="No hay aseguradoras que coincidan";
	}
	echo $salida;

	$mysqli->close();
?>