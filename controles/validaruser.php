<?php
include "config.php";

//header('Location: index.php'); 

//Escapa los caracteres especiales de una cadena para usarla 
//en una sentencia SQL, tomando en cuenta el conjunto de 
//caracteres actual de la conexión
//Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.

$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

//$username="alex";
//$password="1223";

$count=0;

if ($username != "" && $password != ""){

    //$sql_query = "select count(*) as numusu,nombre as nombre,foto from usuarios where user='".$username."' and pass='".$password."'";
    $sql_query = "select count(*) as numusu,name as nombre,image as foto,cargo as position from usuario where user='".$username."' and pasword='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['numusu'];
    $nombre = $row['nombre'];
    $foto = $row['foto'];
    $cargo = $row['position'];
    
   
    if($count > 0){
        $_SESSION['usuario'] = $nombre;
        $_SESSION['foto'] = $foto;
        $_SESSION['cargo'] = $cargo;
        $_SESSION['validar'] = true;
       
       
    }else{
        
        $_SESSION['validar'] = false;
    }

}
?>