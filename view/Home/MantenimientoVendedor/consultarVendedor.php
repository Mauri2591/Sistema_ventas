<?php
require_once("../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {
    require_once("../../Head/index.php");
    require_once("../../Public/Plugins/Css.php");
?>
    <link rel="stylesheet" href="../../plantilla/css/lib/datatables-net/datatables.min.css">
    <link rel="stylesheet" href="../../plantilla/css/separate/vendor/datatables-net.min.css">
    <link rel="stylesheet" href="../../plantilla/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../plantilla/css/lib/bootstrap/bootstrap.min.css">
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion">
                <li class="li_nav">
                    <a class="a_nav" href="./index.php">Alta Vendedor</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Inicio</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center">Consultar Vendedores</h1>

        <!------------------------   Inicio Tabla         -------------------------------->
        <div class="container">
            <section class="card">
                <div class="card-block">
                    <table id="tabla_vendedor" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Nombre</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Apellido</th>
                                <th class="d-none d-sm-table-cell" style="width: 1%;">Cel</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
        <!------------------------   Fin Tabla         -------------------------------->

        <?php require("editarVendedor.php") ?>

        <script src="../../plantilla/js/lib/jquery/jquery.min.js"></script>
        <script src="../../plantilla/js/lib/tether/tether.min.js"></script>
        <script src="../../plantilla/js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="../../plantilla/js/plugins.js"></script>
        <script src="../../plantilla/js/lib/datatables-net/datatables.min.js"></script>
        <script type="text/javascript" src="main.js"></script>

        <div class="usu_sesion">
            <?php echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>