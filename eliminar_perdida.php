<?php
$id_perdida = $_GET['id_perdida'];
include("conexion.php");

$stmt = $conexion->prepare("DELETE FROM perdidas WHERE id_perdida = ?");
$stmt->bind_param("i", $id_perdida);
$stmt->execute();
header("Location: index.php");

?>



