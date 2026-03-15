<?php
require "db_connect.php";
session_start();

// Marrim hotelet e Gjirokastrës nga DB
$hotels = [];
$query = "SELECT id, name, price FROM hotels WHERE name IN ('Hotel Gjirokastra', 'Hotel Argjiro', 'Hotel Kalemi')";
$result = mysqli_query($conn, $query);

if ($result) {
    while($row = mysqli_fetch_assoc($result)){ $hotels[] = $row; }
}

// Fallback nëse DB është bosh
if (empty($hotels)) {
    $hotels = [
        ['id'=>20, 'name'=>'Hotel Gjirokastra', 'price'=>45],
        ['id'=>21, 'name'=>'Hotel Argjiro', 'price'=>55],
        ['id'=>22, 'name'=>'Hotel Kalemi', 'price'=>40]
    ];
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Gjirokastër – Qyteti i Gurit | Star Travel</title>
<style>
body { margin:0; font-family:'Segoe UI', Arial, sans-serif; background:#f4f6f8; }

/* NAVBAR */
nav { background:#000; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1000; }
nav h2 { color:#fff; margin:0; }
nav ul { list-style:none; display:flex; gap:20px; margin:0; padding:0; }
nav ul li a { color:#fff; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; }
nav ul li a:hover, .active { background:#ff9900; }

/* HERO */
.hero-tour { height:420px; background:url('https://upload.wikimedia.org/wikipedia/commons/1/16/Gjirokaster_2016-2017.jpg') center/cover no-repeat; position:relative; }
.hero-tour::after { content:""; position:absolute; inset:0; background:rgba(0,0,0,0.45); }
.hero-content { position:absolute; bottom:40px; left:60px; color:white; z-index:1; }
.hero-content h1 { font-size:42px; margin:0; }

/* LAYOUT */
.tour-container { max-width:1200px; margin:40px auto; display:grid; grid-template-columns:2.5fr 1fr; gap:30px; padding:0 20px; }
.tour-main { background:white; padding:30px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1); }
.gallery { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-bottom:30px; }
.gallery img { width:100%; height:180px; object-fit:cover; border-radius:6px; }
.day { margin:20px 0; border-left: 4px solid #ff6b35; padding-left:15px; }
.day h3 { color:#ff6b35; margin-bottom:5px; }

/* SIDEBAR */
.tour-sidebar { background:white; padding:25px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); position:sticky; top:80px; height:fit-content; border-top: 5px solid #ff6b35; }
.price { font-size:32px; color:#ff6b35; font-weight:bold; }
label { display:block; margin-top:15px; font-weight:bold; font-size:13px; color:#555; }
input, select { width:100%; padding:10px; margin-top:5px; border:1px solid #ddd; border-radius:6px; }

.room-config { margin-top:15px; padding:15px; border:1px solid #edf2f7; border-radius:10px; background:#f9f9f9; position:relative; }
.remove-room { color:#e53e3e; font-size:11px; cursor:pointer; float:right; text-decoration:underline; font-weight:bold; }
.add-room-btn { width:100%; margin-top:10px; padding:10px; cursor:pointer; background:#f0f0f0; border:1px dashed #777; font-weight:bold; border-radius:6px; }
.book-btn { display:block; margin-top:20px; padding:15px; text-align:center; background:#ff6b35; color:white; font-weight:bold; text-decoration:none; border-radius:8px; transition: 0.3s; }
.book-btn:hover { background:#e85a2a; transform: translateY(-2px); }

/* FOOTER */
footer { background:#2c3e50; color:white; padding:60px 0 20px 0; margin-top:50px; }
.footer-container { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:40px; padding:0 20px; }
.footer-section h3 { color:#ff6b35; margin-bottom:20px; }
.footer-bottom { text-align:center; margin-top:40px; padding-top:20px; border-top:1px solid #3e4f5f; font-size:13px; color:#7f8c8d; }
</style>
</head>
<body>

<nav>
  <h2>Star Travel</h2>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="rreth_nesh.php">Rreth Nesh</a></li>
    <li><a href="kontakt.php">Kontakt</a></li>
    <li><a href="regjistrohu.php">Sign up/Log in</a></li>
  </ul>
</nav>

<div class="hero-tour">
  <div class="hero-content">
    <h1>Udhëtim në Gjirokastër</h1>
    <p>📍 Destinacionet: Gjirokastër - Liqeni i Viroit - Tepelenë</p>
  </div>
</div>

<div class="tour-container">
  <div class="tour-main">
    <div class="gallery">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7oTkmCFhU2iTTNk-T5F9P8YuoVtWpT4Et8Q&s">
      <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/07/11/16/gjirokaster-view.jpg">
      <img src="https://albaniannight.com/wp-content/uploads/2025/02/AdobeStock_688193132-scaled.jpeg">
    </div>

    <div class="itinerary">
      <h2>Itinerari</h2>
      <div class="day">
        <h3>Dita 1: Historia e Gurit</h3>
        <p>Kështjella e Gjirokastrës, Pazari i Vjetër dhe vizitë në Shtëpitë-Muze (Kadare dhe Skëndulatët).</p>
      </div>
      <div class="day">
        <h3>Dita 2: Natyra dhe Shija</h3>
        <p>Mëngjesi me qifqi tradicionale, vizitë në Liqenin e Viroit dhe ndalesë në Tepelenë gjatë kthimit.</p>
      </div>
    </div>
  </div>

  <div class="tour-sidebar">
    <p>Çmimi për natë nga</p>
    <div class="price" id="basePrice">0,00 €</div>
    
    <hr>
    <label>Data e fillimit</label>
    <input type="date" id="startDate" min="<?=date('Y-m-d')?>" onchange="calculateNights()">
    
    <label>Data e mbarimit</label>
    <input type="date" id="endDate" min="<?=date('Y-m-d', strtotime('+1 day'))?>" onchange="calculateNights()">
    
    <p style="margin-top:10px;">Netë: <strong id="nightsCount">0</strong></p>
    
    <label>Zgjidh Hotelin</label>
    <select id="hotel" disabled onchange="hotelChanged()">
      <option value="">Zgjidh hotelin</option>
      <?php foreach($hotels as $h): ?>
        <option value="<?=$h['id']?>" data-price="<?=$h['price']?>"><?=$h['name']?></option>
      <?php endforeach; ?>
    </select>
    
    <div id="roomsSection" style="display:none;">
        <label>Dhomat</label>
        <div id="roomsContainer"></div>
        <button class="add-room-btn" onclick="addRoom()">+ Shto Dhomë</button>
    </div>
    <hr>
    <p><strong>Total:</strong></p>
    <p id="total" class="price" style="font-size:28px;">0,00 €</p>
    <a href="#" class="book-btn" onclick="goToCheckout(event)">Rezervo tani</a>
  </div>
</div>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Star Travel</h3>
            <p>Zbuloni bukurinë e Shqipërisë me turet tona profesionale.</p>
        </div>
        <div class="footer-section">
            <h4>Linqe</h4>
            <p>Home | Rreth Nesh | Kontakt</p>
        </div>
        <div class="footer-section">
            <h4>Na kontaktoni</h4>
            <p>📍 Vlorë, Shqipëri | info@startravel.al</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Star Travel. Të gjitha të drejtat e rezervuara.</p>
    </div>
</footer>

<script>
let rooms = [];
let hotelPrice = 0;
let nights = 0;

// SHTUAR: Funksioni për kalkulimin e netëve
function calculateNights() {
    const start = new Date(document.getElementById('startDate').value);
    const end = new Date(document.getElementById('endDate').value);
    
    if (start && end && end > start) {
        const diffTime = Math.abs(end - start);
        nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        document.getElementById('nightsCount').innerText = nights;
        document.getElementById('hotel').disabled = false;
        updateTotal();
    } else {
        nights = 0;
        document.getElementById('nightsCount').innerText = 0;
        document.getElementById('hotel').disabled = true;
    }
}

function hotelChanged() {
    const sel = document.getElementById('hotel');
    if(sel.value === "") { 
        document.getElementById('roomsSection').style.display = "none"; 
        hotelPrice = 0; 
        rooms = []; 
    } else { 
        hotelPrice = parseFloat(sel.selectedOptions[0].dataset.price); 
        document.getElementById('basePrice').innerText = hotelPrice.toFixed(2) + " €"; 
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
            <select onchange="updateRoomData(${i},'type',this.value)" style="margin:8px 0;">
                <option value="standard" ${r.type==='standard'?'selected':''}>Kategoria: Standarde</option>
                <option value="premium" ${r.type==='premium'?'selected':''}>Kategoria: Premium (+25€/natë)</option>
            </select>
            <div style="display:flex; gap:5px;">
                <input type="number" min="1" value="${r.adults}" oninput="updateRoomData(${i},'adults',this.value)" title="Të rritur">
                <input type="number" min="0" value="${r.children}" oninput="updateRoomData(${i},'children',this.value)" title="Fëmijë">
            </div>`; 
        container.appendChild(div); 
    }); 
    updateTotal(); 
}

// PËRDITËSUAR: updateTotal llogarit totalin bazuar në netë
function updateTotal() { 
    let total = 0; 
    rooms.forEach(r => { 
        let currentRoomPrice = hotelPrice;
        if(r.type === 'premium') currentRoomPrice += 25; // Shtesa për Gjirokastrën për natë
        
        total += (currentRoomPrice * nights); 
        total += (r.children * 10 * nights); // Shtesa për fëmijët
    }); 
    document.getElementById('total').innerText = total.toFixed(2) + " €"; 
}

function goToCheckout(e) {
    e.preventDefault();
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const hotelSelect = document.getElementById('hotel');
    const hotelId = hotelSelect.value;
    
    if(!startDate || !endDate || !hotelId || nights === 0) { 
        alert("Ju lutem zgjidhni datat e sakta dhe hotelin."); 
        return; 
    }

    const booking = { 
        startDate: startDate,
        endDate: endDate,
        nights: nights,
        selectedHotel: {id: hotelId, name: hotelSelect.options[hotelSelect.selectedIndex].text, price: hotelPrice}, 
        rooms: rooms, 
        total: document.getElementById('total').innerText 
    };

    const form = document.createElement("form"); 
    form.method = "POST"; 
    form.action = "checkout.php";
    const input = document.createElement("input"); 
    input.type = "hidden"; 
    input.name = "booking"; 
    input.value = JSON.stringify(booking);
    
    form.appendChild(input); 
    document.body.appendChild(form); 
    form.submit();
}
</script>
</body>
</html>