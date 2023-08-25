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
                    <a class="a_nav" href="./consultarCliente.php">Volver</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li>
            </ul>
        </div>
        <section class="text-center">
            <h1>Crear Cliente</h1>
            <p>Los campos con (*) son obligatorios</p>
        </section>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-6">
            <div class="mt-5 border border-secondary p-5 bg-light">
                <form class="p-5" method="post" id="form_client">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nombre/s *</label>
                            <input type="text" class="form-control" autofocus placeholder="Ingrese Nombre" id="client_nom" name="client_nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Apellido/s</label>
                            <input type="text" class="form-control" placeholder="Ingrese Apellido" id="client_ape" name="client_ape">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Dni</label>
                            <input type="text" class="form-control" placeholder="Ingrese DNI" id="client_dni" name="client_dni">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Cuil / Cuit</label>
                            <input type="text" class="form-control" placeholder="Ingrese cuil o cuit" id="client_cuil" name="client_cuil">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Localidad</label>
                            <input type="text" class="form-control" placeholder="Ingrese Localidad" id="client_localidad" name="client_localidad">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Dirección *</label>
                            <input type="text" class="form-control" placeholder="Ingrese Dirección" id="client_dire" name="client_dire">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Teléfono</label>
                            <input type="text" class="form-control" placeholder="Ingrese Teléfono" id="client_tel" name="client_tel">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Celular *</label>
                            <input type="text" class="form-control" placeholder="Ingrese Celular" id="client_cel" name="client_cel">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Email</label>
                            <input type="email" class="form-control" placeholder="Ingrese email" id="client_email" name="client_email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Otros</label>
                            <input type="text" class="form-control" placeholder="Otros datos" id="client_otros_datos" name="client_otros_datos">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Guardar">
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