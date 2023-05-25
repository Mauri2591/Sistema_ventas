<?php
require_once("../config/Conexion.php");
require_once("../models/Usuario.php");

$usu = new Usuario();
switch ($_GET['op']) {
    case 'logeo_usuario':
        $datos = $usu->logeo_usuario();
        $data = array();
        foreach ($datos as $row) {
            $sub_array[] = array();
            $sub_array[] = $row['usu_id'];
            $sub_array[] = $row['usu_nom'];
            $sub_array[] = $row['usu_ape'];
            $sub_array[] = $row['usu_email'];
            $sub_array[] = $row['usu_pass'];
            $data[] = $sub_array;
        }
        $resul = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($resul);
        break;

    case 'selec_rol_usu':
        $datos = $usu->selec_rol_usu();
        if (is_array($datos) && count($datos) > 0) {
            foreach ($datos as $row) {
                $html = $html . '<option value=' . $row['usu_rol'] . '>' . $row['nombre_rol'] . '</option>';
            }
            echo $html;
        }
        break;

    case 'insert_usuario':
        $usu->insert_usuario($_POST['usu_rol'], $_POST['usu_email'], $_POST['usu_pass']);
        break;

    case 'get_usuarios':
        $datos = $usu->get_usuarios();
        if (is_array($datos) && count($datos) > 0) {
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row['usu_id'];
                $sub_array[] = $row['usu_email'];
                $sub_array[] = $row['usu_pass'];
                $sub_array[] = $row['nombre_rol'];
                $sub_array[] = '<div class="btn-group btn-group-sm" role="group"><button type="button" onClick="verUsu(' . $row['usu_id'] . ')" class="btn btn-warning">Editar</button><button type="button" onClick="delUsu(' . $row['usu_id'] . ')" class="btn btn-danger">Eliminar</button></div>';
                $data[] = $sub_array;
            }
            $resul = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($resul);
        }
        break;

    case 'get_usuario':
        $datos = $usu->get_usuario($_POST['usu_id']);
        if (is_array($datos) && count($datos) > 0) {
            foreach ($datos as $row) {
                $output['usu_id'] = $row['usu_id'];
                $output['usu_email'] = $row['usu_email'];
                $output['usu_pass'] = $row['usu_pass'];
            }
            echo json_encode($output);
        }
        break;

    case 'update_usuario':
        $usu->update_usuario($_POST['usu_id'], $_POST['usu_email'], $_POST['usu_pass']);
        break;

    case 'delete_usuario':
        $usu->delete_usuario($_POST['usu_id']);
        break;
}
