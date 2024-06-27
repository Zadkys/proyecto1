document.addEventListener('DOMContentLoaded', function() {
    const cartIcon = document.querySelector('.icon-cart'); // Icono del carrito
    const cartContainer = document.querySelector('.container-cart-products'); // Contenedor del carrito
    const productCount = document.getElementById('contador-productos'); // Contador de productos en el carrito
    const totalPrice = document.getElementById('total-pagar'); // Total a pagar

    // Mostrar u ocultar el carrito al hacer clic en el ícono del carrito
    cartIcon.addEventListener('click', function() {
        cartContainer.classList.toggle('hidden-cart');
    });

    // Función para actualizar el contenido del carrito
    function updateCart() {
        const cartItems = document.querySelectorAll('.cart-product');
        let total = 0;
        let count = 0;

        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector('.precio-producto-carrito').innerText.replace('$', ''));
            const quantity = parseInt(item.querySelector('#cantidad-producto-carrito').innerText);
            total += price * quantity;
            count += quantity;
        });

        productCount.innerText = count;
        totalPrice.innerText = `$${total.toFixed(2)}`;
    }

    // Función para eliminar un producto del carrito
    function removeProductFromCart(productElement) {
        const productCountElem = productElement.querySelector('#cantidad-producto-carrito');
        let quantity = parseInt(productCountElem.innerText);

        if (quantity > 1) {
            productCountElem.innerText = quantity - 1;
        } else {
            productElement.remove();
        }

        updateCart();
    }

    // Función para agregar un producto al carrito
    function addToCart(product) {
        const cartProduct = document.createElement('div');
        cartProduct.classList.add('cart-product');

        cartProduct.innerHTML = `
            <div class="info-cart-product">
                <span id="cantidad-producto-carrito">${product.contador}</span>
                <img src="${product.link}" alt="${product.nombre}" style="width: 50px; height: 50px;">
                <p class="titulo-producto-carrito">${product.nombre}</p>
                <span class="precio-producto-carrito">$${product.precio}</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        `;

        cartContainer.insertBefore(cartProduct, cartContainer.firstChild);

        cartProduct.querySelector('.icon-close').addEventListener('click', function() {
            const productElement = this.parentElement;
            removeProductFromCart(productElement);
        });

        updateCart();
    }

    // Escuchar envíos de formularios para agregar productos al carrito
    document.querySelectorAll('.category form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const product = {
                nombre: form.querySelector('input[name="nombre"]').value,
                precio: parseFloat(form.querySelector('input[name="precio"]').value),
                specs: form.querySelector('input[name="specs"]').value,
                link: form.querySelector('input[name="link"]').value,
                contador: 1
            };

            addToCart(product);

            fetch('agregarCarrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(product).toString()
            });
        });
    });

    // Redirigir al usuario al checkout al hacer clic en el botón "Ir a la compra"
    const btnCheckout = document.getElementById('btn-checkout');
    btnCheckout.addEventListener('click', function() {
        window.location.href = 'checkout.php'; // Cambia 'checkout.php' por tu URL de la página de desglose de la compra
    });
});

