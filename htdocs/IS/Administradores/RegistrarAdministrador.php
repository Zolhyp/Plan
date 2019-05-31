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
    <title>Registrar administrador</title> 
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

    <h1 class=  "form-titulo"><b>Registrar administrador</b></h1>
    <center>

    </center>
    <br>

  <form action = "administrador.php" type="submin" method = "post" class = "form-register">
    <section>
    <div class = "medicamento-inputs" id= "header">
      <span>
                <label class="input-48">CURP</label><label class="input-48">Nombre(s)</label><br>
                    <input type = "text" name = "curp" class = "input-48" placeholder = "CURP" required/>
                    <input type = "text" name = "nombre" class = "input-48" placeholder = "Nombre" required />
            </span>
            <br><br>
            <span>
               <label class="input-48">Apellido paterno</label><label class="input-48">Apellido materno</label><br>
                    <input type = "text" name = "app" class = "input-48" placeholder = "Apellido paterno" required/>
                    <input type = "text" name = "apm" class = "input-48" placeholder = "Apellido materno" required/><br>
            </span>
             <br><br>
            <span>
              <label class="input-48">Edad</label><label class="input-48">Teléfono</label><br>
                    <input type = "number" min=0 name = "edad" class = "input-48" placeholder = "Edad" required/>
                    <input type = "text" name = "tel" class = "input-48" placeholder = "Teléfono" required />
            </span>
             <br><br>
            <label>Dirección:</label><br>
            <span>
              <label class="input-48">Estado</label><label class="input-48">Municipio</label><br>
                <select name="estado" class="input-48" required/>
                  <option value="CDMX">Ciudad de México</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Mexico">México</option>
                  <option value="Michoacan">Michoacán</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Queretaro">Querétaro</option>
                  <option value="Tlaxcala">Tlaxcala</option>
              </select>
                    <input type = "text" name = "municipio" class = "input-48" placeholder = "Municipio" required />
            </span>
             <br><br>
            <span>
              <label class="input-48">Colonia</label><label class="input-48">Calle</label><br>
                <input type = "text" name = "colonia" class = "input-48" placeholder = "Colonia" required/>
                    <input type = "text" name = "calle" class = "input-48" placeholder = "Calle" required />
            </span>
             <br><br>
            <span>
              <label class="input-48">Número exterior</label><label class="input-48">Número interior</label><br>
                <input type = "number"  min="0" name = "exterior" class = "input-48" placeholder = "Número exterior" required/>
                    <input type = "number" value=0 min="0" name = "interior" class = "input-48" placeholder = "Número interior" />
            </span>
             <br><br>
            <span>
              <label class="input-48">Código postal</label><label>Id de Corralón</label><br>
                <input pattern="[0-9][0-9][0-9][0-9][0-9]" type = "text" name = "cp" size="5" class = "input-48" placeholder = "Código postal" required/>
                <input type = "text" name = "corralon" value= <?php echo $_SESSION['idCorralon'];?> class = "input-48" required readonly="readonly"/>
            </span>
             <br><br>
             <a href="../inicio.php"><input type="button" value="Regresar" class="btn-agregar"></a>
        <input type = "submit" value = "Registrar" class = "btn-agregar" required/>
        </div>
    </section>
  </form>
  </body>
</html>
