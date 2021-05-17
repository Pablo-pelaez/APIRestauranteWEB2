<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once 'baseDatos.php';
include_once 'restaurante.php';
$baseDatos = new BaseDatos();

$db = $baseDatos->obtenerConexion();
$items = new Restaurante($db);
$records = $items->obtenerPlatos();
$itemCount = $records->num_rows;
if ($itemCount > 0) {
    $arrayPlatos = array();
    $arrayPlatos["body"] = array();
    while ($row = $records->fetch_assoc()) {
        array_push($arrayPlatos["body"], $row);
    }
    echo json_encode($arrayPlatos);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Ningun registro encontrado.")
    );
}


?>