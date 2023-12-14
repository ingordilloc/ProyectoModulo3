<?php
namespace Controller\Trait\Listados;

use Model\MatriculasModel;


trait listPdfMatriculas{
    public function listarMatriculas(){
        $listado = MatriculasModel::listadoMatriculas();
        return $listado;
    }
}
?>