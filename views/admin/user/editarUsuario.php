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
include("../../../config/conexion.php");

// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idUsuario = $_POST['idUsuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $apel_usuario = $_POST['apel_usuario'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $FK_rol = $_POST['FK_rol'];

    // Consulta para actualizar los datos del usuario
    $sql = "UPDATE usuario SET 
                nom_usuario = '$nom_usuario',
                apel_usuario = '$apel_usuario',
                fecha_nacimiento = '$fecha_nacimiento',
                email = '$email',
                contraseña = '$contraseña',
                FK_rol = '$FK_rol'
            WHERE idUsuario = '$idUsuario'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("indexAdmin.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editarUsuario.php?idUsuario='.$idUsuario.'");</script>';
    }

    // Cerrar la conexión
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idUsuario'])) {
        $idUsuario = $_GET['idUsuario'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
            $nom_usuario = $fila['nom_usuario'];
            $apel_usuario = $fila['apel_usuario'];
            $fecha_nacimiento = $fila['fecha_nacimiento'];
            $email = $fila['email'];
            $contraseña = $fila['contraseña'];
            $FK_rol = $fila['FK_rol'];
        } else {
            echo '<script>alert("Usuario no encontrado"); location.assign("indexAdmin.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de usuario no proporcionado"); location.assign("indexAdmin.php");</script>';
        exit();
    }
}
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
                            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</h1>
                            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</h1>
                        
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
                            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</h1>
                            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</h1>
                        
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


<div class="container mx-auto text-center">
    <div class="mt-2 text-4xl font-bold text-gray-900">
        <p class="my-2">EDITAR USUARIO</p>
    </div>
    <div class="my-3 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300 dark:before:border-neutral-500 dark:after:border-neutral-500"></div>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="text-gray-200 justify-center mt-2">
        <div class="grid grid-cols-2">
            <div class="mx-4 mb-4">
            <div class="mb-6 mt-2" data-twe-input-wrapper-init>
                    <label for="idUsuario" class="  block mb-2 text-neutral-500">ID Usuario</label>
                    <input type="text" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="idUsuario" name="idUsuario" placeholder="Nombre" oninput="handleInput(this)" value="<?php echo $idUsuario;?>" readonly />
                </div>
                <div class="mb-6 mt-2" data-twe-input-wrapper-init>
                    <label for="nom_usuario" class="block mb-2 text-neutral-500">Nombre</label>
                    <input type="text" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="nom_usuario" name="nom_usuario" placeholder="Nombre" oninput="handleInput(this)" value="<?php echo $nom_usuario;?>" readonly />
                </div>
                <div class="mb-6" data-twe-input-wrapper-init>
                    <label for="apel_usuario" class="block mb-2 text-neutral-500">Apellido</label>
                    <input type="text" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="apel_usuario" name="apel_usuario" placeholder="Apellido" oninput="handleInput(this)" value="<?php echo $apel_usuario;?>" readonly />
                </div>
                <div class="mb-6" data-twe-input-wrapper-init>
                    <label for="fecha_nacimiento" class="block mb-2 text-neutral-500">Fecha Nacimiento</label>
                    <input type="date" class="block w-full rounded border border-gray-200 bg-transparent px-3 py-2 leading-tight text-gray-900 outline-none" id="fecha_nacimiento" name="fecha_nacimiento" placeholder=" " oninput="handleInput(this)" value="<?php echo $fecha_nacimiento;?>" readonly />
                </div>
            </div>
            <div class="mx-4 mb-4 mt-2">
                <div class="mb-6" data-twe-input-wrapper-init>
                    <label for="email" class="block mb-2 text-neutral-500">Email</label>
                    <input type="text" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="email" name="email" placeholder="email" oninput="handleInput(this)" value="<?php echo $email;?>" readonly />
                </div>
                <div class="mb-6" data-twe-input-wrapper-init>
                    <label for="contraseña" class="block mb-2 text-neutral-500">Contraseña</label>
                    <input type="password" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="contraseña" name="contraseña" placeholder="contraseña" oninput="handleInput(this)" value="<?php echo $contraseña;?>" readonly />
                </div>
                <div class="mb-6" data-twe-input-wrapper-init>
                    <label for="FK_rol" class="block mb-2 text-neutral-500">Rol</label>
                    <input type="number" class="block min-h-[auto] w-full rounded border border-gray-200 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none text-gray-900" id="FK_rol" name="FK_rol" placeholder="rol" oninput="handleInput(this)" value="<?php echo $FK_rol;?>" />
                </div>
            </div>
            <div class="col-span-2 mx-20 mb-5">
                <button type="submit" name="enviar" class="font-bold block w-full rounded-full bg-gray-900 text-gray-200 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-blue-600 hover:border border-white hover:text-gray-900 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-blue-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">Editar</button>
            </div>
        </div>
    </form>
</div>


      

</body>
</html>
