<?php

class Articulos extends Conexion
{

    public function insert_articulo($usu_id, $nom_prod, $marca_prod, $descrip_prod, $art_img)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "call in_prod(?,?,?,?,?)";
        $dir_img = "../view/Public/Imagenes";/*ruta de las imágenes*/
        $art_img = md5(uniqid(rand(), true)) . ".jpg";
        move_uploaded_file($_FILES['art_img']['tmp_name'], $dir_img . "/" . $art_img); /*Inserto la imagen en la carpeta*/
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $nom_prod, PDO::PARAM_STR);
        $stmt->bindValue(3, $marca_prod, PDO::PARAM_STR);
        $stmt->bindValue(4, $descrip_prod, PDO::PARAM_STR);
        $stmt->bindValue(5, $art_img);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }

    public function select_articulos()
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'call sel_prod()';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProd($id_prod){
        $conn= parent::conexion();
        parent::setNames();
        $sql= "SELECT * FROM tm_producto WHERE id_prod=?";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$id_prod,PDO::PARAM_INT);
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resul;
    }

    public function delete_articulo($id_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'call del_prod(?)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_prod, PDO::PARAM_INT);
        $stmt->execute();
        $resul = $stmt->fetch();
        return $resul;
    }
    public function get_articulo($id_prod,$nom_prod,$descrip_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'UPDATE tm_producto SET nom_prod, marca_prod,descrip_prod WHERE id_prod = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_prod, PDO::PARAM_INT);
        $stmt->bindValue(2, $nom_prod, PDO::PARAM_STR);
        $stmt->bindValue(3, $descrip_prod, PDO::PARAM_STR);
        $stmt->execute();
        $resul = $stmt->fetch();
        return $resul;
    }
    public function update_articulo($id_prod,$nom_prod,$descrip_prod){
        $conn= parent::conexion();
        parent::setNames();
        $sql='UPDATE tm_producto SET nom_prod=?,marca_prod=?,descrip_prod=?';
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$id_prod,PDO::PARAM_INT);
        $stmt->bindValue(2,$nom_prod,PDO::PARAM_STR);
        $stmt->bindValue(3,$descrip_prod,PDO::PARAM_STR);
        $stmt->execute();
        $resul = $stmt->fetch();
        echo json_encode($resul);
    }
}