<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json: charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $request_data = json_decode(file_get_contents("php://input"));

    // ------------------------
    // filter and validate user inputs

    // ------------------------

    $sql_query =
        "DELETE FROM
            students_info
         WHERE
            student_name = $request_data->student_id;";


    $delete_query = $connection->prepare($sql_query);

    $success = $delete_query->execute();

    echo json_encode([
        "success" => $success
    ]);
} else {

    echo json_encode([
        "message" => "DELETE Request only"
    ]);
}