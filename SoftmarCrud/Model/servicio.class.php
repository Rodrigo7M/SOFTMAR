<?php

class Gestion_servicio{

    function create($Cod_Emp, $Nombre,$Duracion, $Precio){

        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO servicio_emp (Cod_Emp, Nombre,Duracion,Precio ) VALUES (?,?,?,?)";

        $query = $Conexion->prepare($consulta);
        $query->execute(array($Cod_Emp, $Nombre, $Duracion, $Precio));

        Softmar_BD::Disconnect();
    }

    
    function ReadAll(){
    	
        $conexion=softmar_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $consulta="SELECT * FROM servicio_emp";
        
        $query=$conexion->prepare($consulta);
        $query->execute();


        $resultado = $query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        softmar_BD::Disconnect();
    } 

    function ReadbyID($Cod_serv){

    //Instanciamos y nos conectamos a la bd
    $Conexion = Softmar_BD::Connect();
    $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

    //Crear el query que vamos a realizar
    $consulta = "SELECT * FROM servicio_emp WHERE Cod_serv=?";

    $query = $Conexion->prepare($consulta);
    $query->execute(array($Cod_serv));

    //Devolvemos el resultado en un arreglo
    //Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
    //Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

    $resultado = $query->fetch(PDO::FETCH_BOTH);
    return $resultado;

    Softmar_BD::Disconnect();
  }

  function Readbyserv($Cod_Emp){

        //Instanciamos y nos conectamos a la bd
        $Conexion = Softmar_BD::Connect();
        $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        //Crear el query que vamos a realizar
        $consulta = "SELECT * FROM servicio_emp WHERE Cod_Emp=?";

        $query = $Conexion->prepare($consulta);
        $query->execute(array($Cod_Emp));

        //Devolvemos el resultado en un arreglo
        //Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
        //Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

        $resultado = $query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        Softmar_BD::Disconnect();
    } 
    function update($Cod_serv,$Cod_Emp, $Nombre, $Duracion, $Precio){

	   $conexion=softmar_BD::connect();
	   $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	   $consulta="UPDATE servicio_emp SET Cod_Emp=?,Nombre=?, Duracion=?, Precio=? WHERE Cod_serv=?";
	   $query=$conexion->prepare($consulta);
	   $query->execute(array($Cod_Emp,$Nombre, $Duracion, $Precio, $Cod_serv));

	   softmar_BD::Disconnect();
    }

    function delete($Cod_serv){

      $Conexion = Softmar_BD::Connect();
      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta= "DELETE FROM servicio_emp WHERE Cod_serv=?";
      $query = $Conexion->prepare($consulta);
      $query->execute(array($Cod_serv));

      softmar_BD::Disconnect();
    }
}
?>