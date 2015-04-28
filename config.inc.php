<?php
class Conf 
{
    public $host;
    public $db;
    public $user;
    public $pass;
    public $passencode;

    public function __construct()
    {
        $this->host = 'localhost:3306';
        $this->db = 'u776773598_gose';
        $this->user = 'root';
        $this->pass = 'root';
    }
}
?>