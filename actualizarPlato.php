<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'baseDatos.php';
include_once 'restaurante.php';

$database = new BaseDatos();
$db = $database->obtenerConexion();
$item = new Restaurante($db);

$item->idPlato = isset($_GET['idPlato']) ? $_GET['idPlato'] : die();
$item->nombrePlato = $_GET['nombrePlato'];
$item->descripcion = $_GET['descripcion'];
$item->precio = $_GET['precio'];
$item->imagen = $_GET['imagen'];
if ($item->actualizarPlatos()) {
    echo json_encode("Plato actualizado con éxito.");
} else {
    echo json_encode("El registro no pudo ser actualizado");
}
