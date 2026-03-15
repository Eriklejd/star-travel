<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Star Travel | Kontakt</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: url("https://www.ncl.com/sites/default/files/SAR_06_1920X1080%20LG.jpg") no-repeat center center fixed;
      background-size: cover;
      color: #333;
    }

    nav {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    nav h2 {
      color: #fff;
      margin: 0;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
      transition: background 0.3s;
    }

    nav ul li a:hover,
    nav ul li a.active {
      background-color: #ff9900;
      color: #fff;
    }

    .page {
      background-color: rgba(255, 255, 255, 0.95);
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .page h1 {
      text-align: center;
      color: #ff6600;
    }

    .page p {
      font-size: 16px;
      line-height: 1.6;
    }

    .contact-info, .office-hours {
      background-color: #f9f9f9;
      padding: 15px 20px;
      margin: 20px 0;
      border-left: 5px solid #ff6600;
      border-radius: 5px;
    }

    .contact-info p, .office-hours p {
      margin: 8px 0;
    }

    .contact-info strong, .office-hours strong {
      color: #ff6600;
    }
    /* FOOTER STYLES */
.main-footer {
    background: #2c3e50; /* Ngjyrë e errët elegante */
    color: white;
    padding: 60px 0 20px 0;
    margin-top: 50px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr; /* 3 kolona */
    gap: 40px;
    padding: 0 20px;
}

.footer-section h3 {
    color: #ff6b35;
    margin-bottom: 20px;
    font-size: 24px;
}

.footer-section h4 {
    margin-bottom: 20px;
    font-size: 18px;
    border-bottom: 2px solid #ff6b35;
    display: inline-block;
    padding-bottom: 5px;
}

.footer-section p {
    line-height: 1.6;
    font-size: 14px;
    color: #bdc3c7;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #bdc3c7;
    text-decoration: none;
    transition: 0.3s;
}

.footer-section ul li a:hover {
    color: #ff6b35;
    padding-left: 5px;
}

.social-icons a {
    display: inline-block;
    width: 35px;
    height: 35px;
    background: #34495e;
    color: white;
    text-align: center;
    line-height: 35px;
    border-radius: 50%;
    margin-right: 10px;
    text-decoration: none;
    font-weight: bold;
    font-size: 12px;
    transition: 0.3s;
}

.social-icons a:hover {
    background: #ff6b35;
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #3e4f5f;
    font-size: 13px;
    color: #7f8c8d;
}

/* Responsiviteti për celularë */
@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .footer-section h4 {
        display: block;
    }
}
  </style>
</head>
<body>

<nav>
  <h2>Star Travel</h2>
     <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="destinacione.php">Destinacionet</a></li>
        <li><a href="hotelet.php">Hotelet</a></li>
        <li><a href="Untitled-1.php">Rreth Nesh</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href="login.php">Sign up/Log in</a></li>
    </ul>
</nav>

<div class="page">
  <h1>Na Kontaktoni</h1>

  <p>
    Mirë se vini në faqen tonë të kontaktit! Nëse keni pyetje rreth udhëtimeve, rezervimeve ose dëshironi të krijoni një itinerar të personalizuar,
    stafi ynë është këtu për t'ju ndihmuar.
  </p>

  <div class="contact-info">
    <p><strong>📍 Adresa:</strong> Vlore Shqipëri</p>
    <p><strong>📞 Telefoni:</strong> +355 69 400 00160</p>
    <p><strong>📧 Email:</strong> startravel@gmail.com</p>
  </div>

  <div class="office-hours">
    <p><strong>🕒 Orari i punës:</strong></p>
    <p>E Hënë – E Shtunë: 08:00 – 20:00</p>
    <p>E Dielë: Mbyllur</p>
  </div>

  <p>
    Jemi të gatshëm të përgjigjemi në çdo pyetje për destinacionet tona brenda dhe jashtë Shqipërisë. Mos hezitoni të na kontaktoni!
  </p>
</div>
<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>TStar Travel</h3>
            <p>Zbuloni bukurinë e Shqipërisë me turet tona të organizuara profesionalisht. Eksperienca që mbeten gjatë në kujtesë.</p>
            <div class="social-icons">
                <a href="#">FB</a>
                <a href="#"> IG</a>
               
            </div>
        </div>

        <div class="footer-section">
            <h4>Linqe të shpejta</h4>
            <ul>
                <li><a href="#">Kreu</a></li>
                <li><a href="#">Turet tona</a></li>
                <li><a href="#">Rreth nesh</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Na kontaktoni</h4>
            <p>📍 Rruga: "Bulevardi Vlorë-Skelë", Vlorë</p>
            <p>📞 +355 6X XX XX XXX</p>
            <p>✉️ info@travelagency.al</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2026 Travel Agency. Të gjitha të drejtat e rezervuara.</p>
    </div>
</footer>
</body>
</html>