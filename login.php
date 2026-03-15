<?php
session_start();
require "db.php"; // Lidhja me databazën

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        $error = "Të gjitha fushat janë të detyrueshme!";
    } else {
        // Kontrollo nese useri ekziston
        $stmt = $conn->prepare("SELECT id, username, password, role, status FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            
            // Kontrollo nese fjalekalimi perputhet
            if (password_verify($pass, $row['password'])) {
                // Logimi me sukses - RUAJ TE DHENAT NE SESION
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
                $_SESSION["role"] = $row['role'];
                $_SESSION["status"] = $row['status']; // KJO RUAJ STATUSIN E USERIT

                // Ridrejto sipas rolit
                if ($row['role'] == 'admin') {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: home.php");
                }
                exit();
            } else {
                $error = "Fjalëkalimi i gabuar!";
            }
        } else {
            $error = "Përdoruesi nuk ekziston!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Logohu | Star Travel</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), 
                        url("https://turizmineshqiperihome.files.wordpress.com/2019/05/shk.jpg") no-repeat center center fixed;
            background-size: cover;
            display: flex; justify-content: center; align-items: center; min-height: 100vh; 
        }
        .login-container { 
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
            width: 100%; padding: 12px; background-color: #0a3d62; 
            color: white; border: none; border-radius: 6px; 
            cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 15px; 
            transition: background 0.3s;
        }
        button:hover { background-color: #ff9900; }
        .error { color: #d63031; font-size: 14px; background: #ffdadb; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        a { text-decoration: none; color: #0a3d62; font-weight: bold; }
        a:hover { text-decoration: underline; }
        p { color: #555; font-size: 14px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Logo in</h2>
    
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Fjalëkalimi" required>
        
        <button type="submit">Hyr</button>
    </form>
    
    <p>Nuk ke llogari? <a href="signup.php">Regjistrohu</a></p>
</div>

</body>
</html>