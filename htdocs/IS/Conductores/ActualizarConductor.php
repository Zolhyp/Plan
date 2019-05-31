<?php
header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
	$conexion = mysqli_connect('localhost', 'root', 'root');
	
	mysqli_select_db($conexion, 'SRB');
	
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
	
	$insertar = "UPDATE conductor
	SET nombre='$nombre', app='$app', apm='$apm', edad=$edad, tel='$tel', estado='$estado', municipio='$municipio', colonia='$colonia', calle='$calle', nexterior=$nexterior, ninterior='$ninterior', cp='$cp', idCorralon='$corralon' where curp = '$curp'";
	
	#echo $insertar;

	$aber= mysqli_query($conexion, $insertar);
	
	
	
    #echo $aber; 
	if(!$aber){
		echo'<script type="text/javascript">
        alert("'."Error en el registro".'");
       	</script>';
		header('Refresh: 0.1; URL=ConsultaConductores.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaConductores.php');

			echo'<script type="text/javascript">
        	alert("'."Registro completo".'");
        	</script>';
			}
			
	}
		mysqli_close($conexion);
	

?>


