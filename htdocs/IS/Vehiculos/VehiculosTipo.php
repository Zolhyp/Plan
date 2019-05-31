<?php 
	session_start();
	if($_SESSION['nombre']) {

	} else {
	    header("Location: index.php"); 
	}
?>

<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Registrar vehículo</title> 
		<link rel="stylesheet" href = "../css/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <style type="../css/text/css">
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

					<!--<h1>Agregar producto</h1>-->
		<form action = "RegistrarVehiculo.php" type="submin" method = "post" class = "form-register">
			<h1 class=  "form-titulo"><b>Registrar vehículo</b></h1>
			<center>
			</center><br>
						<div class = "medicamento-inputs" id= "header">

			<section>
				<div class="contenedor-inputs">
					
				<label>Tipo de veh&iacute;culo</label><br>
				
				<span id= "rec">
					<select name = "ftipo" >
						<option value = "Camion">Camión</option>
                        <option value = "Camioneta">Camioneta</option>
                        <option value = "Coche">Coche</option>
                        <option value = "Carreta">Carreta</option>
                        <option value = "Moto con carreta">Moto con carreta</option>
                        <option value = "Carrito">Carrito</option>
					</select>
				</span>
				<input type = "submit" name = "fenviado" value ="Aceptar" class = "btn-agregar"/>
				<br><br>
				
				</div>
				</section>

			</div>
		</form>
		<br>
		<center>
			<a href="../inicio.php"><input type="button" value="Regresar" class="btn-agregar"></a>
			</center>
	</body>
</html>


<script>  
 $(document).ready(function(){  
      var i=1, i2=1;  
      $('#add').click(function(){  
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Componente activo" class="form-control name_list" /></td><td><input type="text" name="name2[]" placeholder="Cantidad" class="form-control name_list" /> </td><td><select name = "iduma[]"><option value = "elige4">Elige opci&oacute;n</option><option value = "1">Tabletas</option><option value = "2">mcg</option><option value = "3">mg</option><option value = "4">kg</option><option value = "5">gr</option><option value = "6">ml</option><option value = "7">lt</option><option value = "8">dC</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
       });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
      });  
 });  
 </script>


<!--<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" 
class="btn btn-info
/>  

 $('#submit').click(function(){            
           $.ajax({  
                url:"registrar.php",  
                //method:"POST",  
                //data:$('#add_name').serialize(),  
                //success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });
-->
