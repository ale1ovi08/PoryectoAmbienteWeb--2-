<?php   
$conexion= new mysqli("localhost:3308","admin","12345",'ProyectoAgricultura');

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
}
?>
