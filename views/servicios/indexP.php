<?php
  include("../../config/Conexion.php");
  
  $sql = "SELECT * FROM servicios";
  
  $resultado = mysqli_query($conectar, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/aquashine.png" image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>SERVICIOS</title>
</head>
<style>

.hero-section {
            position: relative;
            height: 300px; 
            background-image: url('../../static/img/c111.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(255, 0, 0, 0.6); /* Filtro rojo semitransparente */
            z-index: 1;
        }

        .hero-text {
            z-index: 2;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-button {
            z-index: 2;
            font-size: 18px;
            padding: 10px 20px;
            background-color: yellow; /* Color del botón */
            color: black; /* Color del texto del botón */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Para remover el subrayado si es un enlace */
        }
   .logo-container {
      position: fixed; /* Fija el contenedor en la pantalla */
      bottom: 20px; /* Espacio desde la parte inferior */
      right: 20px; /* Espacio desde la parte derecha */
      width: 60px; /* Diámetro del círculo verde */
      height: 60px;
      background-color: #25D366; /* Color verde de WhatsApp */
      border-radius: 50%; /* Hace que el fondo sea circular */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000; /* Asegura que esté sobre otros elementos */
    }
    svg {
      width: 50px; /* Tamaño del logo de WhatsApp */
      height: 50px;
    }
    a {
      text-decoration: none; /* Elimina el subrayado de los enlaces */
    }

    .product-cards {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }
        .card {
            flex: 1;
            margin: 5px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            height: 200px;
        }
        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: sepia(60%);
        }
        .card-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            text-align: center;
        }
</style>

  <link rel="icon" type="image" href="img/aquashine.png">
</head>
<body class=" mx-auto mt-5 bg-zinc-50 font-[Poppins] ">
<header>
  <nav class="flex items-center justify-between flex-wrap bg-gray-900 border-inset border-2 border-zinc-200 p-6">
      <div class="text-6xl flex items-center flex-shrink-0 text-blue-600 mr-6">
          <span class="font-semibold text-xl tracking-tight">Aqua Shine</span>
      </div>
      <div class="block lg:hidden">
          <button id='boton' class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
          </button>
      </div>
      <div id='menu' class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
          <div class="text-sm lg:flex-grow">
              <a href="../../index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600  mr-4">
                  INICIO
              </a>
              <a href="indexP.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md  hover:bg-blue-600 mr-4">
                  SERVICIOS
              </a>
              <a href="../ventas/ventas.html" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                  TIENDA
              </a>
              <a href="../../ayuda/ayuda.php" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md  hover:bg-blue-600">
                AYUDA
            </a>
            
          </div>
          <div>
              <a href="login.html" class="inline-block text-gray-200  text-sm px-4 py-2 leading-none border rounded  hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
          </div>
      </div>
  
  </nav>
 <br>
  <div class="hero-section">
    <div class="hero-text">Bienvenido a AquaShine<br>¡Servicio profesional </div>
    <a href="../../controller/reservas/reservas.php" class="hero-button">
    <button class="hero-button">Agenda tu cita</button>
</a>

  </div>


  <br>
  <div class="flex justify-center items-center h-full">
    <h1 class="text-4xl font-bold mb-4">BIENVENIDOS, QUEREMOS QUE CONOZCAN NUESTROS SERVICIOS</h1>
  </div>



<div class="product-cards">
  <div class="card grid grid-cols-6">
  <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
    <div class="card-info">
    <?php echo $fila['nom_servicio']; ?>
        <br>
        <?php echo $fila['descripcion']; ?>
        <br>
        <?php echo $fila['precio']; ?>
        <hr>
        <a href="servicio.html" class="text-blue-500 underline">¡Aparta tu cita!</a>
    </div>
    <?php endwhile; ?>
</div>

    </div>



</div>



  <div class="logo-container">
    <a href="https://wa.link/l0pntg" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.119.555 4.167 1.607 5.986L0 24l5.215-1.585C6.9 23.438 9.412 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.39 0-4.739-.78-6.679-2.229l-.481-.344-3.087.939.937-3.073-.355-.482C2.78 16.742 2 14.393 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10zm5.25-7.11c-.27-.14-1.6-.79-1.846-.883-.245-.092-.423-.14-.603.14-.18.28-.693.883-.85 1.064-.155.183-.31.204-.573.07-.264-.133-1.11-.406-2.117-1.292-.783-.696-1.313-1.56-1.466-1.825-.155-.266-.017-.41.116-.543.12-.12.264-.31.394-.466.133-.155.175-.266.264-.443.086-.182.044-.326-.021-.465-.07-.14-.605-1.457-.827-1.993-.218-.526-.44-.456-.603-.465l-.497-.01c-.17 0-.446.063-.68.304s-.89.87-.89 2.123c0 1.254.911 2.462 1.036 2.634.126.173 1.79 2.82 4.346 3.953 1.724.746 2.396.81 3.256.68.495-.074 1.6-.656 1.827-1.29.227-.634.227-1.18.159-1.29-.07-.113-.248-.177-.518-.31z" fill="#FFFFFF"/>
      </svg>
    </a>
  </div>
  
  <br>
    <!--Footer container-->
    <footer class="bg-gray-900 text-gray-200 py-6">
    <div class="container mx-auto text-center">
        <p class="text-lg mb-4">&copy; 2024 AquaShine. Todos los derechos reservados.</p>
        <div class="flex justify-center">
            <a href="https://www.facebook.com/" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.04c-5.3 0-9.63 4.33-9.63 9.63 0 4.7 3.48 8.6 8.02 9.4v-6.63h-2.4v-2.67h2.4v-1.9c0-2.4 1.44-3.76 3.61-3.76 1.03 0 2.1.08 2.1.08v2.31h-1.18c-1.16 0-1.52.71-1.52 1.45v1.74h2.61l-.42 2.67h-2.19v6.63c4.53-.8 8.01-4.7 8.01-9.4 0-5.3-4.32-9.63-9.62-9.63z"/></svg>
            </a>
            <a href="https://twitter.com/" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23 3c-.88.39-1.82.66-2.8.78 1.01-.61 1.78-1.57 2.14-2.72-.94.56-1.98.97-3.09 1.2-.89-.95-2.16-1.54-3.57-1.54-2.7 0-4.89 2.19-4.89 4.89 0 .38.04.76.1 1.12-4.07-.2-7.68-2.15-10.1-5.11-.42.72-.66 1.55-.66 2.45 0 1.69.86 3.18 2.17 4.06-.8-.03-1.55-.25-2.21-.62v.06c0 2.35 1.67 4.31 3.89 4.75-.41.11-.84.17-1.29.17-.31 0-.61-.03-.91-.09.62 1.94 2.42 3.35 4.55 3.39-1.67 1.31-3.76 2.09-6.04 2.09-.39 0-.77-.02-1.16-.07 2.12 1.36 4.63 2.14 7.34 2.14 8.8 0 13.6-7.29 13.6-13.6 0-.21-.01-.42-.02-.63.94-.68 1.76-1.53 2.42-2.5z"/></svg>
            </a>
            <a href="https://www.instagram.com/" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.16c3.2 0 3.6.01 4.88.07 1.12.06 1.91.25 2.36.42.58.2 1.02.45 1.47.9.45.45.7.9.9 1.47.17.45.36 1.24.42 2.36.06 1.28.07 1.68.07 4.88s-.01 3.6-.07 4.88c-.06 1.12-.25 1.91-.42 2.36-.2.58-.45 1.02-.9 1.47-.45.45-.9.7-1.47.9-.45.17-1.24.36-2.36.42-1.28.06-1.68.07-4.88.07s-3.6-.01-4.88-.07c-1.12-.06-1.91-.25-2.36-.42-.58-.2-1.02-.45-1.47-.9-.45-.45-.7-.9-.9-1.47-.17-.45-.36-1.24-.42-2.36-.06-1.28-.07-1.68-.07-4.88s.01-3.6.07-4.88c.06-1.12.25-1.91.42-2.36.2-.58.45-1.02.9-1.47.45-.45.9-.7 1.47-.9.45-.17 1.24-.36 2.36-.42 1.28-.06 1.68-.07 4.88-.07zM12 0c-3.23 0-3.63.01-4.91.07-1.24.06-2.32.28-3.15.65-.85.38-1.6.89-2.27 1.56-.67.67-1.18 1.42-1.56 2.27-.37.83-.6 1.91-.65 3.15-.06 1.28-.07 1.68-.07 4.91 0 3.23.01 3.63.07 4.91.06 1.24.28 2.32.65 3.15.38.85.89 1.6 1.56 2.27.67.67 1.42 1.18 2.27 1.56.83.37 1.91.6 3.15.65 1.28.06 1.68.07 4.91.07 3.23 0 3.63-.01 4.91-.07 1.24-.06 2.32-.28 3.15-.65.85-.38 1.6-.89 2.27-1.56.67-.67 1.18-1.42 1.56-2.27.37-.83.6-1.91.65-3.15.06-1.28.07-1.68.07-4.91 0-3.23-.01-3.63-.07-4.91-.06-1.24-.28-2.32-.65-3.15-.38-.85-.89-1.6-1.56-2.27-.67-.67-1.42-1.18-2.27-1.56-.83-.37-1.91-.6-3.15-.65-1.28-.06-1.68-.07-4.91-.07zm0 5.83c-3.41 0-6.17 2.76-6.17 6.17 0 3.41 2.76 6.17 6.17 6.17 3.41 0 6.17-2.76 6.17-6.17 0-3.41-2.76-6.17-6.17-6.17zm0 10.72c-2.53 0-4.57-2.04-4.57-4.57 0-2.53 2.04-4.57 4.57-4.57 2.53 0 4.57 2.04 4.57 4.57 0 2.53-2.04 4.57-4.57 4.57zm4.12-8.91c-.67 0-1.21-.54-1.21-1.21s.54-1.21 1.21-1.21 1.21.54 1.21 1.21-.54 1.21-1.21 1.21z"/></svg>
            </a>
        </div>
    </div>
</footer>
</header>

</body>
</html>


