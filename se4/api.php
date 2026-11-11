<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

header("Content-Type: application/json");

require "data.php";

if (
    isset($_GET['title']) &&
    trim($_GET['title']) !== "" &&
    isset($_GET['rating']) &&
    is_numeric($_GET['rating'])
) {

    $title = $_GET['title'];
    $rating = $_GET['rating'];

    $result = check_rating($title, $rating);

    if ($result === null) {

        response(404, "Book Not Found", null);

    }
    else if ($result === true) {

        response(200, "Rating Correct", true);

    }
    else {

        response(200, "Rating Incorrect", false);

    }

}
else {

    response(400, "Invalid Request", null);

}

function response($status, $status_message, $data)
{
    http_response_code($status);

    $response = [
        "status" => $status,
        "status_message" => $status_message,
        "data" => $data
    ];

    echo json_encode($response);
}

?>