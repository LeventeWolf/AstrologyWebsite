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
        $file_parts = pathinfo($picture);

        switch ($file_parts['extension']) {
            case "png":
            case "jpg":
                return 1;

        }

        return 0;
    }


}