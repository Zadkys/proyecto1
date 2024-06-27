<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Desglose de compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .product-list {
            margin-top: 20px;
        }
        .product {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .product img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }
        .product-info {
            flex: 1;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Desglose de compra</h2>

        <?php
        // Verificar si hay productos en el carrito
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            $productos = $_SESSION['carrito'];
            $total = 0;
            ?>
            <div class="product-list">
                <?php
                foreach ($productos as $producto) {
                    $subtotal = $producto['precio'] * $producto['contador'];
                    $total += $subtotal;
                    ?>
                    <div class="product">
                        <img src="<?php echo $producto['link']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <div class="product-info">
                            <h3><?php echo $producto['nombre']; ?></h3>
                            <p>Precio unitario: $<?php echo number_format($producto['precio'], 2); ?></p>
                            <p>Cantidad: <?php echo $producto['contador']; ?></p>
                            <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="total">
                <h3>Total a pagar: $<?php echo number_format($total, 2); ?></h3>
            </div>

            <div class="btn-container">
                <a href="#" class="btn">Enviar resumen por correo</a>
            </div>

        <?php } else { ?>
            <p>No has agregado productos al carrito.</p>
        <?php } ?>
    </div>
</body>
</html>

