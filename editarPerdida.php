<?php
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perdida</title>
</head>
<body>
<?php
    if(isset($_POST['actualizar'])){
        $id_perdida=$_POST['id_perdida'];
        $id_producto=$_POST['Id_producto'];
        $cantidad=$_POST['cantidad'];
        $motivo=$_POST['motivo'];
        $fecha_registro=$_POST['fecha_registro'];
        $stmt = $conexion->prepare("UPDATE perdidas SET id_producto=?, cantidad=?, motivo=?, fecha_registro=? WHERE id_perdida=?");
        $stmt->bind_param("iiiss", $id_perdida, $id_producto, $cantidad, $motivo, $fecha_registro);
        $stmt->execute();

    }else{
      
        $id_perdida=$_GET['id_perdida'];
        $stmt = $conexion->prepare("SELECT * FROM perdidas WHERE id_perdida=?");
        $stmt->bind_param("i", $id_perdida);
        $stmt->execute();
        
        $id_producto=$row["id_producto"];
        $cantidad=$row["cantidad"];
        $motivo=$row["motivo"];
        $fecha_registro=$row["fecha_registro"];

?>
    <h1>Editar Perdida</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="">

        <label>ID Producto</label>
        <input type="number" name="id_producto" value="<?php echo $id_producto;?>"><br>
        <label>Cantidad</label>
        <input type="number" name="cantidad" value="<?php echo $cantidad;?>"><br>
        <label>Motivo</label>
        <input type="text" name="motivo" value="<?php echo $motivo;?>"><br>
        <label>Fecha</label>
        <input type="datetime-local" name="fecha" value="<?php echo $fecha_registro;?>"><br>
        <input type="hidden" name="id_perdida" value="<?php echo $id_perdida;?>">

        <input type="submit" name="actualizar" value="Actualizar">
        <a href="index.php">Regresar</a>

    </form>
<?php
    }
?>
</body>
</html>