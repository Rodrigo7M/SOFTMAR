<!-- Menu Administrador = perfil 1 -->

<?php
if($_SESSION["cod_rol"]==103){
?>
 
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="Gestion_Usuario_admin.php">Gestionar usuario</a></li>
    <li><a href="Gestion_Empresa_admin.php">Gestionar empresa</a></li>
    <li><a href="Gestion_Servicio_admin.php">Gestionar servicio</a></li>
    <li><a href="Gestion_Producto_admin.php">Gestionar producto</a></li>
    <li><a href="Gestion_Oferta_admin.php">Gestionar oferta</a></li>
    <li><a href="Gestionar_Empleado.php">Gestionar empleado</a></li>
    <li><a href="Gestionar_citas.php">Gestionar citas empresas</a></li>
 </ul>
 <ul class="right hide-on-med-and-down">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gestionar<i class="material-icons right">arrow_drop_down</i></a></li>
   <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
 </ul>  
  <ul id="dropdown2" class="dropdown-content"> 
      <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>   
      <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul>
  <ul class="side-nav" id="mobile-demo">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="informacion.php">Información</a></li>
    <!-- <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gestionar<i class="material-icons right">arrow_drop_down</i></a></li>
   <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php //echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li> -->
  </ul>
<?php
}elseif($_SESSION["cod_rol"]==102){
?>
<ul class="right hide-on-med-and-down">
    <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="informacion.php">Información</a></li>
    <li><a href="nosotros.php">Nosotros</a></li>
    <li><a href="contacto.php">Contacto</a></li>
    <li><a href="Gestionar_micita.php?rodri=<?php echo ($_SESSION["Cod_usu"])?> ">Consultar mis citas</a></li>

    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
  </ul>
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>
    <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
  </ul>
  <ul class="side-nav" id="mobile-demo">
  <li><a href="dashboard.php">Inicio</a></li>
    <li><a href="informacion.php">Información</a></li>
    <li><a href="nosotros.php">Nosotros</a></li>
    <li><a href="contacto.php">Contacto</a></li>
    <li><a href="Gestionar_micita.php">Consultar mis citas</a></li>
  </ul> 
<?php
  }elseif ($_SESSION["cod_rol"]==101) {
         
?>
    

    <ul class="right hide-on-med-and-down">
      <li><a href="dashboard.php">Inicio</a></li>
      <li><a href="informacion.php">Información</a></li>
      <li><a href="nosotros.php">Nosotros</a></li>      
      <li><a href="perfilEm.php">Ver tu empresa</a></li>
      <li><a href="Registrar_producto.php">Agrega productos</a></li>
      <li><a href="Registrar_oferta.php">Agrega ofertas</a></li>
      <li><a href="Gestionar_Cita_empl.php?do=<?php echo ($_SESSION["Cod_Emp"])?> ">Consultar mis citas</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="ActualizarMiperfil.php">Editar Perfil</a></li>
      <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
    </ul>



    <!--  -->
    <ul id="dropdown3" class="dropdown-content">
        <li><a href="#">Gestionar empresa</a></li>
        <li><a href="#">Gestionar empleado</a></li>
        <li><a href="#">Gestionar servicio</a></li>
        <li><a href="#">Gestionar producto</a></li>
        <li><a href="#">Gestionar oferta</a></li>      
      </ul>

      <ul id="dropdown4" class="dropdown-content">
      <li><a href="#!">Editar Perfil</a></li>
      <li><a href="../Controller/cerrarusuario.php">Cerrar sesión</a></li>
    </ul>


    <ul class="side-nav" id="mobile-demo">
      <li><a href="dashboard.php">Inicio</a></li>
      <li><a href="#">Empleados</a></li>
      <li><a href="#">Ofertas</a></li>
      <li><a href="#">Citas</a></li>
      <li><a href="#">Reportes</a></li>
      <li><a href="perfilEm.php">Ver tu empresa</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Gestionar<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown4"><?php echo($_SESSION["Nombre"])." ".($_SESSION["Apellido"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>


<?php     
} 
?> 
          
   
