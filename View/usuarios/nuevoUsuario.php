<?php

use Controller\UsuarioController;

$usuario = new UsuarioController();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">

            <main class="form-signin w-100 m-auto">
                <form method="post">
                    <img src="img/logoCE.png" alt="" width="72" height="57">
                    <h1 class="h1 mb-3 fw-normal">Registrar Usuario</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="nombre">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="apellido">
                        <label for="floatingInput">Apellido</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="usuario">
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="form-floating">
                        <!--<input type="password" class="form-control" id="floatingPassword" name="rol" >-->
                        <select class="form-select" aria-label="Default select example" name="rol">
                            <option selected>Puesto</option>
                            <option value="a">Direccion</option>
                            <option value="c">Catedratico</option>
                            <option value="s">Secretaria</option>
                        </select>
                    </div>

                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Recordar
                        </label>
                    </div>
                    <button class="btn btn-dark w-100 py-2" type="submit">Registrar</button>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
                </form>
            </main>
        </div>
    </div>
</div>
<?php
$nuevo = $usuario->crearUsuario();
if ($nuevo === false){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Error de los datos</div>";
}

?>