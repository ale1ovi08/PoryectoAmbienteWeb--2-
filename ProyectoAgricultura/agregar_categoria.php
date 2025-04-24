<?php
include("conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $stmt = $conexion->prepare("INSERT INTO categorias (nombre_categoria, descripcion) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $descripcion);
    $stmt->execute();

    header("Location: categorias.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Categoría</title>
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
                        <li class="nav-item"><a class="nav-link text-white" href="#">Productos</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Ventas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="Modulo_Perdidas/listadoPerdida.php">Pérdidas</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container mt-5">
    <h2>Agregar Nueva Categoría</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la categoría</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="categorias.php" class="btn btn-secondary">Cancelar</a>
    </form>
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
