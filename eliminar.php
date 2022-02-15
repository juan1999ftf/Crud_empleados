
<?php
include('bd/conexion.php');
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $query="DELETE FROM persona WHERE id='$id'";
    $resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die('No se pudo agregar');
    }
    echo 'Tarea eliminada satisfactoriamente';

}

?>
