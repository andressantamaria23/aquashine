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
    <title>ADMINISTRADOR</title>
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
  
$sql = "SELECT * FROM rol";
$resultado = mysqli_query($conectar, $sql);
?>

<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-clip-padding py-5 bg-gray-900">
    <div class="flex w-full flex-wrap items-center justify-between px-3 text-blue-600">
        <button class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0" type="button" aria-label="Toggle navigation">
            <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 text-gray-200 font-bold" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <div class="hidden flex-grow basis-[100%] items-center lg:!flex basis-auto">
            <a class="mb-4 me-5 ms-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="#">
                <img src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp" style="height: 15px" alt="TE Logo" loading="lazy" />
            </a>
            <ul class="list-style-none me-auto flex flex-col ps-0 lg:flex-row">
                <li class="mb-4 lg:mb-0 lg:pe-2">
                    <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] lg:px-2" href="../user/indexAdmin.php">Usuarios</a>
                </li>
                <li class="mb-4 lg:mb-0 lg:pe-2">
                    <a class="rounded-md text-gray-200 transition duration-200 hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] lg:px-2" href="../roles/indexR.php">ROLES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar fixed top-0 bottom-0 left-[-300px] duration-300 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 shadow h-screen" id="sidebar">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center rounded-md">
            <i class="bi px-2 py-1 bg-blue-600 rounded-md"></i>
            <a class="text-[10px] ml-3 text-xl text-gray-200 font-bold">Administrador</a>
            <i class="bi bi-x cursor-pointer ml-20" onclick="toggleSidebar()"></i>
        </div>
        <hr class="my-2 text-gray-600">
        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600" onclick="dropDown()">
            <i class="bi bi-person-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200">USUARIOS</span>
                <span class="text-sm rotate-180" id="arrow"><i class="bi bi-chevron-down"></i></span>
            </div>
        </div>
        <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="submenu">
            <a href="../Admin/agregarU.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</a>
            <a href="../Admin/indexAdmin.php" class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</a>
        </div>
        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
            <i class="bi bi-envelope-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200">Mensajes</span>
        </div>
        <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
            <i class="bi bi-bookmark-fill"></i>
            <div class="flex justify-between w-full items-center" onclick="Close()">
                <span class="text-[15px] ml-4 text-gray-200">ROLES</span>
                <span class="text-sm rotate-180" id="rol"><i class="bi bi-chevron-down"></i></span>
            </div>
        </div>
        <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto hidden" id="Roles">
            <a href="agregarRol.php" class="mb-3 cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Agregar</a>
            <a href="indexR.php" class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Visualizar</a>
        </div>
        <hr class="my-4 text-gray-600">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
            <i class="bi bi-box-arrow-in-right"></i>
            <a href="../../../config/cerrarsesion.php" class="text-[15px] ml-4 text-gray-200">Logout</a>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content transition-all duration-300 pl-0" id="content">
    <div class="container mx-auto mt-10">
        <div class="text-center text-4xl font-bold text-gray-900">ROLES</div>
        <hr class="my-4 text-gray-600">
        <a href="agregarRol.php" role="button" class="mb-7 inline-block rounded-full bg-emerald-500 text-sm text-white hover:bg-emerald-700 px-6 pt-2.5 pb-2">Agregar</a>
        <div class="table-responsive">
            <table id="myTable" class="my-6 table min-w-full leading-normal min-w-full text-left text-sm whitespace-nowrap mb-3">
                <thead>
                    <tr class="bg-gray-800 text-white">
                    <th class="hidden px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider ">ID</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">Rol</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">Descripcion</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr class="border-b border-gray-200 bg-white hover:bg-gray-100 ">
                    <td class="hidden px-5 py-5 text-sm"><?php echo $row['idRol']; ?></td>
                        <td class="px-5 py-5 text-sm border-x border-y"><?php echo $row['nom_rol']; ?></td>
                        <td class="px-5 py-5 text-sm border-x border-y"><?php echo $row['descripcion']; ?></td>
                        <td class="px-5 py-5 text-sm border-x border-y">
                            <a href="editRol.php?idRol=<?php echo $row['idRol']; ?>" class="'bi bi-pencil-square text-indigo-600 hover:text-indigo-900"></a>
                            <a href="#" onclick="openModal('<?php echo $row['idRol']; ?>', '<?php echo $row['nom_rol']; ?>')" class="bi bi-trash text-red-600 hover:text-red-900 ml-4"></a>
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
        <h2 class="text-xl font-semibold mb-4">¿Desea eliminar el Usuario?</h2>
        <p class="mb-6">Esta acción no se puede deshacer.</p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Eliminar</a>
            <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">Cancelar</button>
        </div>
    </div>
</div>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.style.left = sidebar.style.left === "-300px" ? "0" : "-300px";
        document.querySelector(".content").classList.toggle("sidebar-open");
    }

    function dropDown() {
        document.getElementById("submenu").classList.toggle("hidden");
        document.getElementById("arrow").classList.toggle("rotate-0");
    }

    function Close() {
        document.getElementById("Roles").classList.toggle("hidden");
        document.getElementById("rol").classList.toggle("rotate-0");
    }

    function openModal(id, nombre) {
        document.querySelector("#deleteModal h2").textContent = `¿Desea eliminar el Usuario? ${nombre}`;
        document.querySelector("#deleteModal a").href = `../../../controller/Admin/deleteRol.php?idRol=${id}`;
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
