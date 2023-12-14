<?php
use Controller\RegistroController;
use Controller\GradoController;

$registrar = new RegistroController();
$registro = $registrar->datosAlumno();
$grado = new GradoController();

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
                    <h1 class="h1 mb-3 fw-normal">Matricular Alumno</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerNombre" value="<?php echo $registro['primerNombre'] ?>">
                        <label for="floatingInput">Primer Nombre</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="primerApellido" value="<?php echo $registro['primerApellido'] ?>">
                        <label>Primer Apellido</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="grado">
                           <?php
                        foreach($grado->mostrar() as $row => $item){
                            {$item['id'];}
                            echo  "<option value='{$item['idGrado']}'>{$item['descripcion']}</option>";
                        }
                        ?>
                        </select>
                        <label>Grado</label>
                    </div>
                    <div class="form-floating">
                    <select class="form-select" name="escolaridad">
                            <?php
                        foreach($grado->mostrarE() as $row => $item){
                            {$item['id'];}
                            echo  "<option value='{$item['idEscolaridad']}'>{$item['nombre']}</option>";
                        }
                        ?>
                        </select>
                        <label>Escolaridad</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="direccion">
                        <label>Direccion</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="carnet">
                        <label>Carnet</label>
                    </div>
                    <div class="form-floating">
                    <select class="form-select" name="solvente">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                        <label>Solvente</label>
                    </div>
                    <input type="hidden" name="idRegistro" value="<?php echo $registro['idAlumnos']; ?>">
                    <button class="btn btn-dark w-100 py-2" type="submit">Matricular</button>
                </form>
            </main>
        </div>
    </div>
    <?php 
$resultado = $registrar->matricularAlumno();
if($resultado == "guardado"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Alumno Matriculado</div>";
}
elseif($resultado == "error"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    error</div>";
}
}
?>
</div>