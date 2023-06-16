<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json: charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $request_data = json_decode(file_get_contents("php://input"));

    // ------------------------
    // filter and validate user inputs
    // days boolean value shoud be [0|1] not [false|true]
    $student_name = $request_data->student_name;
    $student_number = $request_data->student_number;
    $parent_number = $request_data->parent_number;
    $signin_date = $request_data->signin_date;
    $day1 = $request_data->day1;
    $day2 = $request_data->day2;
    $day3 = $request_data->day3;
    $day4 = $request_data->day4;
    $day5 = $request_data->day5;
    $day6 = $request_data->day6;
    $day7 = $request_data->day7;
    $level = $request_data->level;

    // ------------------------

    $sql_query =
        "INSERT INTO
        
            students_info (
                student_name,
                student_number,
                parent_number,
                signin_date,
                day1,
                day2,
                day3,
                day4,
                day5,
                day6,
                day7,
                level
            )
            
        VALUES
            (
                '$student_name',
                '$student_number',
                '$parent_number',
                '$signin_date',
                $day1,
                $day2,
                $day3,
                $day4,
                $day5,
                $day6,
                $day7,
                $level
            );";


    $add_query = $connection->prepare($sql_query);

    $success = $add_query->execute();

    echo json_encode([
        "success" => $success
    ]);
} else {

    echo json_encode([
        "message" => "POST Request only"
    ]);
}