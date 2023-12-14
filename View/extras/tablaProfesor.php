<?php

use Controller\MatriculasController;
$listado = new MatriculasController();
?>
<h2>Profesores y Grados Asignados</h2>
<table id="example" class="display" width="100%"></table>
<script type="text/javascript">
    let dataCategorias = <?php echo json_encode($listado->mostrarAulas()); ?>;
    let data =[];

    for(let i=0; i<dataCategorias.length; i++){
        data.push([dataCategorias[i].Codigo, dataCategorias[i].nombre, dataCategorias[i].apellido, dataCategorias[i].descripcion, dataCategorias[i].escolaridad ]);
        
    }
    let table = new DataTable('#example', {
        columns: [{title: 'No de Aula'},
    {title: 'Nombre'},
    {title: 'Apellido'},
    {title: 'Nivel'},
    {title: 'Academico'},
],
data: data
    });
    </script>
    <a class="btn btn-secondary" href="index.php?action=profesorPDF">Listado en PDF</a>
