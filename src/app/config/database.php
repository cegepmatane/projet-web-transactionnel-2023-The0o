<?php
require_once('config.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");
?>

