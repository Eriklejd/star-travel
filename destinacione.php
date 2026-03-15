<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Travel | Destinacione</title>

    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #f4f6f8; color: #333; }

        /* NAV */
        nav {
            background: #0a3d62; color: #fff; padding: 15px 50px;
            display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; z-index: 1000;
        }
        nav h2 { margin: 0; font-size: 24px; color: #ff9900; }
        nav ul { list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { color: #ff9900; }

        /* SEARCH SECTION */
        .search-area {
            background: #0a3d62; padding: 40px 20px; text-align: center; color: white;
        }
        .search-container {
            max-width: 600px; margin: 20px auto 0; position: relative;
        }
        .search-container input {
            width: 100%; padding: 15px 20px; border-radius: 30px; border: none;
            font-size: 16px; outline: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /* SECTION */
        .section { max-width: 1000px; margin: 50px auto; padding: 0 20px; }
        .section h2 { color: #0a3d62; margin-bottom: 30px; border-left: 5px solid #ff9900; padding-left: 15px; }

        /* HORIZONTAL CARDS */
        .card {
            display: flex; background: #fff; border-radius: 14px; overflow: hidden;
            margin-bottom: 25px; box-shadow: 0 8px 20px rgba(0,0,0,.1);
            transition: .3s; animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .card:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0,0,0,.15); }
        .card img { width: 300px; height: 200px; object-fit: cover; flex-shrink: 0; }
        
        .card-content { padding: 25px; display: flex; flex-direction: column; justify-content: center; flex-grow: 1; }
        .card-content h3 { margin: 0; font-size: 22px; color: #0a3d62; }
        .card-content p { margin: 10px 0; color: #555; line-height: 1.6; }
        .card-content a {
            background: #ff9900; color: #fff; padding: 10px 20px; border-radius: 6px;
            text-decoration: none; font-weight: 600; width: fit-content; transition: 0.3s;
        }
        .card-content a:hover { background: #e68900; }

        #noResults { display: none; text-align: center; padding: 40px; color: #777; font-size: 18px; }

        /* FOOTER */
        footer { background: #0a3d62; color: #fff; margin-top: 70px; padding: 40px 20px; text-align: center; }

        @media(max-width:768px){
            .card { flex-direction: column; }
            .card img { width: 100%; height: 180px; }
            nav { padding: 15px 20px; flex-direction: column; gap: 10px; }
        }
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

<div class="search-area">
    <h1>Eksploro Destinacionet tona</h1>
    <div class="search-container">
        <input type="text" id="destSearch" placeholder="Kërko destinacionin (p.sh. Sarandë, Berat...)" onkeyup="filterDestinations()">
    </div>
</div>

<div class="section">
    <h2 id="resultsTitle">Të gjitha paketat</h2>
    
    <div id="destList">
        <div class="card" data-name="sarande ksamil">
            <img src="https://mediaim.expedia.com/destination/1/4acd8f8cca60ce508b3021b81f8c8f1e.jpg">
            <div class="card-content">
                <h3>Sarandë & Ksamil</h3>
                <p>Plazhe kristal, vizitë në Butrint dhe Syri i Kaltër. Paketa 3 ditore.</p>
                <a href="oferta_sarande.php">Shiko ofertën</a>
            </div>
        </div>

        <div class="card" data-name="gjirokaster histori">
            <img src="https://ata.gov.al/wp-content/uploads/2021/03/gjirokastra-unesco-tour1.jpg">
            <div class="card-content">
                <h3>Gjirokastër</h3>
                <p>Qyteti i gurtë, pasuri e UNESCO-s. Vizitë në Kalanë e Argjiros dhe pazarin karakteristik.</p>
                <a href="oferta_gjirokaster.php">Shiko ofertën</a>
            </div>
        </div>

        <div class="card" data-name="vlore karaburun sazan">
            <img src="https://vloramarina.com/wp-content/uploads/2024/09/vlora-city.jpg">
            <div class="card-content">
                <h3>Vlorë</h3>
                <p>Udhëtim me varkë në Karaburun dhe Sazan. Det dhe histori në një tur 1 ditor.</p>
                <a href="oferta_vlore.php">Shiko ofertën</a>
            </div>
        </div>

        <div class="card" data-name="riviera dhermi himare">
            <img src="https://shqiptarja.com/uploads/780x440/1675800627_aerophotographyviewflyingdrone789162200.jpg">
            <div class="card-content">
                <h3>Riviera Shqiptare</h3>
                <p>Eksplorimi i Dhërmiut dhe Himarës. Paketa më e mirë për verën.</p>
                <a href="oferta_riviera.php">Shiko ofertën</a>
            </div>
        </div>

        <div class="card" data-name="korce voskopoje">
            <img src="https://lovealbania.al/wp-content/uploads/2025/11/istockphoto-2025311818-612x612-1.jpg.webp">
            <div class="card-content">
                <h3>Korçë & Voskopojë</h3>
                <p>Kulturë, serenata dhe gastronomi. Shijo dimrin dhe traditën në Korçë.</p>
                <a href="oferta_korce.php">Shiko ofertën</a>
            </div>
        </div>

        <div class="card" data-name="berat histori unesco">
            <img src="https://mediaim.expedia.com/destination/1/09d08f73decbcc1d561c446634122c0e.jpg">
            <div class="card-content">
                <h3>Berat</h3>
                <p>Qyteti i një mbi një dritareve. Trashëgimi botërore e UNESCO-s.</p>
                <a href="oferta_berat.php">Shiko ofertën</a>
            </div>
        </div>
    </div>

    <div id="noResults">Nuk u gjet asnjë destinacion me këtë emër.</div>
</div>

<footer>
    <p>© 2026 Star Travel – Të gjitha të drejtat e rezervuara</p>
</footer>

<script>
    function filterDestinations() {
        let input = document.getElementById('destSearch').value.toLowerCase();
        let cards = document.getElementsByClassName('card');
        let noResults = document.getElementById('noResults');
        let visibleCount = 0;

        for (let i = 0; i < cards.length; i++) {
            let name = cards[i].getAttribute('data-name');
            if (name.includes(input)) {
                cards[i].style.display = "flex";
                visibleCount++;
            } else {
                cards[i].style.display = "none";
            }
        }

        if (visibleCount === 0) {
            noResults.style.display = "block";
            document.getElementById('resultsTitle').innerText = "Rezultatet (0)";
        } else {
            noResults.style.display = "none";
            document.getElementById('resultsTitle').innerText = input === "" ? "Të gjitha paketat" : "Rezultatet (" + visibleCount + ")";
        }
    }
</script>

</body>
</html>