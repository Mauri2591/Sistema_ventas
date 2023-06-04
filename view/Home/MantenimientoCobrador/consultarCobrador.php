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
    <!-- <link rel="stylesheet" href="../../plantilla/css/main.css"> -->
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion">
                <li class="li_nav">
                    <a class="a_nav" href="./index.php">Alta Cobrador</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Inicio</a>
                </li>
                <!-- <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li> -->
            </ul>
        </div>
        <h1 class="text-center">Lista de Cobradores</h1>

        <!------------------------   Inicio Tabla         -------------------------------->
        <section class="card">
            <div class="card-block">
                <table id="tabla_cobrador" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="id_cobrador"></td>
                            <td id="nom_cobrador"></td>
                            <td id="ape_cobrador"></td>
                            <th id="cel_cobrador"></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!------------------------   Fin Tabla         -------------------------------->

        <?php require("editarCobrador.php") ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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