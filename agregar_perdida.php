<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar perdida</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $id_perdida = $_POST['id_perdida'];
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $motivo = $_POST['motivo'];
        $fecha = $_POST['fecha'];

        include("conexion.php");
        $stmt = $conexion->prepare("INSERT INTO perdidas (id_perdida, id_producto, cantidad, motivo, fecha_registro) VALUES (?,?,?,?,?)");
        $stmt->bind_param("iiiss", $id_perdida, $id_producto, $cantidad, $motivo, $fecha_registro);
        $stmt->execute();

    }
    ?>


    <h2>Agregar perdida</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label>ID perdida:</label>
        <input type="number" name="id_perdida"><br>
        <label>ID producto:</label>
        <input type="number" name="id_producto"><br>
        <label>Cantidad:</label>
        <input type="number" name="cantidad"><br>
        <label>Motivo:</label>
        <input type="text" name="motivo"><br>
        <label>Fecha:</label>
        <input type="datetime-local" name="fecha"><br>
        <a href="index.php">Regresar</a>
        <input type="submit" name="enviar" value="AGREGAR">
    </form>
</body>

</html>