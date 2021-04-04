<?php

include_once 'FileHandler.php';

abstract class Handler
{
    protected $fileHandler;
    protected $accounts;

    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->set_fileHandler();
        $this->set_accounts();
    }

    public function set_fileHandler()
    {
        $this->fileHandler = new FileHandler();
    }

    private function set_accounts()
    {
        $this->accounts = $this->fileHandler->read_accounts_from_file();
    }

    public function get_fileHandler()
    {
        return $this->fileHandler;
    }
}