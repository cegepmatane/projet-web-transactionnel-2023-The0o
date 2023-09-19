<?php

$hostname = " ";   
$username = " ";
$password = " ";   
$database = " "; 

$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

?>
