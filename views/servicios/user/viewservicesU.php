<?php
session_start();
$varsesion = $_SESSION['email'];
if ($varsesion == null || $varsesion == '') {
    header('location:../../../Index.php');
    die();
}

include("../../../config/conexion.php");

$email = $_SESSION['email'];
$sql = "SELECT idUsuario, nom_usuario, apel_usuario, fecha_nacimiento, email, contrasena, FK_rol FROM usuario
        INNER JOIN rol ON rol.idRol = usuario.FK_rol 
        WHERE email = '".$email."'"; 

$resultado = mysqli_query($conectar, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['idUsuario'];
    $nom_usuario = $fila['nom_usuario'];
    $apel_usuario = $fila['apel_usuario'];
    $fecha_nacimiento = $fila['fecha_nacimiento'];
    $email = $fila['email'];
    $contrasena = $fila['contrasena'];
    $FK_rol = $fila['FK_rol'];
} else {
    
    echo "No se encontraron datos para el usuario.";
   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>RESERVAS</title>
</head>
<style>
        .content {
            transition: margin-left 0.3s ease-in-out;
            padding-left: 0;
        }
        .sidebar-open .content {
            padding-left: 300px;
        }
        .sidebar {
            z-index: 50;
        }
    </style>
<body class="mx-auto font-[Poppins]">
<?php
include("../../../config/conexion.php");


  
  $sql = "SELECT * FROM reservas
                INNER JOIN usuario ON usuario.idUsuario = reservas.FK_usuario
                INNER JOIN servicios ON servicios.idServicios = reservas.FK_servicios
                WHERE reservas.FK_usuario = $idUsuario"; 
  
  
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
                    <a class="me-4 flex items-center text-gray-200 dark:text-white" href="perfil.php" id="dropdownMenuButton1" role="button" data-twe-dropdown-toggle-ref aria-expanded="false">
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
                                <a href="agregarCar.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar Vehiculos</a> <br> 
                                <a href="viewCar.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">visualizar Vehiculos</a> <br> 
                                <a  class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">estado Vehiculos</a> <br> 
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
                            <a href="agendarservicio.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Adquirir Servicio</a> <br> 
                            <a href="viewservicesU.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar Servicios</a> <br> 
                            
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

<div class="text-center text-4xl font-bold text-gray-900 "> RESERVAS   </div>
<!-- Table responsive wrapper -->
<hr class="my-4 text-gray-600">

<a href="agendarservicio.php" role="button" class="mb-7 inline-block rounded-full bg-emerald-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-emerald-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-emerald-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-emerald-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">Agendar servicio<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
  <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
</svg>

</a>
<div class="table-responsive">
            <table id="myTable" class="table table-hover table-striped mt-4 text-center">
                <thead class="bg-gray-900 text-white text-center">
                <tr>
                    <th scope="col">Fecha Reserva</th>
                    <th scope="col">Hora Reserva</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr class="border-b border-gray-200 bg-white hover:bg-gray-100 " >
                        <td class="px-5 py-5 text-sm border-x border-y"><?php echo $row['fecha_reserva']; ?></td>
                        <td  class="px-5 py-5 text-sm border-x border-y"><?php echo $row['hora_reserva']; ?></td>
                        <td  class="px-5 py-5 text-sm border-x border-y"><?php echo $row['estado']; ?></td>
                        <td  class="px-5 py-5 text-sm border-x border-y"><?php echo $row['nom_servicio']; ?></td>
                        <td class="text-center px-5 py-5 text-sm border-x border-y">
                            <a href="editReservas.php?idReservas=<?php echo $row['idReservas']; ?>" class="bi bi-pencil text-blue-600 hover:text-blue-900"></a>
                            <a href="#" onclick="openModal('<?php echo $row['idReservas']; ?>', '<?php echo $row['fecha_reserva']; ?>')" class="bi bi-trash text-red-600 hover:text-red-900 ml-4"></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg text-center">
        <h2 class="text-xl font-semibold mb-4">¿Desea eliminar la reserva?</h2>
        <p class="mb-6">Esta acción no se puede deshacer.</p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Eliminar</a>
            <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Cancelar</button>
        </div>
    </div>
</div>
<script>

    function openModal(id, nombre) {
        document.querySelector("#deleteModal h2").textContent = `¿Desea eliminar la Reserva? ${nombre}`;
        document.querySelector("#deleteModal a").href = `../../../controller/servicios/deleteReserva.php?idReservas=${id}`;
        document.getElementById("deleteModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("deleteModal").style.display = "none";
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
            
</body>
</html>
