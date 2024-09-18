<?php
require "config/conexion.php";

function esNulo(array $parametro){
    foreach($parametro as $parametro){
        if( strlen(trim($parametro))<1){
            return true;
        }
    }return false;
}

function esEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true; 
    }return false; 
}

function generarToken(){

return md5(uniqid(mt_rand(),false));

}

function registrar(array $datos, $conectar ){

$insert = "INSERT INTO usuario(nom_usuario,apel_usuario,fecha_nacimiento,email,contrasena,FK_rol,estado) 
VALUES('?','?','?','?','?','?',1)";

if($insert->execute([$datos])){

    return $conexion->lastInsertId();
}return 0; 
}

function emailExists($email, $conectar) {
    // Preparar la consulta SQL
    $stmt = $conectar->prepare("SELECT idUsuario FROM usuario WHERE email = ? LIMIT 1");
    
    // Enlazar parámetros
    $stmt->bind_param('s', $email);  // 's' indica que es un string
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $stmt->store_result();  // Almacenar el resultado
    
    // Verificar si se encontró alguna fila
    if ($stmt->num_rows > 0) {
        return true;
    }
    
    return false;
}


function mostrarmensajes(array $errors) {
    if (count($errors) > 0) {
        echo '<div id="alert" class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg relative" role="alert">'; 
        echo '<ul>'; // Abre la lista <ul>
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>'; // Muestra cada error correctamente
        }
        echo '</ul>'; // Cierra la lista <ul>
        echo '<span onclick="document.getElementById(\'alert\').style.display=\'none\'" class="absolute top-0 bottom-0 right-0 px-4 py-3">';
        echo '<svg class="fill-current h-6 w-6 text-yellow-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">';
        echo '<title>Close</title>';
        echo '<path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 11-1.414-1.415l2.935-2.934-2.935-2.934a1 1 0 111.414-1.415L10 8.586l2.934-2.935a1 1 0 111.414 1.415l-2.935 2.934 2.935 2.934a1 1 0 010 1.415z"/>';
        echo '</svg>';
        echo '</span>';
        echo '</div>';
    }
}

function validaToken($idUsuario, $token, $conectar) {

    $msg = "";

    // Preparar la consulta SQL
    $stmt = $conectar->prepare("SELECT idUsuario FROM usuario WHERE idUsuario = ? AND confirmacion like ? LIMIT 1");
    
    // Enlazar parámetros: 'i' para integer, 's' para string
    $stmt->bind_param('is', $idUsuario, $token);  // o 'ss' si idUsuario es una cadena
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $stmt->store_result();  // Almacenar el resultado
    
    // Verificar si se encontró alguna fila
    if ($stmt->num_rows > 0) {
        if(ActivarUsuario($idUsuario, $conectar)){
            $msg = "Cuenta Activada";
        }else{
            $msg = "Error al activar cuenta";
        }
    } else {
        $msg = "No existe registro del cliente";
    }
    
    return $msg;
}


function ActivarUsuario($idUsuario, $conectar) {
    


    // Preparar la consulta SQL
    $sql = $conectar->prepare("UPDATE usuario SET estado = 2, confirmacion = '' WHERE idUsuario = ?");

    // Enlazar el parámetro: 'i' para entero, 's' para string
    $sql->bind_param('i', $idUsuario);  // Cambia 'i' a 's' si idUsuario es una cadena

    // Ejecutar la consulta
    return $sql->execute();
}


function esActivo($email, $conectar){

    $sql = $conectar->prepare("SELECT estado FROM usuario WHERE idUsuario = ? LIMIT 1");
    $sql->bind_param('s', $email);  // Cambia 'i' a 's' si idUsuario es una cadena
    $row  = $sql->fetch(PDO:: FETCH_ASSOC);
    if($row['estado']==2 ){

        return true;
    }
return false; 
}

function SolicitarPassword($idUsuario, $conectar) {
    $token = generarToken();

    // Prepara la consulta para actualizar el token
    $sql = $conectar->prepare("UPDATE usuario SET confirmacion_contrasena = ? WHERE idUsuario = ?");

    // Vincula los parámetros
    $sql->bind_param("si", $token, $idUsuario); // "si" indica string y entero

    // Ejecuta la consulta
    if ($sql->execute()) {
        // Cierra la declaración para liberar los recursos
        $sql->close();
        return $token;
    }

    // Cierra la declaración en caso de fallo
    $sql->close();
    return null;
}

function verificarToken($idUsuario, $token, $conectar){
    // Prepara la consulta SQL
    $sql = $conectar->prepare("SELECT idUsuario FROM usuario WHERE idUsuario = ? AND confirmacion_contrasena = ? LIMIT 1");

    // Vincula los parámetros a la consulta
    $sql->bind_param('is', $idUsuario, $token);

    // Ejecuta la consulta
    $sql->execute();

    // Obtiene el resultado
    $resultado = $sql->get_result();

    // Verifica si existe un resultado (si se encuentra el usuario con el token)
    if ($resultado->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}



function actualizaPassword($idUsuario, $contrasena, $conectar) {

    // Prepara la consulta
    $sql = $conectar->prepare("UPDATE usuario SET contrasena = ?, confirmacion_contrasena = '' WHERE idUsuario = ?");

    if ($sql === false) {
        die('Error en la preparación de la consulta: ' . $conectar->error);
    }

    // Vincula los parámetros a la consulta (string para la contraseña y entero para el idUsuario)
    $sql->bind_param("si", $contrasena, $idUsuario);

    // Ejecuta la consulta y muestra mensajes de depuración
    if ($sql->execute()) {
        echo "Contraseña actualizada correctamente.";
        $sql->close();
        return $contrasena;
    } else {
        echo "Error al actualizar la contraseña: " . $sql->error;
    }

    // Cierra la declaración
    $sql->close();
    return null;
}

