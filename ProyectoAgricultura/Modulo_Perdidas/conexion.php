<?php   
$conexion= new mysqli("localhost","fabian","12345",'proyectoagricultura');

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
}
?>
