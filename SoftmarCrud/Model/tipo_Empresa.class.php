<?php 
#-> Class: Gestion_contactos
#->Method(s), Create (), ReadAll(),ReadbyID(),ReadbyName(),Update(),Delete()
#->Author: @Andrea_Guzman
#->Date Create
#->Last Update
#->Date Update

class Gestion_Tipo_Empresa{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($Nombre){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Capturar fecha del sistema
		//$fechacreacion = data("Y-m-d");

		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO tipo_emp (Nombre) VALUES (?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Nombre));

		Softmar_BD::Disconnect();
	}
	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM tipo_emp ORDER BY Nombre";

		$query = $Conexion->prepare($consulta);
		$query->execute();

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
}
?>