<?php
include_once 'FileHandler.php';

class RegistrationHandler
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

    /**
     * Returns 1 if the username is unique else 0
     * @param string $username
     * @return int
     */
    public function is_username_valid(string $username): int
    {
        foreach ($this->accounts as $acc) {
            if ($acc["username"] == $username) {
                return 0;
            }
        }

        return 1;
    }

    /**
     * Compare two given passwords equals: 0, not equals: 1
     * Returns 1 if the two given passwords are the same
     * Returns 0 if the two given passwords are not the same
     * @param string $pwd1
     * @param string $pwd2
     * @return int
     */
    public function is_passwords_match(string $pwd1, string $pwd2): int
    {
        if (strcmp($pwd1, $pwd2) !== 0) {
            return 0;
        }

        return 1;
    }

    /**
     * Returns with the current username in the $_SESSION associative array
     * Returns "" if the username is not set
     * @return mixed|string
     */
    public function get_registered_username(): string
    {
        if (!isset($_SESSION["username"])) return "";

        return $_SESSION["username"];
    }

    /**
     * Returns with the current password in the $_SESSION associative array
     *  Returns "" if the password is not set
     * @return string
     */
    public function get_registered_password(): string
    {
        if (!isset($_SESSION["password"])) return "";

        return $_SESSION["password"];
    }
}