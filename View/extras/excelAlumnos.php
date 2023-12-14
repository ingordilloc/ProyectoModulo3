<?php
use Controller\ExcelController;
$alumnos= new ExcelController();
$alumnos = $alumnos->alumnosExcel();

?>