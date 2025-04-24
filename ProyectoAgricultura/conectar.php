<?php
$conexion = new mysqli("localhost", "Fabian", "1234", "ambienteweb", 3307);

if($conexion->connect_error){
    die("Conexion fallida: " .$conexion->connect_error);
}else{
    
}
?>