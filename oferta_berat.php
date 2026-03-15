<?php
require "db_connect.php";
session_start();

// Marrim hotelet e Beratit nga DB
$hotels = [];
$query = "SELECT id, name, price FROM hotels WHERE name IN ('Hotel Mangalemi', 'Hotel Colombo', 'Hotel Rezidenca Desaret')";
$result = mysqli_query($conn, $query);

if ($result) {
    while($row = mysqli_fetch_assoc($result)){ $hotels[] = $row; }
}

if (empty($hotels)) {
    $hotels = [
        ['id'=>30, 'name'=>'Hotel Mangalemi', 'price'=>40],
        ['id'=>31, 'name'=>'Hotel Colombo', 'price'=>60],
        ['id'=>32, 'name'=>'Hotel Rezidenca Desaret', 'price'=>45]
    ];
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Berati – Qyteti i 1001 Dritareve | Star Travel</title>
<style>
body { margin:0; font-family: 'Segoe UI', Arial, sans-serif; background:#f4f6f8; color: #333; }

/* NAVBAR */
nav { background:#000; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1000; }
nav h2 { color:#fff; margin:0; }
nav ul { list-style:none; display:flex; gap:20px; margin:0; padding:0; }
nav ul li a { color:#fff; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; transition: 0.3s; }
nav ul li a:hover, .active { background:#ff9900; }

/* HERO */
.hero-tour { height:420px; background:url('https://albaniannight.com/wp-content/uploads/2025/02/iStock-2170503362-scaled.jpg') center/cover no-repeat; position:relative; }
.hero-tour::after { content:""; position:absolute; inset:0; background:rgba(0,0,0,0.45); }
.hero-content { position:absolute; bottom:40px; left:60px; color:white; z-index:1; }
.hero-content h1 { font-size:42px; margin:0; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }

/* LAYOUT */
.tour-container { max-width:1200px; margin:40px auto; display:grid; grid-template-columns:2.5fr 1fr; gap:30px; padding:0 20px; }
.tour-main { background:white; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.05); }

.gallery-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-bottom:30px; }
.gallery-grid img { width:100%; height:200px; object-fit:cover; border-radius:8px; transition: 0.3s; }
.gallery-grid img:hover { transform: scale(1.03); }

.day { margin:25px 0; border-left: 4px solid #ff6b35; padding-left:20px; }
.day h3 { color:#ff6b35; margin:0 0 10px 0; font-size: 20px; }

/* SIDEBAR */
.tour-sidebar { background:white; padding:30px; border-radius:12px; box-shadow:0 8px 25px rgba(0,0,0,0.1); position:sticky; top:100px; height:fit-content; border-top: 5px solid #ff6b35; }
.price-label { font-size: 14px; color: #777; }
.price { font-size:36px; color:#ff6b35; font-weight:bold; }

label { display:block; margin-top:15px; font-weight:bold; font-size: 13px; color: #555; }
input, select { width:100%; padding:12px; margin-top:8px; border:1px solid #ddd; border-radius:6px; font-size: 14px; }

.room-config { margin-top:15px; padding:15px; border:1px solid #edf2f7; border-radius:10px; background:#f8fafc; position:relative; }
.remove-room { color:#e53e3e; font-size:12px; cursor:pointer; float:right; font-weight: bold; text-decoration: underline; }
.add-room-btn { width:100%; margin-top:15px; padding:10px; cursor:pointer; background:#fff; border:2px dashed #cbd5e0; border-radius: 6px; color: #4a5568; font-weight:bold; }
.book-btn { display:block; margin-top:25px; padding:15px; text-align:center; background:#ff6b35; color:white; font-weight:bold; text-decoration:none; border-radius:8px; font-size: 18px; transition: 0.3s; }
.book-btn:hover { background:#e85a2a; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255,107,53,0.3); }

/* FOOTER */
footer { background: #1a1a1a; color: #ffffff; padding: 60px 0 20px 0; margin-top: 50px; }
.footer-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr 1fr; gap: 40px; padding: 0 20px; }
.footer-section h3 { color: #ff6b35; margin-bottom: 20px; font-size: 22px; }
.footer-section h4 { color: #ffffff; margin-bottom: 20px; font-size: 18px; border-bottom: 2px solid #ff6b35; display: inline-block; padding-bottom: 5px; }
.footer-section p { color: #d1d1d1; line-height: 1.6; font-size: 15px; }
.footer-section ul { list-style: none; padding: 0; }
.footer-section ul li a { color: #ffffff; text-decoration: none; transition: 0.3s ease; font-size: 15px; display: block; margin-bottom: 10px; }
.footer-section ul li a:hover { color: #ff9900; padding-left: 8px; }
.footer-bottom { text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #333; font-size: 14px; color: #aaaaaa; }
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
    <h1>Berati – Trashëgimi Botërore UNESCO</h1>
    <p>2 Ditë | Histori, Kulturë & Natyrë</p>
  </div>
</div>

<div class="tour-container">
  <div class="tour-main">
    <div class="gallery-grid">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnNGl41plIMRioZbhZQQHTQInx3PoGVT0hdQ&s">
      <img src="https://images.trvl-media.com/place/6149810/0b38caf5-c395-4000-abe8-1fadc0d58627.jpg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRA5lnE04feH32Z-OfYKLABAgsyBlkHEfOjSA&s">
    </div>

    <div class="itinerary">
      <h2>Itinerari</h2>
      <div class="day">
        <h3>Dita 1: Historia e "1001 Dritareve"</h3>
        <p>► <strong>Kalaja e Beratit</strong> – Vizitë në kalanë e banuar dhe lagjen Mangalem.</p>
        <p>► <strong>Ura e Goricës</strong> – Shëtitje në urën historike dhe lagjen Goricë.</p>
      </div> 
      <div class="day">
        <h3>Dita 2: Kultura dhe Natyra</h3>
        <p>► <strong>Muzeu Onufri</strong> – Art pasur religjioz dhe ikonografi.</p>
        <p>► <strong>Ujëvara e Bogovës</strong> – Relaks në natyrën e mrekullueshme të zonës.</p>
      </div>
    </div>
  </div>

  <div class="tour-sidebar">
    <p class="price-label">Çmimi për natë nga</p>
    <div class="price" id="basePrice">0,00 €</div>
    <hr style="margin:20px 0; border:0; border-top:1px solid #eee;">
    
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
        <label>Konfigurimi i Dhomave</label>
        <div id="roomsContainer"></div>
        <button class="add-room-btn" onclick="addRoom()">+ Shto një dhomë</button>
    </div>
    <hr style="margin:20px 0; border:0; border-top:1px solid #eee;">
    <p style="margin:0; font-weight:bold; color:#777;">Gjithsej:</p>
    <p id="total" class="price" style="font-size:32px; margin-top:5px;">0,00 €</p>
    <a href="#" class="book-btn" onclick="goToCheckout(event)">Rezervo tani</a>
  </div>
</div>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Star Travel</h3>
            <p>Zbuloni bukurinë e Shqipërisë me turet tona profesionale. Eksperienca unike të garantuara.</p>
        </div>
        <div class="footer-section">
            <h4>Linqe të shpejta</h4>
            <ul>
                <li><a href="home.php">Kreu i Faqes</a></li>
                <li><a href="rreth_nesh.php">Rreth Nesh</a></li>
                <li><a href="kontakt.php">Na Kontaktoni</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Kontakt</h4>
            <p>📍 Adresa: Vlorë, Shqipëri</p>
            <p>✉️ Email: info@startravel.al</p>
            <p>📞 Tel: +355 6X XX XX XXX</p>
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

function enableHotel(){ document.getElementById('hotel').disabled=false; }

function hotelChanged(){
    const sel = document.getElementById('hotel');
    if(sel.value===""){ 
        document.getElementById('roomsSection').style.display="none"; 
        hotelPrice=0; rooms=[]; 
    } else { 
        hotelPrice=parseFloat(sel.selectedOptions[0].dataset.price); 
        document.getElementById('basePrice').innerText=hotelPrice.toFixed(2)+" €"; 
        document.getElementById('roomsSection').style.display="block"; 
        if(rooms.length===0) addRoom(); 
    }
    updateTotal();
}

function addRoom(){ 
    rooms.push({type:"standard", adults:2, children:0}); 
    renderRooms(); 
}

function removeRoom(i){ 
    rooms.splice(i,1); 
    renderRooms(); 
}

function updateRoomData(i,field,value){ 
    rooms[i][field]=(field==='type')?value:parseInt(value); 
    updateTotal(); 
}

function renderRooms(){ 
    const container=document.getElementById('roomsContainer'); 
    container.innerHTML=""; 
    rooms.forEach((r,i)=>{ 
        const div=document.createElement('div'); 
        div.className="room-config"; 
        div.innerHTML=`
            <span class="remove-room" onclick="removeRoom(${i})">Hiqe</span>
            <strong>Dhoma #${i+1}</strong>
            <select onchange="updateRoomData(${i},'type',this.value)" style="margin:10px 0;">
                <option value="standard" ${r.type==='standard'?'selected':''}>Kategoria: Standarde</option>
                <option value="premium" ${r.type==='premium'?'selected':''}>Kategoria: Premium (+20€/natë)</option>
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

// PËRDITËSUAR: updateTotal llogarit totalin bazuar në netë
function updateTotal(){ 
    let total=0; 
    rooms.forEach(r=>{ 
        let currentRoomPrice = hotelPrice;
        if(r.type === 'premium') currentRoomPrice += 20; // Shtesa Premium për natë
        
        total += (currentRoomPrice * nights); 
        total += (r.children * 15 * nights); // Shtesa për fëmijët
    }); 
    document.getElementById('total').innerText=total.toFixed(2)+" €"; 
}

function goToCheckout(e){
    e.preventDefault();
    const startDate=document.getElementById('startDate').value;
    const endDate=document.getElementById('endDate').value;
    const hotelSelect=document.getElementById('hotel');
    
    if(!startDate || !endDate || !hotelSelect.value || nights===0){ alert("Ju lutem plotësoni datat dhe hotelin!"); return; }

    const booking={ 
        startDate:startDate,
        endDate:endDate,
        nights:nights,
        selectedHotel:{ name:hotelSelect.options[hotelSelect.selectedIndex].text, price: hotelPrice }, 
        rooms:rooms, 
        total:document.getElementById('total').innerText 
    };

    const form=document.createElement("form"); 
    form.method="POST"; 
    form.action="checkout.php";
    const input=document.createElement("input"); 
    input.type="hidden"; 
    input.name="booking"; 
    input.value=JSON.stringify(booking);
    form.appendChild(input); 
    document.body.appendChild(form); 
    form.submit();
}
</script>
</body>
</html>