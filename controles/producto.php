<?php

//guardar

    require "config.php";

 if  ( $_POST['accion']="Adicionar") {

    $descripcion = $_POST['descripcionproducto'];      
    $foto = $_POST['fotoproducto'];   
    $categoria = $_POST['categoriaproductos'];           
   

    $sql = "INSERT INTO `productos`( Descripcion, Foto, Categoria)  VALUES ('$descripcion','$foto','$categoria')";
    
   
  if (mysqli_query($con, $sql)) {
          echo "Producto Creado";
  } else {
        echo "Error: " . $sql ;
        echo mysqli_error($con);
  }

} else{
  echo "No entro";
}
    
?>



