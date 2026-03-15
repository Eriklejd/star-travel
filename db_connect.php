<?php
$conn = new mysqli("localhost", "root", "", "star_travel");
if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

?>