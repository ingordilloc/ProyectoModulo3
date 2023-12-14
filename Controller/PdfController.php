<?php
namespace Controller;
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Controller\MatriculasController;
class PdfController{
    public function generate() { 
        $usuarios = new MatriculasController;
        $listUsuarios = $usuarios->mostrarMatriculas();
        $dompdf = new Dompdf();
        $headerTable = '<h1>Listado de Participantes</h1><br>
        <center><p>Alumnos Matriculados</p></center><br>
        <center><table style="border: 1px solid black;">
        <tr>
  <th class="col-1">No</th>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Nivel</th>
  <th>Academico</th>
  <th>No. Carnet</th>
  <th>Direccion</th>
  <th>Solvente</th>
</tr>';
        $footerTable = '</table>';
        $bodyTable="";
        foreach( $listUsuarios as $usuario){
            $bodyTable = $bodyTable."<tr><th>".$usuario['Codigo']."</th>.<th>".$usuario['nombre']."</th>.<th>".$usuario['apellido']."</th>.
            <th>".$usuario['descripcion']."</th>.<th>".$usuario['escolaridad']."</th>.<th>".$usuario['carnet']."</th>.<th>".$usuario['direccion']."</th> 
            .<th>".$usuario['solvente']."</th></tr>
            ";


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
