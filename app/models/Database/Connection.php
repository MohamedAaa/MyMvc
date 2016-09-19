<?php

/**
 * Description of Connection
 *
 * @author Mario
 */
class Connection {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '12345678';
    private $database = 'employees';
    public  $con;


    public function __construct() {
        $this->connect();
    }
    
    public function connect() {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $this->con;
    }

}
