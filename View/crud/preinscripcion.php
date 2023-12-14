<?php
use Controller\RegistroController;
$nuevo = new RegistroController();
if (!empty($_SESSION['id']) && !empty($_SESSION['rol']== 'a') || !empty($_SESSION['rol']== 's') ) { 
?>
<div class="container">
<div class="alert alert-light" role="alert">
        <h1><?php echo $_SESSION['nombre'] ."  " .$_SESSION['apellido'];   ?></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
            <main class="form-signin w-100 m-auto">
                <form method="post">
                    <img class="" src="img/logoCE.png" alt="" width="72" height="57">
                    <h1 class="h1 mb-3 fw-normal">Registro de Alumno</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerNombre">
                        <label for="floatingInput">Primer Nombre</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="segundoNombre">
                        <label for="floatingInput">Segundo Nombre</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerApellido">
                        <label for="floatingInput">Primer Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="segundoApellido">
                        <label for="floatingInput">Segundo Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="edad">
                        <label for="floatingInput">Edad</label>
                    </div>
                    <button class="btn btn-dark w-100 py-2" type="submit">Registrar</button>
                </form>
            </main>
        </div>
    </div>
    <?php 

$resultado=$nuevo->registroAlumno();

if($resultado == "guardado"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Pre-Registro Exitoso</div>";
}
elseif($resultado =="error"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    error</div>";
}
}
?>
</div>