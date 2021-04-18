<?php

include_once 'Handler.php';

class AccountHandler extends Handler
{

    public function __construct() {
        parent::__construct();
    }

    public function get_email(string $username) : string
    {
        foreach ($this->accounts as $acc) {
            if ($acc["username"] == $username) {
                return $acc["email"];
            }
        }

        return "error";
    }

    public function is_picture_valid(string $picture): int
    {

        $fajlnev = $_FILES["profile-pic"]["name"];
        $darabok = explode(".", $fajlnev);            // fájlnév feldarabolása pont karakterek mentén
        $kiterjesztes = strtolower(end($darabok));    // a feldarabolás után kapott értékek közül az utolsó lesz a kiterjesztés

        echo "A fájl kiterjesztése: $kiterjesztes <br/>";   // "A fájl kiterjesztése: jpg"

            /*
        $file_parts = pathinfo($picture);

        switch ($file_parts['extension']) {
            case "png":
            case "jpg":
                return 1;

        }

        echo "baj van";
        return 0;*/

        return 1;
    }


}