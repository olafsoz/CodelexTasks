<?php

class Application
{
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies()
    {
        //todo
    }

    private function rent_video()
    {
        //todo
    }

    private function return_video()
    {
        //todo
    }

    private function list_inventory()
    {
        //todo
    }
}

class VideoStore extends Video
{
    private array $inventory;

    public function __construct($title, $checkedOut, $avgRating, $inventory)
    {
        parent::__construct($title, $checkedOut, $avgRating);
        $this->inventory = $inventory;
    }
    public function addTitleToInventory()
    {

    }
}

class Video
{
    private string $title;
    private bool $checkedOut;
    private int $avgRating;

    public function __construct($title, $checkedOut, $avgRating)
    {
        $this->title = $title;
        $this->checkedOut = $checkedOut;
        $this->avgRating = $avgRating;
    }

    public function checkOut()
    {

    }

    public function returnVideo()
    {

    }

    public function rateVideo()
    {

    }
}

$app = new Application();
$app->run();

