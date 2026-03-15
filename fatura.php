<?php
$database_name = "star_travel"; 
$conn = new mysqli("localhost", "root", "", $database_name);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Këto vijnë nga HTML (atributi 'name' i input-eve)
    $emri = $_POST['emri'];
    $h = $_POST['hyrja']; 
    $d = $_POST['dalja']; 
    $dh = $_POST['dhoma'];

    // KËTU DUHET TË JESH KIRURG: Emrat brenda kllapave ( ) 
    // duhet të jenë FIKS siç i sheh te Structure në phpMyAdmin.
    $sql = "INSERT INTO rezervimet (emri, hyrja, dalja, dhoma) 
            VALUES ('$emri', '$h', '$d', '$dh')";

    if ($conn->query($sql) === TRUE) {
        header("Location: pagesa.php");
        exit();
    } else {
        // Ky rresht do të na tregojë ekzaktësisht cilën kolonë nuk njeh
        echo "Gabim teknik: " . $conn->error;
    }
}
$conn->close();
?>