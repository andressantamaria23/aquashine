<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
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

        .form-group input, .form-group select {
            padding: 12px 12px 12px 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
            outline: none;
        }

        .form-group input:focus + label, .form-group select:focus + label,
        .form-group input:not(:placeholder-shown) + label, .form-group select:not(:placeholder-shown) + label {
            top: -18px;
            left: 12px;
            font-size: 12px;
            color: #1e40af;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
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
    <div class="form-container">
        <h2>Registrar Vehículo</h2>
        <form action="../../controller/servicios/agregarVe.php" method="POST">

            <div class="form-group">
                <input type="text" id="Placa" name="Placa" placeholder=" ">
                <label for="Placa">Placa</label>
            </div>

            <div class="form-group">
                <select id="tipo_vehiculo" name="tipo_vehiculo" required>
                    <option value="">Seleccione un tipo de vehículo</option>
                    <option value="carro">Carro</option>
                    <option value="moto">Moto</option>
                </select>
                <label for="tipo_vehiculo">Tipo de vehículo</label>
            </div>

            <div class="form-group">
                <select id="color_vehiculo" name="color_vehiculo" required>
                    <option value="">Seleccione un color</option>
                    <option value="blanco">Blanco</option>
                    <option value="negro">Negro</option>
                    <option value="gris">Gris</option>
                    <option value="rojo">Rojo</option>
                    <option value="azul">Azul</option>
                    <option value="plateado">Plateado</option>
                    <option value="verde">Verde</option>
                    <option value="amarillo">Amarillo</option>
                </select>
                <label for="color_vehiculo">Color del vehículo</label>
            </div>

            <div class="form-group">
                <select id="marca" name="marca" required>
                    <option value="">Seleccione una marca</option>
                    <!-- Opciones serán actualizadas por JavaScript -->
                </select>
                <label for="marca">Marca</label>
            </div>

            <div class="form-group hidden">
                <input type="text" id="FK_usuario" name="FK_usuario" placeholder=" " value="2">
                <label for="FK_usuario">Usuario</label>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn">Registrar</button>
            </div>
        </form>
    </div>

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
          const marcasMoto = ['Yamaha', 'Honda', 'Suzuki', 'Kawasaki', 'Harley-Davidson', 'Ducati', 'Pulsar', 'TVS'];
          marcasMoto.forEach(marca => {
            const option = document.createElement('option');
            option.value = marca;
            option.text = marca;
            marcaSelect.appendChild(option);
          });
        }
      }

      // Update marca options when the tipo_vehiculo select changes
      document.getElementById('tipo_vehiculo').addEventListener('change', updateMarcaOptions);
    </script>
</body>
</html>
