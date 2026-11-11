<?php

function normalize_title($title)
{
    $title = trim($title);
    $title = preg_replace('/\s+/', ' ', $title);
    return strtolower($title);
}

function get_book($title)
{
    // Location of JSON file
    $jsonFile = "data.json";

    // Read the JSON file
    $json = file_get_contents($jsonFile);

    if ($json === false) {
        die("Could not read " . $jsonFile);
    }

    // Convert JSON into a PHP array
    $data = json_decode($json, true);

    if ($data === null || !isset($data["books"])) {
        die("Invalid JSON file.");
    }

    // Normalize the requested title
    $title = normalize_title($title);

    // Search through the books
    foreach ($data["books"] as $book) {

        if (normalize_title($book["title"]) === $title) {
            return $book;
        }

    }

    return null;
}

?>