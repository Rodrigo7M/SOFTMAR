<?php 
 session_start();

include_once("../Model/db_conn.php");
include_once("../Model/Citas.class.php");


	$accion=$_REQUEST["c"];
	switch ($accion) {

	case 'create':

	
	$Cod_usu=$_POST["Cod_usu"];
	$Telefono=$_POST["Telefono"];
	$Fecha=$_POST["Fecha"];
	$Hora=$_POST["Hora"];
	$Formato=$_POST["Formato"];
	$Servicio=$_POST["Cod_serv"];
	$empleado=$_POST["Cod_empl"];
	$Cod_Emp=$_POST["Cod_Emp"];
	 

	try{
		$_SESSION["Cod_Emp"] = $Cod_Emp;
		$cita = Gestionar_citas::Mi_Cita($Cod_usu, $Fecha);
		if ($cita[0] == "") {
			if ($Cod_usu == $cita["Cod_usu"] && $Fecha == $cita["Fecha"]) {
			$mensaje="lo siento este usuario ya guardo una cita";
			$tipomensaje = "error";    		
		}else{
		 	
		 	Gestionar_citas::Create($Cod_usu,$Telefono,$Fecha,$Hora,$Formato,$Servicio,$empleado,$Cod_Emp); 
			$mensaje="Su cita fue reservada con éxito";
			$tipomensaje = "success";
	
		}
			header("Location: ../View/perfilEm.php?m=".$mensaje."&tm=".$tipomensaje);
		}else{
			$mensaje="lo siento este usuario ya guardo una cita";
			$tipomensaje = "error";
			
		}
		
		header("Location: ../View/perfilEm.php?m=".$mensaje."&tm=".$tipomensaje);
	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		$tipomensaje="error";
		header("Location: ../View/perfilEm.php?m=".$mensaje."&tm=".$tipomensaje);		

	}
	
	break;

	case 'U':

	$Cod_Emp=$_POST["Cod_Emp"];
	$Cod_usu=$_POST["Cod_usu"];
	$Telefono=$_POST["Telefono"];
	$Fecha=$_POST["Fecha"];
	$Hora=$_POST["Hora"];
	$Estado=$_POST["Estado"];
	$Cod_serv=$_POST["Cod_serv"];
	$Cod_empl=$_POST["Cod_empl"];

	try{
		Gestionar_citas::Update($Cod_Emp,$Cod_usu,$Telefono,$Fecha,$Hora,$Estado,$Cod_serv,$Cod_empl);
		$mensaje="la cita se modifico correctamente";
		$tipomensaje="success";
		// if ($_SESSION["Perfil"] =="Administrador") {
		
		// header("Location: ../View/Gestion_Citas.php?m=".$mensaje."&tm=".$tipomensaje);	
		// }
		// elseif ($_SESSION["Perfil"] =="Usuario") {
			
		// 	header("Location: ../View/Mi_Cita.php?m=".$mensaje."&tm=".$tipomensaje);
		// }


		
		
		}catch(Exception $e){
			$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
			$tipomensaje="error";
			// header("Location: ../View/Modificar_Cita.php?m=".$mensaje."&tm=".$tipomensaje);

		}


		break;

	case 'd':

	try{
		Gestionar_citas::Delete(base64_decode($_REQUEST["ci"]));
		$mensaje="la cita se elimino correctamente";
		$tipomensaje="success";
		header("Location: ../View/Gestionar_citas.php?m=".$mensaje."&tm=".$tipomensaje);Mi_Citas($_REQUEST["rodri"]);
	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		
		header("Location: ../View/Gestionar_citas.php?m=".$mensaje."&tm=".$tipomensaje);
		$tipomensaje="error";
	}		

	break;
	
	case 'de':

	try{
		Gestionar_citas::Delete(base64_decode($_REQUEST["rodri"]));
		$mensaje="la cita se elimino correctamente";
		$tipomensaje="success";
		header("Location: ../View/Gestionar_micita.php?m=".$mensaje."&tm=".$tipomensaje);
	}catch(Exception $e){
		$mensaje="ha ocurrido un error, el error fue:".$e->getMessage()."en el archivo:".$e->getFile()."en la linea:".$e->getLine();
		
		header("Location: ../View/Gestionar_micita.php?m=".$mensaje."&tm=".$tipomensaje);
		$tipomensaje="error";
	}		

	break;
    // citas validacion con ajax
	case 'valida_citas':
	  	$Fecha = $_POST["fecha_cita"]; 
	  	$Hora = $_POST["hora"]; 
	  	$empleado = $_POST["empleado"];
	  	$formato = $_POST["formato"];
	 
	  	try{
	  		$cita = Gestionar_citas::ValidoCita($Fecha, $Hora, $empleado, $formato);

	  		if($cita[0] != ""){
	  			$existe = true;	
	  			$message = "Este horario ya se encuentra ocupado.";
	  		}else{
	  			$existe = false;
	  			$message = "";
	  		} 
	  	}catch(Exception $e){
	  		echo $e->getMessage();
	  	}


	  	echo json_encode(array('ue' => $existe, 'msn' => $message));

	  break;

}


 ?>