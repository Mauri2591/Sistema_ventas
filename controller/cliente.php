<?php
require_once("../config/Conexion.php");
require_once("../models/Cliente.php");
if (isset($_SESSION['usu_id'])) {
    $cliente = new Cliente();

    switch ($_GET['op_cli']) {
        case 'insert_cliente':
            $cliente->insert_cliente($_POST['client_nom'],$_POST['client_ape'],$_POST['client_dni'],
                        $_POST['client_cuil'],$_POST['client_localidad'],$_POST['client_dire'],
                        $_POST['client_tel'],$_POST['client_cel'],$_POST['client_email'],
                        $_POST['client_otros_datos']);
            break;
    }
}
