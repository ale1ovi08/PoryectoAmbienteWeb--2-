<?php
$conexion= new mysqli("localhost:3307","userProyecto","12345",'proyectoagricultura');

if($conexion->connect_error){
    die("Conexion fallida: " .$conexion->connect_error);
}
?>