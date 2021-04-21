<?php

require "config.php";

if(empty($_POST['accion'])){
  $_POST['accion']="General";
}

switch($_POST['accion']){

  case "Adicionar":
    
if($_POST['idcliente']==""){

  $nombre = $_POST['nombrecliente'];       //'Juanita'; //
  $apellido = $_POST['apellidocliente'];   //   'perez' ; //
  $foto = $_POST['fotocliente'];           //'123'   ;//
  $direccion = $_POST['direccioncliente']; //'123'   ;//
  $ciudad = $_POST['ciudadcliente'];       //'123'   ;//
  $telefono = $_POST['telefonocliente'];   //'123'   ;//

  $sql = "INSERT INTO clientes (nombre,apellido,foto,direccion,ciudad,telefono) VALUES ('$nombre', '$apellido', '$foto','$direccion','$ciudad','$telefono')";
  
  if (mysqli_query($con, $sql)) {
    $respuesta = array("mensaje"=>"Datos Modificados");
    $json_string = json_encode($respuesta);
    echo $json_string;
  
  } else {
    $respuesta = array("mensaje"=>"Error". mysqli_error($con));
    $json_string = json_encode($respuesta);
    echo $json_string;
  }



}else{
  $idcliente = $_POST['idcliente'];       //'Juanita'; //
  $nombre = $_POST['nombrecliente'];       //'Juanita'; //
  $apellido = $_POST['apellidocliente'];   //   'perez' ; //
  $foto = $_POST['fotocliente'];           //'123'   ;//
  $direccion = $_POST['direccioncliente']; //'123'   ;//
  $ciudad = $_POST['ciudadcliente'];       //'123'   ;//
  $telefono = $_POST['telefonocliente'];   //'123'   ;//
 
  $sql = "UPDATE clientes SET nombre='$nombre',apellido='$apellido',foto='$foto',direccion='$direccion',ciudad='$ciudad',telefono='$telefono' WHERE id='$idcliente'";

if (mysqli_query($con, $sql)) {
  $respuesta = array("mensaje"=>"Datos Modificados");
  $json_string = json_encode($respuesta);
  echo $json_string;

} else {
  $respuesta = array("mensaje"=>"Error". mysqli_error($con));
  $json_string = json_encode($respuesta);
  echo $json_string;
}

}

break;

  case "BuscarC":
  
 
  $idcliente = $_POST['idcliente'];    //'Juanita'; //
  //echo $idcliente;
  //$idcliente=2;

  $sql = "SELECT  * FROM clientes WHERE id='$idcliente'"; 
  
  if(!$result = mysqli_query($con, $sql)) die();

  $clientes = array(); //creamos un array

  while($row = $result->fetch_assoc()) 
  { 
  array_push($clientes,$row);
  }

  $json_string = json_encode($clientes);
  echo $json_string;

break;
  case "EliminarC":
   
    $idclientedel = $_POST['idclientedel'];    //'Juanita'; //
    //echo $idcliente;
    //$idcliente=2;
  
    $sql = "DELETE  FROM clientes WHERE id='$idclientedel'"; 
    
    
    
  if (mysqli_query($con, $sql)) {
    $respuesta = array("mensaje"=>"Datos Eliminados");
    $json_string = json_encode($respuesta);
    echo $json_string;
  } else {
    $respuesta = array("mensaje"=>"Error". mysqli_error($con));
    $json_string = json_encode($respuesta);
    echo $json_string;
  }
break;

default:
ListarClientes();
break;
}
function ListarClientes(){

  require "config.php";
    
  //generamos la consulta
$sql = "SELECT * FROM clientes";

mysqli_set_charset($con, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($con, $sql)) die();

$clientes = array(); //creamos un array

while($row = $result->fetch_assoc()) 
{ 
array_push($clientes,$row);
}

$json_string = json_encode($clientes);
echo $json_string;

}
   
?>