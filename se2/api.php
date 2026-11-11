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

if (isset($_GET['title']) && trim($_GET['title']) !== "") {

    $title = $_GET['title'];

    $book = get_book($title);

    if ($book !== null) {

        response(200, "Book Found", $book);

    }
    else {

        response(404, "Book Not Found", null);

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