<?php


function generarToken(){

return md5(uniqid(mt_rand(),false));


}

function registrar(array $datos, $conexion ){

$insert = "INSERT INTO usuario(nom_usuario,apel_usuario,fecha_nacimiento,email,contrasena,FK_rol,estado) 
VALUES('?','?','?','?','?','?',1)";

if($insert->execute([$datos])){

    return $conexion->lastInsertId();
}return 0; 
}

