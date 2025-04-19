<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Pérdidas</title>
    <link rel="stylesheet" href="StylePerdidas.css">

</head>

<body>

    <?php
    include 'conexion.php';

    $sql = "SELECT p.id_perdida, pr.nombre, p.cantidad, p.motivo, p.fecha_registro
FROM perdidas p
JOIN productos pr ON p.id_producto = pr.id_producto";

    $result = $conexion->query($sql);
    ?>

    <div class="control-perdidas">
        <h2 class="titulo-perdidas">Control de Pérdidas</h2>

        <div class="contenedor-botones">
            <a href="../dashboard.html" class="boton-regresar">Regresar</a>
            <a href="agregar_perdida.php" class="btn-agregar">Agregar Pérdida</a>
        </div>


        <table class="tabla-perdidas">
            <thead>
                <tr>
                    <th>ID Pérdida</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Motivo</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id_perdida"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["cantidad"]; ?></td>
                        <td><?php echo $row["motivo"]; ?></td>
                        <td><?php echo $row["fecha_registro"]; ?></td>
                        <td>
                            <a href="EditarPerdida.php?id_perdida=<?= $row['id_perdida']; ?>" class="btn-accion editar">Editar</a> -
                            <a href="eliminar_perdida.php?id_perdida=<?= $row['id_perdida']; ?>" class="btn-accion eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>