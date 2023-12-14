<?php
namespace Controller;
use Model\RegistroModel;

class RegistroController {
    public function registroAlumno(){
        if(!empty($_POST['primerNombre']) && !empty($_POST['segundoNombre']) && !empty($_POST['primerApellido']) && !empty($_POST['segundoApellido'] && !empty($_POST['edad']))){
            $datos = array(
                "primerNombre" => $_POST['primerNombre'],
                "segundoNombre" => $_POST['segundoNombre'],
                "primerApellido" => $_POST['primerApellido'],
                "segundoApellido" => $_POST['segundoApellido'],
                "edad" => $_POST['edad']
            );
            $respuesta = RegistroModel::guardarAlumno($datos);
            return $respuesta ? "guardado" : "error";
        }
    }
    public static function mostrar(){
        $registro = RegistroModel::mostrarRegistros();
        return $registro;
    }
    public function editar(){
        $idRegistro = $_GET['idRegistro'];
        $inscripcion = RegistroModel::editarRegistro($idRegistro);
        return $inscripcion;
    }
    public function actualizar(){
        if (!empty($_POST['idRegistro'])&& !empty($_POST['primerNombre']) && !empty($_POST['segundoNombre']) && !empty($_POST['primerApellido']) ) {
            $datos = array(
                "idregistro" => $_POST['idRegistro'],
                "primerNombre" => $_POST['primerNombre'],
                "segundoNombre" => $_POST['segundoNombre'],
                "primerApellido" => $_POST['primerApellido'],
                "segundoApellido" => $_POST['segundoApellido'],
                "edad" => $_POST['edad'] 
            );
            $respuesta = RegistroModel::actualizarRegistro($datos);
            if($respuesta){
                header("Location: index.php?action=mostrar");
            }
        }
    }
    public function borrar(){
        if (!empty($_GET['idRegistro'])){
            $inscripcion = RegistroModel::borrarAlumno($_GET['idRegistro']);
            return $inscripcion;
        }
    }
    public function confirmarEliminacion(){
        if(!empty($_POST['idRegistro'])){
            $inscripcion = RegistroModel::confirmarEliminacionAlumno($_POST['idRegistro']);
            if($inscripcion)
            { 
                header("Location: index.php?action=mostrar"); 
            }
        }
    }
    public function datosAlumno(){
        $idRegistro = $_GET['idRegistro'];
        $inscripcion = RegistroModel::editarFicha($idRegistro);
        return $inscripcion;
    }
    public function matricularAlumno(){
        if(!empty($_POST['idRegistro']) && !empty($_POST['grado']) && !empty($_POST['escolaridad']) && !empty($_POST['direccion']) && !empty($_POST['carnet']) && !empty($_POST['solvente'])){
            $datos = array(
                "idalumno" => $_POST['idRegistro'],
                "grado" => $_POST['grado'],
                "escolaridad" => $_POST['escolaridad'],
                "direccion" => $_POST['direccion'],
                "carnet" => $_POST['carnet'],
                "solvente" => $_POST['solvente']
            );
            $respuesta = RegistroModel::matriculaAlumno($datos);
            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrarProfesores(){
        $profesores = RegistroModel::listadoProfesores();
        return $profesores;
    }
    public function datosProfesor(){
        $idRegistro = $_GET['idRegistro'];
        $inscripcion = RegistroModel::profesorFicha($idRegistro);
        return $inscripcion;
    }
    public function matricularProfesor(){
        if(!empty($_POST['idRegistro']) && !empty($_POST['curso'])){
            $datos = array(
                "idprofesor" => $_POST['idRegistro'],
                'curso' => $_POST['curso']
            );
            $respuesta = RegistroModel::matriculaProfesor($datos);
            return $respuesta ? "guardado" : "error";
        }
    }
    public function borrarProfesor(){
        if (!empty($_GET['idRegistro'])){
            $respuesta = RegistroModel::eliminarProfesor($_GET['idRegistro']);
            return $respuesta;
        }
    }
    public function confirmacionProfesor(){
        if(!empty($_POST['idRegistro'])){
            $inscripcion = RegistroModel::eliminacionProfesor($_POST['idRegistro']);
            if($inscripcion)
            { 
                header("Location: index.php?action=profesor"); 
            }
        }
    }
   
}
?>