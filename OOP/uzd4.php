<?php

class Movie {
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct($title, $studio, $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getPG(array $movies): array {
        $array = [];
        foreach ($movies as $movie) {
            foreach ($movie as $criteria) {
                if ($criteria == "PG 13") {
                    $array[] = $movie;
                }
            }
        }
        return $array;
    }

}

$m1 = new Movie("Casino Royale", "the studio “Eon Productions", "PG 13");
$m2 = new Movie("Glass", "Buena Vista International", "PG 13");
$m3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");
$mAll = [$m1, $m2, $m3];

print_r($m1->getPG($mAll));