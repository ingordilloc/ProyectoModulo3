<?php
namespace Model;

use Model\ConexionModel;

class GradoModel {
    public static function mostrarGrado(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM grado");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function mostrarEscolaridad(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM escolaridad");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>