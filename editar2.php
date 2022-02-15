<?php

include('bd/conexion.php');
$id=$_POST['id'];
$nombresp=$_POST['nombresp'];
$apellidosp=$_POST['apellidosp'];
$cargo=$_POST['cargo'];
$query="UPDATE persona SET nombresp= '$nombresp',apellidosp= '$apellidosp',cargo= '$cargo' WHERE id='$id'";
$resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('Consulta fallida');
    }

    echo "tarea actualizada completamente";
?>