<?php
  include("../../../config/Conexion.php");
  
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
    background: rgba(255, 0, 0, 0.6);
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
    background-color: yellow;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  .logo-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  svg {
    width: 50px;
    height: 50px;
  }

  a {
    text-decoration: none;
  }

  .product-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 columnas */
    gap: 10px; /* Espacio entre tarjetas */
    margin-top: 20px;
    width: 100%;
  }

  .card {
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    height: 200px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
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

<body class="mx-auto mt-5 bg-zinc-50 font-[Poppins]">
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
              <a href="../../../index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600  mr-4">
                  HOME
              </a>
              <a href="indexP.html" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md  hover:bg-blue-600 mr-4">
                  SERVICIOS
              </a>
              <a href="../../ventas/ventas.html" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                  TIENDA
              </a>
              <a href="../../../ayuda/ayuda" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md  hover:bg-blue-600">
                AYUDA
            </a>
            
          </div>
          <div>
              <a href="../../../login.php" class="inline-block text-gray-200  text-sm px-4 py-2 leading-none border rounded  hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
          </div>
      </div>
  
  </nav>

    <div class="hero-section">
      <div class="hero-text">Bienvenido a AquaShine<br>¡Servicio profesional</div>
      <a href="agendarservicio.php" class="hero-button">Agenda tu cita</a>
    </div>
  </header>

  <div class="flex justify-center items-center h-full">
    <h1 class="text-4xl font-bold mb-4">BIENVENIDOS, QUEREMOS QUE CONOZCAN NUESTROS SERVICIOS</h1>
  </div>

  <div class="product-cards">
    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
      <div class="card">
        <div class="card-info">
          <?php echo $fila['nom_servicio']; ?>
          <br>
          <?php echo $fila['descripcion']; ?>
          <br>
          <?php echo $fila['precio']; ?>
          <hr>
          <a href="servicio.html" class="text-blue-500 underline">¡Aparta tu cita!</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</body>



  <div class="logo-container">
    <a href="https://wa.link/l0pntg" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.119.555 4.167 1.607 5.986L0 24l5.215-1.585C6.9 23.438 9.412 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.39 0-4.739-.78-6.679-2.229l-.481-.344-3.087.939.937-3.073-.355-.482C2.78 16.742 2 14.393 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10zm5.25-7.11c-.27-.14-1.6-.79-1.846-.883-.245-.092-.423-.14-.603.14-.18.28-.693.883-.85 1.064-.155.183-.31.204-.573.07-.264-.133-1.11-.406-2.117-1.292-.783-.696-1.313-1.56-1.466-1.825-.155-.266-.017-.41.116-.543.12-.12.264-.31.394-.466.133-.155.175-.266.264-.443.086-.182.044-.326-.021-.465-.07-.14-.605-1.457-.827-1.993-.218-.526-.44-.456-.603-.465l-.497-.01c-.17 0-.446.063-.68.304s-.89.87-.89 2.123c0 1.254.911 2.462 1.036 2.634.126.173 1.79 2.82 4.346 3.953 1.724.746 2.396.81 3.256.68.495-.074 1.6-.656 1.827-1.29.227-.634.227-1.18.159-1.29-.07-.113-.248-.177-.518-.31z" fill="#FFFFFF"/>
      </svg>
    </a>
  </div>
  
  <br>
    <!--Footer container-->
<footer
class=" mt-1">
  <div
    class="grid-cols-2 flex items-center justify-center border-b-2 border-neutral-200 p-6 flex flex-col items-center bg-gray-900 text-center text-white">
    <div class="me-12 hidden lg:block">
      <span>Conéctate con nosotros en las redes sociales:
      </span>
    </div>
    <!-- Social network icons container -->
    <div class="flex justify-center">
      <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 320 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
        </svg>
      </a>
      <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4 ">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 512 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
        </svg>
      </a>
      <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 488 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
        </svg>
      </a>
      <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 448 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
        </svg>
      </a>
      <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 448 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
        </svg>
      </a>
      <a href="#!" class="[&>svg]:h-4 [&>svg]:w-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 496 512">
          <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
          <path
            d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
        </svg>
      </a>
    </div>
    <div class=" p-6 flex flex-col items-center bg-gray-900 text-center text-white">
      <div class="">
        <p class="flex items-center justify-center">
          <span class="me-4">REGISTRATE ES GRATIS  </span>
          <a href="../../../register.html"
            type="button"
            class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-300 hover:text-gray-900 focus:border-neutral-300 focus:text-neutral-200 focus:outline-none focus:ring-0 active:border-neutral-300 active:text-neutral-200 hover:bg-purple-300 dark:focus:bg-neutral-600"
            data-twe-ripple-init
            data-twe-ripple-color="light">
            REGISTRATE! 
        </a>
        </p>
      </div>
    </div>
  </div>




<!--Copyright section-->
<div class="w-full bg-gray-900 p-4 text-center text-gray-200 mt-1">
  © 2024 Copyright:
  <a href="Index.html">AquaShine</a>
</div>
</footer>
   
</header>

</body>
</html>


