<?php
	$i=1;
	$mysqli = new mysqli("localhost","root","root","SRB");

	$salida="";
	$query="select id, tel, nombre, municipio from corralon";
	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query ="select id, tel, nombre, municipio from corralon where id like '%$q%'";
	}
	$resultado = $mysqli->query($query);
	if($resultado->num_rows > 0){
		$salida = "<br><label class='input-48'>Corralones</label><br>
                		<div class='form-group'>  
                     		<form name='formulario' id='formulario' action = 'corra.php' type='submin' method = 'post' >  
                          		<div class='table-responsive'>  
                              	<table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                   		<th>Id</th>
                                        <th>Teléfono</th>
                                        <th>Nombre</th>
                                        <th>Municipio</th>
                                        <th></th>
                                        <th></th>
                                   </tr>";
		while($fila = $resultado->fetch_assoc()){
			$salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'id[]' class='form-control name_list' style='width: 100%;' value = ".$fila['id']." readonly='readonly'/></td>
                           <td><input type='text' name = 'tel[]' class='form-control name_list' style='width: 100%;' value = ".$fila['tel']." readonly='readonly'/></td>
                           <td><input type='text' name = 'encargado[]' class='form-control name_list' style='width: 100%;' value = '".utf8_encode($fila['nombre'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'municipio[]' class='form-control name_list' style='width: 100%;' value = '".utf8_encode($fila['municipio'])."' readonly='readonly'/></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
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