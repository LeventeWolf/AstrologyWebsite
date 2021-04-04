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


}