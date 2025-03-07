<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$room = "game";

$filename = "$room.json";

if ($_SERVER ['REQUEST_METHOD'] === 'GET'){
    // GET DATA
    echo getNumber();
}


if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
    // SAVE DATA
    $data = json_decode(file_get_contents("php://input"),true);

    if (isset($data["number"])) {
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
        echo "Number Saved";
    } else {
        echo "No number provided";
    }
}


function getNumber() {
    global $filename;
    
    if (!file_exists($filename)) {
        return "0";
    }

    $data = json_decode(file_get_contents($filename), true);


    return isset($data["number"]) ? $data["number"] : "0";
}
?>