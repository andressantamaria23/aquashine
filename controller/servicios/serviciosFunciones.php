<?php
require "../../config/conexion.php";

function servicioExiste($FK_vehiculo, $conectar) {
    // Preparar la consulta SQL
    $stmt = $conectar->prepare("SELECT estado_vehiculo FROM reservas WHERE FK_vehiculo = ? AND (estado_vehiculo = 'Pendiente' OR estado_vehiculo = 'En Proceso') LIMIT 1");
    
    // Enlazar parámetros
    $stmt->bind_param('i', $FK_vehiculo);  // 'i' indica que es un integer
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $stmt->store_result();  // Almacenar el resultado
    
    // Verificar si se encontró alguna fila
    if ($stmt->num_rows > 0) {
        return true;  // El vehículo está reservado en estado Pendiente o En Proceso
    }
    
    return false;  // El vehículo no está reservado o está reservado en otro estado
}
function fechaExiste($fecha_reserva, $hora_reserva, $conectar) {
    // Preparar la consulta SQL para verificar si ya existe una reserva en la misma fecha y hora
    $stmt = $conectar->prepare("SELECT fecha_reserva, hora_reserva FROM reservas WHERE fecha_reserva = ? AND hora_reserva = ? LIMIT 1");
    
    // Enlazar parámetros (dos strings, ya que fecha y hora son cadenas)
    $stmt->bind_param('ss', $fecha_reserva, $hora_reserva);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Almacenar el resultado
    $stmt->store_result();
    
    // Verificar si se encontró alguna fila (ya existe una reserva en esa fecha y hora)
    if ($stmt->num_rows > 0) {
        return true;  // Ya existe una reserva en la misma fecha y hora
    }
    
    return false;  // No hay reservas en la misma fecha y hora
}
function placaExiste($Placa, $conectar) {
    // Preparar la consulta SQL
    $stmt = $conectar->prepare("SELECT Placa FROM vehiculo WHERE Placa = ? LIMIT 1");
    
    // Enlazar parámetros
    $stmt->bind_param('s', $Placa);  // 's' indica que es un string
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $stmt->store_result();  // Almacenar el resultado
    
    // Verificar si se encontró alguna fila
    if ($stmt->num_rows > 0) {
        return true;  // La placa ya existe en la base de datos
    }
    
    return false;  // La placa no existe en la base de datos
}
