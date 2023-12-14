<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/logoCE.png" alt="Bootstrap" width="60" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">INICIO
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=nosotros">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=contacto">Soporte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=politica">Politica</a>
        </li>
        <?php
        if (!empty($_SESSION['id']) && ($_SESSION['rol'])) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MAS</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index.php?action=preinscripcion">PreRegistro-Alumno</a>
              <a class="dropdown-item" href="index.php?action=mostrar">Matricular Alumno</a>
              <a class="dropdown-item" href="index.php?action=profesor">Asignar Profesor</a>
              <a class="dropdown-item" href="index.php?action=tablaAlumnos">Listado de Alumnos</a>
              <a class="dropdown-item" href="index.php?action=tablaProfesores">Listado de Profesores</a>
              <a class="dropdown-item" href="index.php?action=notas">Notas</a><!--Crear controller-model-NOTAS-->
            </div>
          </li>
      </ul>
      <ul class="navbar-nav">
        <a class="btn btn-secondary ms-2 " href="index.php?action=logout">Cerrar Sesion</a></button>
        <a class="btn btn-secondary ms-2" href="index.php?action=crearUsuario">Registrar</a></button>
        
        <?php  } else {  ?>
        </ul>
      
        <div class=" d-md-flex justify-content-md-end">
          <a class="btn btn-secondary ms-2" href="index.php?action=login">Inicia Sesion</a>
    </div>
      
    <?php } ?>
    </div>
  </div>
</nav>