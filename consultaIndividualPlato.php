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
$item->obtenerPlatoIndividual();
if ($item->nombrePlato != null) {

    // create array
    $arrayPlatos = array(
        "idPlato" => $item->idPlato,
        "nombrePlato" => $item->nombrePlato,
        "descripcion" => $item->descripcion,
        "precio" => $item->precio,
        "imagen" => $item->imagen
    );

    http_response_code(200);
    echo json_encode($arrayPlatos);
} else {
    http_response_code(404);
    echo json_encode("El plato no fue encontrado");
}
?>