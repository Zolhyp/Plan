<?php
header("Content-Type: text/html;charset=utf-8");
 //if(isset($_POST['agregar']) { 	
	$conexion = mysqli_connect('localhost', 'root', 'root');
	
	mysqli_select_db($conexion, 'SRB');
	
	if(!$conexion){
		//echo 'error al conectar base';
		}else{
				//echo 'base conectada';		
	$id= utf8_decode($_POST['ident']);
	$nombre= utf8_decode($_POST['nom']);
	$tel= $_POST['tel'];
	$estado= utf8_decode($_POST['estado']);
	$municipio= utf8_decode($_POST['municipio']);
	$colonia= utf8_decode($_POST['colonia']);
	$calle= utf8_decode($_POST['calle']);
	$nexterior= $_POST['exterior'];
	$cp= $_POST['cp'];
	
	$insertar = "UPDATE corralon
	SET id='$id', tel='$tel', nombre='$nombre', estado='$estado', municipio='$municipio', colonia='$colonia', calle='$calle', nexterior=$nexterior, cp='$cp' where id = '$id'";
	

	$aber= mysqli_query($conexion, $insertar);
	
	
	
    #echo $aber; 
	if(!$aber){
		echo "<script type='text/javascript'>
        alert('Error');
       	</script>";
		header('Refresh: 0.1; URL=ConsultaCorralones.php');

		}else{
			//echo 'Registro completo';
	
			header('Refresh: 0.1; URL=ConsultaCorralones.php');

			echo'<script type="text/javascript">
        	alert("'."Registro completo".'");
        	</script>';
			}
			
	}
		mysqli_close($conexion);
	

?>





