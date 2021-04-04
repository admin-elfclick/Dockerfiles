<?php
$host = 'db';
$user = 'root';
$pass = 'root';

$mysqli = new mysqli($host, $user, $pass);

if (!$mysqli->connect_error) {
    echo 'Connection successful!';
}  else {
    echo 'Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}

$mysqli->close();
?>