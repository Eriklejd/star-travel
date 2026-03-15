<?php
session_start();
require "db_connect.php"; 

// KONTROLLI: Vetem admini mund te hyje
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Merr faqen aktuale nga URL-ja, nese nuk ka, vendos 'rezervimet'
$page = isset($_GET['page']) ? $_GET['page'] : 'rezervimet';
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Star Travel</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f9; margin: 0; padding: 0; }
        .sidebar { width: 220px; background: #0b3c5d; color: white; height: 100vh; position: fixed; padding-top: 20px; }
        .sidebar h2 { text-align: center; color: #fff; }
        .sidebar a { display: block; color: white; padding: 15px; text-decoration: none; border-bottom: 1px solid #1a5c8c; }
        .sidebar a:hover { background: #1a5c8c; }
        .main-content { margin-left: 220px; padding: 20px; }
        
        /* Stili per tabelat */
        .table-container { overflow-x: auto; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #0b3c5d; color: white; white-space: nowrap; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        
        .delete-btn { background: #dc3545; color: white; border: none; padding: 6px 10px; cursor: pointer; border-radius: 4px; }
        .delete-btn:hover { background: #a71d2a; }
        h1 { color: #0b3c5d; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="admin_dashboard.php?page=rezervimet">Rezervimet</a>
    <a href="admin_dashboard.php?page=users">Users</a>
    <a href="admin_dashboard.php?page=hotelet">Hotelet</a>
    <a href="logout.php" style="margin-top: 50px; color: #ffcccc; border: none;">Log Out</a>
</div>

<div class="main-content">
    
    <?php
    if ($page == 'rezervimet') {
        echo "<h1>Rezervimet</h1>";
        
        // Logjika per fshirje rezervimi
        if (isset($_POST['delete_booking'])) {
            $id = (int)$_POST['booking_id'];
            $conn->query("DELETE FROM rezervimet WHERE id = $id");
        }
        
        $result = $conn->query("SELECT * FROM rezervimet ORDER BY data_rezervimit DESC");
        echo "<div class='table-container'><table>
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Telefoni</th>
                <th>Hoteli</th>
                <th>Shuma Totale</th>
                <th>Veprime</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td><strong>{$row['booking_id']}</strong></td>
                <td>{$row['emri']}</td>
                <td>{$row['mbiemri']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefoni']}</td>
                <td>{$row['hoteli']}</td>
                <td>{$row['shuma_totale']} €</td>
                <td>
                    <form method='POST' onsubmit='return confirm(\"Jeni te sigurt?\");'>
                        <input type='hidden' name='booking_id' value='{$row['id']}'>
                        <button type='submit' name='delete_booking' class='delete-btn'>Fshi</button>
                    </form>
                </td>
            </tr>";
        }
        echo "</table></div>";
    } 
    elseif ($page == 'users') {
        echo "<h1>Users</h1>";
        $result = $conn->query("SELECT id, username, role FROM users");
        echo "<div class='table-container'><table>
            <tr><th>ID</th><th>Username</th><th>Role</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['role']}</td></tr>";
        }
        echo "</table></div>";
    }
    elseif ($page == 'hotelet') {
        echo "<h1>Hotelet</h1>";
        $result = $conn->query("SELECT id, name, type, price, location FROM hotels");
        echo "<div class='table-container'><table>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Tipi</th>
                <th>Çmimi/Nata</th>
                <th>Vendndodhja</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['type']}</td>
                <td>{$row['price']} €</td>
                <td>{$row['location']}</td>
            </tr>";
        }
        echo "</table></div>";
    }
    ?>

</div>

</body>
</html>