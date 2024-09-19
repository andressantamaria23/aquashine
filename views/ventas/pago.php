<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Incluye Material Icons -->
       <script src="https://js.stripe.com/v3/"></script>
    <style>
      body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .card-input {
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .card-input img {
            height: 50px;
            margin-bottom: 10px;
        }

        .card-input:hover {
            border-color: #2980b9;
        }

        .card-input.active {
            border-color: #27ae60;
        }

        .pay-button {
            background-color: #2980b9;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1.2em;
            font-weight: 500;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .pay-button:hover {
            background-color: #1f639a;
            transform: scale(1.05);
        }
    </style>
</head>

 <!-- Barra de Navegación -->
 <div class="nav-wrapper bg-gray-100 text-gray-800">
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="carritoCompras.php" class="flex-shrink-0">
                            <img class="h-10 w-auto" src="../../static/img/logoaquashine.png" alt="Logo">
                        </a>
                    </div>
    <!-- Barra de Búsqueda -->
    <div class="flex-1 flex justify-center">
                    <div class="w-full max-w-lg">
                        <form action="#" method="GET" class="relative">
                            <input type="text" name="search" placeholder="Buscar en AquaShine"
                                class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <button type="submit"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                    <div class="flex items-center space-x-4">
                        <!-- Menú desplegable de inicio de sesión -->
                        <div class="relative login-menu group">
                            <a href="#" class="text-gray-600 hover:text-gray-800 flex items-center">
                                Hola, Inicia sesión
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="absolute hidden dropdown-menu bg-white shadow-lg mt-2 rounded-lg w-40 z-10">
                                <!-- Flecha arriba del menú -->
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-white"></div>
                                
                                <ul class="py-2">
                                    <li>
                                        <a href="../../login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Inicia sesión</a>
                                    </li>
                                    <li>
                                        <a href="../../register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Regístrate</a>
                                    </li>
                                    <li>
                                        <a href="../../perfilUsuario.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
                                    </li>
                                    <li>
                                        <hr class="border-gray-200">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Menú desplegable de Actividades -->
                        <div class="relative login-menu group">
                            <a href="#" class="text-gray-600 hover:text-gray-800 flex items-center" id="menuButton">
                                Actividades
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="absolute hidden dropdown-menu bg-white shadow-lg mt-2 rounded-lg w-40 z-10" id="dropdownMenu">
                                <!-- Flecha arriba del menú -->
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-white"></div>
                                
                                <ul class="py-2">
                                    <li>
                                        <a href="../../views/servicios/user/indexP.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                                    </li>
                                    <li>
                                        <a href="ventas.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                                    </li>
                                    <li>
                                        <a href="../../ayuda/ayuda.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
                                    </li>
                                    <li>
                                        <hr class="border-gray-200">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Icono del carrito -->
                        <a href="carritoCompras.php" class="relative text-gray-600 hover:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-2 9H5L3 3zm5 13a2 2 0 100 4 2 2 0 000-4zm8 2a2 2 0 110 4 2 2 0 010-4z" />
                            </svg>
                            <span class="absolute -top-1 -right-2 bg-red-600 text-white text-xs rounded-full px-1">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <br>
<body>
<div class="container mx-auto p-6">
    <h1 class="text-3xl text-center mb-8 font-semibold text-gray-800">Selecciona tu método de pago</h1>

    <!-- Opciones de tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Opción de tarjeta Visa -->
        <div class="card-input" data-card="visa">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
            <p class="text-gray-700 font-semibold">Visa</p>
        </div>
        <!-- Opción de tarjeta Mastercard -->
        <div class="card-input" data-card="mastercard">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg" alt="MasterCard">
            <p class="text-gray-700 font-semibold">MasterCard</p>
        </div>
        <!-- Opción de PayPal -->
        <div class="card-input" data-card="paypal">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal">
            <p class="text-gray-700 font-semibold">PayPal</p>
        </div>
    </div>

    <!-- Formulario de pago -->
    <form action="procesar_pago.php" method="POST" class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
        <div class="mb-6">
            <label for="card-number" class="block text-gray-700 text-sm font-bold mb-2">Número de tarjeta:</label>
            <input type="text" id="card-number" name="card_number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="1234 5678 9123 4567" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label for="expiry-date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de expiración:</label>
                <input type="text" id="expiry-date" name="expiry_date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="MM/YY" required>
            </div>
            <div>
                <label for="cvv" class="block text-gray-700 text-sm font-bold mb-2">CVV:</label>
                <input type="text" id="cvv" name="cvv" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="123" required>
            </div>
        </div>

        <input type="hidden" id="selected-card" name="selected_card" value="">

        <!-- Botón de pago -->
        <button type="submit" class="pay-button w-full">Pagar ahora</button>
    </form>
</div>

<script>
    // Seleccionar tarjeta activa
    const cardInputs = document.querySelectorAll('.card-input');
    const selectedCardInput = document.getElementById('selected-card');

    cardInputs.forEach(card => {
        card.addEventListener('click', function() {
            // Eliminar la clase activa de todas las tarjetas
            cardInputs.forEach(input => input.classList.remove('active'));

            // Añadir la clase activa a la tarjeta seleccionada
            card.classList.add('active');

            // Actualizar el valor del campo oculto
            selectedCardInput.value = card.dataset.card;
        });
    });
</script>


</body>
</html>
