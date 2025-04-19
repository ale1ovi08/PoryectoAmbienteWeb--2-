<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StylePerdidas.css">
    <title>Agregar Pérdida</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $motivo = $_POST['motivo'];
        $fecha = $_POST['fecha'];

        include("conexion.php");
        $stmt = $conexion->prepare("INSERT INTO perdidas ( id_producto, cantidad, motivo, fecha_registro) VALUES (?,?,?,?)");
        $stmt->bind_param("iiss", $id_producto, $cantidad, $motivo, $fecha_registro);

        if ($stmt->execute()) {
            header("Location: listadoPerdida.php");
            exit();
        }                                                             
            
    }
    ?>

<h2 class="titulo-formulario">Agregar Pérdida</h2> 

<form class="formulario-perdida" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="campo-formulario">
        <label>ID producto:</label>
        <input type="number" name="id_producto" id="id_producto" required>
    </div>

    <div class="campo-formulario">
        <label>Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required>
    </div>

    <div class="campo-formulario">
        <label>Motivo:</label>
        <input type="text" name="motivo" id="motivo" required>
    </div>

    <div class="campo-formulario">
        <label>Fecha:</label>
        <input type="datetime-local" name="fecha" id="fecha">
    </div>

    <div class="botones-formulario">
        <a class="boton-regresar" href="listadoPerdida.php">Regresar</a>
        <input class="boton-enviar" type="submit" name="enviar" value="AGREGAR">
    </div>
</form>

    
</body>
</html>