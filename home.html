<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Travel | Home</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:0; background: #f4f7f9; color: #333; overflow-x: hidden; }

        /* NAVBAR */
        nav {
            background:#0b3c5d; color:white;
            padding:15px 50px; display:flex; justify-content:space-between; align-items:center;
            position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        nav h2 { margin:0; font-size: 24px; color: #ff9900; }
        nav ul { list-style:none; display:flex; gap:25px; margin:0; padding:0; }
        nav ul li a { color:white; text-decoration:none; font-weight:500; transition:0.3s; }
        nav ul li a:hover { color:#ff9900; }

        /* HERO SECTION */
        .hero {
            width: 100%; height: 50vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), 
                        url('https://kalajaekrujes73197333.wordpress.com/wp-content/uploads/2017/12/baner-kruja-905x395.jpg') 
                        center/cover no-repeat;
            display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;
        }
        .hero h1 { font-size: 40px; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }

        /* --- KODI I RI PËR SEARCH PANEL (COMPACT & BOXY) --- */
        .search-panel {
            background: white;
            padding: 15px;
            border-radius: 12px;
            width: 90%; max-width: 950px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap; 
            gap: 10px;
            align-items: center;
        }

        .search-row { 
            display: flex; 
            gap: 10px; 
            width: 100%;
        }

        .search-panel input, .search-panel select {
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            outline: none; 
            font-size: 15px; 
            color: #333;
            background-color: #f9f9f9;
        }

        .search-panel input:focus, .search-panel select:focus {
            border-color: #0b3c5d;
            background-color: white;
        }

        .input-main { flex: 2; }
        .input-sub { flex: 1; }

        .search-btn {
            background: #0b3c5d; 
            color: white; border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold; cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            flex: 0.5;
        }
        .search-btn:hover { background: #ff9900; }
        /* -------------------------------------------------- */

        /* SECTIONS */
        .section { max-width:1200px; margin:50px auto; padding:0 20px; transition: opacity 0.4s ease; }
        .section h2 { margin-bottom:25px; color:#0b3c5d; border-left:5px solid #ff9900; padding-left:15px; }

        /* SLIDERS */
        .slider-container { position:relative; overflow: hidden; padding: 15px 0; }
        .slider-track { display:flex; gap:20px; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1); }

        /* GRID LOGIC KUR KËRKON */
        .is-searching .slider-track {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            transform: none !important; gap: 25px;
        }
        .is-searching .nav-btn { display: none; }

        /* KARTAT */
        .card {
            background:white; border-radius:12px; overflow:hidden;
            box-shadow:0 4px 12px rgba(0,0,0,0.08); transition:0.3s;
            min-width: calc(33.333% - 14px);
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .is-searching .card { min-width: auto; }
        .card:hover { transform:translateY(-8px); box-shadow:0 12px 25px rgba(0,0,0,0.15); }
        .card img { width:100%; height: 210px; object-fit:cover; display: block; }
        
        .card-text { padding:18px; }
        .card-text h3 { margin: 0 0 8px 0; color: #0b3c5d; font-size: 19px; }
        .price-tag { color: #ff9900; font-weight: bold; font-size: 18px; display: block; margin-top: 10px; }
        .stars { color: #ff9900; margin-bottom: 5px; letter-spacing: 2px; }

        /* NAV BUTTONS */
        .nav-btn {
            position:absolute; top:50%; transform:translateY(-50%);
            background:white; border:none; width:45px; height:45px; 
            border-radius:50%; cursor:pointer; z-index:10; font-size:22px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2); transition: 0.3s;
        }
        .nav-btn:hover { background: #ff9900; color: white; }
        .prev-btn { left:5px; }
        .next-btn { right:5px; }

        footer { background: #0b3c5d; color: white; padding: 40px; text-align: center; margin-top: 60px; }

        /* Auth Buttons */
        .auth-btn { text-decoration: none; color: white; font-size: 14px; font-weight: bold; padding: 8px 18px; border-radius: 6px; transition: 0.3s; }
        .auth-btn:hover { color: #ff9900; }
        .signup { background: #ff9900; color: #0b3c5d !important; }
        .signup:hover { background: #e68a00; transform: scale(1.05); }

        @media(max-width:900px) {
            .nav-links, .nav-right { display: none; } 
            .search-row { flex-direction: column; }
            .card { min-width: 100%; }
            nav { padding: 15px 20px; }
            .hero h1 { font-size: 28px; }
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-left">
        <h2>Star Travel</h2>
    </div>
    
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="destinacione.php">Destinacionet</a></li>
        <li><a href="hotelet.php">Hotelet</a></li>
         <li><a href="Untitled-1.php">Rreth Nesh</a></li> 
        <li><a href="kontakt.php">Kontakt</a></li>
        
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li><a href="admin_dashboard.php" style="color: #ff9900; font-weight: bold;">Dashboard</a></li>
        <?php endif; ?>
    </ul>

    <div class="nav-right">
        <?php if(isset($_SESSION['username'])): ?>
            <a href="logout.php" class="auth-btn">Dil (<?php echo $_SESSION['username']; ?>)</a>
        <?php else: ?>
            <a href="login.php" class="auth-btn">Login</a>
            <a href="signup.php" class="auth-btn signup">Sign up</a>
        <?php endif; ?>
    </div>
</nav>

<div class="hero">
    <h1>Eksploro Shqipërinë</h1>
    
    <div class="search-panel">
        <div class="search-row">
            <input type="text" id="searchInput" class="input-main" placeholder="Ku dëshiron të shkosh? (Vlorë, Korçë...)" onkeyup="runAdvancedSearch()">
            
            <select id="catFilter" class="input-sub" onchange="runAdvancedSearch()">
                <option value="all">Kategoria</option>
                <option value="det">Bregdet</option>
                <option value="kultur">Kulturë</option>
            </select>
            
            <select id="priceFilter" class="input-sub" onchange="runAdvancedSearch()">
                <option value="all">Çmimi</option>
                <option value="cheap">Ekonomike</option>
                <option value="expensive">Premium</option>
            </select>
            
            <button class="search-btn" onclick="runAdvancedSearch()">Kërko</button>
        </div>
    </div>
</div>

<div class="section" id="destSectionWrap">
    <h2 id="sectionTitle">Destinacione të Sugjeruara</h2>
    <div class="slider-container" id="sliderUI">
        <button class="nav-btn prev-btn" onclick="moveSlider('mainTrack', -1)">❮</button>
        <div class="slider-track" id="mainTrack">
            <div class="card" data-cat="det" data-price="40">
                <a href="oferta_vlore.php" style="text-decoration:none; color:inherit;">
                    <img src="https://vloramarina.com/wp-content/uploads/2024/09/vlora-city.jpg">
                    <div class="card-text"><h3>Vlorë - Tour 1 Ditor</h3><p>Plazhe dhe histori mahnitëse.</p><span class="price-tag">40.00 €</span></div>
                </a>
            </div>
            <div class="card" data-cat="kultur" data-price="55">
                <a href="oferta_berat.php" style="text-decoration:none; color:inherit;">
                    <img src="https://mediaim.expedia.com/destination/1/09d08f73decbcc1d561c446634122c0e.jpg">
                    <div class="card-text"><h3>Berat - Qyteti i Gurtë</h3><p>Vizitë në kala dhe lagjet e vjetra.</p><span class="price-tag">55.00 €</span></div>
                </a>
            </div>
            <div class="card" data-cat="det" data-price="85">
                <a href="oferta_riviera.php" style="text-decoration:none; color:inherit;">
                    <img src="https://shqiptarja.com/uploads/780x440/1675800627_aerophotographyviewflyingdrone789162200.jpg">
                    <div class="card-text"><h3>Riviera - Eksplorim</h3><p>Dhërmi, Jali dhe Himara.</p><span class="price-tag">85.00 €</span></div>
                </a>
            </div>
            <div class="card" data-cat="kultur" data-price="45">
                <a href="oferta_korce.php" style="text-decoration:none; color:inherit;">
                    <img src="https://lovealbania.al/wp-content/uploads/2025/11/istockphoto-2025311818-612x612-1.jpg.webp">
                    <div class="card-text"><h3>Korçë - Parisi i Vogël</h3><p>Serenata, traditë dhe kulturë.</p><span class="price-tag">45.00 €</span></div>
                </a>
            </div>
        </div>
        <button class="nav-btn next-btn" onclick="moveSlider('mainTrack', 1)">❯</button>
    </div>
</div>

<div class="section" id="hotelSectionWrap">
    <h2 id="hotelsTitle">Hotele të Rekomanduara</h2>
    <div class="slider-container" id="hotelSliderUI">
        <button class="nav-btn prev-btn" onclick="moveSlider('hotelTrack', -1)">❮</button>
        <div class="slider-track" id="hotelTrack">
            <div class="card hotel-card" data-cat="kultur" data-price="75">
                <a href="hotel-details.php" style="text-decoration:none; color:inherit;">
                    <img src="https://img.directhotels.com/al/korce/bujtina-oxhaku/1.jpg">
                    <div class="card-text"><h3>Bujtina Oxhaku</h3><div class="stars">★★★★☆</div><p>📍 Korçë - Standard</p><span class="price-tag">75.00€ <small>/nata</small></span></div>
                </a>
            </div>
            <div class="card hotel-card" data-cat="kultur" data-price="120">
                <a href="hotel-details.php" style="text-decoration:none; color:inherit;">
                    <img src="https://images.trvl-media.com/lodging/14000000/13270000/13269300/13269268/058c1a23.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill">
                    <div class="card-text"><h3>Hotel Kocibelli Pool & SPA</h3><div class="stars">★★★★★</div><p>📍 Korçë - Premium</p><span class="price-tag">120.00€ <small>/nata</small></span></div>
                </a>
            </div>
            <div class="card hotel-card" data-cat="kultur" data-price="200">
                <a href="hotel-details.php" style="text-decoration:none; color:inherit;">
                    <img src="https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/158313854.jpg?k=c2c18c581c18cd4f8cf9bbd7900da443888838f237a8121dac8c61e3a90adf7c&o=">
                    <div class="card-text"><h3>Hani I Pazarit</h3><div class="stars">★★★★★</div><p>📍 Korçë - Deluxe</p><span class="price-tag">200.00€ <small>/nata</small></span></div>
                </a>
            </div>
            <div class="card hotel-card" data-cat="det" data-price="49">
                <a href="hotel-details.php" style="text-decoration:none; color:inherit;">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/74/33/09/hotel-bologna.jpg?w=900&h=500&s=1">
                    <div class="card-text"><h3>Hotel Bologna</h3><div class="stars">★★★★☆</div><p>📍 Vlorë</p><span class="price-tag">49.00€ <small>/nata</small></span></div>
                </a>
            </div>
        </div>
        <button class="nav-btn next-btn" onclick="moveSlider('hotelTrack', 1)">❯</button>
    </div>
</div>

<footer>
    <p>© 2026 Star Travel – Eksperienca juaj fillon këtu</p>
</footer>

<script>
let sliderPositions = { mainTrack: 0, hotelTrack: 0 };

function runAdvancedSearch() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cat = document.getElementById('catFilter').value;
    let priceRange = document.getElementById('priceFilter').value;
    
    let allCards = document.querySelectorAll('.card');
    let sliderDest = document.getElementById('sliderUI');
    let sliderHotels = document.getElementById('hotelSliderUI');
    
    let destWrap = document.getElementById('destSectionWrap');
    let hotelWrap = document.getElementById('hotelSectionWrap');
    
    let destCount = 0;
    let hotelCount = 0;

    allCards.forEach(card => {
        let cardText = card.innerText.toLowerCase();
        let cardCat = card.getAttribute('data-cat');
        let cardPrice = parseFloat(card.getAttribute('data-price'));
        
        let matchTxt = cardText.includes(input);
        let matchCat = (cat === "all" || cardCat === cat);
        let matchPrice = true;
        
        if(priceRange === "cheap") matchPrice = (cardPrice <= 60);
        if(priceRange === "expensive") matchPrice = (cardPrice > 60);

        if (matchTxt && matchCat && matchPrice) {
            card.style.display = "block";
            if(card.classList.contains('hotel-card')) hotelCount++; else destCount++;
        } else {
            card.style.display = "none";
        }
    });

    if (input !== "" || cat !== "all" || priceRange !== "all") {
        sliderDest.classList.add('is-searching');
        sliderHotels.classList.add('is-searching');
        destWrap.style.display = (destCount > 0) ? "block" : "none";
        hotelWrap.style.display = (hotelCount > 0) ? "block" : "none";
        document.getElementById('sectionTitle').innerText = "📍 Rezultatet: Ture (" + destCount + ")";
        document.getElementById('hotelsTitle').innerText = "🏨 Rezultatet: Hotele (" + hotelCount + ")";
    } else {
        sliderDest.classList.remove('is-searching');
        sliderHotels.classList.remove('is-searching');
        destWrap.style.display = "block";
        hotelWrap.style.display = "block";
        document.getElementById('sectionTitle').innerText = "Destinacione të Sugjeruara";
        document.getElementById('hotelsTitle').innerText = "Hotele të Rekomanduara";
        resetSliders();
    }
}

function moveSlider(trackId, dir) {
    const track = document.getElementById(trackId);
    const cards = Array.from(track.querySelectorAll('.card')).filter(c => c.style.display !== "none");
    if (cards.length === 0) return;

    const visible = window.innerWidth > 768 ? 3 : 1;
    const max = Math.max(0, cards.length - visible);

    sliderPositions[trackId] += dir;
    if (sliderPositions[trackId] > max) sliderPositions[trackId] = 0;
    if (sliderPositions[trackId] < 0) sliderPositions[trackId] = max;

    const cardWidth = cards[0].offsetWidth + 20;
    track.style.transform = `translateX(-${sliderPositions[trackId] * cardWidth}px)`;
}

function resetSliders() {
    sliderPositions.mainTrack = 0;
    sliderPositions.hotelTrack = 0;
    document.getElementById('mainTrack').style.transform = "translateX(0)";
    document.getElementById('hotelTrack').style.transform = "translateX(0)";
}
</script>

</body>
</html>