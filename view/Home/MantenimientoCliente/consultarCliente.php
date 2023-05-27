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
                    <a class="a_nav" href="./index.php">Alta de Cliente</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Inicio</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center">Consultar Cliente</h1>

        <!------------------------   Inicio Tabla         -------------------------------->
        <div class="container">
            <div class="text-center justify-content-center border border-secondary p-5 mt-5">
                <table id="tabla_clientes" class="display">
                    <thead>
                        <tr>
                            <th class="tr_table text-center" style="width: 1%;">ID</th>
                            <th class="tr_table text-center" style="width: 5%;">Nombre</th>
                            <th class="tr_table text-center" style="width: 3%;">Apellido</th>
                            <th class="tr_table text-center" style="width: 3%;">DNI</th>
                            <th class="tr_table text-center" style="width: 3%;">CUIL</th>
                            <th class="tr_table text-center" style="width: 3%;">Tel</th>
                            <th class="tr_table text-center" style="width: 3%;">Celular</th>
                            <th class="tr_table text-center" style="width: 3%;">Localidad</th>
                            <th class="tr_table text-center" style="width: 3%;">Dirección</th>
                            <th class="tr_table text-center" style="width: 5%;">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="client_id"></td>
                            <td id="client_nom"></td>
                            <td id="client_ape"></td>
                            <td id="client_dni"></td>
                            <td id="client_cuil"></td>
                            <td id="client_tel"></td>
                            <td id="client_cel"></td>
                            <td id="client_localidad"></td>
                            <th id="client_dire"></th>
                            <th id="client_email"></th>
                            <!-- <th>Acción</th> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!------------------------   Fin Tabla         -------------------------------->

        <?php require("./editarCliente.php") ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
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