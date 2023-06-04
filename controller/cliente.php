<?php
require_once("../config/Conexion.php");
require_once("../models/Cliente.php");

$cliente = new Cliente();

switch ($_GET['op_cli']) {
    case 'insert_cliente':
        if (isset($_POST)) {
            if (empty($_POST['client_nom']) || empty($_POST['client_dire']) || empty($_POST['client_cel'])) {
                echo json_encode(1);
                exit;
            } else {
                $cliente->insert_cliente(
                    $_POST['client_nom'],
                    $_POST['client_ape'],
                    $_POST['client_dni'],
                    $_POST['client_cuil'],
                    $_POST['client_localidad'],
                    $_POST['client_dire'],
                    $_POST['client_tel'],
                    $_POST['client_cel'],
                    $_POST['client_email'],
                    $_POST['client_otros_datos']
                );
                echo json_encode(2);
            }
        }
        break;
    case 'get_clientes':
        $datos = $cliente->get_clientes();
        $data = array();
        foreach ($datos as $row) {
            $sub_array[] = $row['client_nom'];
            $sub_array[] = $row['client_ape'];
            $sub_array[] = $row['client_dni'];
            $sub_array[] = $row['client_cuil'];
            $sub_array[] = $row['client_localidad'];
            $sub_array[] = $row['client_dire'];
            $sub_array[] = $row['client_tel'];
            $sub_array[] = $row['client_cel'];
            $sub_array[] = $row['client_email'];
            $sub_array[] = $row['client_otros_datos'];
            $data[] = $sub_array;
        }
        $resuls = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($resuls);
        break;

    case 'get_cliente':
        $datos = $cliente->get_cliente($_POST['client_id']);
        foreach ($datos as $row) {
            $output['client_nom'] = $row['client_nom'];
            $output['client_ape'] = $row['client_ape'];
            $output['client_dire'] = $row['client_dire'];
            $output['client_cel'] = $row['client_cel'];
            echo json_encode($output);
        }
        break;
}
