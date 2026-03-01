<?php
$hostname = 'localhost';
$database = 'marchesBenin';
$username = 'root';
$password = '';

// Connexion à la base de données mysql
$connexion = mysqli_connect($hostname, $username, $password, $database);

// Verification de la connexion
if (!$connexion) {
    die("Connection échouée: " . mysqli_connect_error());
}
?>