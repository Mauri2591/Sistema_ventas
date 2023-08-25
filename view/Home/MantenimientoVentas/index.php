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
                    <a class="a_nav" href="./crearVenta/index.php">Nueva Venta</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Gestión</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center mt-4">Lista de Ventas realizadas</h1>

        <!------------------------   Inicio Tabla         -------------------------------->
        <section class="card">
            <div class="card-block">
                <table id="tabla_cliente" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>CUIL</th>
                            <th>Localidad</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="client_nom"></td>
                            <td id="client_ape"></td>
                            <td id="client_dni"></td>
                            <th id="client_cuil"></th>
                            <td id="client_localidad"></td>
                            <td id="client_dire"></td>
                            <td id="client_tel"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!------------------------   Fin Tabla         -------------------------------->


        <script src="../../plantilla/js/lib/jquery/jquery.min.js"></script>
        <script src="../../plantilla/js/lib/tether/tether.min.js"></script>
        <script src="../../plantilla/js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="../../plantilla/js/plugins.js"></script>

        <script src="../../plantilla/js/lib/datatables-net/datatables.min.js"></script>
        <script>
            $(function() {
                $('#tabla_cliente').DataTable();
            });
        </script>

        <script src="js/app.js"></script></script>

        <script type="text/javascript" src="getClientes.js"></script>

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