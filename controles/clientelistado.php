<?php

require "config.php";

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
</thead>";

while($row = $result->fetch_assoc()) { 
  echo "<tr>"; 
  echo "<td><img src=".$row["Foto"]." width=50/></td>"; 
  echo "<td>".$row["Nombre"]."</td>"; 
  echo "<td>".$row["Apellido"]."</td>"; 
  echo "<td>".$row["Direccion"]."</td>"; 
  echo "<td>".$row["Ciudad"]."</td>"; 
  echo "<td>".$row["Telefono"]."</td>";
  
  $id=$row["id"];

?>

  <td><button data-id=<?php echo $id; ?> onclick="BuscarCliente()"  type="button" class="btn btn-edit btn-success btn-sm">Editar</button>
  <button  type="button" class="btn btn-danger btn-sm">Eliminar</button></td>

<?php 
  echo "</tr>";  
       

}
?>