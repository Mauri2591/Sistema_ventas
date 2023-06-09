<?php
require_once("../../../config/Conexion.php");
if (isset($_SESSION['usu_id'])) {
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once("../../Head/index.php");
    require_once("../../Public/Plugins/Css.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    </head>

    <body>
        <div class="container">
            <ul class="navegacion nuevoArt">
                <li class="li_nav">
                    <a class="a_nav" href="./index.php">Volver</a>
                </li>
                <li class="li_nav">
                    <a class="a_nav" href="../../Home/">Inicio</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center mt-4 font-weight-bold">Crear Venta</h1>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-10 p-5" id="cont_form_art_venta">
            <div class="justify-content-center mt-5 border bg-light p-5">
                <form class="form-inline pb-4" action="prueba.php" method="post">

                    <div class="container d-flex mb-3">
                        <label for="client_id" class="">Ingrese Código de cliente:</label>
                        <input type="number" style="font-size: 15px;" onblur="valIdClient(this.value)" id="client_id" name="client_id" autocomplete="off" class="form-control mb-2 ml-3 col-2" autofocus>
                    </div>
                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_nom" id="client_nom">
                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_cel" id="client_dire">
                    <input type="text" style="font-size: 15px; font-weight:bold" class="form-control mb-2 col-4" disabled name="client_localidad" id="client_cel">
                    <div class="container d-flex mb-3 mt-5">
                        <label for="client_id" class="">Ingrese Código de artículo:</label>
                        <input type="number" style="font-size: 15px;" min=0 id="id_prod" name="id_prod" onchange="valor_id_art(this.value)" class="form-control mb-2 mr-sm-2 col-1" autofocus>
                        <label for="client_id" class="">Cantidad:</label>
                        <input type="number" style="font-size: 15px;" id="client_id" min="1" value="1" onchange="cantArt(this.value)" name="cant_prod" class="form-control mb-2 mr-sm-2 col-1" autofocus>

                        <label for="id_vendedor">Vendedor:</label>
                        <div class="ml-1 form-group">
                            <select class="form-control" name="id_vendedor" id="id_vendedor">

                            </select>
                        </div>

                        <label for="id_cobrador" class="ml-2">Cobrador:</label>
                        <div class="ml-1 form-group">
                            <select class="form-control ml-1" name="id_cobrador" id="id_cobrador">

                            </select>
                        </div>

                        <button type="button" onclick="insertar_filas()" class="insertar_filas" id="insertar_filas"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg></button>
                    </div>
                    <div id="container_fila_ventas">
                        <input style="font-size: 15px; font-weight:bold" type="text" class="form-control mb-2  col-4" disabled name="nom_prod" id="nom_prod">
                        <input style="font-size: 15px; font-weight:bold" type="text" class="form-control mb-2 col-1" disabled name="precio_prod" id="precio_prod">
                        <input style="font-size: 15px; font-weight:bold" type="text" class="form-control mb-2 col-2" disabled name="precio_prod" id="precio_total">
                        <input style="font-size: 15px; font-weight:bold" type="text" class="form-control mb-2 col-2" disabled name="total_prod" id="id_vendedor_valor">
                        <input style="font-size: 15px; font-weight:bold" type="text" class="form-control mb-2 col-2" disabled name="total_prod" id="id_cobrador_valor">
                        <button type="button" class="btn_quitar_venta" id="btn_quitar_venta"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7h16" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                            </svg></button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Generar Venta</button>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="main.js"></script>

        <?php echo "Usuario " . $_SESSION['nombre_rol'] . ": " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>