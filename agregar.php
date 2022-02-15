<?php
include('bd/conexion.php');
if(isset($_POST['nombresp'])){
    $nombresp=$_POST['nombresp'];
    $apellidosp=$_POST['apellidosp'];
    $cargo=$_POST['cargo'];
    $query="INSERT into persona(nombresp,apellidosp,cargo) VALUES ('$nombresp','$apellidosp','$cargo')";
    $resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('No se pudo agregar');
    }
    echo 'Tarea agregada satisfactoriamente';

}

?>