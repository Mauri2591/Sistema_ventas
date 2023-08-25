<?php

class Ventas extends Conexion
{

    public function select_articulos(){
        $conn=parent::conexion();
        parent::setNames();
        $sql="SELECT * FROM td_venta";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();   
    }

    public function nueva_venta($precio_venta, $client_id){
        $conn = parent::conexion();
        parent::setNames();
        $sql = "INSERT INTO tm_venta (id_venta, precio_venta, client_id,fecha_venta) VALUES (NULL, ?,?, now())";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $precio_venta, PDO::PARAM_STR);
        $stmt->bindValue(2, $client_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    // $sql = "INSERT INTO tm_venta (id_venta, precio_venta, client_id, id_prod, id_cobrador, 
    // id_vendedor, fecha_venta) VALUES (NULL, ?,?,?,?,?, now())";
}
