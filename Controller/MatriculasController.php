<?php
namespace Controller;
use Model\MatriculasModel;
use Controller\Trait\Listados\pdfMatriculas;
use Controller\Trait\Listados\listPdfMatriculas;

class MatriculasController {
    use pdfMatriculas,listPdfMatriculas;
    
    public function mostrarMatriculas(){
        $profesores = MatriculasModel::listadoMatriculas();
        return $profesores;
    }
    public function mostrarAulas(){
        $profesores = MatriculasModel::listadoAulas();
        return $profesores;
    }
}



?>