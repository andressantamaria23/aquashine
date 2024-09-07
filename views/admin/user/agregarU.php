<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('../img/lavad.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            margin: 20px;
        }

        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e3a8a;
            text-align: center;
            font-weight: 700;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            position: absolute;
            top: 0;
            left: 12px;
            background-color: #ffffff;
            padding: 0 4px;
            font-size: 14px;
            color: #1e3a8a;
            font-weight: 600;
            transition: all 0.2s ease;
            pointer-events: none;
        }

        .form-group input {
            padding: 12px 12px 12px 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .form-group input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -18px;
            left: 12px;
            font-size: 12px;
            color: #1e40af;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #1e3a8a;
            color: white;
            border: none;
            padding: 10px 16px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>

<?php
include("../../../config/conexion.php");


  
$sql = "SELECT idRol, nom_rol FROM rol";
$result = mysqli_query($conectar, $sql);
  ?>
    <div class="form-container mx-auto">
        <h2>Registrar Usuario</h2>
        <form action="../../../controller/Admin/agregarUAd.php" method="POST">
            
            <div class="form-group">
                <input type="text" id="nom_usuario" name="nom_usuario" placeholder=" " required>
                <label for="nom_usuario">Nombre</label>
            </div>

            <div class="form-group">
                <input type="text" id="apel_usuario" name="apel_usuario" placeholder=" " required>
                <label for="apel_usuario">Apellido</label>
            </div>

            <div class="form-group">
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder=" " required>
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">Correo Electrónico</label>
            </div>

            <div class="form-group">
                <input type="password" id="contraseña" name="contraseña" placeholder=" " required>
                <label for="contraseña">Contraseña</label>
            </div>

            <div class="form-group">
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="FK_rol" name="FK_rol" required>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['idRol']; ?>">
                                <?php echo htmlspecialchars($row['nom_rol']); ?>
                            </option>
                        <?php } ?>
                    </select>
                <label for="FK_rol  ">Rol</label>
            </div>

            <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Registrar
                    </button>
                    <a href="indexAdmin.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
                </div>
            
        </form>
    </div>
</body>
</html>
