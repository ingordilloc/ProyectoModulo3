<?php
namespace Model;
use Model\ConexionModel;

class RegistroModel{
    public static function guardarAlumno($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO alumnos (primerNombre, segundoNombre, primerApellido, segundoApellido, edad ) VALUES (:primerN, :segundoN, :primerA, :segundoA, :ed) ");
            $stmt->bindParam(":primerN", $datos['primerNombre'], \PDO::PARAM_STR);      
            $stmt->bindParam(":segundoN", $datos['segundoNombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":primerA", $datos['primerApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":segundoA", $datos['segundoApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":ed", $datos['edad'], \PDO::PARAM_STR);
            return $stmt->execute() ? true: false;
        }catch(\Throwable $th){
            return false;
        }
    }
    public static function mostrarRegistros(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM  alumnos" );
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function editarRegistro($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumnos where idAlumnos = :id");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function actualizarRegistro($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE alumnos SET primerNombre = :primerN, segundoNombre = :segundoN, primerApellido = :primerA, segundoApellido = :segundoA, edad= :ed where idAlumnos = :id ");
        $stmt->bindParam(":primerN", $datos['primerNombre'], \PDO::PARAM_STR);      
            $stmt->bindParam(":segundoN", $datos['segundoNombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":primerA", $datos['primerApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":segundoA", $datos['segundoApellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":ed", $datos['edad'], \PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idregistro'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;

    }
    public static function borrarAlumno($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumnos WHERE  idAlumnos = :id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function confirmarEliminacionAlumno($id){
        if(!empty($_POST['idRegistro'])){
            $stmt = ConexionModel::conectar()->prepare("DELETE FROM alumnos WHERE idAlumnos =:id");
            $stmt->bindParam(':id', $id,\PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
    
        }
    }
    public static function editarFicha($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumnos where idAlumnos =:id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function matriculaAlumno($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO matriculas (fkAlumnos, fkGrado, fkEscolaridad, direccion, carnet, fkUsuario, solvente ) 
            VALUES (:fkAlumnos, :fkGrado, :fkEscolaridad, :dire, :car, :usuario, :sol) ");
            $stmt->bindParam(":fkAlumnos", $datos['idalumno'], \PDO::PARAM_INT);      
            $stmt->bindParam(":fkGrado", $datos['grado'], \PDO::PARAM_INT);
            $stmt->bindParam(":fkEscolaridad", $datos['escolaridad'], \PDO::PARAM_INT);
            $stmt->bindParam(":dire", $datos['direccion'], \PDO::PARAM_STR);
            $stmt->bindParam(":car", $datos['carnet'], \PDO::PARAM_INT);
            $stmt->bindParam(":usuario", $_SESSION['id'], \PDO::PARAM_STR);
            $stmt->bindParam(":sol", $datos['solvente'], \PDO::PARAM_STR);
            return $stmt->execute() ? true: false;
        }catch(\Throwable $th){
            return false;
        }
    }
    public static function listadoProfesores(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM  profesores" );
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function profesorFicha($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM profesores where idProfesor =:id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function matriculaProfesor($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO cursos  (nombreCurso, fkProfesor) VALUES (:nombre, :fkProfe) ");
            $stmt->bindParam(":nombre", $datos['curso'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkProfe", $datos['idprofesor'], \PDO::PARAM_INT);      
            return $stmt->execute() ? true: false;
        }catch(\Throwable $th){
            return false;
        }
    }
    public static function eliminarProfesor($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM profesores WHERE  idProfesor = :id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function eliminacionProfesor($id){
        if(!empty($_POST['idRegistro'])){
            $stmt = ConexionModel::conectar()->prepare("DELETE FROM profesores WHERE idProfesor =:id");
            $stmt->bindParam(':id', $id,\PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
    
        }
    }
}


?>
