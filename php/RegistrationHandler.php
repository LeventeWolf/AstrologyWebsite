<?php
    include_once 'FileHandler.php';

    class RegistrationHandler{
        private $fileHandler;
        private $accounts;

        private function set_fileHandler(){
            $this->fileHandler = new FileHandler;
        }

        public function get_fileHandler(){
            return $this->fileHandler;
        }

        private function set_accounts(){
            $this->accounts = $this->fileHandler->read_accounts_from_file();
        }

        public function init(){
            $this->set_fileHandler();
            $this->set_accounts();
        }

        function __construct() {
            $this->init();
        }

        public function is_username_valid(string $username): int
        {
            foreach ($this->accounts as $acc){
                if ($acc["username"] == $username){
                    return 0;
                }
            }

            return 1;
        }

        public function is_passwords_match(string $pwd1, string $pwd2): int
        {
            if (strcmp($pwd1, $pwd2) !== 0) {
                return 0;
            }

            return 1;
        }

        public function get_registered_username(){
            if (isset($_SESSION["username"]))
                return $_SESSION["username"];

            return "";
        }

        public function get_registered_password(){
            if (isset($_SESSION["password"]))
                return $_SESSION["password"];

            return "";
        }
    }