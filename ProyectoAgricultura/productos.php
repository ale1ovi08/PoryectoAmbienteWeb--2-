<?php
include("conectar.php");

$query = "SELECT p.id_producto, p.nombre_producto, p.descripcion, p.precio, p.stock, c.nombre_categoria 
          FROM productos p 
          INNER JOIN categorias c ON p.id_categoria = c.id_categoria";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="dashboard.html">Inventario Agrícola</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="categorias.php">Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Ventas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="Modulo_Perdidas/listadoPerdida.php">Pérdidas</a></li>
                <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center fw-bold">Productos</h2>
    <a href="agregar_producto.php" class="btn btn-success mb-3">Agregar Producto</a>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_producto'] ?></td>
                    <td><?= $row['nombre_producto'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td>$<?= number_format($row['precio'], 2) ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['nombre_categoria'] ?></td>
                    <td>
                        <a href="editar_producto.php?id=<?= $row['id_producto'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_producto.php?id=<?= $row['id_producto'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-2">Síguenos en nuestras redes sociales</p>
        <div>
            <a href="https://facebook.com" class="text-white mx-2" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="https://twitter.com" class="text-white mx-2" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="https://instagram.com" class="text-white mx-2" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <p class="mt-3">&copy; 2025 Inventario Agrícola. Todos los derechos reservados.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>
