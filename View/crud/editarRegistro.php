<?php

use Controller\RegistroController;

$registrar = new RegistroController();
$registro = $registrar->editar();
$registrar->actualizar();
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
                    <h1 class="h1 mb-3 fw-normal">Editar Ficha de Alumno</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerNombre" value="<?php echo $registro['primerNombre'] ?>">
                        <label for="floatingInput">Primer Nombre</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="segundoNombre" value="<?php echo $registro['segundoNombre'] ?>">
                        <label for="floatingInput">Segundo Nombre</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerApellido" value="<?php echo $registro['primerApellido'] ?>">
                        <label for="floatingInput">Primer Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="segundoApellido" value="<?php echo $registro['segundoApellido'] ?>">
                        <label for="floatingInput">Segundo Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="edad" value="<?php echo $registro['edad'] ?>">
                        <label for="floatingInput">Edad</label>
                    </div>
                    <input type="hidden" name="idRegistro" value="<?php echo $registro['idAlumnos']; ?>">
                    <button class="btn btn-dark w-100 py-2" type="submit">Actualizar</button>
                </form>
            </main>
        </div>
    </div>
</div>