<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>ADMINISTRADOR</title>
</head>
<body class="mx-auto font-[Poppins]">
<?php
include("../../config/conexion.php");

  
  $sql = "SELECT * FROM vehiculo";
  
  $resultado = mysqli_query($conectar, $sql);
  ?>
    <nav class="flex-no-wrap relative flex w-full items-center justify-between bg-clip-padding py-5 shadow-dark-mild bg-gray-900">
        <div class="flex w-full flex-wrap items-center justify-between px-3 text-blue-600">
            <!-- Botón de hamburguesa para vista móvil -->
            <button
                class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200"
                type="button"
                data-twe-collapse-init
                data-twe-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- Icono de hamburguesa -->
                <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 dark:[&>svg]:stroke-neutral-200 text-gray-200 font-bold" onclick="Openbar()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>

            <!-- Contenedor colapsable de navegación -->
            <div class="hidden flex-grow basis-[100%] items-center lg:!flex basis-auto" id="navbarSupportedContent1" data-twe-collapse-item>
                <!-- Logo -->
                <a class="mb-4 me-5 ms-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="#">
                    <img src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp" style="height: 15px" alt="TE Logo" loading="lazy" />
                </a>
                <!-- Enlaces de navegación a la izquierda -->
                <ul class="list-style-none me-auto flex flex-col ps-0 lg:flex-row" data-twe-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                        <!-- Enlace al Dashboard -->
                        <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600  hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2" href="#" data-twe-nav-link-ref>Servicios</a>
                    </li>
                    <!-- Enlace al Equipo -->
                    <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                        <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600  hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2" href="#" data-twe-nav-link-ref>productos</a>
                    </li>
                    <!-- Enlace a Proyectos -->
                    <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                        <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600  hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2" href="#" data-twe-nav-link-ref>Vehículos</a>
                    </li>
                </ul>
            </div>

            <!-- Elementos a la derecha -->
            <div class="relative flex items-center">
                
                <!-- Primer contenedor desplegable -->
                <div class="relative" data-twe-dropdown-ref data-twe-dropdown-alignment="start">
                    <!-- Primer desencadenante del desplegable -->
                    <a class="me-4 flex items-center text-gray-200 dark:text-white" href="#" id="dropdownMenuButton1" role="button" data-twe-dropdown-toggle-ref aria-expanded="false">
                        <!-- Icono del desencadenante del desplegable -->
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <!-- Contador de notificaciones -->
                        <span class="absolute -mt-6 ms-2.5 rounded-full bg-danger-600 px-[0.35em] py-[1.15em] text-[0.6rem] font-bold leading-none text-warning-600">1</span>
                    </a>
                    <!-- Primer menú desplegable -->
                    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg data-[twe-dropdown-show]:block dark:bg-surface-dark" aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
                    
                       
                </div>

                <!-- Segundo contenedor desplegable -->
                <div class="relative" data-twe-dropdown-ref data-twe-dropdown-alignment="start">
                    <!-- Segundo desencadenante del desplegable -->
                    <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none" href="#" id="dropdownMenuButton2" role="button" data-twe-dropdown-toggle-ref aria-expanded="false">
                        <!-- Avatar del usuario -->
                        <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="rounded-full" style="height: 22px; width: 22px" alt="" loading="lazy" />
                    </a>
                </div>

                <!-- Sidebar -->
                <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
                 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 shadow h-screen hidden">
                    <div class="text-gray-100 text-xl">
                        <div class="p-2.5 mt-1 flex items-center rounded-md">
                            <i class="bi px-2 py-1 bg-blue-600 rounded-md"></i>
                            <a class="text-[15px]  ml-3 text-xl text-gray-200 font-bold">Servicios</a>
                            <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
                            <!-- Botón de cerrar el menú -->
                        <li class="flex justify-end px-4 py-2">
                            <button  class="text-4xl text-white-700 hover:text-blue-900 dark:text-neutral-200 dark:hover:text-neutral-400 ml-20" onclick="Openbar()">
                                <i class="bi bi-x"></i>
                            </button>
                        </li>
                        </div>
                        <hr class="my-2 text-gray-600">


                        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                              </svg>
                                <div class="flex justify-between w-full items-center" onclick="dropDown()">
                                    <span class="text-[15px] ml-4 text-gray-200">Vehículos</span>
                                    <span class="text-sm rotate-180" id="arrow">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="submenu">
                                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar vehiculo</h1>
                                <a href="viewCar.php" class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar Vehiculo</a>
                                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Estado vehiculo</h1>
                            </div>
                            <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                                <i class="bi bi-cart2"></i>
                                <span class="text-[15px] ml-4 text-gray-200">Compras</span>
                            </div>
                            <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                                <i class="bi bi-layers-fill"></i>
                                <div class="flex justify-between w-full items-center" onclick="Close()">
                                    <span class="text-[15px] ml-4 text-gray-200">Servicios</span>
                                    <span class="text-sm rotate-180" id="rol">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="Roles">
                                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">adquirir servicio</h1>
                                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar servicios</h1>
                            
                            </div>
                            <hr class="my-4 text-gray-600">
    
                            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span class="text-[15px] ml-4 text-gray-200">Logout</span>
                            </div>
    
                        </div>
                    </div>
                </div>
        </nav>
    
        <script>
            function dropDown() {
                document.querySelector('#submenu').classList.toggle('hidden')
                document.querySelector('#arrow').classList.toggle('rotate-0')
            }
            function Close() {
                document.querySelector('#Roles').classList.toggle('hidden')
                document.querySelector('#rol').classList.toggle('rotate-0')
            }
    
            function Openbar() {
                document.querySelector('.sidebar').classList.toggle('hidden')
            }
    
            function CloseDropdown(buttonId) {
                document.querySelector(`[aria-labelledby="${buttonId}"]`).classList.add('hidden')
            }
        </script>

<div class="text-center text-4xl font-bold text-gray-900 mt-2 ">REGISTAR VEHÍCULO  </div>
        <!-- Table responsive wrapper -->
        <hr class="my-4 text-gray-600">

        <form action="../../controller/servicios/agregarVe.php" method="POST" class="text-gray-200  mt-2">
  <div class="flex justify-center grid ">
    <div class="mx-4 mb-4">
      <div class="relative mb-6 hidden" data-twe-input-wrapper-init>
        <input type="number" class="text-black peer block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary" id="idVehiculo" name="idVehiculo" placeholder="ID" oninput="handleInput(this)" />
        <label for="idVehiculo" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.80rem] peer-focus:scale-[0.8] peer-focus:text-primary">ID</label>
      </div>
      <div class="relative mb-6 mt-2" data-twe-input-wrapper-init>
        <input type="text" class="text-black peer block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary" id="Placa" name="Placa" placeholder="Placa" oninput="handleInput(this)" />
        <label for="Placa" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.80rem] peer-focus:scale-[0.8] peer-focus:text-primary">Placa</label>
      </div>

      <div class="relative mb-6" data-twe-input-wrapper-init>
        <select id="tipo_vehiculo" name="tipo_vehiculo" class="text-black peer block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary" onchange="updateMarcaOptions()" oninput="handleInput(this)">
          <option value=""></option>
          <option value="carro">Carro</option>
          <option value="moto">Moto</option>
        </select>
        <label for="tipo_vehiculo" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.80rem] peer-focus:scale-[0.8] peer-focus:text-primary">Tipo de vehículo</label>
      </div>

      <div class="relative mb-6" data-twe-input-wrapper-init>
        <select id="color_vehiculo" name="color_vehiculo" class="text-black peer block w-full appearance-none rounded border border-gray-200 bg-transparent px-3 py-2 leading-tight outline-none transition-all duration-200 ease-linear focus:ring-2 focus:ring-blue-600" oninput="handleInput(this)">
          <option value=""></option>
          <option value="blanco">Blanco</option>
          <option value="negro">Negro</option>
          <option value="gris">Gris</option>
          <option value="rojo">Rojo</option>
          <option value="azul">Azul</option>
          <option value="plateado">Plateado</option>
          <option value="verde">Verde</option>
          <option value="amarillo">Amarillo</option>
        </select>
        <label for="color_vehiculo" class="pointer-events-none absolute left-3 -top-3.5 bg-white px-1 text-gray-500 transition-all duration-200 ease-out origin-top-left transform scale-75 peer-focus:-top-3.5 peer-focus:scale-75 peer-focus:-translate-y-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:text-blue-600">Color del vehículo</label>
      </div>
    </div>

    <div class="mx-4 mb-4 mt-2">
      <div class="relative mb-6" data-twe-input-wrapper-init>
        <select id="marca" name="marca" class="text-black peer block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary" oninput="handleInput(this)">
          <option value=""></option>
        </select>
        <label for="marca" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.80rem] peer-focus:scale-[0.8] peer-focus:text-primary">Marca</label>
      </div>

      <div class="hidden relative mb-6 mt-2" data-twe-input-wrapper-init>
                <input type="text" class="peer block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary" id="FK_usuario" name="FK_usuario" placeholder="" oninput="handleInput(this)" value="2 "/>
                <label for="FK_usuario" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.80rem] peer-focus:scale-[0.8] peer-focus:text-primary">Usuario </label>
            </div>
    </div>

    <div class=" mx-20 mb-5">
      <button type="submit" class="font-bold block w-full rounded-full bg-gray-900 text-gray-200 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-blue-600 hover:border border-white hover:text-gray-900 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-blue-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">REGISTRAR</button>
    </div>
  </div>
</form>

<script>
  function updateMarcaOptions() {
    const tipoVehiculo = document.getElementById('tipo_vehiculo').value;
    const marcaSelect = document.getElementById('marca');

    // Limpiar opciones actuales
    marcaSelect.innerHTML = '';

    if (tipoVehiculo === 'carro') {
      const marcasCarro = ['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen'];
      marcasCarro.forEach(marca => {
        const option = document.createElement('option');
        option.value = marca;
        option.text = marca;
        marcaSelect.appendChild(option);
      });
    } else if (tipoVehiculo === 'moto') {
      const marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati','Pulsar','TVS'];
      marcasMoto.forEach(marca => {
        const option = document.createElement('option');
        option.value = marca;
        option.text = marca;
        marcaSelect.appendChild(option);
      });
    }
  }

  function handleInput(input) {
    const label = input.nextElementSibling;
    if (input.value.trim() !== "") {
      label.style.display = "none";
      input.placeholder = "";
    } else {
      label.style.display = "block";
      input.placeholder = label.innerText;
    }
  }
</script>

</body>
</html>