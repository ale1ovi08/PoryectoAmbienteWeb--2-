<?php
include("conectar.php");

$id = $_GET['id'];

$stmt = $conexion->prepare("DELETE FROM categorias WHERE id_categoria = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: categorias.php");
exit;
?>