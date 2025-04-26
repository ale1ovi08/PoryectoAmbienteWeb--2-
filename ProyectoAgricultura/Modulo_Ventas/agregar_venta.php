<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleVentas.css">
    <title>Agregar Venta</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['total'];
        $fecha = $_POST['fecha'];

        include("conexion.php");
        $stmt = $conexion->prepare("INSERT INTO ventas ( id_producto, cantidad, total, fecha_venta) VALUES (?,?,?,?)");
        $stmt->bind_param("iiis", $id_producto, $cantidad, $total, $fecha_registro);

        if ($stmt->execute()) {
            header("Location: listadoVenta.php");
            exit();
        }                                                             
            
    }
    ?>
<h2 class="titulo-formulario">Agregar Venta</h2> 

<form class="formulario-venta" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="campo-formulario">
        <label>ID producto:</label>
        <input type="number" name="id_producto" id="id_producto" required>
    </div>

    <div class="campo-formulario">
        <label>Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required>
    </div>

    <div class="campo-formulario">
        <label>Total:</label>
        <input type="text" name="total" id="total" required>
    </div>

    <div class="campo-formulario">
        <label>Fecha:</label>
        <input type="datetime-local" name="fecha" id="fecha">
    </div>

    <div class="botones-formulario">
        <a class="boton-regresar" href="listadoVenta.php">Regresar</a>
        <input class="boton-enviar" type="submit" name="enviar" value="AGREGAR">
    </div>
</form> 
</body>
</html>