<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelet | Star Travel</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin:0; background: #f4f7f9; color: #333; }
        
        /* NAVBAR */
        nav {
            background:#0b3c5d; color:white;
            padding:15px 50px; display:flex; justify-content:space-between; align-items:center;
            position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        nav h2 { margin:0; font-size: 24px; }
        nav ul { list-style:none; display:flex; gap:25px; margin:0; padding:0; }
        nav ul li a { color:white; text-decoration:none; font-weight:500; transition: 0.3s; }
        nav ul li a:hover { color: #ffd6b0; }

        /* HEADER */
        .page-header {
            background: #0b3c5d; color: white;
            padding: 60px 20px; text-align: center;
        }

        /* SEARCH BAR */
        .filter-container {
            max-width: 600px; margin: -30px auto 30px;
            background: white; padding: 15px; border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .filter-container input {
            width: 90%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;
        }

        /* GRID-I I HOTELEVE */
        .hotels-container {
            max-width: 1200px; margin: 40px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px; padding: 0 20px;
        }

        .hotel-card {
            background: white; border-radius: 12px; overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: 0.3s;
            display: flex; flex-direction: column;
        }
        .hotel-card:hover { transform: translateY(-8px); box-shadow: 0 12px 25px rgba(0,0,0,0.15); }
        .hotel-card img { width: 100%; height: 220px; object-fit: cover; }
        
        .hotel-info { padding: 20px; flex-grow: 1; }
        .hotel-info h3 { margin: 0 0 10px; color: #0b3c5d; font-size: 20px; }
        .stars { color: #ffd700; margin-bottom: 10px; font-size: 14px; }
        .price { font-size: 22px; font-weight: bold; color: #135585; margin: 10px 0; }
        .category { font-size: 14px; color: #777; font-style: italic; }
        
        .book-btn {
            display: inline-block; width: 100%; text-align: center;
            background: #0b3c5d; color: white; padding: 12px 0;
            text-decoration: none; border-radius: 6px; margin-top: 15px;
            font-weight: bold; transition: 0.3s; box-sizing: border-box;
        }
        .book-btn:hover { background: #135585; }

        footer { background: #0b3c5d; color: white; padding: 20px; text-align: center; margin-top: 50px; }
    </style>
</head>
<body>

<nav>
    <h2>Star Travel</h2>
     <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="destinacione.php">Destinacione</a></li>
        <li><a href="hotelet.php">Hotele</a></li>
        <li><a href="Untitled-1.php">Rreth Nesh</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href="login.php">Sign up/Log in</a></li>
    </ul>
</nav>

<div class="page-header">
    <h1>Zgjidhni Hotelin Tuaj Ideal</h1>
    <p>Eksploroni ofertat tona më të mira në të gjithë Shqipërinë</p>
</div>

<div class="filter-container">
    <input type="text" id="hotelSearch" placeholder="Kërko hotelin ose qytetin..." onkeyup="filterHotels()">
</div>

<div class="hotels-container" id="hotelsGrid">
    <div class="hotel-card">
        <img src="https://img.directhotels.com/al/korce/bujtina-oxhaku/1.jpg" alt="Bujtina Oxhaku">
        <div class="hotel-info">
            <h3>Bujtina Oxhaku</h3>
            <div class="stars">★★★★☆</div>
            <p class="category">📍 Korçë - Standard</p>
            <div class="price">75.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>

    <div class="hotel-card">
        <img src="https://images.trvl-media.com/lodging/14000000/13270000/13269300/13269268/058c1a23.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill" alt="Hotel Kocibelli">
        <div class="hotel-info">
            <h3>Hotel Kocibelli Pool & SPA</h3>
            <div class="stars">★★★★★</div>
            <p class="category">📍 Korçë - Premium</p>
            <div class="price">120.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>

    <div class="hotel-card">
        <img src="https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/158313854.jpg?k=c2c18c581c18cd4f8cf9bbd7900da443888838f237a8121dac8c61e3a90adf7c&o=" alt="Hani I Pazarit">
        <div class="hotel-info">
            <h3>Hani I Pazarit</h3>
            <div class="stars">★★★★★</div>
            <p class="category">📍 Korçë - Deluxe</p>
            <div class="price">200.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>

    <div class="hotel-card">
        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/74/33/09/hotel-bologna.jpg?w=900&h=500&s=1" alt="Hotel Bologna">
        <div class="hotel-info">
            <h3>Hotel Bologna</h3>
            <div class="stars">★★★★☆</div>
            <p class="category">📍 Vlorë</p>
            <div class="price">49.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>

    <div class="hotel-card">
        <img src="https://media-cdn.tripadvisor.com/media/photo-s/23/8f/b2/65/hotel-miramare.jpg" alt="Hotel Miramare">
        <div class="hotel-info">
            <h3>Hotel Miramare</h3>
            <div class="stars">★★★★☆</div>
            <p class="category">📍 Vlorë</p>
            <div class="price">55.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>

    <div class="hotel-card">
        <img src="https://dam.melia.com/melia/file/Ph7KJPewmDRka6nT9FQj.jpg?im=RegionOfInterestCrop=(1500,1000),regionOfInterest=(2150.0,1433.5)" alt="Hotel Vlora Priam">
        <div class="hotel-info">
            <h3>Hotel Vlora Priam</h3>
            <div class="stars">★★★★★</div>
            <p class="category">📍 Vlorë - Premium</p>
            <div class="price">95.00€ <span style="font-size: 12px; font-weight: normal;">/nata</span></div>
            <a href="hotel-details.php" class="book-btn">Rezervo Tani</a>
        </div>
    </div>
</div>

<footer>
    <p>© 2026 Star Travel – Të gjitha të drejtat e rezervuara</p>
</footer>

<script>
function filterHotels() {
    let input = document.getElementById('hotelSearch').value.toLowerCase();
    let cards = document.getElementsByClassName('hotel-card');

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector('h3').innerText.toLowerCase();
        let location = cards[i].querySelector('.category').innerText.toLowerCase();
        
        if (title.includes(input) || location.includes(input)) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>









