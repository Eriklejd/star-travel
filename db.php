<?php
// Të dhënat e lidhjes
$servername = "localhost";
$username = "root"; // Përdoruesi i parazgjedhur i XAMPP
$password = "";     // Fjalëkalimi i parazgjedhur është bosh
$dbname = "star_travel"; // EMRI I DATABAZËS TËNDE

// Krijo lidhjen
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrollo lidhjen
if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

// Vendos charset-in në utf8 për të shfaqur saktë karakteret shqip
$conn->set_charset("utf8");
?>