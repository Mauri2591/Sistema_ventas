<?php
require_once("../../config/Conexion.php");
require_once("../Head/index.php");
require_once("../Public/Plugins/Css.php");
if (isset($_SESSION['usu_id'])) {
?>
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="../Public/css/style.css">
    </head>

    <body>
        <div class="container mb-2">
            <ul class="navegacion">
                <?php if ($_SESSION['usu_rol'] == 2) :  ?>
                    <li class="li_nav">
                        <a class="a_nav" href="MantenimientoUsuario/">Mantenimiento Usuario</a>
                    </li>
                <?php endif; ?>
                <li class="li_nav">
                    <a class="a_nav" href="../Home/MantenimientoVentas/">Ventas</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="NuevoArticulo/">Alta de Articulo</a>
                </li>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Perfiles
                    </button>
                    <div class="dropdown-menu">
                        <li class="li_nav">
                            <a class="a_nav" href="../Home/MantenimientoUsuario/consultarUsuario.php">Usuarios</a>
                        </li>
                        <li class="li_nav">
                            <a class="a_nav" href="../Home/MantenimientoCliente/consultarCliente.php">Clientes</a>
                        </li>
                        <li class="li_nav">
                            <a class="a_nav" href="../Home/MantenimientoCobrador/consultarCobrador.php">Cobrador</a>
                        </li>
                        <li class="li_nav">
                            <a class="a_nav" href="../Home/MantenimientoVendedor/consultarVendedor.php">Vendedor</a>
                        </li>
                    </div>

                </div>
                <li class="li_nav">
                    <a class="a_nav" href="LogOut/">Salir</a>
                </li>
        </div>

        </ul>
        </div>
        <h1 class="text-center bg-light">Panel de Gestión</h1>
        <h3 class="text-center mt-4">Lista de Artículos</h3>
        <div class="container">
            <?php require_once("./NuevoArticulo/modalEditArt.php"); ?>

            <div class="container-fluid text-center d-flex justify-content-center mt-2 border p-5 border border-secondary">
                <table id="myTable" class="display border border-light">
                    <thead>
                        <tr>
                            <th class="tr_table">ID</th>
                            <th class="tr_table">Nombre</th>
                            <th class="tr_table">Marca</th>
                            <th class="tr_table">Descripción</th>
                            <th class="tr_table">Precio $</th>
                            <th class="tr_table">Foto</th>
                            <th class="tr_table">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="id_prod"></td>
                            <td id="nom_prod"></td>
                            <td id="marca_prod"></td>
                            <td id="descrip_prod"></td>
                            <td id="precio_prod"></td>
                            <td id="art_img"></td>
                            <td id="btnGroup"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script src="main.js"></script>


        <?php echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>