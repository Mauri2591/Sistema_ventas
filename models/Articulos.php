<?php

class Articulos extends Conexion
{

    public function insert_articulo($usu_id, $nom_prod, $marca_prod, $descrip_prod, $precio_prod, $art_img)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "INSERT INTO tm_producto (usu_id,nom_prod,marca_prod,descrip_prod,precio_prod,art_img) VALUES (?,?,?,?,?,?)";
        $dir_img = "../view/Public/Imagenes";/*ruta de las imágenes*/
        $art_img = md5(uniqid(rand(), true)) . ".jpg";
        move_uploaded_file($_FILES['art_img']['tmp_name'], $dir_img . "/" . $art_img); /*Inserto la imagen en la carpeta*/
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $usu_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $nom_prod, PDO::PARAM_STR);
        $stmt->bindValue(3, $marca_prod, PDO::PARAM_STR);
        $stmt->bindValue(4, $descrip_prod, PDO::PARAM_STR);
        $stmt->bindValue(5, $precio_prod);
        $stmt->bindValue(6, $art_img);
        $stmt->execute();
        return $resul = $stmt->fetch();
    }

    public function select_articulos()
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'SELECT * FROM tm_producto';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProd($id_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = "SELECT * FROM tm_producto WHERE id_prod=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_prod, PDO::PARAM_INT);
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resul;
    }

    public function delete_articulo($id_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'DELETE FROM tm_producto WHERE id_prod=?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_prod, PDO::PARAM_INT);
        $stmt->execute();
        $resul = $stmt->fetch();
        return $resul;
    }
    public function get_articulo($id_prod, $nom_prod, $descrip_prod, $precio_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'UPDATE tm_producto SET nom_prod, marca_prod,descrip_prod,precio_prod WHERE id_prod = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_prod, PDO::PARAM_INT);
        $stmt->bindValue(2, $nom_prod, PDO::PARAM_STR);
        $stmt->bindValue(3, $descrip_prod, PDO::PARAM_STR);
        $stmt->bindValue(4, $precio_prod);
        $stmt->execute();
        $resul = $stmt->fetch();
        return $resul;
    }
    public function update_articulo($id_prod, $nom_prod, $marca_prod, $descrip_prod, $precio_prod)
    {
        $conn = parent::conexion();
        parent::setNames();
        $sql = 'UPDATE tm_producto SET nom_prod=?,marca_prod=?,descrip_prod=?,precio_prod=? WHERE id_prod = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $nom_prod, PDO::PARAM_STR);
        $stmt->bindValue(2, $marca_prod, PDO::PARAM_STR);
        $stmt->bindValue(3, $descrip_prod, PDO::PARAM_STR);
        $stmt->bindValue(4, $precio_prod, PDO::PARAM_INT);
        $stmt->bindValue(5, $id_prod);
        $stmt->execute();
        $resul = $stmt->fetch();
        echo json_encode($resul);
    }
}
