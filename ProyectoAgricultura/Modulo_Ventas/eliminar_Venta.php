<?php
$id_venta = $_GET['id_venta'];
include("conexion.php");

$stmt = $conexion->prepare("DELETE FROM ventas WHERE id_venta = ?");
$stmt->bind_param("i", $id_venta);
$stmt->execute();
header("Location: listadoVenta.php");

?>



