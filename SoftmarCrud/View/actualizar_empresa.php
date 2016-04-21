<?php
 session_start();
  require_once("../Model/db_conn.php");
  require_once("../Model/contactos.class.php");

   if(!isset($_SESSION["Cod_usu"])){
    $msn = base64_encode("Debe iniciar sesion primero!");
    $tipo_msn = base64_encode("advertencia");

    header("Location: ../View/login.php?m=".$msn."&tm=".$tipo_msn);
  }
   require_once("../Model/empresa.class.php");
   $empresa =  Gestion_Empresa::ReadbyId(base64_decode($_REQUEST["ei"]));
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8"/>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
     <center><div class="empref">
      <h4 class="teal-text text-teal lighten-3 test">Actualizar</h4>
      <div class="row formem">
        <form class="col s12" action="controller/empresa.controller.php" method="POST">
          <div class="row">
          <input type="text" readonly name="Cod_Emp" required value="<?php echo $empresa[0] ?>">
            <div class="col s12"></div>
              <select name="Cod_TipEmp" required  value="<?php echo $empresa[1] ?>">
                <option value="3" <?php if($empresa["Cod_TipEmp"] == 3){ echo "selected"; } ?>>Peluqueria</option>
                <option value="4" <?php if($empresa["Cod_TipEmp"] == 4){ echo "selected"; } ?>>Barberia</option>
                <option value="5" <?php if($empresa["Cod_TipEmp"] == 5){ echo "selected"; } ?>>Spa</option>
                <option value="6" <?php if($empresa["Cod_TipEmp"] == 6){ echo "selected"; } ?>>Peluqueria infantil</option>
              </select>
              <div>
              <div class="input-field col s12">
                <input id="Nombre" type="text" class="validate" required  value="<?php echo $empresa[2] ?>">
                <label for="Nombre" data-error="wrong" name="Nombre" >Nombre Empresa</label>
              </div>
              <div class="input-field col s6">
                <input id="telefono" type="number" class="validate" required  value="<?php echo $empresa[3] ?>">
                <label for="Telefono" data-error="wrong" name="Telefono">Telefono</label>
              </div>
              <div class="input-field col s6">
                <input id="Direccion" type="text" class="validate" required  value="<?php echo $empresa[4] ?>">
                <label for="Direccion" data-error="wrong" name="Direccion">Direccion</label>
              </div>
              <!-- <div class="input-field col s6" required  value="<?php //echo $empresa[5] ?>">
                <select>
                  <option value="" disabled selected name="Ciudad">elige tu ciudad</option>
                </select>
                <label>Ciudad</label>
              </div> -->
              <div class="input-field col s6">
                <input id="NIT" type="number" class="validate" required  value="<?php echo $empresa[6] ?>">
                <label for="NIT" data-error="wrong" name="NIT" >NIT</label>
              </div>
              <div class="input-field col s6">
                <input id="email" type="email" class="validate" required  value="<?php echo $empresa[7] ?>">
                <label for="email" data-error="wrong" name="Correo">Correo electronico</label>
              </div>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1" name="Informacion" required  value="<?php echo $empresa[10] ?>">Informacion</label>
              </div>
              <div class="col s12">
                <p class="center">Dias de atencion</p>
                <div class="col s6">
                  <input type="text" name="Dias_aten" required  value="<?php echo $empresa[11] ?>">
                </div>
              </div>
              <div class="col s12">
              <p class="center">Horario</p>
                <div class="col s6">
                  <label>desde</label>
                  <input type="time" name="Hor_desde" required  value="<?php echo $empresa[12] ?>">
                </div>
                <div class="col s6">
                <label>Hasta</label>
                  <input type="time" name="Hor_hasta" required  value="<?php echo $empresa[13] ?>">
                </div>
              </div>
              <input type="hidden" value="" name="Geo_x" required  value="<?php echo $empresa[8] ?>">
              <input type="hidden" value="" name="Geo_y" required  value="<?php echo $empresa[9] ?>">
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Foto 1:</span>
                  <input type="file" value="<?php echo $empresa[14] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input name="Foto1" class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
              </div>
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Foto 2:</span>
                  <input type="file" value="<?php echo $empresa[15] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input name="Foto2" class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
              </div>
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Foto 3:</span>
                  <input type="file" value="<?php echo $empresa[16] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input name="Foto3" class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
              </div>
              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>Foto 4:</span>
                  <input type="file" value="<?php echo $empresa[17] ?>">
                </div>
                <div class="file-path-wrapper">
                  <input name="Foto4" class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
              </div>
                  <div class="file-field input-field col s6">
                      <div class="btn">
                        <span>Logo</span>
                        <input type="file" value="<?php echo $empresa[18] ?>">
                      </div>
                      <div class="file-path-wrapper">
                          <input name="Logo" class="file-path validate" type="text">
                      </div>
                  </div>
            </div>
          </div>
           <button  onclick="Aceptar()" name="accion" value="u" id="boton" class="btn waves-effect" style="margin: 20px;">Actualizar</button>
                  <a href="Gestion_Empresa_admin.php" id="boton" class="btn waves-effect" style="margin: 20px;" >Cancelar</a>
                <?php echo @$_REQUEST["$mensaje"]; ?>
        </form>
      </div>  
    </div></center>
    <script type="text/javascript" src="Jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
          $('select').material_select();
        });
    </script>
    <script>
      function Aceptar() {
        confirm("Se actualizo correctamente");
        window.location="Gestion_Empresa_admin.php";
      }
    </script>
    <script>
      $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15 // Creates a dropdown of 15 years to control year
      });

    </script>
    </body>
  </html>
