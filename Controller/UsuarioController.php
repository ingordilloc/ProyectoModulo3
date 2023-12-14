<?php

namespace Controller;

use Model\UsuarioModel;

class UsuarioController{   

public function login(){
    
    if(!empty($_POST['usuario']) && !empty($_POST['password']) ){
        $usuario = strClean(($_POST['usuario']));
        $password = strClean(($_POST['password']));
        $datos = array(
            'usuario' => $usuario
        );
        $respuesta = UsuarioModel::logeado($datos);
        $resultado = password_verify($password, $respuesta['clave']);

        if ($resultado == true){
            $_SESSION['id'] = $respuesta['idUsuario'];
            $_SESSION['nombre'] = $respuesta['nombre'];
            $_SESSION['apellido'] = $respuesta['apellido'];
            $_SESSION['usuario'] = $respuesta['usuario'];
            $_SESSION['clave'] = $respuesta['clave'];
            $_SESSION['rol'] = $respuesta['rol'];
            header("location: index.php?action=inicio&id={$respuesta['idUsuario']}");

        } else {
            return "ERROR";
        }
    }
}

public function logout(){
    session_destroy();
    header("location: index.php?action=inicio");
}

public function crearUsuario(){
    if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['nombre'])){

        $usuario = strClean($_POST['usuario']);
        $password = strClean($_POST['password']);
        $password = password_hash($password, PASSWORD_ARGON2ID);
        $nombre = strClean($_POST['nombre']);
        $apellido = strClean($_POST['apellido']);
        $rol = strClean($_POST['rol']);

        $datos=array(
            'usuario' => $usuario,
            'password' => $password,
            'nombres' => $nombre,
            'apellidos' => $apellido,
            'rol' => $rol,
        );
        $respuesta = UsuarioModel::guardarUsuario($datos);
        return $respuesta;
    }
}

}


?>