<?php
use Controller\RegistroController;


if (!empty($_SESSION['id'] && ($_SESSION['rol']== 'a') || ($_SESSION['rol']== 's'))){  
  echo "<h4>Direccion/Secretaria</h4>";
  echo "<h4>Listado de PreRegistros</h4>";
  $registros = new RegistroController;
  $listado = $registros->mostrar();

echo "   
<table class='table table-hover'>
<tr>
  <th class='col-1'>No</th>
  
  <th class='col'>Nombres</th>
  <th class='col'>Apellidos</th>
  <th class='col'>edad</th>
  <th class='col'>Editar</th>
  <th class='col'>Eliminar</th>
  <th class='col'>Accion</th>
</tr>
</table>

";

foreach($listado as $row => $item) {    
echo "   
<table class='table table-hover'>
    <tr class='table-active row'>
      <th class='col-1'>{$item['idAlumnos']}</th>
      <th class='col'>{$item['primerNombre']}</th>
      <th class='col'>{$item['primerApellido']}</th>
      <th class='col'>{$item['segundoApellido']}</th>
      <th class='col'>{$item['edad']}</th>
      <th class='col'><a href='index.php?action=editarRegistro&idRegistro={$item['idAlumnos']}'>Editar</a></th>
      <th class='col'><a href='index.php?action=eliminarRegistro&idRegistro={$item['idAlumnos']}'>Eliminar</a></th>
      <th class='col'><a href='index.php?action=matricular&idRegistro={$item['idAlumnos']}'>Matricular</a></th>
    </tr>
</table>
";
 }
}

echo "<li class='nav-item'>
<a class='btn btn-secondary' href='index.php?action=grafico'>Grafica de Notas</a>
</li>"

?>