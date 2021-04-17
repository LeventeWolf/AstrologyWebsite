<?php


include_once 'Handler.php';

class LoginHandler extends Handler
{

    function check_correct_login(string $username, string $pwd): int
    {
        foreach ($this->accounts as $acc) {
            if ($acc["username"] == $username && $acc["password"] == $pwd) {
                return 1;
            }
        }

        return 0;
    }

    public static function check_if_logged_in(){
        if (isset($_SESSION['username'])) {
            return true;
        }

        return false;
    }
}