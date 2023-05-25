<?php
require_once("config/Conexion.php");
if (isset($_POST['enviar']) and $_POST['enviar'] == 'si') {
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->logeo_usuario();
}
require_once("view/Head/index.php");
require_once("view/Public/Plugins/Css.php");

?>
<title>Inicio de sesion Sistema de ventass</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid text-center">
            <h1>Inicio del Sistema</h1>
            <h4 id="subtitulo"></h4>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid text-center d-flex justify-content-center mt-5">

            <form action="" method="post" id="form_login" class="form_login">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="usu_email" id="usu_email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="usu_pass" id="usu_pass">
                </div>
                <input type="hidden" name="enviar" value="si">
                <button type="submit" class="btn btn-primary" id="btnDescargar">Ingresar</button>
                <br>

                <?php if (isset($_GET['m'])) {
                    switch ($_GET['m']) {
                        case '1':
                ?>
                            <div class="container mt-2">
                                <div class="alert alert-warning fade in alert-dismissible show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                    </button>Datos Vacíos!
                                </div>
                            </div>
                        <?php
                            break;
                        case '2':
                        ?>
                            <div class="container mt-2">
                                <div class="alert alert-warning fade in alert-dismissible show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                    </button>Datos inválidos!
                                </div>
                            </div>
                <?php
                            break;
                    }
                } ?>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</body>

</html>