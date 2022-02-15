<?php
include('bd/conexion.php');
$buscar=$_POST['buscar'];
if(!empty($buscar)){
    $query="SELECT * FROM persona WHERE nombresp LIKE '$buscar%'";
    $resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('Error de consulta'.mysqli_error($conexion));

    }
    $json=array();
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
}
?>