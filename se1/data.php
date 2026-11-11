<?php

// Convert a book title into a consistent format
function normalize_title($title)
{
    $title = trim($title);
    $title = preg_replace('/\s+/', ' ', $title);
    return strtolower($title);
}

// Book data stored directly in PHP
function get_rating($title)
{
    $books = [
        "little women" => 4.5,
        "the great gatsby" => 4.2,
        "the hunger games" => 4.7,
        "pride and prejudice" => 4.8,
        "the hobbit" => 4.6
    ];

    $title = normalize_title($title);

    if (isset($books[$title])) {
        return $books[$title];
    }

    return null;
}

?>