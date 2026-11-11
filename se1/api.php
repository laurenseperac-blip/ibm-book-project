<?php

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