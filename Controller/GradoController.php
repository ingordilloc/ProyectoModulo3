<?php
namespace Controller;

use Model\GradoModel;

class GradoController {

    public function mostrar() {
        $grado = GradoModel::mostrarGrado();
        return $grado;
    }
    public function mostrarE() {
        $grado = GradoModel::mostrarEscolaridad();
        return $grado;
    }
}

?>