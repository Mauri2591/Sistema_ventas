<?php
session_start();

class Conexion{
    protected $conexion;

    protected function conexion(){
        try {
        $conn=$this->conexion=new PDO("mysql:host=localhost;dbname=sistema_ventas","root","");
        // echo "Conexion ok";
        return $conn;
        } catch (\Throwable $e) {
            echo "Error: ".$e->getMessage();
            die();
        }
    }

    public function setNames(){
        return $this->conexion->query("SET NAMES 'utf8'");
    }

    public static function ruta(){
        return "http://localhost:80/Sistema_ventas/";
    }
}

