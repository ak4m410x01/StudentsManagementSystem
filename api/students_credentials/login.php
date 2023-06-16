<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json: charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// connect with db
require_once("../connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // json input
    $request_data = json_decode(file_get_contents("php://input"));

    // ------------
    // filter username or password here...!!
    $username = $request_data->username;
    $password = $request_data->password;

    // ------------

    // check if user valid or not
    $sql_query =
        "SELECT *
            from
                students_credentials
            WHERE
                student_username = '$username'
                AND student_password = '$password';";


    $login_query = $connection->prepare($sql_query);

    $login_query->execute();

    $login_response = $login_query->fetchAll(PDO::FETCH_ASSOC);

    $valid = (count($login_response) != 0);


    echo json_encode(
        [
            "valid" => $valid
        ]
    );
} else {

    echo json_encode(
        [
            "message" => "GET Request only"
        ]
    );
}