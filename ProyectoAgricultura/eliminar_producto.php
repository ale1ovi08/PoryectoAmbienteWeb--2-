<?php
include("conectar.php");

$id = $_GET['id'];

$stmt = $conexion->prepare("DELETE FROM productos WHERE id_producto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: productos.php");
exit;
?>
