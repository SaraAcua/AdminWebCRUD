<?php

//guardar

    require "config.php";

 if  ( $_POST['accion']="Adicionar") {

    $nombre = $_POST['nombrecliente'];       //'Juanita'; //
    $apellido = $_POST['apellidocliente'];   //   'perez' ; //
    $foto = $_POST['fotocliente'];           //'123'   ;//
    $direccion = $_POST['direccioncliente']; //'123'   ;//
    $ciudad = $_POST['ciudadcliente'];       //'123'   ;//
    $telefono = $_POST['telefonocliente'];   //'123'   ;//

    $sql = "INSERT INTO clientes (id,nombre,apellido,foto,direccion,ciudad,telefono) VALUES (default,'$nombre', '$apellido', '$foto','$direccion','$ciudad','$telefono')";
    
   
  if (mysqli_query($con, $sql)) {
          echo "Cliente Creado";
  } else {
        echo "Error: " . $sql ;
        echo mysqli_error($con);
  }

}  
    
?>



