function mostrarSeccion(seccion) {
    document.querySelectorAll('.seccion').forEach(div => {
        div.style.display = 'none';
    });
    document.getElementById(seccion).style.display = 'block';
}

document.addEventListener("DOMContentLoaded", function() {
    mostrarSeccion('login');
});

function mostrarLogin() {
    document.getElementById("login").classList.remove("d-none");
}

document.addEventListener("DOMContentLoaded", function () {
    // Verificar si estamos en la página de login y agregar el evento al formulario
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Evita que se recargue la página

            // Usuario de prueba
            const usuarioPrueba = {
                email: "admin@inventario.com",
                password: "admin123"
            };

            // Obtener valores ingresados
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            // Validar usuario
            if (email === usuarioPrueba.email && password === usuarioPrueba.password) {
                // Guardar sesión en localStorage
                localStorage.setItem("usuarioLogueado", "true");

                // Redirigir al dashboard
                window.location.href = "dashboard.html";
            } else {
                alert("Correo o contraseña incorrectos.");
            }
        });
    }

    // Verificar sesión en cada página
    verificarSesion();

    // Agregar evento al botón de logout si existe en la página
    const btnLogout = document.getElementById("btnLogout");
    if (btnLogout) {
        btnLogout.addEventListener("click", cerrarSesion);
    }
});

// Función para verificar si hay una sesión activa
function verificarSesion() {
    const usuarioLogueado = localStorage.getItem("usuarioLogueado");

    // Si el usuario no está logueado y no estamos en login.html, redirigir
    if (!usuarioLogueado && window.location.pathname.includes("dashboard.html")) {
        window.location.href = "login.html";
    }

    // Si estamos en index.html y hay un usuario logueado, mostrar opciones
    if (usuarioLogueado && window.location.pathname.includes("index.html")) {
        document.getElementById("btnLogin").classList.add("d-none"); // Ocultar botón login
        document.getElementById("linkCategorias").classList.remove("d-none");
        document.getElementById("linkProductos").classList.remove("d-none");
        document.getElementById("linkVentas").classList.remove("d-none");
        document.getElementById("linkPerdidas").classList.remove("d-none");
        document.getElementById("btnLogout").classList.remove("d-none");
    }
}

// Función para cerrar sesión
function cerrarSesion() {
    localStorage.removeItem("usuarioLogueado"); // Eliminar sesión
    window.location.href = "index.html"; // Redirigir a la página principal
}

document.addEventListener("DOMContentLoaded", function () {
    cargarProductosTemporada();
});

function cargarProductosTemporada() {
    const productos = [
        { nombre: "Tomates Orgánicos", precio: "₡1,200 / kg", imagen: "images/tomate.jpg" },
        { nombre: "Papas Frescas", precio: "₡800 / kg", imagen: "images/papas.jpg" },
        { nombre: "Lechuga Hidropónica", precio: "₡500 / unidad", imagen: "images/lechuga.jpg" }
    ];

    const contenedor = document.getElementById("productosTemporada");
    contenedor.innerHTML = "";

    productos.forEach(producto => {
        const card = `
            <div class="col-md-4">
                <div class="card">
                    <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                    <div class="card-body">
                        <h5 class="card-title">${producto.nombre}</h5>
                        <p class="card-text fw-bold">${producto.precio}</p>
                    </div>
                </div>
            </div>
        `;
        contenedor.innerHTML += card;
    });
}
document.addEventListener("DOMContentLoaded", function () {
    verificarSesion();
    cargarInventario();
});

// Función para mostrar el inventario solo si el usuario ha iniciado sesión
function verificarSesion() {
    let usuarioLogueado = localStorage.getItem("usuario");
    if (usuarioLogueado) {
        document.getElementById("seccionInventario").classList.remove("d-none");
    }
}

// Mostrar el formulario de agregar producto
function mostrarFormularioProducto() {
    let modal = new bootstrap.Modal(document.getElementById("modalProducto"));
    modal.show();
}

// Agregar un producto a la tabla y guardarlo en localStorage
document.getElementById("formProducto").addEventListener("submit", function (event) {
    event.preventDefault();

    let nombre = document.getElementById("nombreProducto").value;
    let cantidad = document.getElementById("cantidadProducto").value;
    let precio = document.getElementById("precioProducto").value;
    let fecha = new Date().toLocaleDateString();

    let producto = { nombre, cantidad, precio, fecha };

    let inventario = JSON.parse(localStorage.getItem("inventario")) || [];
    inventario.push(producto);
    localStorage.setItem("inventario", JSON.stringify(inventario));

    cargarInventario();
    document.getElementById("formProducto").reset();
    bootstrap.Modal.getInstance(document.getElementById("modalProducto")).hide();
});

// Cargar el inventario desde localStorage y mostrarlo en la tabla
function cargarInventario() {
    let inventario = JSON.parse(localStorage.getItem("inventario")) || [];
    let tabla = document.getElementById("tablaInventario");
    tabla.innerHTML = "";

    inventario.forEach((producto, index) => {
        let fila = `<tr>
            <td>${producto.nombre}</td>
            <td>${producto.cantidad}</td>
            <td>₡${producto.precio}</td>
            <td>${producto.fecha}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">🗑 Eliminar</button>
            </td>
        </tr>`;
        tabla.innerHTML += fila;
    });
}

// Eliminar un producto del inventario
function eliminarProducto(index) {
    let inventario = JSON.parse(localStorage.getItem("inventario")) || [];
    inventario.splice(index, 1);
    localStorage.setItem("inventario", JSON.stringify(inventario));
    cargarInventario();
}
