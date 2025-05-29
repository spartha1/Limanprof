/*variables globales*/
let cantidad = 1;
let cart = [];

/*carga de productos*/
async function loadProducts() {
    try{
        const response = await fetch('productos.json');
        const productos = await response.json();
        displayProductos(productos);
    }   catch (error){
    console.error('Error al cargar los productos:', error);
    }
}

/*mostrar productos*/
function displayProductos(productos) {
    const productlist = document.querySelector('.cards');
    productos.forEach(product => {
        const article = document.createElement('article');
        article.classList.add('cards_card')
        article.innerhtml = `
        <div class="card_img">
            <img src="${product.imagen}" alt="${product.nombre}">
        </div>
        <div class="card_descripticion">
            <h4 class="descripcion_categoria">${product.categoria}</h4>
            <h2 class="descripcion_nombre">${product.nombre}</h2>
            <p class="descripcion_precio">${product.precio}</p>
        </div>
        <button onclick="addToCart(${product.id}, this)" class="card.btn-shop">
            <i class="ri-shopping-cart-2-fill"></i>
            añadir al carrito
        </button>
        <div class="card_cantidad" id="card_cantidad-${prduct.id}">
            <button class="cantidad_btn-remove" onclick="decrementarProducto(${product.id})">
                <i class="ri-indeterminate-circle-line"></i>
            </button>
            <div class="cantidad_numero" id="cantidad-${product.id}" data-id="${product.id}">
                1
            </div>
            <button class="cantidad_btn-add" onclick="incrementarProducto(${productos.id})">
                <i class="ri-add-circle-line"></i>
            </button>
        </div>
        `;
        productlist.appendChild(article);
    });
}

/*funcion para agregar productos*/
function addToCart(productId, buttonElement){
    const cantidadElement = document.getElementById(`cantidad-${productId}`);
}

/*funcion para cerrar pedido y resetaer estado del carrito*/
loadProducts();