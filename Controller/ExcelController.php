<?php
namespace Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Model\MatriculasModel;
class ExcelController {
    public function alumnosExcel(){
        $excel = new Spreadsheet();
        $datos = new MatriculasModel();

        $listado = $datos->listadoMatriculas();
        $hoja1 =$excel->getActiveSheet();

        $hoja1->setTitle("Listado Alumnos");
        $hoja1->setCellValue('A1', 'No. Matricula'); // Con la funcion setCellValue se agrega la posicion de la celda y el valor
$hoja1->setCellValue('B1', 'Nombre'); // Posicion A2
$hoja1->setCellValue('C1', 'Apellido');// Posicion A3
$hoja1->setCellValue('D1', 'Nivel');
$hoja1->setCellValue('E1', 'Academico');
$hoja1->setCellValue('F1', 'No. Carnet');
$hoja1->setCellValue('G1', 'Solvente');
$hoja1->setCellValue('H1', 'Curso');
$hoja1->setCellValue('I1', 'Nota');
$FILA = 2;
foreach($listado as $row => $item){
    $hoja1->setCellValue("A{$FILA}",$item['Codigo']);
    $hoja1->setCellValue("B{$FILA}", $item['nombre']);
    $hoja1->setCellValue("C{$FILA}", $item['apellido']);
    $hoja1->setCellValue("D{$FILA}", $item['descripcion']);
    $hoja1->setCellValue("E{$FILA}", $item['escolaridad']);
    $hoja1->setCellValue("F{$FILA}", $item['carnet']);
    $hoja1->setCellValue("G{$FILA}", $item['solvente']);
    $FILA++;
}

ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="myfile.xlsx"');
header('Cache-Control: max-age-0');
$writer= IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output'); //  Guardamos el archivo
exit;
    }
}





?>