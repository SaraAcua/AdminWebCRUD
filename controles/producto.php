<?php

if(empty($_POST['accion'])){

  $_POST['accion']="Listar";
  
  }
  
  switch($_POST['accion']){
  
    case "Adicionar":
      AdicionarProductos();
      break;
    default:
    ListarProductos();  
      break;     
  
  }

//guardar
function AdicionarProductos(){


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
}
function ListarProductos(){

  require "config.php";
    
  //generamos la consulta
$sql = "SELECT * FROM productos";

mysqli_set_charset($con, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($con, $sql)) die();




echo "<thead>
<tr>
<th>Foto</th>
<th>Descripcion</th>
<th>Categoria</th>
<th>Acciones</th>
</tr>
</thead><tbody>";

while($row = $result->fetch_assoc()) { 
  echo "<tr>"; 
  echo "<td><img src=".$row["Foto"]." width=50/></td>"; 
  echo "<td>".$row["Descripcion"]."</td>"; 
  echo "<td>".$row["Categoria"]."</td>"; 
  
  
  $id=$row["Id"];

  ?> 

<?php
  echo '<td><button data-id=.$id. onclick="EditarProducto"  type="button" class="btn btn-edit btn-success btn-sm">Editar</button>';
  echo '<button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>';
  ?>

  <?php 

  echo "</tr>";  


} 

echo '</tbody>';


}

    
?>



