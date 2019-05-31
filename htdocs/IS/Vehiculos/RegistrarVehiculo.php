<?php 
  session_start();
  if($_SESSION['nombre']) {

  } else {
      header("Location: ../index.php"); 
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
            <script src="../js/jquery-1.11.2.js"></script>
        <style type="..css/text/css">

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
    <script language="javascript">
      $(document).ready(function() {
        $("#marca").change(function (){
          $("#marca option:selected").each(function(){
            var marca=$('#marca').val()
            
            $.post("subm.php", { marca: marca }, function(data){ $("#submarca").html(data);
          });
        });
      })
    });
    
    //$(document).ready(function(){
    //  $('#marca').on('change', function(){
    //    var id=$('#marca').val()
    //    alert(id)
    //  })
    //  
    //})
</script>
   
	</head>
	<body>
<script>
     function fetch(){
     var get = document.getElementById("get").value;
     document.getElementById("put").value = get;
 }
    </script>
    <?php
    $enviado=false;
    $tipo=NULL;
    $placa=NULL;
    $marca=NULL;
    $modelo=NULL;
    $submarca=NULL;
    $noeconomico=NULL;
    if(isset($_POST["fenviado"])){
        $enviado=true;
        $tipo=$_POST["ftipo"];
    }
?>
					<!--<h1>Agregar producto</h1>-->
		<form action = "alta.php" type="submin" method = "post" class = "form-register">
               <h1 class=  "form-titulo"><b>Registrar vehículo</b></h1>
              <center>
      <nav>


      </nav></center><br>



               <section>
			<div class = "medicamento-inputs" id= "header">
			
			<p>
				<div class="contenedor-inputs">
				
                    <label class="input-48">Tipo de veh&iacute;culo</label><label class="input-48">Id de Corralón</label><br>
				
                <span>
				<input type = "text" name = "tipo" value= "<?php echo $tipo;?>" class = "input-48" required readonly="readonly"/>
<input type = "text" name = "corralon" value= <?php echo $_SESSION['idCorralon'];?> class = "input-48" required readonly="readonly"/>
			</span>
				
            
               <span id= "lot">											

                         <?php
                         if($tipo!="Carrito"&&$tipo!="Carreta"){
                          echo "                <br><br>
<label class='input-48'>Tipo de identificador</label><label class='input-48'>Identificador de vehículo</label><br>
                           <select name='tipoid' class='input-48' required/>
                              <option value=0>N&uacutemero econ&oacutemico</option>
                              <option value=1>Placa</option>
                              <option value=2>N&uacutemero provisional</option>
                          </select>
                         <input type = 'text' name = 'identificador' placeholder = 'Identificador de vehículo' class = 'input-48' required />
                                         <br><br>";
                        }
          ?>
			</span>
                
            
<?php 
          if($tipo!="Carrito"&&$tipo!="Carreta"){

               echo " <span id =nom>
                    <label class='input-48'>Marca</label><label class='input-48'>Submarca</label><br>
                    <select class='input-48' name='marca' id='marca' required/>";
                         
                         $conexion = new mysqli("localhost","root","root", "SRB") or die("No se pudo establecer conexion");
                            $query="SELECT * FROM marca";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                              
                            while ($row = $resultado->fetch_assoc()) {
                              echo "<option value = '".utf8_decode($row['marca'])."'>".utf8_decode($row['marca'])."</option>";
                            }
                            mysqli_close($conexion);
                            echo "
                            </select>
                        <select name='submarca' id='submarca' required/>
                          <option value = 'NULO'>Selecciona submarca</option>
                        </select>
                </span>";
              }
?>
                <br><br>
<?php
          if($tipo!="Carrito"&&$tipo!="Carreta"){

                echo "<span id =a>
                    <label class='input-48'>Modelo</label><label class='input-48'>Estado del veh&iacute;culo</label><br>
				<input type = 'number' name = 'modelo' class = 'input-48' min='1950' max='2019' placeholder='Modelo' pattern='[0-9]' required/>
        <select name='estado' class='input-48' required/>
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>
        </select>
                </span>
                <br><br>";
              }else{
                echo "<label class='input-48'>Estado del veh&iacute;culo</label><br>
                <select name='estado' class='input-48' required/>
          <option value='activo'>Activo</option>
          <option value='inactivo'>Inactivo</option>
          <option value='reparacion'>Reparaci&oacute;n</option>
        </select>";
              }

?>
                <span id =b>

                          <?php
                          if($tipo!="Carrito"&&$tipo!="Carreta"){
                            echo"
                         <label class='input-48'>Kilometraje recorrido</label><label class='input-48'>Fecha de registro de kilometraje</label><br>
					<input type = 'number' name = 'km' class = 'input-48' placeholder='Kilometraje' required/>
                         <input type = 'date' name = 'fechakm' placeholder = 'Ultima fecha registrada' min = '2019-02-7' max = '2900-06-25' step = '1' class = 'input-48'/>
                                         <br><br>";
                       }
                       else{

                       }
                       ?>
                </span>
<?php
          if($tipo!="Carrito"&&$tipo!="Carreta"){
            echo "
                <span id= 'lot'>
                     <label class='input-48'>N&uacute;mero de poliza de seguro</label><label class='input-48'>Nombre de la aseguradora</label><br>											
				<input type = 'number' name = 'poliza' placeholder = 'Número de poliza de seguro' class = 'input-48' />
        <select class='input-48' name='aseguradora' id='aseguradora'/>";
                         $conexion = new mysqli("localhost","root","root", "SRB") or die("No se pudo establecer conexion");
                            $query="SELECT rfc, nombre FROM aseguradora";
                            $resultado=$conexion->query($query);
                            if (!$resultado) {
                                echo 'No se pudo ejecutar la consulta: ' . mysql_error();
                                exit;
                              }
                              
                            while ($row = $resultado->fetch_assoc()) {
                              echo "<option value = '".utf8_decode($row['rfc'])."'>".utf8_decode($row['nombre'])."</option>";
                            }
                            mysqli_close($conexion);
                            echo "
                            </select>
                    
               </span>
                <br><br>";
              }
?>
<?php           if($tipo!="Carrito"&&$tipo!="Carreta"){
                echo "
                <span id='f'>
                     <label class='input-48'>Fecha de caducidad del seguro</label><br>
				<input type = 'date' name = 'fechaseg' placeholder = 'Fecha de caducidad del seguro' min = '2019-03-7' max = '2900-06-25' step = '1' class = 'input-48' />
                </span>"; 
              }
                ?>
                <br><br>
                <label>Contenedores</label>
                <div class="container">  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                              <table class="table table-bordered" id="dynamic_field">  
                                   <tr>
                                        <th>Uso del contenedor</th>
                                        <th>Capacidad</th>
                                        <th>Unidad de volumen</th>
                                        <th></th>
                                   </tr>
                                   <tr>
                                        <td><select name="name[]" class="form-control name_list" class="input-20" required/>
                                          <option value ="Organico">Org&aacute;nico</option>
                                          <option value ="Inorganico">Inorg&aacute;nico</option>
                                          <option value ="Mixto">Mixto</option>
                                          </select>
                                        </td> 
                                        <td><input type="number" name="name2[]" placeholder="Capacidad" class="form-control name_list" class="input-20" required/></td>
                                        <td><select name = "fpeso[]" class="input-26" >
						                                      <option value = "MC">MC</option>
                                                  <option value = "CC">CC</option>
                                        </select></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Agregar otro</button></td>  
                                   </tr>  
                              </table>  
                          </div>  
                    </form>  
                </div> 
               </div>
               <center>
               <label>Observaciones</label><br>
               <input type="text" name="observ" style="width: 75%; border-style: solid; border-width: 5px; height: 100px;">

               </textarea><br><br><br>
               </center>    
<a href="VehiculosTipo.php"><input type="button" value="Regresar" class="btn-agregar"></a>
	<input type = "submit" value = "Registrar" class = "btn-agregar" required/>
               </div></p></div>
          </section>
		</form>

	</body>
</html>

<script>  
 $(document).ready(function(){  
      var i=1, i2=1;  
      $('#add').click(function(){  
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="name[]" class="form-control name_list" class="input-20"> <option value ="Organico">Org&aacute;nico</option><option value ="Inorganico">Inorg&aacute;nico</option><option value ="Mixto">Mixto</option></select></td><td><input type="number" name="name2[]" placeholder="Capacidad" class="form-control name_list" /> </td><td><select name = "fpeso[]" > <option value = "MC">MC</option> <option value = "CC">CC</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
       });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
      });  
 });  
/*

    function myCreateFunction() {
    var tipo=document.getElementById("tipo").value;
    var noeconomico=document.getElementById("noeconomico").value;
    var placa=document.getElementById("placa").value;
    var marca=document.getElementById("marca").value;
    var submarca=document.getElementById("submarca").value;
    var modelo=document.getElementById("modelo").value;
    var estado=document.getElementById("estado").value;
    var km=document.getElementById("km").value;
    var fechakm=document.getElementById("fechakm").value;
    var poliza=document.getElementById("poliza").value;
    var aseguradora=document.getElementById("aseguradora").value;
    var fechaseg=document.getElementById("fechaseg").value;
    var observ=document.getElementById("observ").value;
    var naame = [];
    //naame=document.getElementById("name").value;
    var name2=document.getElementById("name2").value;
    //var fpeso[]=document.getElementById("fpeso").value;
$.ajax({
  url:'alta.php',
  type:'POST',
  data: 'tipo='+tipo+'&noeconomico='+noeconomico+'&placa='+placa+'&marca='+marca+'&submarca='+submarca+'&modelo='+modelo+'&estado='+estado+'&km='+km+'&fechakm='+fechakm+'&poliza='+poliza+'&aseguradora='+aseguradora+'&fechaseg='+fechaseg+'&observ='+observ+'&name='+naame+'&name2='+name2+'&fpeso='+fpeso
}).done(function(resp){
  alert(resp);
});
}
*/
 </script>