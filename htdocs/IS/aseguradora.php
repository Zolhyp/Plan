<?php
header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
	$conexion = mysqli_connect('localhost', 'root', 'root');
	
	mysqli_select_db($conexion, 'RB');
	
	if(!$conexion){
		//echo 'error al conectar base';
		}else{
				//echo 'base conectada';		
	$nombre= $_POST['nombre'];
	$rfc= $_POST['rfc'];
	$rz= $_POST['rz'];
	$nconsulta= $_POST['ncons'];
	$nsiniestro= $_POST['nsins'];
	$estado= $_POST['estado'];
	$municipio= $_POST['municipio'];
	$colonia= $_POST['colonia'];
	$calle= $_POST['calle'];
	$nexterior= $_POST['exterior'];
	$ninterior= $_POST['interior'];
	$cp= $_POST['cp'];

	
	$insertar = "INSERT INTO aseguradora
	VALUES('$nombre', '$rfc', '$rz', $nconsulta, $nsiniestro, '$estado', 
	'$municipio', '$colonia', '$calle', $nexterior, $ninterior, $cp)";
	
	echo "$insertar";

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
	

?>


