<?php
session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
date_default_timezone_set('America/Guatemala');

require_once('autoload.php');
require_once('vendor/autoload.php');
require_once('Helpers/Helpers.php');
use Controller\PaginaController;

$pagina = new PaginaController;
$pagina->mostrarInicio();
?>