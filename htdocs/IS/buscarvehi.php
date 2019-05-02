<?php
	$i=1;
	$mysqli = new mysqli("localhost","root","root","RB");

	$salida="";
	$query="select id, tipo, placa, noeconomico, nprovisional, marca, submarca, noseguro from vehiculo";
	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query ="select id, tipo, placa, noeconomico, nprovisional, marca, submarca, noseguro from vehiculo where id like '%$q%'";
	}
	$resultado = $mysqli->query($query);
	if($resultado->num_rows > 0){
		$salida = "<br><label class='input-48'>Vehículos</label><br>
                		<div class='form-group'>  
                     		<form name='formulario' id='formulario' action = 'vehi.php' type='submin' method = 'post' >  
                          		<div class='table-responsive'>  
                              	<table class='table table-bordered' id='dynamic_field'>  
                                   <tr>
                                   		<th>Número</th>
                                      <th>Tipo</th>
                                        <th>Identificador</th>
                                        <th>Marca</th>
                                        <th>Submarca</th>
                                        <th>Poliza de seguro</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                   </tr>";
		while($fila = $resultado->fetch_assoc()){
      if($fila['placa']=="NULL"&&$fila['nprovisional']=="NULL"&&$fila['noeconomico']!="NULL"){
			$salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'id[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = ".$fila['id']." readonly='readonly'/></td>
                           <td><input type='text' name = 'tipo[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = '".$fila['tipo']."' readonly='readonly'/></td>

                           <td><input type='text' name = 'ident[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = '".$fila['noeconomico']."' readonly='readonly'/></td>

                            <td><input type='text' name = 'marca[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = '".utf8_encode($fila['marca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'submarca[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = '".utf8_encode($fila['submarca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'poliza[]' class='form-control name_list' style='width: 100%; background-color:#de825d;' value = '".utf8_encode($fila['noseguro'])."' readonly='readonly'/></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-trash-alt' value='".$i."1' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-edit' value='".$i."2' ></button></td>
                           </tr>";
                         }
                         else{
    if($fila['placa']=="NULL"&&$fila['noeconomico']=="NULL"&&$fila['nprovisional']!="NULL"){
      $salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'id[]' class='form-control name_list' style='width: 100%; background-color:#d4c959;' value = ".$fila['id']." readonly='readonly'/></td>
                           <td><input type='text' name = 'tipo[]' class='form-control name_list' style='width: 100%; background-color:#d4c959;' value = '".$fila['tipo']."' readonly='readonly'/></td>

                           <td><input type='text' name = 'ident[]' class='form-control name_list' style='width: 100%;  background-color:#d4c959;' value = '".$fila['nprovisional']."' readonly='readonly'/></td>

                            <td><input type='text' name = 'marca[]' class='form-control name_list' style='width: 100%; background-color:#d4c959;' value = '".utf8_encode($fila['marca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'submarca[]' class='form-control name_list' style='width: 100%; background-color:#d4c959;' value = '".utf8_encode($fila['submarca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'poliza[]' class='form-control name_list' style='width: 100%; background-color:#d4c959;' value = '".utf8_encode($fila['noseguro'])."' readonly='readonly'/></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-trash-alt' value='".$i."1' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-edit' value='".$i."2' ></button></td>
                           </tr>";
                         }
if($fila['noeconomico']=="NULL"&&$fila['nprovisional']=="NULL"&&$fila['placa']!="NULL"){
      $salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'id[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = ".$fila['id']." readonly='readonly'/></td>
                            <td><input type='text' name = 'tipo[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = '".$fila['tipo']."' readonly='readonly'/></td>

                           <td><input type='text' name = 'ident[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = '".$fila['placa']."' readonly='readonly'/></td>

                            <td><input type='text' name = 'marca[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = '".utf8_encode($fila['marca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'submarca[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = '".utf8_encode($fila['submarca'])."' readonly='readonly'/></td>
                           <td><input type='text' name = 'poliza[]' class='form-control name_list' style='width: 100%; background-color:powderblue;' value = '".utf8_encode($fila['noseguro'])."' readonly='readonly'/></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-trash-alt' value='".$i."1' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-edit' value='".$i."2' ></button></td>
                           </tr>";
                         }

    if($fila['noeconomico']=="NULL"&&$fila['nprovisional']=="NULL"&&$fila['placa']=="NULL"){
       $salida.="<tr name='id' value='".$i."'>
                           <td><input type='text' name = 'id[]' class='form-control name_list' style='width: 100%;' value = ".$fila['id']." readonly='readonly'/></td>
                            <td><input type='text' name = 'tipo[]' class='form-control name_list' style='width: 100%;' value = '".$fila['tipo']."' readonly='readonly'/></td>
                           <td></td>
                            <td></td>
                           <td></td>
                           <td></td>
                           <td><button type='submit' name='bot' id='bot' class='far fa-eye' value='".$i."0' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-trash-alt' value='".$i."1' ></button></td>
                           <td><button type='submit' name='bot' id='bot' class='fas fa-edit' value='".$i."2' ></button></td>
                           </tr>";
      }
}
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