<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Reserva tu Servicio</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background: linear-gradient(to right, #fff 50%, #f8f7f3 50%);
        }
        .text-content {
            width: 45%;
        }
        .form-container {
            width: 45%;
            background-color: #1a1a80; /* Fondo azul rey */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
        }
        h1 {
            font-size: 36px;
            color: #1a1a80; /* Azul rey */
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
            color: #ddd;
        }
        input, select, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            background-color: #fff;
            color: #333; /* Color del texto en campos */
        }
        input::placeholder, select::placeholder {
            color: #aaa; /* Color del texto del placeholder */
        }
        .submit-button {
            background-color: #004aad; /* Azul rey más oscuro */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .submit-button:hover {
            background-color: #003680; /* Azul rey aún más oscuro */
        }
        .highlight {
            font-size: 18px;
            margin: 10px 0;
            color: #004aad; /* Azul rey */
        }
        .checklist {
            margin: 20px 0;
            font-size: 16px;
        }
        .checklist li {
            margin-bottom: 10px;
            list-style-type: none;
            display: flex;
            align-items: center;
        }
        .checklist li i {
            color: #004aad; /* Azul rey */
            margin-right: 10px;
        }
        .testimonial {
            margin-top: 20px;
            font-style: italic;
            color: #666;
        }
        .testimonial img {
            border-radius: 50%;
            width: 50px;
            margin-right: 10px;
        }
        .testimonial span {
            display: block;
            margin-top: 5px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <nav class="flex items-center justify-between flex-wrap bg-gray-900 border-inset border-2 border-zinc-200 p-6">
            <div class="text-6xl flex items-center flex-shrink-0 text-blue-600 mr-6">
                <span class="font-semibold text-xl tracking-tight">AquaShine</span>
            </div>
            <div class="block lg:hidden">
                <button id='boton' class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menú</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div id='menu' class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
                <div class="text-sm lg:flex-grow">
                    <a href="../../Index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        INICIO
                    </a>
                    <a href="./views/servicios/indexP.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="../" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="../../ayuda/ayuda.php" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                      AYUDA
                  </a>
                </div>
                <div>
                    <a href="../../login.html" class="inline-block text-gray-200 text-sm px-4 py-2 leading-none border rounded hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="text-content">
            <h1>Reserva tu Servicio con AquaShine</h1>
            <ul class="checklist">
                <li><i class="fas fa-check-circle"></i>Lavado de carros de alta calidad</li>
                <li><i class="fas fa-check-circle"></i>Servicios de detalle y pulido</li>
                <li><i class="fas fa-check-circle"></i>Mantenimiento rápido y eficiente</li>
            </ul>
            <p class="highlight">¿Listo para darle a tu vehículo el cuidado que merece? ¡Reserva ahora!</p>
            <div class="testimonial">
                <img src="https://via.placeholder.com/50" alt="Foto testimonial">
                <p>“Desde que utilizo AquaShine, mi auto siempre está en las mejores condiciones, ¡lo recomiendo totalmente!”</p>
                <span>Juan Pérez, Cliente Satisfecho</span>
            </div>
        </div>
        <div class="form-container">
            <form action="ruta/de/tu/script.php" method="POST">
                <label for="fecha_reserva">Fecha de Reserva*:</label>
                <input type="date" id="fecha_reserva" name="fecha_reserva" required>

                <label for="hora_reserva">Hora de Reserva*:</label>
                <input type="time" id="hora_reserva" name="hora_reserva" required>

                <label for="estado">Estado*:</label>
                <select id="estado" name="estado" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmado">Confirmado</option>
                    <option value="cancelado">Cancelado</option>
                </select>

                <label for="FK_usuario">Usuario*:</label>
                <input type="number" id="FK_usuario" name="FK_usuario" placeholder="Ingresa el ID del usuario" required>

                <label for="FK_servicios">Servicio a reservar*:</label>
                <select id="FK_servicios" name="FK_servicios" required>
                    <option value="1">Lavado Básico</option>
                    <option value="2">Lavado Completo</option>
                    <option value="3">Detallado</option>
                    <option value="4">Pulido</option>
                </select>

                <button type="submit" class="submit-button">Reservar</button>
            </form>
        </div>
    </div>
</body>
</html>
