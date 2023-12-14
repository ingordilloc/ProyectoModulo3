<?php 
namespace Model;

class EnlacesModel{
    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio"=> "View/paginas/inicio.php",
            "contacto"=> "View/paginas/contacto.php",
            "nosotros"=> "View/paginas/nosotros.php",
            "politica"=> "View/paginas/politica.php",
            "preinscripcion"=> "View/crud/preinscripcion.php",
            "mostrar"=> "View/crud/preRegistro.php",
            "editarRegistro"=> "View/crud/editarRegistro.php",
            "eliminarRegistro"=> "View/crud/eliminarRegistro.php",
            "eliminarProfesor"=> "View/crud/eliminarProfesor.php",
            "matricular"=> "View/crud/matricula.php",
            "profesor"=> "View/crud/asignarProfesor.php",
            "cursoProfesor"=> "View/crud/cursoProfesor.php",
            "tablaAlumnos"=> "View/extras/tablaAlumnos.php",
            "tablaProfesores" => "View/extras/tablaProfesor.php",
            "login" => "View/usuarios/login.php",
            "logout" => "View/usuarios/logout.php",
            "crearUsuario" => "View/usuarios/nuevoUsuario.php",
            "grafico" => "View/extras/grafica.php",
            "notas" => "View/extras/notasAlumnos.php",
            "PDF" => "View/extras/pdf.php",
            "profesorPDF" => "View/extras/profesorPDF.php",
            "excel" => "View/extras/excelAlumnos.php",
            "pdfUsuarios" => "View/usuarios/pdfUsuarios.php",
            default => "View/paginas/error.php"

        };
        return $modulo;
    }
}
?>