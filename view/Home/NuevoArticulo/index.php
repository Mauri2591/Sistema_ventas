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
                    <a class="a_nav" href="../index.php">Volver</a>
                </li>
                <!-- <li class="li_nav">
                    <a class="a_nav" href="../LogOut/">Salir</a>
                </li> -->
            </ul>
        </div>
        <h1 class="text-center">Crear Artículo</h1>

        <!------------------------   Inicio Formulario         -------------------------------->
        <div class="container col-6">
            <div class="container-fluid justify-content-center mt-5 border border border-secondary p-5">

                <form class="form-inline" action="" method="post" id="form_articulos" enctype="multipart/form-data">
                    <div class="container mb-3 mt-2 col-12">
                        <input type="text" class="form-control col-4" placeholder="Nombre Producto" id="nom_prod" name="nom_prod">
                        <input type="text" class="form-control col-4" placeholder="Marca Producto" id="marca_prod" name="marca_prod">
                        <input type="text" class="form-control col-4" placeholder="Precio Producto" id="precio_prod" name="precio_prod">
                        <input type="file" width="25" class="mt-3" height="25" name="art_img" id="art_img" accept="image/jpej, image/png">
                    </div>
                    <div class="container mt-2">
                        <textarea id="descrip_prod" name="descrip_prod"></textarea>
                    </div>
                    <div class="container mt-1">
                        <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION['usu_id'] ?>">
                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
        <!------------------------   Fin Formulario         -------------------------------->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="nuevoArticulo.js"></script>

        <?php echo "Usuario: " . $_SESSION['usu_nom'] . " " . $_SESSION['usu_ape'] ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conexion::ruta() . "index.php");
}
?>