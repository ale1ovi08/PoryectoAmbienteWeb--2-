<?php
include("conectar.php");

$query = "SELECT * FROM categorias";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
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
                        <li class="nav-item"><a class="nav-link text-white" href="#">Categorías</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="productos.php">Productos</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="Modulo_Ventas/listadoVenta.php">Ventas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="Modulo_Perdidas/listadoPerdida.php">Pérdidas</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="container mt-5">
    <h2 class="text-center fw-bold">Categorías</h2>
    <a href="agregar_categoria.php" class="btn btn-success mb-3">Agregar Categoría</a>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_categoria'] ?></td>
                    <td><?= $row['nombre_categoria'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td>
                        <a href="editar_categoria.php?id=<?= $row['id_categoria'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_categoria.php?id=<?= $row['id_categoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
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
