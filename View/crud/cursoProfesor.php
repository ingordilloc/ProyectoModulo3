<?php

use Controller\RegistroController;


$registrar = new RegistroController();

$registro = $registrar->datosProfesor();
if (!empty($_SESSION['id']) && !empty($_SESSION['rol']== 'a') || !empty($_SESSION['rol']== 's') ) {  
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
                    <h1 class="h1 mb-3 fw-normal">Asignacion de Cursos a Profesores</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="nombreProfe" value="<?php echo $registro['nombreProfesor'] ?>">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="apellidoProfe" value="<?php echo $registro['apellidoProfesor'] ?>">
                        <label>Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="curso">
                        <label>Curso a Impartir</label>
                    </div>
                    
                    <input type="hidden" name="idRegistro" value="<?php echo $registro['idProfesor']; ?>">
                    <button class="btn btn-dark w-100 py-2" type="submit">Asignar</button>
                </form>
            </main>
        </div>
    </div>
    <?php 

$resultado = $registrar->matricularProfesor(); 
if($resultado == "guardado"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Profesor Matriculado</div>";
}
elseif($resultado == "error"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    error</div>";
}
}
?>
</div>