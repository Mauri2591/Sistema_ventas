<?php
require_once("../config/Conexion.php");
require_once("../models/Ventas.php");

$venta= new Ventas();
switch ($_GET['op']) {
    case 'nueva_venta':
        $venta->nueva_venta($_POST['precio_venta'],$_POST['client_id'],$_POST['id_prod'],
            $_POST['id_cobrador'],$_POST['id_vendedor']);
        break;
    
}