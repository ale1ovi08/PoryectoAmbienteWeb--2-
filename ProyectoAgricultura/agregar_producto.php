<?php
include("conectar.php");

$categorias = $conexion->query("SELECT id_categoria, nombre_categoria FROM categorias");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];

    $stmt = $conexion->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_categoria) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $stock, $id_categoria);
    $stmt->execute();

    header("Location: productos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
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
                <li class="nav-item"><a class="nav-link text-white" href="productos.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Ventas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="Modulo_Perdidas/listadoPerdida.php">Pérdidas</a>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Agregar Nuevo Producto</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                <?php while ($cat = $categorias->fetch_assoc()): ?>
                    <option value="<?= $cat['id_categoria'] ?>"><?= $cat['nombre_categoria'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="productos.php" class="btn btn-secondary">Cancelar</a>
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
