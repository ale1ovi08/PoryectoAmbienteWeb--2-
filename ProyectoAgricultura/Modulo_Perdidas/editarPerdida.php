<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StylePerdidas.css">

    <title>Editar Perdida</title>
</head>

<body id="body_agregar_perdida">
    <?php
    if (isset($_POST['actualizar'])) {
        $id_perdida = $_POST['id_perdida'];
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $motivo = $_POST['motivo'];
        $fecha_registro = $_POST['fecha'];
        $stmt = $conexion->prepare("UPDATE perdidas SET id_producto=?, cantidad=?, motivo=?, fecha_registro=? WHERE id_perdida=?");
        $stmt->bind_param("iissi", $id_producto, $cantidad, $motivo, $fecha_registro, $id_perdida);

        if ($stmt->execute()) {
            header("Location: listadoPerdida.php");
            exit();
        }
    } else {

        $id_perdida = $_GET['id_perdida'];

        $stmt = $conexion->prepare("SELECT id_producto, cantidad, motivo, fecha_registro FROM perdidas WHERE id_perdida=?");
        $stmt->bind_param("i", $id_perdida);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();

        if ($row) {
            $id_producto = $row["id_producto"];
            $cantidad = $row["cantidad"];
            $motivo = $row["motivo"];
            $fecha_registro = $row["fecha_registro"];
        }

    ?>
        <h2 class="titulo-formulario">Editar Pérdida</h2>

        <form class="formulario-perdida" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="campo-formulario">
                <label>ID Producto</label>
                <input type="number" name="id_producto" id="id_producto" value="<?php echo $id_producto; ?>">
            </div>

            <div class="campo-formulario">
                <label>Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
            </div>

            <div class="campo-formulario">
                <label>Motivo</label>
                <input type="text" name="motivo" id="motivo" value="<?php echo $motivo; ?>">
            </div>

            <div class="campo-formulario">
                <label>Fecha</label>
                <input type="datetime-local" name="fecha" id="fecha" value="<?php echo $fecha_registro; ?>">
            </div>

            <input type="hidden" name="id_perdida" value="<?php echo $id_perdida; ?>">

            <div class="botones-formulario">
                <a class="boton-regresar" href="listadoPerdida.php">Regresar</a>
                <input class="boton-enviar" type="submit" name="actualizar" value="Actualizar">
            </div>
        </form>

    <?php
    }
    ?>
</body>

</html>