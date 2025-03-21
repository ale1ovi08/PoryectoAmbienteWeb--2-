document.addEventListener("DOMContentLoaded", function () {
    const productosPorRegion = [
        {
            region: "Zona Norte",
            productos: [
                { nombre: "Piña", precio: 1500, imagen: "images/piña.jpg" },
                { nombre: "Yuca", precio: 800, imagen: "images/yuca.jpg" }
            ]
        },
        {
            region: "Pacífico Central",
            productos: [
                { nombre: "Mango", precio: 1000, imagen: "images/mango.jpg" },
                { nombre: "Papaya", precio: 800, imagen: "images/papaya.jpg" }
            ]
        },
        {
            region: "Valle Central",
            productos: [
                { nombre: "Fresas", precio: 3500, imagen: "images/fresas.jpg" },
                { nombre: "Lechuga", precio: 1500, imagen: "images/lechuga.jpg" }
            ]
        }
    ];

    const contenedor = document.getElementById("productosRegion");

    productosPorRegion.forEach(region => {
        let regionHTML = `
            <div class="col-12">
                <h3 class="mt-4 text-success fw-bold">${region.region}</h3>
            </div>
        `;

        region.productos.forEach(producto => {
            regionHTML += `
                <div class="col-md-4">
                    <div class="card">
                        <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                        <div class="card-body">
                            <h5 class="card-title">${producto.nombre}</h5>
                            <p class="card-text">Precio: ₡${producto.precio}</p>
                        </div>
                    </div>
                </div>
            `;
        });

        contenedor.innerHTML += regionHTML;
    });
});
