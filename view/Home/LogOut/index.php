<?php
require_once("../../../config/Conexion.php");
session_destroy();
header("Location:".Conexion::ruta()."index.php");