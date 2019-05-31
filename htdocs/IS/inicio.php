<?php
	error_reporting(0);
	session_start();
	if(!$_SESSION['nombre']!=NULL){
	$usuario = $_POST['usuario'];
	$psswd = $_POST['psswd'];
	}
	else{
		$usuario=$_SESSION['curp'];
		$conn = new mysqli('localhost', 'root','root', 'SRB');
		$sql = "SELECT psswd FROM login WHERE curp ='" . $usuario . "'";
		$cons = $conn->query($sql);
				while($row = $cons->fetch_assoc()) {
					$psswd=$row['psswd'];
			}
	}
	
	
	// Create connection
	$conn = new mysqli('localhost', 'root','root', 'SRB');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM actor a WHERE a.curp ='" . $usuario . "'";
	$result = $conn->query($sql);

	if($result->num_rows == 0) {
		echo'<script type="text/javascript">
        alert("'."Curp inexistente en el sistema".'");
        </script>';
        header('Refresh: 0.1; URL=index.php');

        #header('Location: index.php');

	} else {
		$sql = "SELECT * FROM actor a, login l WHERE a.curp='".$usuario."' and l.curp=a.curp and l.psswd='".$psswd."'";
		$contra = $conn->query($sql);
		// output data of each row
		if($contra->num_rows == 0) {
		echo'<script type="text/javascript">
        alert("'."La contraseña no coincide".'");
        </script>';
        header('Refresh: 0.1; URL=index.php');
		}
        #header('Location: index.php');

		else{
		while($row = $contra->fetch_assoc()) {
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['curp'] = $row['curp'];
			$_SESSION['idCorralon'] = $row['idCorralon'];
			$_SESSION['psswd']=$row['psswd'];
			$_SESSION['tipo']=$row['tipo'];

		}
	}
	}
	$conn->close();
?>
<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Inicio</title> 
		<link rel="stylesheet" href = "css/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <style type="css/text/css">
			tab{padding-left: 15em}
			tab2{padding-left: 8.2em}
			tab3{padding-left: 8.4em}
			tab4{padding-left: 34.5em}
			tab5{padding-left: 31em}
			tab6{padding-left: 40em}
			tab7{padding-left: 41em}
			tab8{padding-left: 8em}
			tab9{padding-left: 38em}
		</style>
   
	</head>
	<body>
	<div class = "form-register">
		<div class= "form-titulo">
				<h1 class="i-b"><b>Inicio</b></h1>
				<div class="info-usr i-b" style="color: black;">
					<?php echo $_SESSION['nombre'];?> 
					<div id="logOut" class="i-b">
						<img src="images/power.png" alt="" style="width: 28px;cursor: pointer;" title="Cerrar sesión">
					</div>
				</div>
		</div>
		<br>
		<?php if($_SESSION['tipo']=="encargadoc"){
			echo "
		<div class = 'medicamento-inputs' id= 'header'>
		<section>
			<div class='contenedor-inputs'>
				<div>
				<h3>Vehículos</h3><br>
				<a href='Vehiculos/VehiculosTipo.php'><input type='button' value='Registrar vehículos' class='btn-agregar'></a>
				<a href='Vehiculos/ConsultaVehiculos.php'><input type='button' value='Consultar vehículos' class='btn-agregar'></a>
				</div>
				<br>

				<h3>Aseguradoras</h3><br>
				<a href='Aseguradoras/RegistrarAseguradora.php'><input type='button' value='Registrar Aseguradoras' class='btn-agregar'></a>
				<a href='Aseguradoras/ConsultaAseguradoras.php'><input type='button' value='Consultar Aseguradoras' class='btn-agregar'></a>
				<br><br>

				<h3>Conductores</h3><br>
				<a href='Conductores/RegistrarConductor.php'><input type='button' value='Registrar Conductor' class='btn-agregar'></a>
				<a href='Conductores/ConsultaConductores.php'><input type='button' value='Consultar Conductores' class='btn-agregar'></a>
				<br><br>

				<h3>Corralón</h3><br>
				<a href='Corralon/ConsultaCorralones.php'><input type='button' value='Consultar Corralón' class='btn-agregar'></a>

				<h3>Administrador de vehículos</h3><br>
				<a href='Administradores/RegistrarAdministrador.php'><input type='button' value='Registrar Administrador' class='btn-agregar'></a>
				<a href='Administradores/ConsultaAdministradores.php'><input type='button' value='Consultar Administradores' class='btn-agregar'></a>
			</div>
			</div>
		</section>
	</div>";}
	else{
		if($_SESSION['tipo']=="administradorc"){
		echo "
		<div class = 'medicamento-inputs' id= 'header'>
		<section>
			<div class='contenedor-inputs'>
				<div>
				<h3>Vehículos</h3><br>
				<a href='Vehiculos/VehiculosTipo.php'><input type='button' value='Registrar vehículos' class='btn-agregar'></a>
				<a href='Vehiculos/ConsultaVehiculos.php'><input type='button' value='Consultar vehículos' class='btn-agregar'></a>
				</div>
				<br>

				<h3>Aseguradoras</h3><br>
				<a href='Aseguradoras/RegistrarAseguradora.php'><input type='button' value='Registrar Aseguradoras' class='btn-agregar'></a>
				<a href='Aseguradoras/ConsultaAseguradoras.php'><input type='button' value='Consultar Aseguradoras' class='btn-agregar'></a>
				<br><br>

				<h3>Conductores</h3><br>
				<a href='Conductores/RegistrarConductor.php'><input type='button' value='Registrar Conductor' class='btn-agregar'></a>
				<a href='Conductores/ConsultaConductores.php'><input type='button' value='Consultar Conductores' class='btn-agregar'></a>
				<br><br>

			</div>
			</div>
		</section>
	</div>";}
	}
	?>
	<script>
		$('#logOut').click(function() {
			$.post('index.php', {ACTION: 'LOGOUT'}, ()=>{
				window.location.href = 'login.html';
			});
		});
	</script>
	</body>
	<br><br>
</html>
