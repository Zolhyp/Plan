<?php
header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
	$conexion = mysqli_connect('localhost', 'root', 'root');
	$error=0;
	mysqli_select_db($conexion, 'SRB');
	
	if(!$conexion){
		//echo 'error al conectar base';
		}else{
				//echo 'base conectada';		
	$tipo= $_POST['tipo'];
	$corralon= $_POST['corralon'];
	$estado= $_POST['estado'];
	$idento=$_POST['idento'];
		if($tipo!='Carrito'&&$tipo!='Carreta'){

	$tipoid= $_POST['tipoid'];

	if($tipoid==0){
	$noeconomico= $_POST['identificador'];
	$placa="NULL";
	$numerop= "NULL";
	$query="SELECT * FROM vehiculo where noeconomico = '".$noeconomico."' and id!=".$idento."";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error número economico ingresado ya se habia registrado previamente en el sistema".'");
        </script>';
		header('Refresh: 0.1; URL=VehiculosTipo.php');
	}else{ $error=0;
	}
}
	if($tipoid==1){
	$noeconomico= "NULL";
	$placa=$_POST['identificador'];
	$numerop= "NULL";
	$query="SELECT * FROM vehiculo where placa = '".$placa."' and id!=".$idento."";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error placa ingresada ya se habia registrado previamente en el sistema".'");
        </script>';
		header('Refresh: 0.1; URL=VehiculosTipo.php');
	}else{ $error=0;
	}

	}
	if($tipoid==2){
	$noeconomico= "NULL";
	$placa= "NULL";
	$numerop= $_POST['identificador'];
	$query="SELECT * FROM vehiculo where nprovisional = '".$numerop."' and id!=".$idento."";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error numero provisional ingresado ya se habia registrado previamente en el sistema".'");
        </script>';
		header('Refresh: 0.1; URL=VehiculosTipo.php');
	}else{ $error=0;
	}	
	}
}
	if($tipo!='Carrito'&&$tipo!='Carreta'){
	$marca= $_POST['marca'];
	$submarca= $_POST['submarca'];
	$modelo= $_POST['modelo'];
	$km= $_POST['km'];
	$fechakm= $_POST['fechakm'];
	$fechakm="'$fechakm'";
	$poliza= $_POST['poliza'];
	$query="SELECT * FROM vehiculo where  poliza = '".$poliza."' and id!=".$idento."";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error número de poliza de seguro ingresada ya se habia registrado previamente en el sistema".'");
        </script>';
		header('Refresh: 0.1; URL=altasp.php');
	}else{ $error=0;}	
	$aseguradora= $_POST['aseguradora'];
	$fechaseg= $_POST['fechaseg'];
	}
	else{
		$km="0";
		$fechakm="1000-01-01";
		$marca="NULL";
		$nprovisional="NULL";
		$submarca="NULL";
		$modelo="0";
		$noeconomico="NULL";
		$placa="NULL";
		$numerop="NULL";
		$aseguradora="NULL";
		$fechaseg="1000-01-01";
		$poliza="0";
	}

	$obser = $_POST["observ"] ;	
	if($error==0){
	$insertar = "UPDATE vehiculo SET placa='$placa', tipo='$tipo', marca='$marca', submarca='$submarca', modelo=$modelo, km=$km, fechakm=$fechakm, poliza=$poliza, rfcseguro='$aseguradora', fechaseguro='$fechaseg', observaciones='$obser', estado='$estado', nprovisional='$numerop', idCorralon='$corralon', noeconomico='$noeconomico' WHERE id=$idento";
	

	$aber= mysqli_query($conexion, $insertar);
	$conexion = new mysqli("localhost","root","root", "SRB") or die("No se pudo establecer conexion");
    $query="SELECT id FROM vehiculo WHERE poliza = ".$poliza."";
    $resultado=$conexion->query($query);
    if (!$resultado) {
        echo 'No se pudo ejecutar la consulta: ' . mysql_error();
        exit;
    }                
    while ($row = $resultado->fetch_assoc()) {
            $qwery=$row['id'];
          }
    mysqli_close($conexion);
	
	$number = count($_POST["name"]); 
	$activos =$_POST["name"];
	//echo "$number"; 
		$conexion = mysqli_connect('localhost', 'root', 'root');
	mysqli_select_db($conexion, 'SRB');

		if($number > 0) {   
			for($i=0; $i<$number; $i++){  
				if(trim($_POST["name"][$i] != '')){  
					$resultado = "UPDATE contenedor SET uso='".mysqli_real_escape_string($conexion, $_POST["name"][$i])."', capacidad=".mysqli_real_escape_string($conexion, $_POST["name2"][$i]).", um='".mysqli_real_escape_string($conexion, $_POST["fpeso"][$i])."' where idVehiculo= $qwery and id=$i"; 
					#echo $resultado;					
					$aber2=mysqli_query($conexion, $resultado);
           }  
		}  
    }  
	if(!$aber&&!$aber2){
		echo'<script type="text/javascript">
        alert("'."Error en el registro".'");
        </script>';
		header('Refresh: 0.1; URL=ConsultaVehiculos.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaVehiculos.php');

			echo'<script type="text/javascript">
        alert("'."Registro completo".'");
        </script>';
			}
			
	}
		mysqli_close($conexion);
	
}
?>
