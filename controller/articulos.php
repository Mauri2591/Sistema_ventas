<?php
require_once("../config/Conexion.php");

require_once("../models/Articulos.php");
$articulo = new Articulos();

switch ($_GET['op']) {
    case 'insert_articulo':
        $dir_img = "../view/Public/Imagenes";/*ruta de las imágenes*/
        if (isset($_FILES['art_img'])) {
            // var_dump($_FILES['art_img']);
            !is_dir($dir_img) ? mkdir($dir_img) : ''; /*if ternario, si no existe la ruta que la cree*/
            $datos = $articulo->insert_articulo($_POST['usu_id'], $_POST['nom_prod'], $_POST['marca_prod'], $_POST['descrip_prod'], $_FILES['art_img']);
        }
        break;

    case 'select_articulos':
        $dir_img = "../../view/Public/Imagenes/";
        $datos = $articulo->select_articulos();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['id_prod'];
            $sub_array[] = $row['nom_prod'];
            $sub_array[] = $row['marca_prod'];
            $sub_array[] = $row['descrip_prod'];
            $sub_array[] = '<img width="55" height="55" src="' . $dir_img . $row['art_img'] . '" alt="">';
            $sub_array[] = '<div class="btn-group"><button type="button" id="btnEdit" onClick="getProd('.$row['id_prod'].')" class="btn btn-warning">Editar</button><button type="button" id="btnElim" onClick="btnElim(' . $row['id_prod'] . ')" class="btn btn-danger">Eliminar</button></div>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'getProd':
        $datos= $articulo->getProd($_POST['id_prod']);
        foreach ($datos as $row) {
            $output['id_prod'] = $row['id_prod'];
            $output['nom_prod'] = $row['nom_prod'];
            $output['marca_prod'] = $row['marca_prod'];
            $output['descrip_prod'] = $row['descrip_prod'];
            $output['art_img'] = $row['art_img'];
        }
        echo json_encode($output);
        break;

    case 'delete_articulo':
        $datos = $articulo->delete_articulo($_POST['id_prod']);
        break;

    case 'get_articulo':
        if (isset($_POST)) {
            $datos = $articulo->update_articulo($_POST['id_prod'],$_POST['nom_prod'],$_POST['marca_prod'],$_POST['descrip_prod']);
        }
        break;

    case 'update_articulo':
            $articulo->update_articulo($_POST['id_prod'],$_POST['nom_prod'],$_POST['marca_prod'],$_POST['descrip_prod']);
}
