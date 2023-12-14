<?php
namespace Model;
use Model\ConexionModel;

class MatriculasModel{
    public static function listadoMatriculas(){
        $stmt = ConexionModel::conectar()->prepare("SELECT matriculas.idMatricula as Codigo, alumnos.primerNombre as nombre, alumnos.primerApellido as apellido, descripcion, escolaridad.nombre as escolaridad, direccion, carnet, solvente FROM matriculas INNER JOIN alumnos on alumnos.idAlumnos=fkAlumnos INNER JOIN grado on grado.idGrado = fkGrado INNER JOIN escolaridad on escolaridad.idEscolaridad = fkEscolaridad" );
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function listadoAulas(){
        $stmt = ConexionModel::conectar()->prepare("SELECT aulas.idAula as Codigo, profesores.nombreProfesor as nombre, profesores.apellidoProfesor as apellido, descripcion, escolaridad.nombre as escolaridad FROM aulas INNER JOIN profesores on profesores.idProfesor=fkProfesor INNER JOIN grado on grado.idGrado = fkGrado INNER JOIN escolaridad on escolaridad.idEscolaridad = fkEscolaridad" );
        $stmt->execute();
        return $stmt->fetchAll();
    }

}