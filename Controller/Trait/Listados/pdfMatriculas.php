<?php
namespace Controller\Trait\Listados;

require 'vendor/autoload.php';

use Controller\PDF;


trait pdfMatriculas{
    public function pdfMatriculas(){
        $usuarioAllDB = $this->listarMatriculas();
        $pdf = new PDF();
        $pdf ->title="Listado de Alumnos";
        $pdf ->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        foreach($usuarioAllDB as $usuario){
            $pdf->Cell(0,10,$usuario["id"]." ".$usuario["nombres"],0,1);
        }
        ob_end_clean();//Limpiar las etiquetas del header
        $pdf->Output();
        
    }
}
?>