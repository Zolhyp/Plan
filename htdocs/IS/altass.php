
<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">
		<title>Registrar vehículo</title> 
		<link rel="stylesheet" href = "estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="jquery-1.11.2.js"></script>
        <style type="text/css">
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
	<!--	<form action = "alta.php" type="submin" method = "post" class = "form-register">-->
               <h1 class=  "form-titulo"><b>Alta de vehículo</b></h1>
              <center>
      <br>



               <section>
			<div class = "medicamento-inputs" id= "header">
			
			<p>
				<div class="contenedor-inputs">
				
                    <label class="input-48">Tipo de veh&iacute;culo</label><br>
				
                <span>
				<input type = "text" id="tipo" name = "tipo" value= "Carro" class = "input-48" required readonly="readonly"/>
			</span>
				
                <br><br>
            
               <span id= "lot">											

                         <?php
                         if($tipo!="Carrito"&&$tipo!="Carreta"){
                          echo " <select id='tipod' name='tipod' class='input-48' required/>
                                <option value=0>Número económico</option>
                                <option value=1>Placa</option>
                                <option value=2>Número provisional</option>
                          </select>
                          ";
                        }
                        else{
                          echo "<label class='input-48'>N&uacute;mero econ&oacute;mico</label><br>
                         <input type = 'number' id='noeconomico' name = 'noeconomico' placeholder = 'Número economico' class = 'input-48' required />";
                        }
          ?>
			</span>
                
            
                <br><br>

                <span id =nom>
                    <label class="input-48">Marca</label><label class="input-48">Submarca</label><br>
                         <input type = "text" id="marca" name = "marca" value= "<?php echo $marca;?>" class = "input-48" placeholder = "Marca" required/>
                         <input type = "text" id="submarca" name = "submarca" value= "<?php echo $submarca;?>" class = "input-48" placeholder = "Submarca" required />
                </span>

                <br><br>

                <span id =a>
                    <label class="input-48">Modelo</label><label class="input-48">Estado del veh&iacute;culo</label><br>
				<input type = "number" id="modelo" name = "modelo" class = "input-48" min="1950" max="2019" placeholder="Modelo" pattern="[0-9]" required/>
        <select id="estado" name="estado" class="input-48" required/>
          <option value="activo">Activo</option>
          <option value="inactivo">Inactivo</option>
          <option value="reparacion">Reparaci&oacute;n</option>
        </select>
                </span>
                <br><br>

                <span id =b>

                          <?php
                          if($tipo!="Carrito"&&$tipo!="Carreta"){
                            echo"
                         <label class='input-48'>Kilometraje recorrido</label><label class='input-48'>Fecha de registro de kilometraje</label><br>
					<input type = 'number' id='km' name = 'km' class = 'input-48' placeholder='Kilometraje' required/>
                         <input type = 'date' id='fechakm' name = 'fechakm' placeholder = 'Ultima fecha registrada' min = '2019-02-7' max = '2900-06-25' step = '1' class = 'input-48'/>
                         ";
                       }
                       else{

                       }
                       ?>
                </span>
                <br><br>

                <span id= "lot">
                     <label class="input-48">N&uacute;mero de polica de seguro</label><label class="input-48">Nombre de la aseguradora</label><br>											
				<input type = "number" id="poliza" name = "poliza" placeholder = "Número de poliza de seguro" class = "input-48" />
                    <input type = "text" id="aseguradora" name = "aseguradora" placeholder = "Nombre de la aseguradora" class = "input-48" />
               </span>
                <br><br>

                <span id="f">
                     <label class="input-48">Fecha de caducidad del seguro</label><br>
				<input type = "date" id="fechaseg" name = "fechaseg" placeholder = "Fecha de caducidad del seguro" min = "2019-03-7" max = "2900-06-25" step = "1" class = "input-48" />
                </span>
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
                                        <th>Unidad de medida</th>
                                        <th></th>
                                   </tr>
                                   <tr>
                                        <td><select id="nam[]" name="nam[]" class="form-control name_list" class="input-20" required/>
                                          <option value ="Organico">Org&aacute;nico</option>
                                          <option value ="Inorganico">Inorg&aacute;nico</option>
                                          <option value ="Mixto">Mixto</option>
                                          </select>
                                        </td> 
                                        <td><input type="number" id="name2[]" name="name2[]" placeholder="Capacidad" class="form-control name_list" required/></td>
                                        <td><select id=fpeso[] name = "fpeso[]" class="input-26" >
						                    <option value = "Tonelada">Tonelada</option>
                                                  <option value = "Kg">Kg</option>
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
               <textarea id="observ" name="observ" style="width: 75%; border-style: solid; border-width: 5px; height: 100px;">

               </textarea><br><br><br>
               </center>    
<a href="altasE.html"><input type="button" value="Regresar" class="btn-agregar"></a>
	<input type = "button" value = "Aceptar" class = "btn-agregar" onclick="myCreateFunction()" required/>
               </div></p></div>
          </section>
		<!--</form>-->

	</body>
</html>

<script>  
 $(document).ready(function(){  
      var i=1, i2=1;  
      $('#add').click(function(){  
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><select id="nam[]" name="nam[]" class="form-control name_list" class="input-20"> <option value ="Organico">Org&aacute;nico</option><option value ="Inorganico">Inorg&aacute;nico</option><option value ="Mixto">Mixto</option></select></td><td><input type="number" id="name2[]" name="name2[]" placeholder="Capacidad" class="form-control name_list" /> </td><td><select id="fpeso[]" name = "fpeso[]" > <option value = "Tonelada">Tonelada</option> <option value = "Kg">Kg</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
       });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
      });  
 });  


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
    var tabb=document.getElementById("dynamic_field");
    var ele=document.getElementById("dynamic_field").rows.length;
    var i=0; nam=[];
    for(i=1;i<ele;i++){
      nam[i-1]=document.getElementById("dynamic_field").rows[i].cells[0];
    }
    alert(nam);
    
$.ajax({
  url:'alta.php',
  type:'POST',
  data: 'tipo='+tipo+'&noeconomico='+noeconomico+'&placa='+placa+'&marca='+marca+'&submarca='+submarca+'&modelo='+modelo+'&estado='+estado+'&km='+km+'&fechakm='+fechakm+'&poliza='+poliza+'&aseguradora='+aseguradora+'&fechaseg='+fechaseg+'&observ='+observ+'&name='+nam+'&name2='+nam+'&fpeso='+nam
}).done(function(resp){
  alert(resp);
});
}

 </script>



