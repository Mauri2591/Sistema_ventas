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
            <ul class="navegacion">
                <li class="li_nav">
                    <a class="a_nav" href="../MantenimientoUsuario/index.php">Alta de Usuario</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Inicio</a>
                </li>
                <!-- <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li> -->
            </ul>
        </div>
        <h1 class="text-center">Consultar Usuario</h1>

        <!------------------------   Inicio Tabla         -------------------------------->
        <div class="container">
            <div class="text-center justify-content-center border border-secondary p-5 mt-5">
                <table id="tabla_usuarios" class="display">
                    <thead>
                        <tr>
                            <th class="tr_table text-center" style="width: 1%;">ID</th>
                            <th class="tr_table text-center" style="width: 10%;">Email</th>
                            <th class="tr_table text-center" style="width: 10%;">Password</th>
                            <th class="tr_table text-center" style="width: 5%;">Rol</th>
                            <th class="tr_table text-center" style="width: 5%;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="usu_id"></td>
                            <td id="usu_email"></td>
                            <td id="usu_pass"></td>
                            <th id="usu_rol"></th>
                            <th>Acción</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!------------------------   Fin Tabla         -------------------------------->

        <?php require("./editarUsuario.php") ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="consultarUsuario.js"></script>

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