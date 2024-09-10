<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  



    <title>ADMINISTRADOR</title>
</head>
<body class="mx-auto font-[Poppins]">
<?php
include("../../../config/conexion.php");


  
  $sql = "SELECT * FROM usuario
        INNER JOIN rol ON rol.idRol = usuario.FK_rol";
  
  $resultado = mysqli_query($conectar, $sql);
  ?>
    <!-- Contenedor principal de la navegación -->
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
                        <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600  hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2" href="../user/indexAdmin.php" data-twe-nav-link-ref>Usuarios</a>
                    </li>
                    <!-- Enlace al Equipo -->
                    <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                        <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600  hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2" href="../roles/indexR.php" data-twe-nav-link-ref>ROLES</a>
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
                        <a class="text-[10px] ml-3 text-xl text-gray-200 font-bold">Administrador</a>
                        <i class="bi bi-x cursor-pointer ml-20" onclick="Openbar()"></i>
                    </div>
                        <hr class="my-2 text-gray-600">


                        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                        <i class="bi bi-person-fill"></i>
                            <div class="flex justify-between w-full items-center" onclick="dropDown()">
                                <span class="text-[15px] ml-4 text-gray-200">USUARIOS</span>
                                <span class="text-sm rotate-180" id="arrow">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                        <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="submenu">
                            <a href="agregarU.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</a> <br> 
                            <a href="indexAdmin.php" class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</a>
                        
                        </div>
                        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                            <i class="bi bi-envelope-fill"></i>
                            <span class="text-[15px] ml-4 text-gray-200">Mensajes</span>
                        </div>
                        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                        <i class="bi bi-bookmark-fill"></i>
                            <div class="flex justify-between w-full items-center" onclick="Close()">
                                <span class="text-[15px] ml-4 text-gray-200">ROLES</span>
                                <span class="text-sm rotate-180" id="rol">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                        <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="Roles">
                            <a href="../roles/agregarRol.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</a> <br> 
                            <a href="../roles/indexR.php" class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</a>
                        
                        </div>
                        <hr class="my-4 text-gray-600">

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <a href="../../../config/cerrarsesion.php" class="text-[15px] ml-4 text-gray-200">Logout</a>
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


        <div class="container mx-auto mt-10">

        <div class="text-center text-4xl font-bold text-gray-900 "> USUARIOS  </div>
        <!-- Table responsive wrapper -->
        <hr class="my-4 text-gray-600">

        <a href="agregarU.php" role="button" class="mb-7 inline-block rounded-full bg-emerald-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-emerald-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-emerald-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-emerald-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">Registar
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="currentColor"
    class="inline ml-1 pb-[2px] w-4 h-4"
  >
    <path
      fill-rule="evenodd"
      d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.25 6a.75.75 0 00-1.5 0v4.94l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V9.75z"
      clip-rule="evenodd"
    />
  </svg>
  </a>
<div class="overflow-x-auto bg-white dark:bg-neutral-700">

<!-- Table -->
<table class="min-w-full text-left text-sm whitespace-nowrap mb-3" id="myTable">
  <!-- Table head -->
  <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800 border-t">
    <tr>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        ID
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Nombre
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Apellido
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Fecha Nacimiento
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Email
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Rol
      </th>
      <th scope="col" class="px-6 py-5 border-x dark:border-neutral-600">
        Acciones
      </th>
    </tr>
  </thead>

  <!-- Table body -->
  <tbody>
    <?php
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr class="border-b dark:border-neutral-600 hover:bg-neutral-100 dark:hover:bg-neutral-600">';
        echo '<th scope="row" class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['idUsuario'] .'</th>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['nom_usuario'] . '</td>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['apel_usuario'] .'</td>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['fecha_nacimiento'] .'</td>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['email'] .'</td>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600">'. $fila['nom_rol'] .'</td>';
        echo '<td class="px-6 py-5 border-x dark:border-neutral-600 text-center">'; // Ajuste en la clase
        echo '<div class="flex justify-center space-x-4">'; // Contenedor para centrar y espaciado
        echo "<a class='bi bi-pencil-square text-blue-500 p-1 rounded' href='editarUsuario.php?idUsuario=" . $fila['idUsuario'] . "'></a>";
        echo "<a class='bi bi-trash text-red-600  p-1 rounded' href='../../../controller/Admin/deleteAdmin.php?idUsuario=" . $fila['idUsuario'] . "'></a>";
        echo '</div>';
        echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>


</div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    </body>
</html>
