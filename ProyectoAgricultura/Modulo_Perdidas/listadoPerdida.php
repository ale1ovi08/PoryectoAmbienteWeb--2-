<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Pérdidas</title>
    <link rel="stylesheet" href="StylePerdidas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.html">Inventario Agrícola</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="../categorias.php">Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../productos.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../Modulo_Ventas/listadoVenta.php">Ventas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Pérdidas</a></li>
            </ul>
        </div>
    </div>
</nav>

    <?php
    include 'conexion.php';

    $sql = "SELECT p.id_perdida, pr.nombre_producto, p.cantidad, p.motivo, p.fecha_registro
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
                        <td><?php echo $row["nombre_producto"]; ?></td>
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
<!-- Footer -->
<footer class="bg-success text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-2">Síguenos en nuestras redes sociales</p>
        <div>
            <a href="https://facebook.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://twitter.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="https://instagram.com" class="text-white mx-2" target="_blank">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
        </div>
        <p class="mt-3">&copy; 2025 Inventario Agrícola. Todos los derechos reservados.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>
</body>

</html>