<?php
include("./config/conexion.php");

$sql = "SELECT * FROM servicios";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link rel="icon" href="static/img/aquashine.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <title>AquaShine</title>
    <style>
        .swiper-button-next, .swiper-button-prev {
            color: rgb(245, 0, 0);
            top: 50%; 
            transform: translateY(-20%);
        }
    </style>
</head>
<body class="mx-auto mt-5 bg-zinc-50 font-[Poppins]">
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
                    <a href="Index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        INICIO
                    </a>
                    <a href="./views/servicios/user/indexP.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="./views/ventas/ventas.html" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="./ayuda/ayuda.php" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                      AYUDA
                  </a>
                  
                </div>
                <div>
                    <a href="login.php" class="inline-block text-gray-200 text-sm px-4 py-2 leading-none border rounded hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container bg-gray-900 grid grid-cols-2 mx-auto flex items-center justify-center min-h-screen mt-6">
      <div class="text-center text-4xl text-gray-100 my-10">
        VIVE LA MEJOR EXPERIENCIA 
        <br>
        DE NUESTROS SERVICIOS
        <br>
        PARA TU VEHÍCULO
      </div>
      <div>
        <img class="mr-4 w-120 h-100" src="./static/img/car.gif" alt="Coche">
    </div>
    </div>
    <hr>

    <br>
    <br>

    <div class="relative mx-auto grid grid-cols-1 gap-3 max-w-5xl">
      <div class="text-center text-6xl font-bold text-blue-800 my-5 shadow-lg">
          <h1 class="my-5">SERVICIOS ESPECIALES</h1>
      </div>
  </div>
  
  <div class="container swiper-container relative">
    <div class="swiper-wrapper container mx-auto">
    <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
        <div class="swiper-slide bg-gray-900 max-w-sm rounded shadow-lg overflow-hidden px-2 py-6 bg-gray-900 mx-auto mt-2 mb-2">
            <div class="text-2xl text-center text-gray-200">
            <?php echo $fila['nom_servicio']; ?>
            </div>
            <p class="text-gray-200"><?php echo $fila['descripcion']; ?></p>
            <br>
            
            <p class="text-center text-gray-200">PRECIO: $<?php echo $fila['precio']; ?></p>
            <div class="text-center justify-center mx-auto mt-3">
              <button type="button" class="inline-block rounded-full bg-blue-600 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-blue-900 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-cyan-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-cyan-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">AGENDA</button>
            </div>
          </div>
          <?php endwhile; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper('.swiper-container', {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 15,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
</script>
      
<section id="quienes-somos" class="py-12 px-4">
  <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Quiénes Somos</h1>
      <p class="text-lg text-gray-700 mb-4">
          En <strong>AquaShine</strong> nos dedicamos a transformar la manera en que los lavaderos gestionan sus operaciones diarias. Fundados con el objetivo de ofrecer soluciones innovadoras y eficientes, nuestro software está diseñado para simplificar la administración de tu negocio de lavado de vehículos, mejorando la experiencia tanto para los clientes como para los empleados.
      </p>
      
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Misión</h2>
      <p class="text-lg text-gray-700 mb-4">
          Proveer una plataforma integral que optimice la gestión de servicios, ventas e inventario en el sector de lavados de vehículos, facilitando un servicio excepcional y aumentando la satisfacción del cliente.
      </p>

      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Visión</h2>
      <p class="text-lg text-gray-700 mb-4">
          Ser el líder en soluciones de software para el sector de lavado de vehículos, reconocido por nuestra innovación, calidad y compromiso con la excelencia.
      </p>
  </div>
</section>



<section id="ubicacion" class="py-12 px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Ubicación</h1>
            <div class="flex justify-center">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127258.0393105533!2d-74.20085311005776!3d4.627297985277856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a45d9f1654b%3A0x3d69138572d157f2!2sSENA%20-%20Centro%20De%20Servicios%20Financieros!5e0!3m2!1ses-419!2sco!4v1725633474964!5m2!1ses-419!2sco" 
                    width="800" 
                    height="600" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <br>
<footer class="bg-gray-900 py-6">
    <div class="container mx-auto text-center text-white">
        <p>&copy; 2024 AquaShine. Todos los derechos reservados.</p>
    </div>
</footer>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
