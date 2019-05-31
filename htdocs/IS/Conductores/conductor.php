<?php
header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
	$conexion = mysqli_connect('localhost', 'root', 'root');
	
	mysqli_select_db($conexion, 'SRB');
	$error=0;
	if(!$conexion){
		//echo 'error al conectar base';
		}else{
				//echo 'base conectada';		
	$curp= $_POST['curp'];
	$nombre= utf8_decode($_POST['nombre']);
	$apm= utf8_decode($_POST['apm']);
	$app= utf8_decode($_POST['app']);
	$edad= $_POST['edad'];
	$tel= $_POST['tel'];
	$estado= utf8_decode($_POST['estado']);
	$municipio= utf8_decode($_POST['municipio']);
	$colonia= utf8_decode($_POST['colonia']);
	$calle= utf8_decode($_POST['calle']);
	$nexterior= $_POST['exterior'];
	$ninterior= $_POST['interior'];
	$cp= $_POST['cp'];
	$corralon=$_POST['corralon'];

	$query="SELECT * FROM conductor where curp = '".$curp."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el curp del conductor ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarConductor.php');
	}else{ 
		$query="SELECT * FROM conductor where tel = '".$tel."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el teléfono del conductor ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarConductor.php');
	}else{ 
	if($error==0){
	$insertar = "INSERT INTO conductor(curp, nombre, app, apm, edad, tel, estado, municipio, colonia, calle, nexterior, ninterior, cp, idCorralon)
	VALUES('$curp', '$nombre', '$app', '$apm', $edad, '$tel', '$estado', 
	'$municipio', '$colonia', '$calle', $nexterior, $ninterior, '$cp', $corralon)";
	
	#echo "$insertar";

	$aber= mysqli_query($conexion, $insertar);
	
	
	
	if(!$aber){
		echo'<script type="text/javascript">
        alert("'."Error en el registro".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarConductor.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=../inicio.php');

			echo'<script type="text/javascript">
        	alert("'."Registro completo".'");
        	</script>';
			}
			
	
		mysqli_close($conexion);
	}
}
}

}



?>
