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
	$nombre= utf8_decode($_POST['nombre']);
	$rfc= utf8_decode($_POST['rfc']);
	$rz= utf8_decode($_POST['rz']);
	$nconsulta= $_POST['ncons'];
	$nsiniestro= $_POST['nsins'];
	$estado= utf8_decode($_POST['estado']);
	$municipio= utf8_decode($_POST['municipio']);
	$colonia= utf8_decode($_POST['colonia']);
	$calle= utf8_decode($_POST['calle']);
	$nexterior= $_POST['exterior'];
	$ninterior= $_POST['interior'];
	$cp= $_POST['cp'];

	$query="SELECT * FROM aseguradora where rfc = '".$rfc."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el nombre de la aseguradora ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarAseguradora.php');
	}else{ 
	$query="SELECT * FROM aseguradora where rfc = '".$rfc."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el rfc de la aseguradora ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarAseguradora.php');
	}else{ 
	$query="SELECT * FROM aseguradora where nconsulta = '".$nconsulta."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el número de consulta de la aseguradora ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarAseguradora.php');
	}else{ 
	$query="SELECT * FROM aseguradora where nsiniestro = '".$nsiniestro."'";
	$aber= mysqli_query($conexion, $query);
	$row_cnt = $aber->num_rows;

	if($row_cnt!=0){
		$error=1;
		echo'<script type="text/javascript">
        alert("'."Error el número en caso de siniestro de la aseguradora ingresado ya se habia registrado previamente en el sistema, por favor reviselo".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarAseguradora.php');
	}else{ 		
	if($error==0){
	$insertar = "INSERT INTO aseguradora(nombre, rfc, rz, nconsulta, nsiniestro, estado, municipio, colonia, calle, nexterior, ninterior, cp)
	VALUES('$nombre', '$rfc', '$rz', '$nconsulta', '$nsiniestro', '$estado', 
	'$municipio', '$colonia', '$calle', $nexterior, $ninterior, '$cp')";
	
	#echo "$insertar";

	$aber= mysqli_query($conexion, $insertar);
	
	
	
    echo $aber; 
	if(!$aber){
		echo'<script type="text/javascript">
        alert("'."Error en el registro".'");
        </script>';
		header('Refresh: 0.1; URL=RegistrarAseguradora.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=RegistrarAseguradora.php');

			echo'<script type="text/javascript">
        	alert("'."Registro completo".'");
        	</script>';
			}
			
	}
		mysqli_close($conexion);
	}
}
	}
}
}
?>


