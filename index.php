<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Pérdidas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
include 'conexion.php';

$sql="SELECT p.id_perdida, pr.nombre, p.cantidad, p.motivo, p.fecha_registro
FROM perdidas p
JOIN productos pr ON p.id_producto = pr.id_producto";

$result=$conexion->query($sql);
?>

<h2>Control de Pérdidas</h2>
<a href="agregar_perdida.php" class="btn">Agregar Pérdida</a><br><br>
<table>
    <thead>
        <tr>
            <th>ID Perdida</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Motivo</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row=$result->fetch_assoc()){
        ?>
         <tr>
            <th><?php echo $row["id_perdida"] ?></th>
            <th><?php echo $row["nombre"] ?></th>
            <th><?php echo $row["cantidad"]?></th>
            <th><?php echo $row["motivo"]?></th>
            <th><?php echo $row["fecha_registro"]?></th>
            <th>
            <?php echo "<a href='EditarPerdida.php?id_perdida=".$row['id_perdida']."'>Editar</a>";?>
            -
            <?php echo "<a href='eliminar_perdida.php?id_perdida=".$row['id_perdida']."'>Eliminar</a>";?>
            </th>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

</body>
</html>
