<?php
require_once("../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {
    require_once("../../Head/index.php");
    require_once("../../Public/Plugins/Css.php");
?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de ventas</title>
    </head>

    <body>
        <?php
        echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
        <div class="container">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="../MantenimientoUsuario/consultarUsuario.php">Consultar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Volver</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../LogOut/">Salir</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center">Crear Usuario</h1>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-6">
            <div class="container-fluid justify-content-center mt-5 border p-3">

                <form class="form-inline" action="" method="post" id="form_nuevo_usu">
                    <div class="container mb-3 mt-2">
                        <input type="text" class="form-control mb-2 mr-sm-4 col-4" placeholder="Ingrese email" id="usu_email" name="usu_email">
                        <input type="text" class="form-control mb-2 mr-sm-4 col-6" minlength="8" maxlength="12" placeholder="Ingrese password" id="usu_pass" name="usu_pass">
                        <div class="form-group"><span>Tipo:</span>
                            <select class="form-control" id="usu_rol" name="usu_rol">

                            </select>
                        </div>

                    </div>
                    <div class="container mt-1">
                        <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION['usu_id'] ?>">
                        <input type="hidden" name="guardar" value="si">
                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!------------------------   Fin Formulario         -------------------------------->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="nuevoUsuario.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>