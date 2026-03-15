<?php
session_start();

// Kontrollo session
if (!isset($_SESSION['booking_data']) || !isset($_SESSION['personal_data'])) {
    header("Location: home.php");
    exit();
}

$booking = $_SESSION['booking_data'];
$personal = $_SESSION['personal_data'];

$booking_id = rand(1000, 9999);
$data = [
    'emri' => $personal['emri'] . ' ' . $personal['mbiemri'],
    'email' => $personal['email'],
    'hoteli' => $booking['selectedHotel']['name'],
    // Heqim çdo karakter jofunksional nga totali
    'shuma_totale' => str_replace([' €', 'EUR', ' '], '', $booking['total'])
];
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Fatura | Star Travel</title>
    <style>
        body { font-family: 'Helvetica Neue', sans-serif; background: #f4f7f9; margin: 0; padding: 40px; }
        .invoice-card { 
            background: white; max-width: 600px; margin: auto; padding: 40px; 
            border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.1); border-top: 10px solid #0b3c5d;
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
        .btn-print { background: #0b3c5d; color: white; }
        .btn-back { background: #eee; color: #333; }
        @media print { .actions { display: none; } body { padding: 0; } .invoice-card { box-shadow: none; border: none; width: 100%; max-width: 100%; } }
    </style>
</head>
<body>
 
<div class="invoice-card">
    <div class="header">
        <div class="logo">
            <h2>Star Travel</h2>
            <small>Agjensia juaj e besuar</small>
        </div>
        <div class="invoice-details">
            Fatura: #<?php echo $booking_id; ?><br>
            Data: <?php echo date("d/m/Y"); ?>
        </div>
    </div>
 
    <div class="client-info">
        <h4>Faturuar për:</h4>
        <p><?php echo htmlspecialchars($data['emri']); ?></p>
        <small><?php echo htmlspecialchars($data['email']); ?></small>
    </div>
 
    <table class="items-table">
        <thead>
            <tr>
                <th>Përshkrimi</th>
                <th>Hoteli</th>
                <th style="text-align: right;">Shuma</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rezervim Akomodimi</td>
                <td><?php echo htmlspecialchars($data['hoteli']); ?></td>
                <td style="text-align: right;"><?php echo htmlspecialchars($data['shuma_totale']); ?> €</td>
            </tr>
        </tbody>
    </table>
 
    <div class="total-section">
        <small style="font-size: 12px; color: #777; font-weight: normal;">Total për të paguar: </small>
        <?php echo htmlspecialchars($data['shuma_totale']); ?> €
    </div>
 
    <div class="actions">
        <a href="checkout.php" class="btn btn-back">Kthehu</a>
        <button onclick="window.print()" class="btn btn-print">Ruaj si PDF / Printo</button>
    </div>
</div>
 
</body>
</html>