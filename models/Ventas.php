<?php

class Ventas extends Conexion
{

    public function nueva_venta($precio_venta, $client_id, $id_prod, $id_cobrador, $id_vendedor){
        $conn = parent::conexion();
        parent::setNames();
        $sql = "INSERT INTO td_venta (id_venta, precio_venta, client_id, id_prod, id_cobrador, 
        id_vendedor, fecha_venta) VALUES (NULL, ?,?,?,?,?, now())";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $precio_venta, PDO::PARAM_STR);
        $stmt->bindValue(2, $client_id, PDO::PARAM_INT);
        $stmt->bindValue(3, $id_prod, PDO::PARAM_INT);
        $stmt->bindValue(4, $id_cobrador, PDO::PARAM_INT);
        $stmt->bindValue(5, $id_vendedor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
