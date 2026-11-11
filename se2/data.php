<?php

function normalize_title($title)
{
    $title = trim($title);
    $title = preg_replace('/\s+/', ' ', $title);
    return strtolower($title);
}

function get_book($title)
{
    $books = [
        "stardust" => [
            "title" => "stardust",
            "rating" => 4.5
        ],

        "the great gatsby" => [
            "title" => "The Great Gatsby",
            "rating" => 4.2
        ],

        "the hunger games" => [
            "title" => "The Hunger Games",
            "rating" => 4.7
        ],

        "pride and prejudice" => [
            "title" => "Pride and Prejudice",
            "rating" => 4.8
        ],

        "the hobbit" => [
            "title" => "The Hobbit",
            "rating" => 4.6
        ]
    ];

    $title = normalize_title($title);

    if (isset($books[$title])) {
        return $books[$title];
    }

    return null;
}

?>