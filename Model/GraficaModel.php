<?php
namespace Model;

use Model\ConexionModel;

class GraficaModel{

    public static function mostrarDatos(){
        $stmt = ConexionModel::conectar()->prepare("SELECT notaAlumno as cantidad, nombreCurso as curso, primerNombre as nombre FROM notas INNER JOIN cursos on cursos.idCurso = notas.fkCurso INNER JOIN alumnos on alumnos.idAlumnos = notas.fkAlumnos  ORDER BY curso");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>