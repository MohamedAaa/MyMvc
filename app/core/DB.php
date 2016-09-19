<?php

$host = 'localhost';
$user = 'root';
$password = '12345678';
$database = 'employees';

$con = mysqli_connect($host, $user, $password, $database, '3306');

if (!$con) {
    echo 'No Connect';
    die();
}