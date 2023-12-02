<?php
$host = 'localhost';
$username = 'root';
$password = "";
$database ='user_registration';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
