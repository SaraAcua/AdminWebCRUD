<?php
if(empty($_POST['accion'])){

  $_POST['accion']="Listar";
  
  }
  
  switch($_POST['accion']){
  
    case "Adicionar":
      AdicionarClientes();
      break;
    default:
      ListarClientes(); 
      break;     
  
  }
  

//guardar
function AdicionarClientes(){

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
} 


function ListarClientes(){

  require "config.php";
    
  //generamos la consulta
$sql = "SELECT * FROM clientes";

mysqli_set_charset($con, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($con, $sql)) die();


echo "<thead>
<tr>
<th >Foto</th>
<th>Nombre</th>
<th>Apellido</th>
<th class='d-none d-xl-table-cell'>Direccion</th>
<th class='d-none d-xl-table-cell'>Ciudad</th>
<th class='d-none d-xl-table-cell'>Telefono</th>
<th>Acciones</th>
</tr>
</thead><tbody>";

while($row = $result->fetch_assoc()) { 
  echo "<tr>"; 
  echo "<td><img src=".$row["Foto"]." width=50/></td>"; 
  echo "<td>".$row["Nombre"]."</td>"; 
  echo "<td>".$row["Apellido"]."</td>"; 
  echo "<td>".$row["Direccion"]."</td>"; 
  echo "<td>".$row["Ciudad"]."</td>"; 
  echo "<td>".$row["Telefono"]."</td>";
  
  $id=$row["Id"];

  ?> 

<?php
  echo '<td><button data-id=.$id. onclick="EditarCliente()"  type="button" class="btn btn-edit btn-success btn-sm">Editar</button>';
  echo '<button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>';
  ?>

  <?php 

  echo "</tr>";  


} 

echo '</tbody>';


}



    
?>
    



