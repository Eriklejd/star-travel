<?php
include 'db_connect.php'; // Sigurohu që ky skedar lidhet saktë me DB
session_start();

// Kontrollojmë nëse ka të dhëna rezervimi
if (!isset($_SESSION['booking'])) {
    header("Location: home.php");
    exit();
}

$b = $_SESSION['booking'];
$shuma = $b['total']; // Definojmë shumën për ta shfaqur në HTML

// Përpunimi i formularit kur klikohet "PËRFUNDO REZERVIMIN"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay_method'])) {
    
    // Marrim të dhënat nga formulari (inputet e fshehura dhe radio button)
    $emri = $conn->real_escape_string($_POST['first_name']); 
    $mbiemri = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $qyteti = $conn->real_escape_string($_POST['city']);
    
    // Bashkojmë prefiksin me numrin e telefonit
    $telefoni = $conn->real_escape_string($_POST['prefix'] . $_POST['phone']);
    
    $hoteli = $conn->real_escape_string($b['selectedHotel']['name']);
    $booking_id = strtoupper(substr(md5(time() . uniqid()), 0, 8)); // ID unike më e fortë
    $metoda = $_POST['pay_method']; // Merr metodën e zgjedhur (Cash ose Karta)

    // Ruajtja në Database - E KORRIGJUAR: 'rezervimet'
    $sql = "INSERT INTO rezervimet (booking_id, emri, mbiemri, email, qyteti, telefoni, hoteli, shuma_totale, metoda_pageses) 
            VALUES ('$booking_id', '$emri', '$mbiemri', '$email', '$qyteti', '$telefoni', '$hoteli', '$shuma', '$metoda')";

    if ($conn->query($sql) === TRUE) {
        // Pastrojmë sesionin e rezervimit që të mos bëhet dy herë
        unset($_SESSION['booking']);                
        $_SESSION['last_booking_id'] = $booking_id;
        header("Location: success.php"); // Kalojmë te faqja e suksesit
        exit();
    } else {
        die("Gabim teknik gjatë ruajtjes: " . $conn->error);
    }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagesa | Star Travel</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center; padding: 50px; background: #f4f6f8; }
        .pay-box { background: white; max-width: 450px; margin: auto; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .method { border: 2px solid #eee; padding: 15px; margin: 10px 0; border-radius: 8px; cursor: pointer; display: block; transition: 0.3s; text-align: left; }
        .method:hover { border-color: #ff9900; background-color: #fff9f0; }
        button { background: #27ae60; color: white; border: none; padding: 15px; width: 100%; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px; margin-top: 20px; }
        button:hover { background: #219150; }
    </style>
</head>
<body>

<div class="pay-box">
    <h2>Zgjidhni mënyrën e pagesës</h2>
    <p>Hoteli: <strong><?= htmlspecialchars($b['selectedHotel']['name'] ?? 'Hotel') ?></strong></p>
    <p>Shuma totale: <strong style="color: #ff6b35; font-size: 1.2em;"><?= htmlspecialchars($shuma) ?> €</strong></p>
    <hr>
    
    <form action="" method="POST">
        
        <input type="hidden" name="first_name" value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>">
        <input type="hidden" name="last_name" value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <input type="hidden" name="city" value="<?= htmlspecialchars($_POST['city'] ?? '') ?>">
        <input type="hidden" name="prefix" value="<?= htmlspecialchars($_POST['prefix'] ?? '') ?>">
        <input type="hidden" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

        <label class="method">
            <input type="radio" name="pay_method" value="Cash" checked> 💵 Pagesë në Zyrë
        </label>
        <label class="method">
            <input type="radio" name="pay_method" value="Karta"> 💳 Kartë Bankare
        </label>
        
        <button type="submit">PËRFUNDO REZERVIMIN</button>
    </form>
</div>

</body>
</html>

