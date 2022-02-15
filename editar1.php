<?php

include('bd/conexion.php');
$id=$_POST['id'];
$query="SELECT *FROM persona WHERE id= '$id'";
$resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('Consulta fallida');
    }
    while($row= mysqli_fetch_array($resultado)){
        $json[]=array(
            'nombresp' => $row['nombresp'],
            'apellidosp' => $row['apellidosp'],
            'cargo' => $row['cargo'],
            'id' => $row['id']
        );
    }
    $jsonstring= json_encode($json[0]);
    echo $jsonstring;
?>