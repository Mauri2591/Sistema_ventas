<?php

class Usuario extends Conexion
{

    public function logeo_usuario()
    {
        $conn = parent::conexion();
        parent::setNames();
        if (isset($_POST['enviar'])) {
            $email = $_POST['usu_email'];
            $pass = $_POST['usu_pass'];
            if (empty($email) || empty($pass)) {
                header("Location:" . Conexion::ruta() . "index.php?m=1");
                exit();
            } else {
                // $sql="SELECT * FROM tm_usuario WHERE usu_email=? AND usu_pass=? AND est=1";
                $sql = 'call log_usu(?,?)';
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, $email, PDO::PARAM_STR);
                $stmt->bindValue(2, $pass, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (is_array($result) && count($result) > 0) {
                    $_SESSION['usu_id'] = $result['usu_id'];
                    $_SESSION['usu_nom'] = $result['usu_nom'];
                    $_SESSION['usu_email'] = $result['usu_email'];
                    $_SESSION['usu_ape'] = $result['usu_ape'];
                    $_SESSION['usu_rol'] = $result['usu_rol'];
                    $_SESSION['nombre_rol'] = $result['nombre_rol'];
                    header("Location:" . Conexion::ruta() . "view/Home/MantenimientoVentas/");
                    return $result;
                    exit();
                } else {
                    header("Location:" . Conexion::ruta() . "index.php?m=2");
                    exit();
                }
            }
        }
    }
    public function selec_rol_usu()
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "SELECT * FROM tm_rol_usuario WHERE est=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resul = $stmt->fetchAll();
        return $resul;
    }

    public function insert_usuario($usu_rol, $usu_email, $usu_pass)
    {
        $conn = parent::conexion();
        parent::setNames();
        $pw_hash = password_hash($usu_pass, PASSWORD_DEFAULT, ['cost' => 10]);
        $sql = "call create_usu(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_rol, PDO::PARAM_INT);
        $stmt->bindValue(2, $usu_email, PDO::PARAM_STR);
        $stmt->bindValue(3, $pw_hash, PDO::PARAM_STR);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }
    public function get_usuarios()
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "SELECT usu_id, usu_email, usu_pass, tm_rol_usuario.nombre_rol FROM
                tm_usuario INNER JOIN tm_rol_usuario on tm_rol_usuario.usu_rol=tm_usuario.usu_rol 
                WHERE tm_usuario.est=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_usuario($usu_id)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "SELECT * FROM tm_usuario WHERE usu_id=? AND est=1";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_id, PDO::PARAM_INT);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_usuario($usu_id)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "DELETE FROM tm_usuario WHERE usu_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_id);
        $stmt->execute();
        $resul = $stmt->fetch();
    }
    public function update_usuario($usu_id, $usu_email, $usu_pass)
    {
        $conn = parent::conexion();
        parent::setNames();
        $usu_pass = password_hash($usu_pass, PASSWORD_DEFAULT, ['cost' => 10]);
        $sql = "UPDATE tm_usuario SET usu_email=?, usu_pass=? WHERE usu_id=? AND est=1";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_email);
        $stmt->bindValue(2, $usu_pass);
        $stmt->bindValue(3, $usu_id);
        $stmt->execute();
        echo json_encode($stmt);
    }

    public function insert_cobrador($nom_cobrador,$ape_cobrador,$cel_cobrador){
        $conn= parent::conexion();
        parent::setNames();
        $sql="INSERT INTO tm_cobrador (id_cobrador, nom_cobrador, ape_cobrador, cel_cobrador,est) VALUES (NULL, ?,?,?,1)";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$nom_cobrador,PDO::PARAM_STR);
        $stmt->bindValue(2,$ape_cobrador,PDO::PARAM_STR);
        $stmt->bindValue(3,$cel_cobrador,PDO::PARAM_STR);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }

    public function insert_vendedor($nom_vendedor,$ape_vendedor,$cel_vendedor){
        $conn= parent::conexion();
        parent::setNames();
        $sql= "INSERT INTO tm_vendedor(id_vendedor, nom_vendedor, ape_vendedor, cel_vendedor,est) VALUES (NULL,?,?,?,1)";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$nom_vendedor,PDO::PARAM_STR);
        $stmt->bindValue(2,$ape_vendedor,PDO::PARAM_STR);
        $stmt->bindValue(3,$cel_vendedor,PDO::PARAM_STR);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }

    public function get_vendedores(){
        $conn= parent::conexion();
        parent::setNames();
        $sql= "SELECT * FROM tm_vendedor WHERE est=1";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cobradores(){
        $conn= parent::conexion();
        parent::setNames();
        $sql="SELECT * FROM tm_cobrador WHERE est=1 ORDER BY id_cobrador desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selec_vendedor($id_vendedor){
        $conn= parent::conexion();
        parent::setNames();
        $sql= "SELECT id_vendedor, nom_vendedor FROM tm_vendedor WHERE id_vendedor=? AND est=1";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$id_vendedor,PDO::PARAM_INT);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }

    public function select_cobrador($id_cobrador){
        $conn=parent::conexion();
        parent::setNames();
        $sql= "SELECT id_cobrador, nom_cobrador FROM tm_cobrador WHERE id_cobrador=? AND est=1";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(1,$id_cobrador,PDO::PARAM_INT);
        $stmt->execute();
        return $result= $stmt->fetch();
    }
}
