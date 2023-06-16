<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json: charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $request_data = json_decode(file_get_contents("php://input"));

    // ------------------------
    // filter and validate user inputs
    $level = $request_data->level;


    // ------------------------

    $sql_query = "SELECT * FROM students_info WHERE level = $level";


    $fetch_query = $connection->prepare($sql_query);

    $success = $fetch_query->execute();

    $response_data = $fetch_query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($response_data);
} else {

    echo json_encode([
        "message" => "GET Request only"
    ]);
}