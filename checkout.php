<?php
session_start();

// 1. Logjika për të marrë të dhënat e rezervimit
if (isset($_POST['booking'])) {
    // Nëse vijnë të dhëna të reja, kontrollojmë nëse janë string JSON apo array
    if (is_string($_POST['booking'])) {
        $_SESSION['booking'] = json_decode($_POST['booking'], true);
    } else {
        // Nëse vijnë si array, i vendosim direkt
        $_SESSION['booking'] = $_POST['booking'];
    }
}

// 2. Kontrollojmë nëse session ekziston, nëse jo kthehemi te faqja kryesore
if (!isset($_SESSION['booking'])) {
    header("Location: home.php");
    exit();
}

// 3. Tani $b është array me të dhënat (hotel, data, total)
$b = $_SESSION['booking'];

// Lista e shteteve me prefikset dhe kodet ISO
$countries = [
    ['name' => 'Shqipëri', 'code' => '+355', 'iso' => 'AL'],
    ['name' => 'Kosovë', 'code' => '+383', 'iso' => 'XK'],
    ['name' => 'Itali', 'code' => '+39', 'iso' => 'IT'],
    ['name' => 'Greqi', 'code' => '+30', 'iso' => 'GR'],
    ['name' => 'Gjermani', 'code' => '+49', 'iso' => 'DE'],
    ['name' => 'Mbretëria e Bashkuar', 'code' => '+44', 'iso' => 'GB'],
    ['name' => 'SHBA', 'code' => '+1', 'iso' => 'US'],
    ['name' => 'Maqedoni e Veriut', 'code' => '+389', 'iso' => 'MK']
];
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Star Travel</title>
    <style>
        :root { --primary: #ff6b35; --dark: #2c3e50; --light: #f5f7fa; }
        
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background: linear-gradient(135deg, var(--light) 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* NAVBAR */
        nav { background: #000; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; color: white;}
        nav h2 { margin: 0; color: #ff9900; }
        nav ul { list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; }
        nav ul li a { color: white; text-decoration: none; font-weight: bold; }

        .checkout-box { 
            max-width: 550px; 
            margin: 50px auto;
            background: white;
            padding: 40px; 
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15); 
        }

        .summary-card { 
            background: #fff5ed;
            padding: 20px; 
            border-radius: 10px;
            border-left: 6px solid var(--primary);
            margin-bottom: 30px;
        }

        label { display: block; margin-top: 15px; font-weight: 600; color: var(--dark); }
        
        input, select { 
            width: 100%; padding: 12px; margin-top: 8px; 
            border: 1px solid #ddd; border-radius: 8px; 
            font-size: 15px; transition: 0.3s;
            box-sizing: border-box; /* Për të mos dalë jashtë kornizës */
        }

        input:focus, select:focus { border-color: var(--primary); outline: none; box-shadow: 0 0 5px rgba(255,107,53,0.3); }

        .phone-group { display: flex; gap: 10px; }
        .phone-group select { width: 45%; }
        
        .pay-btn { 
            width: 100%; background: var(--primary); color: white; 
            border: none; padding: 16px; margin-top: 30px; 
            border-radius: 8px; font-size: 18px; font-weight: bold; 
            cursor: pointer; transition: 0.3s;
        }

        .pay-btn:hover { background: #e55a2b; transform: translateY(-2px); }

        footer { background: var(--dark); color: white; text-align: center; padding: 30px; margin-top: 50px; }
    </style>
</head>
<body>
 
<nav>
    <h2>Star Travel</h2>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
    </ul>
</nav>
 
<div class="checkout-box">
    <h2>Konfirmo Rezervimin</h2>
    
    <div class="summary-card">
        <span style="color: #666; font-size: 0.9em;">Destinacioni & Hoteli:</span>
        <div style="font-size: 1.2em; font-weight: bold; color: var(--dark);"><?= htmlspecialchars($b['selectedHotel']['name'] ?? 'Hotel pa emër') ?></div>
        <div style="margin-top: 10px;">
            <span>Data: <strong><?= htmlspecialchars($b['startDate'] ?? '') ?></strong> deri më <strong><?= htmlspecialchars($b['endDate'] ?? '') ?></strong></span>
            <div style="margin-top: 5px; font-size: 1.1em;">Total: <strong style="color: var(--primary);"><?= htmlspecialchars($b['total'] ?? '0') ?> €</strong></div>
        </div>
    </div>
 
    <form action="payment.php" method="POST">
        <div style="display: flex; gap: 15px;">
            <div style="flex: 1;">
                <label>Emri</label>
                <input type="text" name="first_name" placeholder="Filan" required>
            </div>
            <div style="flex: 1;">
                <label>Mbiemri</label>
                <input type="text" name="last_name" placeholder="Fisteku" required>
            </div>
        </div>
 
        <label>Shteti</label>
        <select name="country" required>
            <option value="">Zgjidhni shtetin...</option>
            <?php foreach($countries as $c): ?>
                <option value="<?= $c['name'] ?>"><?= $c['name'] ?></option>
            <?php endforeach; ?>
        </select>
 
        <label>Qyteti</label>
        <input type="text" name="city" placeholder="Tiranë" required>
 
        <label>Numri i Telefonit</label>
        <div class="phone-group">
            <select name="prefix" required>
                <?php foreach($countries as $c): ?>
                    <option value="<?= $c['code'] ?>" <?= $c['code'] == '+355' ? 'selected' : '' ?>>
                        <?= $c['iso'] ?> (<?= $c['code'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="phone" placeholder="6X XX XX XXX" required>
        </div>
 
        <label>Email Adresa</label>
        <input type="email" name="email" placeholder="emri@email.com" required>
 
        <button type="submit" class="pay-btn">VAZHDO TE PAGESA</button>
    </form>
</div>
 
<footer>
    <p>&copy; 2026 Star Travel. Të gjitha të drejtat e rezervuara.</p>
</footer>
 
</body>
</html>