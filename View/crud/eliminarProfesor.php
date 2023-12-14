<?php

use Controller\RegistroController;

$registrar = new RegistroController();
$registro = $registrar->borrarProfesor();
$registrar->confirmacionProfesor();
?>
<div class="container">
    <div class="alert alert-light" role="alert">
        <h1><?php echo $_SESSION['nombre'] . "  " . $_SESSION['apellido'];   ?></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
            <main class="form-signin w-100 m-auto">
                <form method="post">
                    <img class="" src="img/logoCE.png" alt="" width="72" height="57">
                    <h1 class="h1 mb-3 fw-normal">¿Eliminar Profesor?</h1>
                    <table class='table table-hover'>
                        <tr class='table-active row'>
                            <th class='col'><?php echo $registro['idProfesor']; ?></th>
                            <th class='col'><?php echo $registro['nombreProfesor']; ?></th>
                            <th class='col'><?php echo $registro['apellidoProfesor']; ?></th>
                        </tr>
                    </table>
                    <input type="hidden" name="idRegistro" value="<?php echo $registro['idProfesor']?>">
                    <button class="btn btn-dark w-100 py-2" type="submit">Borrar Profesor</button>
                </form>
            </main>
        </div>
    </div>