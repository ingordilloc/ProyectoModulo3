<?php
namespace Controller;
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Controller\MatriculasController;
class ProfesorPDFController{
    public function profesoresAulas() { 
        $usuarios = new MatriculasController;
        $listUsuarios = $usuarios->mostrarAulas();
        $dompdf = new Dompdf();
        $headerTable = '<h1>Listado de Profesores</h1><br>
        <center><p>Profesores Asignados por Grado</p></center><br>
        <table style="border: 1px solid black; margin: 0 auto;">
        <tr>
  <th class="col-1">No de Aula</th>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Nivel</th>
  <th>Academico</th>
</tr>';
        $footerTable = '</table>';
        $bodyTable="";
        foreach( $listUsuarios as $usuario){
            $bodyTable = $bodyTable."<tr><th>".$usuario['Codigo']."</th>.<th>".$usuario['nombre']."</th>.<th>".$usuario['apellido']."</th>.
            <th>".$usuario['descripcion']."</th>.<th>".$usuario['escolaridad']."</th></tr>";

        }
        $completeTable = $headerTable.$bodyTable.$footerTable;
        $dompdf->loadHtml($completeTable);
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        ob_end_clean();
        //echo $dompdf->output();
        $dompdf->stream();
    }
}
?>