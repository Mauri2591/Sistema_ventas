<?php
require_once("../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {

    require_once("../../Head/index.php");
    require_once("../../Public/Plugins/Css.php");
?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion nuevoArt">
                <li class="li_nav">
                    <a class="a_nav" href="./consultarVendedor.php">Volver</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center">Crear Vendedor</h1>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-4 p-5">
            <div class="mt-5 border border-secondary p-5 bg-light">
                <form action="" id="form_crea_vendedor" method="post" class="p-5">
                    <div class="form-group">
                        <label for="email">Nombre:</label>
                        <input type="text" class="form-control" placeholder="OIngrese nombre vendedor" id="nom_vendedor" name="nom_vendedor">
                    </div>
                    <div class="form-group">
                        <label for="email">Apellido:</label>
                        <input type="text" class="form-control" placeholder="Ingrese apellido vendedor" id="ape_vendedor" name="ape_vendedor">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Celular</label>
                        <input type="text" class="form-control" placeholder="Ingrese n° e celular o teléfono" id="cel_vendedor" name="cel_vendedor">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Enviar</button>
                </form>
            </div>
        </div>
        <!------------------------   Fin Formulario         -------------------------------->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="./main.js"></script>

        <?php echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>