<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleVentas.css">

    <title>Editar Ventas</title>
</head>

<body id="body_agregar_venta">
    <?php
    if (isset($_POST['actualizar'])) {
        $id_venta = $_POST['id_venta'];
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['total'];
        $fecha_venta = $_POST['fecha'];
        $stmt = $conexion->prepare("UPDATE ventas SET id_producto=?, cantidad=?, total=?, fecha_venta=? WHERE id_venta=?");
        $stmt->bind_param("iiisi", $id_producto, $cantidad, $total, $fecha_venta, $id_venta);

        if ($stmt->execute()) {
            header("Location: listadoventa.php");
            exit();
        }
    } else {

        $id_venta = $_GET['id_venta'];

        $stmt = $conexion->prepare("SELECT id_producto, cantidad, total, fecha_venta FROM ventas WHERE id_venta=?");
        $stmt->bind_param("i", $id_venta);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();

        if ($row) {
            $id_producto = $row["id_producto"];
            $cantidad = $row["cantidad"];
            $total = $row["total"];
            $fecha_venta = $row["fecha_venta"];
        }

    ?>
        <h2 class="titulo-formulario">Editar Pérdida</h2>

        <form class="formulario-venta" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="campo-formulario">
                <label>ID Producto</label>
                <input type="number" name="id_producto" id="id_producto" value="<?php echo $id_producto; ?>">
            </div>

            <div class="campo-formulario">
                <label>Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
            </div>

            <div class="campo-formulario">
                <label>Total</label>
                <input type="text" name="total" id="total" value="<?php echo $total; ?>">
            </div>

            <div class="campo-formulario">
                <label>Fecha</label>
                <input type="datetime-local" name="fecha" id="fecha" value="<?php echo $fecha_venta; ?>">
            </div>

            <input type="hidden" name="id_venta" value="<?php echo $id_venta; ?>">

            <div class="botones-formulario">
                <a class="boton-regresar" href="listadoventa.php">Regresar</a>
                <input class="boton-enviar" type="submit" name="actualizar" value="Actualizar">
            </div>
        </form>

    <?php
    }
    ?>
</body>

</html>