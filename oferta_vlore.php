<?php
require "db_connect.php"; 

$hotels = [];
$query = "SELECT id, name, price FROM hotels WHERE name IN ('Hotel Bologna', 'Hotel Miramare', 'Hotel Vlora Priam')";
$result = mysqli_query($conn, $query);

if ($result) {
    while($row = mysqli_fetch_assoc($result)){
        $hotels[] = $row;
    }
}

// Nëse databaza është bosh, përdorim këto vlera si fallback
if (empty($hotels)) {
    $hotels = [
        ['id'=>1, 'name'=>'Hotel Bologna', 'price'=>49],
        ['id'=>2, 'name'=>'Hotel Miramare', 'price'=>85],
        ['id'=>3, 'name'=>'Hotel Vlora Priam', 'price'=>110]
    ];
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Vlorë – Karaburun – Sazan | Star Travel</title>
<style>
    body { margin:0; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f6f8; color: #333; }
    nav { background:#000; padding:15px 40px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1000; }
    nav h2 { color:#fff; margin:0; letter-spacing: 1px; }
    nav ul { list-style:none; display:flex; gap:25px; margin:0; padding:0; }
    nav ul li a { color:#fff; text-decoration:none; font-weight:bold; font-size: 14px; transition: 0.3s; }
    nav ul li a:hover, .active { color:#ff9900; }

    .hero-tour { height:400px; background:url('https://wia.al/wp-content/uploads/2024/08/Albanien-Reise-Urlaub-Vlora.jpg') center/cover no-repeat; position:relative; }
    .hero-tour::after { content:""; position:absolute; inset:0; background:rgba(0,0,0,0.4); }
    .hero-content { position:absolute; bottom:50px; left:60px; color:white; z-index:1; }
    .hero-content h1 { font-size:48px; margin:0; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }

    .tour-container { max-width:1200px; margin:40px auto; display:grid; grid-template-columns:2.5fr 1fr; gap:30px; padding:0 20px; }
    .tour-main { background:white; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.05); }
    
    .gallery { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-bottom:30px; }
    .gallery img { width:100%; height:200px; object-fit:cover; border-radius:8px; transition: 0.3s; }
    .gallery img:hover { transform: scale(1.02); }

    .day { margin:25px 0; border-left: 4px solid #ff6b35; padding-left:20px; }
    .day h3 { color:#ff6b35; margin:0 0 10px 0; font-size: 20px; }

    .tour-sidebar { background:white; padding:30px; border-radius:12px; box-shadow:0 8px 25px rgba(0,0,0,0.1); position:sticky; top:100px; height:fit-content; border-top: 5px solid #ff6b35; }
    .price-label { font-size: 14px; color: #777; margin-bottom: 5px; }
    .price { font-size:36px; color:#ff6b35; font-weight:bold; margin-bottom: 20px; }
    
    label { display:block; margin-top:15px; font-weight:bold; font-size: 13px; color: #555; }
    input, select { width:100%; padding:12px; margin-top:8px; border:1px solid #ddd; border-radius:6px; font-size: 14px; }
    
    .room-config { margin-top:15px; padding:15px; border:1px solid #edf2f7; border-radius:10px; background:#f8fafc; position:relative; }
    .remove-room { color:#e53e3e; font-size:12px; cursor:pointer; float:right; font-weight: bold; }
    .add-room-btn { width:100%; margin-top:15px; padding:10px; cursor:pointer; background:#fff; border:2px dashed #cbd5e0; border-radius: 6px; color: #4a5568; font-weight:bold; transition: 0.2s; }
    .add-room-btn:hover { background: #edf2f7; }
    
    .book-btn { display:block; margin-top:25px; padding:15px; text-align:center; background:#ff6b35; color:white; font-weight:bold; text-decoration:none; border-radius:8px; font-size: 18px; transition: 0.3s; }
    .book-btn:hover { background:#e85a2a; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255,107,53,0.3); }

    footer { background:#1a202c; color:white; padding:60px 0 30px; margin-top:80px; }
    .footer-container { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:40px; padding:0 20px; }
    .footer-bottom { text-align:center; margin-top:50px; padding-top:20px; border-top:1px solid #2d3748; font-size:14px; color:#a0aec0; }
</style>
</head>
<body>

<nav>
  <h2>Star Travel</h2>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="rreth_nesh.php">Rreth Nesh</a></li>
    <li><a href="kontakt.php">Kontakt</a></li>
    <li><a href="login.php">Log in</a></li>
  </ul>
</nav>

<div class="hero-tour">
  <div class="hero-content">
    <h1>Vlorë – Karaburun – Sazan</h1>
    <p>2 Ditë | Eksperiencë Natyrë & Plazh në Jug</p>
  </div>
</div>

<div class="tour-container">
  <div class="tour-main">
    <div class="gallery">
      <img src="https://adventurealbania.com/wp-content/uploads/2024/06/Vlora-Nimfa-Beach-Hotel.jpg">
      <img src="https://lirp.cdn-website.com/560b6587/dms3rep/multi/opt/image8-1f6301b7-640w.png">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs0UrwAtZM_6xfbET42lH-hTX3yIXw7KqVDg&s">
    </div>

    <div class="itinerary">
      <h2>Itinerari Detajuar</h2>
      <div class="day">
        <h3>Dita 1: Lundrimi drejt Karaburunit</h3>
        <p>Nisja në mëngjes drejt Vlorës. Lundrim me skaf drejt Gjirit të Gramës dhe Shpellës së Haxhi Aliut. Akomodimi në hotelin e përzgjedhur.</p>
      </div>
      <div class="day">
        <h3>Dita 2: Llogara & Kthimi</h3>
        <p>Mëngjesi në hotel. Vizitë në Parkun Kombëtar të Llogarasë për foto dhe drekë tradicionale. Kthimi në mbrëmje.</p>
      </div>
    </div>
  </div>

  <div class="tour-sidebar">
    <p class="price-label">Çmimi për natë</p>
    <div class="price" id="basePrice">0.00 €</div>
    
    <label>Data e fillimit</label>
    <input type="date" id="startDate" min="<?=date('Y-m-d')?>" onchange="calculateNights()">
    
    <label>Data e mbarimit</label>
    <input type="date" id="endDate" min="<?=date('Y-m-d', strtotime('+1 day'))?>" onchange="calculateNights()">
    
    <label>Zgjidh Hotelin</label>
    <select id="hotel" disabled onchange="hotelChanged()">
      <option value="">-- Zgjidhni një opsion --</option>
      <?php foreach($hotels as $h): ?>
        <option value="<?=$h['id']?>" data-price="<?=$h['price']?>"><?=$h['name']?></option>
      <?php endforeach; ?>
    </select>
    
    <div id="roomsSection" style="display:none;">
        <label>Konfigurimi i Dhomave</label>
        <div id="roomsContainer"></div>
        <button class="add-room-btn" onclick="addRoom()">+ Shto një dhomë tjetër</button>
    </div>

    <hr style="margin:20px 0; border:0; border-top:1px solid #eee;">
    <p style="margin:0; font-weight:bold; color:#777;">Gjithsej për të paguar:</p>
    <p id="total" class="price" style="font-size:32px; margin-top:5px;">0.00 €</p>
    
    <a href="#" class="book-btn" onclick="goToCheckout(event)">Konfirmo Rezervimin</a>
  </div>
</div>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Star Travel</h3>
            <p>Udhëtimi juaj i radhës fillon këtu. Eksploroni destinacionet më të bukura shqiptare.</p>
        </div>
        <div class="footer-section">
            <h4>Linqe</h4>
            <ul>
                <li><a href="home.php">Kreu</a></li>
                <li><a href="#">Paketat Turistike</a></li>
                <li><a href="kontakt.php">Support 24/7</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Kontakt</h4>
            <p>📍 Sheshi Flamurit, Vlorë</p>
            <p>📞 +355 6X XX XX XXX</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Star Travel. Realizuar për eksperienca unike.</p>
    </div>
</footer>

<script>
let rooms = [];
let hotelPricePerNight = 0;
let nights = 0;

function calculateNights() {
    const startInput = document.getElementById('startDate').value;
    const endInput = document.getElementById('endDate').value;
    const hotelSelect = document.getElementById('hotel');

    if (startInput && endInput) {
        const start = new Date(startInput);
        const end = new Date(endInput);
        
        if (end > start) {
            const diffTime = Math.abs(end - start);
            nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            hotelSelect.disabled = false;
            hotelChanged();
        } else {
            alert("Data e mbarimit duhet të jetë pas datës së fillimit.");
            hotelSelect.disabled = true;
            nights = 0;
            updateTotal();
        }
    }
}

function hotelChanged() {
    const sel = document.getElementById('hotel');
    if(sel.value === "" || nights === 0) { 
        document.getElementById('roomsSection').style.display = "none"; 
        hotelPricePerNight = 0; 
        rooms = []; 
    } else { 
        hotelPricePerNight = parseFloat(sel.selectedOptions[0].dataset.price); 
        document.getElementById('basePrice').innerText = hotelPricePerNight.toFixed(2) + " €"; 
        document.getElementById('roomsSection').style.display = "block"; 
        if(rooms.length === 0) addRoom(); 
    }
    updateTotal();
}

function addRoom() { 
    rooms.push({type: "standard", adults: 2, children: 0}); 
    renderRooms(); 
}

function removeRoom(i) { 
    rooms.splice(i, 1); 
    renderRooms(); 
}

function updateRoomData(i, field, value) { 
    rooms[i][field] = (field === 'type') ? value : parseInt(value); 
    updateTotal(); 
}

function renderRooms() { 
    const container = document.getElementById('roomsContainer'); 
    container.innerHTML = ""; 
    rooms.forEach((r, i) => { 
        const div = document.createElement('div'); 
        div.className = "room-config"; 
        div.innerHTML = `
            <span class="remove-room" onclick="removeRoom(${i})">Hiqe</span>
            <strong>Dhoma #${i+1}</strong>
            <select onchange="updateRoomData(${i},'type',this.value)" style="margin:10px 0;">
                <option value="standard" ${r.type==='standard'?'selected':''}>Kategoria: Standarde</option>
                <option value="premium" ${r.type==='premium'?'selected':''}>Kategoria: Premium (+30€/natë)</option>
            </select>
            <div style="display:flex; gap:10px;">
                <div style="flex:1">
                    <small>Të rritur</small>
                    <input type="number" min="1" value="${r.adults}" oninput="updateRoomData(${i},'adults',this.value)">
                </div>
                <div style="flex:1">
                    <small>Fëmijë</small>
                    <input type="number" min="0" value="${r.children}" oninput="updateRoomData(${i},'children',this.value)">
                </div>
            </div>`; 
        container.appendChild(div); 
    }); 
    updateTotal(); 
}

function updateTotal() { 
    let total = 0; 
    rooms.forEach(r => { 
        // Çmimi i dhomës * netët
        let roomCost = hotelPricePerNight * nights; 
        
        // Shtesa për premium * netët
        if(r.type === 'premium') roomCost += (30 * nights); 
        
        // Shtesa për fëmijët * netët
        total += roomCost + (r.children * 15 * nights); 
    }); 
    document.getElementById('total').innerText = total.toFixed(2) + " €"; 
}

function goToCheckout(e) {
    e.preventDefault();
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const hotelSelect = document.getElementById('hotel');
    const hotelId = hotelSelect.value;
    
    if(!startDate || !endDate || !hotelId || rooms.length === 0) { 
        alert("Ju lutem plotësoni datat, zgjidhni hotelin dhe dhomat."); 
        return; 
    }

    const booking = { 
        startDate: startDate,
        endDate: endDate,
        nights: nights,
        hotel: hotelSelect.options[hotelSelect.selectedIndex].text, 
        rooms: rooms, 
        total: document.getElementById('total').innerText 
    };

    const form = document.createElement("form"); 
    form.method = "POST"; 
    form.action = "checkout.php";
    const input = document.createElement("input"); 
    input.type = "hidden"; 
    input.name = "booking_data"; 
    input.value = JSON.stringify(booking);
    
    form.appendChild(input); 
    document.body.appendChild(form); 
    form.submit();
}
</script>
</body>
</html>
