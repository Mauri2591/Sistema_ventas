<?php
require_once("../config/Conexion.php");
require_once("../models/Ventas.php");

$venta= new Ventas();
switch ($_GET['op']) {
    case 'nueva_venta':
        $venta->nueva_venta($_POST['precio_venta'],$_POST['client_id']);
        break;
        
    case 'select_articulos':
        $venta->select_articulos();
        break;
}