<?php


include_once 'FileHandler.php';

class LoginHandler
{
    private $fileHandler;
    private $accounts;

    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->set_fileHandler();
        $this->set_accounts();
    }

    private function set_fileHandler()
    {
        $this->fileHandler = new FileHandler;
    }

    private function set_accounts()
    {
        $this->accounts = $this->fileHandler->read_accounts_from_file();
    }

    public function get_fileHandler()
    {
        return $this->fileHandler;
    }

    function check_correct_login(string $username, string $pwd): int
    {
        foreach ($this->accounts as $acc) {
            if ($acc["username"] == $username && $acc["password"] == $pwd) {
                return 1;
            }
        }

        return 0;
    }
}