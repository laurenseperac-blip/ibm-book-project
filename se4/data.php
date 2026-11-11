<?php

function normalize_title($title)
{
    $title = trim($title);
    $title = preg_replace('/\s+/', ' ', $title);
    return strtolower($title);
}

function check_rating($title, $rating)
{
    // Read JSON file
    $jsonFile = "data.json";

    $json = file_get_contents($jsonFile);

    if ($json === false) {
        die("Could not read " . $jsonFile);
    }

    // Decode JSON
    $data = json_decode($json, true);

    if ($data === null || !isset($data["books"])) {
        die("Invalid JSON file.");
    }

    // Normalize title
    $title = normalize_title($title);

    // Search for the requested book
    foreach ($data["books"] as $book) {

        if (normalize_title($book["title"]) === $title) {

            // Compare the submitted rating
            if (abs((float)$book["rating"] - (float)$rating) < 0.0001) {
                return true;
            }

            return false;
        }
    }

    // Book was not found
    return null;
}

?>