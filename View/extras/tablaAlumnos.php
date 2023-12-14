<?php

use Controller\MatriculasController;
$listado = new MatriculasController();
?>
<h2>Listado de Alumnos Matriculados</h2>
<table id="example" class="display" width="100%"></table>
<script type="text/javascript">
    let dataCategorias = <?php echo json_encode($listado->mostrarMatriculas()); ?>;
    let data =[];

    for(let i=0; i<dataCategorias.length; i++){
        data.push([dataCategorias[i].Codigo, dataCategorias[i].nombre, dataCategorias[i].apellido, dataCategorias[i].descripcion, dataCategorias[i].escolaridad, dataCategorias[i].direccion, dataCategorias[i].carnet, dataCategorias[i].solvente ]);
        
    }
    let table = new DataTable('#example', {
        columns: [{title: 'No'},
    {title: 'Nombre'},
    {title: 'Apellido'},
    {title: 'Nivel'},
    {title: 'Academico'},
    {title: 'Direccion'},
    {title: 'Carnet'},
    {title: 'Solvente'},

],
data: data
    });
    </script>
    <a class="btn btn-secondary" href="index.php?action=PDF">Listado en PDF</a>
    <a class="btn btn-secondary" href="index.php?action=excel">Listado en Excel</a>
    <a class='btn btn-secondary' href='index.php?action=grafico'>Grafica de Notas</a>

