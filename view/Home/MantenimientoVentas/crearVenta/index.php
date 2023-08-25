<?php
require_once("../../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {
    require_once("../../../Head/index.php");
    require_once("../../../Public/Plugins/Css.php");
?>

    <link rel="stylesheet" href="../../../../assets/Datatables/css/datatables.min.css">
    <link rel="stylesheet" href="../../../../assets/Datatables/css/datatables-net.min.css">
    <link rel="stylesheet" href="../../../../assets/Datatables/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../assets/Datatables/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../assets/Datatables/css/main.css">
    <link rel="stylesheet" href="../../../../assets/Datatables/css/style.css">

    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion">
                <li class="li_nav">
                    <a class="a_nav" href="../index.php">Volver</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../../LogOut/">Salir</a>
                </li>
            </ul>
        </div>

        <header class="section-header mt-3">
            <div class="tbl">
                <div class="tbl-row">
                    <h1 class="text-center">Crear Venta</h1>
                    <div class="subtitle text-center">Desde aquí podrás crear nuevas ventas</div>
                </div>
            </div>
        </header>

        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="exampleInput">First Name</label>
                            <input type="text" class="form-control" id="exampleInput" placeholder="First Name">
                            <small class="text-muted">We'll never share your email with anyone else.</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="mail@mail.com">
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <section class="card justified-content-center">
            <table id="table_crear_venta">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>$ Unit</th>
                        <th>$ Acum</th>
                        <th>Cobrador</th>
                        <th>Vendedor</th>
                    </tr>
                </thead>
            </table>
        </section>
        </div>

        <script src="../../../../assets/Datatables/js/jquery_sinComprimir.js"></script>
        <script src="../../../../assets/Datatables/js/jquery/jquery.min.js"></script>
        <script src="../../../../assets/Datatables/js/tether/tether.min.js"></script>
        <script src="../../../../assets/Datatables/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../../assets/Datatables/js/plugins.js"></script>
        <script src="../../../../assets/Datatables/js/datatables.min.js"></script>
        <script src="../../../../assets/Datatables/js/app.js"></script>

        <script type="text/javascript" src="main.js"></script>
        <script>
            $(function() {
                $('#example').DataTable();
            });
        </script>
    <?php
} else {
    header('Location: ' . Conexion::ruta() . "index.php");
}
    ?>
    </body>