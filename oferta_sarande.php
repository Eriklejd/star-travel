<?php
require "db_connect.php"; 
session_start();

// Marrim hotelet e Sarandës nga DB
$hotels = [];
$query = "SELECT id, name, price FROM hotels WHERE name IN ('Hotel Bougainville Bay', 'Hotel Apollon', 'Santa Quaranta Premium Resort')";
$result = mysqli_query($conn, $query);

if ($result) {
    while($row = mysqli_fetch_assoc($result)){ $hotels[] = $row; }
}

// Fallback nese DB nuk ka te dhena
if (empty($hotels)) {
    $hotels = [
        ['id'=>10, 'name'=>'Hotel Bougainville Bay', 'price'=>85],
        ['id'=>11, 'name'=>'Hotel Apollon', 'price'=>100],
        ['id'=>12, 'name'=>'Santa Quaranta Premium Resort', 'price'=>185]
    ];
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Sarandë – Butrint – Ksamil | Star Travel</title>
<style>
body { margin:0; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f6f8; color: #333; }

/* NAVBAR */
nav { background:#000; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1000; }
nav h2 { color:#fff; margin:0; }
nav ul { list-style:none; display:flex; gap:20px; margin:0; padding:0; }
nav ul li a { color:#fff; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; transition: 0.3s; }
nav ul li a:hover, .active { color:#ff9900; }

/* HERO */
.hero-tour { 
    height:420px; 
    background:url('https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcQbOcgHa2TZVfb24TMyqbu4iedo26Nm4KKetJgyk-b0kvWgYxqLjcY7mMZVg-7QPhXoMgHfWz5szGZFgujAIbkklgI&s=19') center/cover no-repeat; 
    position:relative; 
}
.hero-tour::after { content:""; position:absolute; inset:0; background:rgba(0,0,0,0.45); }
.hero-content { position:absolute; bottom:40px; left:60px; color:white; z-index:1; }
.hero-content h1 { font-size:42px; margin:0; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }

/* LAYOUT */
.tour-container { max-width:1200px; margin:40px auto; display:grid; grid-template-columns:2.5fr 1fr; gap:30px; padding:0 20px; }
.tour-main { background:white; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.05); }

.gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px; }
.gallery-grid img { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; transition: 0.3s; }
.gallery-grid img:hover { transform: scale(1.05); }

.day { margin:25px 0; border-left: 4px solid #ff6b35; padding-left:20px; }
.day h3 { color:#ff6b35; margin:0 0 10px 0; font-size: 20px; }

/* SIDEBAR */
.tour-sidebar { background:white; padding:30px; border-radius:12px; box-shadow:0 8px 25px rgba(0,0,0,0.1); position:sticky; top:100px; height:fit-content; border-top: 5px solid #ff6b35; }
.price-label { font-size: 14px; color: #777; margin-bottom: 5px; }
.price { font-size:36px; color:#ff6b35; font-weight:bold; }

label { display:block; margin-top:15px; font-weight:bold; font-size: 13px; color: #555; }
input, select { width:100%; padding:12px; margin-top:8px; border:1px solid #ddd; border-radius:6px; font-size: 14px; }

.room-config { margin-top:15px; padding:15px; border:1px solid #edf2f7; border-radius:10px; background:#f8fafc; position:relative; }
.remove-room { color:#e53e3e; font-size:12px; cursor:pointer; float:right; font-weight: bold; text-decoration: none; }
.add-room-btn { width:100%; margin-top:15px; padding:10px; cursor:pointer; background:#fff; border:2px dashed #cbd5e0; border-radius: 6px; color: #4a5568; font-weight:bold; }
.book-btn { display:block; margin-top:25px; padding:15px; text-align:center; background:#ff6b35; color:white; font-weight:bold; text-decoration:none; border-radius:8px; font-size: 18px; transition: 0.3s; }
.book-btn:hover { background:#e85a2a; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255,107,53,0.3); }

/* FOOTER */
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
    <li><a href="regjistrohu.php">Sign up/Log in</a></li>
  </ul>
</nav>

<div class="hero-tour">
  <div class="hero-content">
    <h1>Sarandë – Butrint – Ksamil</h1>
    <p>2 Ditë | Eksplorim në Perlën e Jonit</p>
  </div>
</div>

<div class="tour-container">
  <div class="tour-main">
    <div class="gallery-grid">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBYomzfqpu2W7H7-CwoIKz7h8Ggbe18NKAkg&s">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSk_vfkJ10RSqHNmR-fb9IL4zZMAgiDw73Jw&s">
        <img src="https://theroad-islife.com/wp-content/uploads/2023/11/Ksamil-Beaches-Aerial-View.jpg">
    </div>

    <div class="itinerary">
      <h2>Itinerari i Udhëtimit</h2>
      <div class="day">
        <h3>Dita 1: Historia & Natyra</h3>
        <p>Vizitë në Kalanë e Gjirokastrës dhe freskia e Syrit të Kaltër. Mbrëmje e lirë në shëtitoren e Sarandës.</p>
      </div>
      <div class="day">
        <h3>Dita 2: Antikiteti & Plazhi</h3>
        <p>Eksplorim në Butrint dhe relaks në ishujt e Ksamilit. Kthimi drejt destinacionit fillestar.</p>
      </div>
    </div>
  </div>

  <div class="tour-sidebar">
    <p class="price-label">Çmimi për natë</p>
    <div class="price" id="basePrice">0,00 €</div>
    <hr style="margin:20px 0; border:0; border-top:1px solid #eee;">
    
    <label>Data e fillimit</label>
    <input type="date" id="startDate" min="<?=date('Y-m-d')?>" onchange="calculateNights()">
    
    <label>Data e mbarimit</label>
    <input type="date" id="endDate" min="<?=date('Y-m-d', strtotime('+1 day'))?>" onchange="calculateNights()">
    
    <label>Zgjidh Hotelin</label>
    <select id="hotel" disabled onchange="hotelChanged()">
      <option value="">-- Zgjidh hotelin --</option>
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
    <p style="margin:0; font-weight:bold; color:#777;">Total:</p>
    <p id="total" class="price" style="font-size:32px; margin-top:5px;">0,00 €</p>
    <a href="#" class="book-btn" onclick="goToCheckout(event)">Rezervo tani</a>
  </div>
</div>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Star Travel</h3>
            <p>Eksploroni perlën e Jonit me turet tona të organizuara profesionalisht.</p>
        </div>
        <div class="footer-section">
            <h4>Linqe</h4>
            <p>Home | Rreth Nesh | Kontakt</p>
        </div>
        <div class="footer-section">
            <h4>Kontakt</h4>
            <p>📍 Sarandë, Shqipëri | info@startravel.al</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Star Travel. Të gjitha të drejtat e rezervuara.</p>
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

function hotelChanged(){
    const sel = document.getElementById('hotel');
    if(sel.value === "" || nights === 0){ 
        document.getElementById('roomsSection').style.display="none"; 
        hotelPricePerNight = 0; 
        rooms = []; 
    } else { 
        hotelPricePerNight = parseFloat(sel.selectedOptions[0].dataset.price); 
        document.getElementById('basePrice').innerText = hotelPricePerNight.toFixed(2) + " €"; 
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
                <option value="premium" ${r.type==='premium'?'selected':''}>Kategoria: Premium (+40€/natë)</option>
            </select>
            <div style="display:flex; gap:5px;">
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

function updateTotal(){ 
    let total=0; 
    rooms.forEach(r=>{ 
        // Çmimi bazohet në netët
        let currentPricePerNight = hotelPricePerNight;
        if(r.type === 'premium') currentPricePerNight += 40; 
        
        total += (currentPricePerNight * nights); 
        total += (r.children * 15 * nights); 
    }); 
    document.getElementById('total').innerText = total.toFixed(2) + " €"; 
}

function goToCheckout(e){
    e.preventDefault();
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const hotelSelect=document.getElementById('hotel');
    
    if(!startDate || !endDate || !hotelSelect.value || rooms.length===0){ alert("Ju lutem plotësoni të gjitha të dhënat!"); return; }

    const booking = {
        startDate: startDate,
        endDate: endDate,
        nights: nights,
        selectedHotel: { 
            name: hotelSelect.options[hotelSelect.selectedIndex].text,
            pricePerNight: hotelPricePerNight 
        },
        rooms: rooms,
        total: document.getElementById('total').innerText
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