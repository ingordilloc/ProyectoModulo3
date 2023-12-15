<?php
use Controller\ProfesorPDFController;
$pdf= new ProfesorPDFController();

$pdf = $pdf->profesoresAulas();
?>