<?php
include('bd/conexion.php');
$query="SELECT *FROM persona";
$resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('No se pudo agregar');
    }
    while($row= mysqli_fetch_array($resultado)){
        $json[]=array(
            'nombresp' => $row['nombresp'],
            'apellidosp' => $row['apellidosp'],
            'cargo' => $row['cargo'],
            'id' => $row['id']
        );
    }
    $jsonstring= json_encode($json);
    echo $jsonstring;
?>