<?php

if (isset($_POST)) {
    $precio_venta= $_POST['precio_venta'];
    $client_id= $_POST['client_id'];
    $id_prod= $_POST['id_prod'];
    $id_vendedor= $_POST['id_vendedor'];
    $id_cobrador= $_POST['id_cobrador'];

    var_dump($precio_venta);
}