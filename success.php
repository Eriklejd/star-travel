<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';
session_start();

// 1. Marrim të dhënat nga Session dhe POST
$booking_id = isset($_SESSION['last_booking_id']) ? $_SESSION['last_booking_id'] : null;
$metoda = isset($_POST['pay_method']) ? $conn->real_escape_string($_POST['pay_method']) : 'E papërcaktuar';

// 2. Përditësojmë database-in me metodën e pagesës
if ($booking_id) {
    $update_sql = "UPDATE rezervimet SET metoda_pageses = '$metoda' WHERE booking_id = '$booking_id'";
    $conn->query($update_sql);
}

// 3. Marrim të dhënat e rezervimit për t'i shfaqur
$db_data = null;
if ($booking_id) {
    $result = $conn->query("SELECT * FROM rezervimet WHERE booking_id = '$booking_id'");
    if ($result && $result->num_rows > 0) {
        $db_data = $result->fetch_assoc();
    }
}

if (!$booking_id || !$db_data) {
    die("Gabim: Nuk u gjet asnjë rezervim aktiv. <a href='home.php'>Kthehu pas</a>");
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Konfirmimi | Star Travel</title>
    <style>
        body { font-family: 'Helvetica Neue', sans-serif; background: #f4f7f9; margin: 0; padding: 40px; }
        .invoice-card { 
            background: white; max-width: 600px; margin: auto; padding: 40px; 
            border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.1); border-top: 10px solid #27ae60;
        }
        .header { display: flex; justify-content: space-between; border-bottom: 2px solid #eee; padding-bottom: 20px; }
        .logo h2 { color: #0b3c5d; margin: 0; }
        .invoice-details { text-align: right; font-size: 14px; color: #777; }
        
        .client-info { margin: 30px 0; }
        .client-info h4 { margin-bottom: 5px; color: #555; text-transform: uppercase; font-size: 12px; }
        .client-info p { font-size: 18px; font-weight: bold; margin: 0; color: #333; }

        .items-table { width: 100%; border-collapse: collapse; margin: 30px 0; }
        .items-table th { text-align: left; background: #f8f9fa; padding: 10px; font-size: 13px; }
        .items-table td { padding: 15px 10px; border-bottom: 1px solid #eee; }
        
        .total-section { text-align: right; font-size: 22px; font-weight: bold; color: #0b3c5d; }
        
        .actions { margin-top: 30px; display: flex; gap: 10px; }
        .btn { 
            flex: 1; padding: 12px; border: none; border-radius: 5px; cursor: pointer; 
            font-weight: bold; text-decoration: none; text-align: center; transition: 0.3s;
        }
        .btn-print { background: #27ae60; color: white; }
        .btn-print:hover { background: #219150; }
        .btn-back { background: #eee; color: #333; }

        /* Kjo fsheh butonat kur e ruan si PDF/Print */
        @media print { .actions, nav { display: none; } body { padding: 0; } .invoice-card { box-shadow: none; border: none; } }
    </style>
</head>
<body>

<div class="invoice-card">
    <div class="header">
        <div class="logo">
            <h2>Star Travel</h2>
            <small>Konfirmim Rezervimi</small>
        </div>
        <div class="invoice-details">
            ID: #<?php echo $booking_id; ?><br>
            Data: <?php echo date("d/m/Y"); ?>
        </div>
    </div>

    <div class="client-info">
        <h4>Rezervuar nga:</h4>
        <p><?php echo $db_data['emri'] . " " . $db_data['mbiemri']; ?></p>
        <small><?php echo $db_data['email']; ?></small>
    </div>

    <table class="items-table">
        <thead>
            <tr>
                <th>Përshkrimi</th>
                <th>Detajet</th>
                <th style="text-align: right;">Shuma</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rezervim Hotel</td>
                <td><?php echo $db_data['hoteli']; ?></td>
                <td style="text-align: right;"><?php echo $db_data['shuma_totale']; ?> €</td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <small style="font-size: 12px; color: #777; font-weight: normal;">Total: </small>
        <?php echo $db_data['shuma_totale']; ?> €
    </div>

    <div class="actions">
        <a href="home.php" class="btn btn-back">Kthehu</a>
        <button onclick="window.print()" class="btn btn-print">Ruaj si PDF / Printo</button>
    </div>
</div>

</body>
</html>