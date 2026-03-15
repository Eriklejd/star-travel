<?php
session_start();
// Lidhja me databazën
require "db.php"; 

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Merr dhe pastro të dhënat nga formulari
    $user = trim($_POST['username']);
    $mail = trim($_POST['email']);
    $pass = $_POST['password'];
    
    // HEQIM MERRJEN E ROLIT NGA FORMULARI - E caktojme automatikisht
    $role = 'client'; 

    // 2. Kontrollo nëse fushat janë bosh
    if (empty($user) || empty($mail) || empty($pass)) {
        $error = "Të gjitha fushat janë të detyrueshme!";
    } else {
        // 3. Enkripto fjalëkalimin
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        
        // 4. Statusi per klientet eshte gjithmone 'approved'
        $status = 'approved';

        // 5. Kontrollo nese username ose email ekzistojne tashmë
        $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $check->bind_param("ss", $user, $mail);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $error = "Username ose Email ekzistojnë tashmë!";
        } else {
            // 6. Fut të dhënat e reja në databazë (ROLE tani eshte statik 'client')
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $user, $mail, $hashed_password, $role, $status);
            
            if ($stmt->execute()) {
                // 7. Krijo sesion dhe ridrejto
                $_SESSION["user_id"] = $conn->insert_id;
                $_SESSION["username"] = $user;
                $_SESSION["role"] = $role;
                $_SESSION["status"] = $status;

                header("Location: home.php");
                exit();
            } else {
                $error = "Gabim gjatë regjistrimit: " . $stmt->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Regjistrohu | Star Travel</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), 
                        url("https://turizmineshqiperihome.files.wordpress.com/2019/05/shk.jpg") no-repeat center center fixed;
            background-size: cover;
            display: flex; justify-content: center; align-items: center; min-height: 100vh; 
        }
        .signup-container { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 40px; border-radius: 12px; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.3); 
            width: 100%; max-width: 400px; text-align: center; 
        }
        h2 { color: #0a3d62; margin-bottom: 25px; }
        input { 
            width: 100%; padding: 12px; margin: 10px 0; 
            border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; 
        }
        button { 
            width: 100%; padding: 12px; background-color: #ff9900; 
            color: white; border: none; border-radius: 6px; 
            cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 15px; 
            transition: background 0.3s;
        }
        button:hover { background-color: #e68a00; }
        .error { color: #d63031; font-size: 14px; background: #ffdadb; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        a { text-decoration: none; color: #0a3d62; font-weight: bold; }
        a:hover { text-decoration: underline; }
        p { color: #555; font-size: 14px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="signup-container">
    <h2>Regjistrohu</h2>
    
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Fjalëkalimi" required>
        
        <button type="submit">Krijo Llogarinë</button>
    </form>
    
    <p>Ke llogari? <a href="login.php">Logohu</a></p>
</div>

</body>
</html>