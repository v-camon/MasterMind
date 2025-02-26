<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$room = "game";

$filename = "$room.json";

if ($_SERVER ['REQUEST_METHOD'] === 'GET'){
    // GET DATA
    if (file_exists($filename)) {
        echo file_get_contents($filename);
    } else {
        echo json_encode(["error" => "No hay partidas"]);
    }
}

if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
    // SAVE DATA
    $data = json_decode(file_get_contents("php://input"),true);
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    echo json_encode(["message" => "Number Saved"]);
}
?>