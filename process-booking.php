<?php
session_start();
require "db_connect.php"; // Sigurohu që ky skedar lidhet me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Merr të dhënat nga formulari dhe pastroji (real_escape_string)
    $emri = $conn->real_escape_string($_POST['emri']);
    $telefoni = $conn->real_escape_string($_POST['tel']);
    $hyrja = $conn->real_escape_string($_POST['hyrja']);
    $dalja = $conn->real_escape_string($_POST['dalja']);
    $shuma_per_nate = $conn->real_escape_string($_POST['dhoma']);
    
    // 2. Llogarit shumën totale bazuar në netët e qëndrimit
    $date1 = new DateTime($hyrja);
    $date2 = new DateTime($dalja);
    $interval = $date1->diff($date2);
    $netet = $interval->days;
    
    if ($netet <= 0) {
        die("Gabim: Data e daljes duhet të jetë pas datës së hyrjes. <a href='javascript:history.back()'>Kthehu pas</a>");
    }
    
    $shuma_totale = $netet * $shuma_per_nate;
    
    // 3. Të dhëna të tjera (që nuk janë te formulari yt, por duhen te DB)
    $mbiemri = "N/A"; // Mund ta shtosh te formulari nese do
    $email = "N/A";   // Mund ta shtosh te formulari nese do
    $qyteti = "Tiranë"; // Hoteli është në Tiranë sipas kodit
    $hoteli = "Hotel Deluxe Tirana"; 
    
    // 4. Gjenero një ID unike rezervimi (p.sh. STAR-A1B2C3D4)
    $booking_id = "STAR-" . strtoupper(substr(md5(time() . $emri), 0, 8));

    // 5. Fut të dhënat në databazë
    $sql = "INSERT INTO rezervimet (booking_id, emri, mbiemri, email, qyteti, telefoni, hoteli, shuma_totale) 
            VALUES ('$booking_id', '$emri', '$mbiemri', '$email', '$qyteti', '$telefoni', '$hoteli', '$shuma_totale')";

    if ($conn->query($sql) === TRUE) {
        // --- NDYSHIMI KËTU ---
        // Sukses: Ruaj ID-në në session dhe redirekto te success.php
        $_SESSION['last_booking_id'] = $booking_id;
        header("Location: success.php");
        exit(); 
        // ----------------------
    } else {
        echo "Gabim në databazë: " . $conn->error;
    }
    
    $conn->close();
} else {
    // Nese dikush tenton të hyjë direkt në skedar
    header("Location: hotelet.php");
}
?>