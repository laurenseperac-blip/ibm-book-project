<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

header("Content-Type: text/plain");

require "data.php";

if (!empty($_GET['title'])) {

    $title = $_GET['title'];

    $rating = get_rating($title);

    if ($rating !== null) {
        echo $rating;
    }
    else {
        echo "Book Not Found";
    }

}
else {
    echo "Please enter a book title.";
}

?>