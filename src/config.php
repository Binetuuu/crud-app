<?php
$conn = new mysqli("db","root", "root", "crud_db");

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}
?>
