<?php
class Cliente extends Conexion
{
    public function insert_cliente(
        $client_nom,
        $client_ape,
        $client_dni,
        $client_cuil,
        $client_localidad,
        $client_dire,
        $client_tel,
        $client_cel,
        $client_email,
        $client_otros_datos) {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "INSERT INTO tm_clientes(client_id, client_nom, client_ape, client_dni, client_cuil, client_localidad, 
                client_dire, client_tel, client_cel, client_email, client_otros_datos, est) VALUES
                (null,?,?,?,?,?,?,?,?,?,?, est=1)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $client_nom, PDO::PARAM_STR);
        $stmt->bindValue(2, $client_ape, PDO::PARAM_STR);
        $stmt->bindValue(3, $client_dni, PDO::PARAM_STR);
        $stmt->bindValue(4, $client_cuil, PDO::PARAM_STR);
        $stmt->bindValue(5, $client_localidad, PDO::PARAM_STR);
        $stmt->bindValue(6, $client_dire, PDO::PARAM_STR);
        $stmt->bindValue(7, $client_tel, PDO::PARAM_STR);
        $stmt->bindValue(8, $client_cel, PDO::PARAM_STR);
        $stmt->bindValue(9, $client_email, PDO::PARAM_STR);
        $stmt->bindValue(10, $client_otros_datos, PDO::PARAM_STR);
        $stmt->execute();
        $resul = $stmt->fetch();
        return $resul;
    }
}
