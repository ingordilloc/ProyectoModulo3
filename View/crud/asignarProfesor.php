<?php
use Controller\RegistroController;


if (!empty($_SESSION['id'] && ($_SESSION['rol']== 'a') || ($_SESSION['rol']== 's'))){  
  echo "<h4>Direccion/Secretaria-Profesores</h4>";
  $registros = new RegistroController;
  $listado = $registros->mostrarProfesores();

echo "   
<table class='table table-hover'>
<tr>
  <th class='col-1'>No</th>
  
  <th class='col'>Nombre</th>
  <th class='col'>Apellido</th>
  <th class='col'>Asignacion</th>
  <th class='col'>Eliminar</th>
</tr>
</table>

";

foreach($listado as $row => $item) {    
echo "   
<table class='table table-hover'>
    <tr class='table-active row'>
      <th class='col-1'>{$item['idProfesor']}</th>
      <th class='col'>{$item['nombreProfesor']}</th>
      <th class='col'>{$item['apellidoProfesor']}</th>
      <th class='col'><a href='index.php?action=cursoProfesor&idRegistro={$item['idProfesor']}'>Curso</a></th>
      <th class='col'><a href='index.php?action=eliminarProfesor&idRegistro={$item['idProfesor']}'>Eliminar</a></th>
    </tr>
</table>
";
 }
}