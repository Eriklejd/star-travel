<?php
session_start();
// Nëse ke nevojë të marrësh të dhëna nga databaza për hotelin, bëje lidhjen këtu
// require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervimi | Star Travel</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:0; background: #f4f7f9; color: #333; }
        
        /* Navigimi */
        nav { background:#0b3c5d; color:white; padding:15px 50px; display:flex; justify-content:space-between; align-items:center; }
        nav h2 { margin: 0; }
        nav a { color:white; text-decoration:none; margin-left:20px; font-weight: 500; }

        .container { max-width: 1100px; margin: 30px auto; padding: 20px; display: flex; gap: 30px; flex-wrap: wrap; }
        
        /* GALERIA */
        .gallery-container { flex: 2; min-width: 350px; }
        .main-img { width: 100%; border-radius: 12px; height: 450px; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .thumbnails { display: flex; gap: 10px; margin-top: 15px; overflow-x: auto; padding-bottom: 5px; }
        .thumbnails img { width: 100px; height: 75px; object-fit: cover; border-radius: 8px; cursor: pointer; transition: 0.3s; opacity: 0.6; border: 2px solid transparent; }
        .thumbnails img.active { opacity: 1; border: 2px solid #0b3c5d; }
        .thumbnails img:hover { opacity: 1; }

        /* FORMULARI */
        .booking-side { flex: 1; min-width: 320px; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); height: fit-content; border-top: 5px solid #28a745; position: sticky; top: 20px; }
        
        /* PRICE TAG */
        .price-display { background: #e9f7ef; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px dashed #28a745; text-align: center; }
        .price-display span { font-size: 24px; font-weight: bold; color: #218838; }

        .input-group { margin-bottom: 15px; }
        .input-group label { display: block; font-size: 11px; margin-bottom: 5px; color: #666; font-weight: 700; text-transform: uppercase; }
        .input-group input, .input-group select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; font-size: 14px; background: #f9f9f9; }
        .input-group input:focus, .input-group select:focus { outline: none; border-color: #0b3c5d; background: #fff; }
        
        .confirm-btn { background: #28a745; color: white; border: none; width: 100%; padding: 15px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .confirm-btn:hover { background: #218838; }

        .hotel-desc h1 { color: #0b3c5d; margin-bottom: 10px; font-size: 28px; }
        .hotel-desc p { line-height: 1.6; color: #666; }

        /* Stilet per dhomat */
        .room-config { border: 1px solid #eee; padding: 15px; border-radius: 8px; margin-bottom: 15px; background: #fafafa; position: relative; }
        .room-header { font-weight: bold; color: #0b3c5d; margin-bottom: 10px; display: flex; justify-content: space-between; }
        .remove-room { color: #dc3545; cursor: pointer; font-size: 13px; }
        .guest-row { display: flex; gap: 10px; }

        @media (max-width: 768px) { .container { flex-direction: column; } .main-img { height: 300px; } .booking-side { position: static; } }
    </style>
</head>
<body>

<nav>
    <h2>Star Travel</h2>
    <div><a href="hotelet.php">← Kthehu te Hotelet</a></div>
</nav>

<div class="container">
    <div class="gallery-container">
        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d" class="main-img" id="currentImg">
        
        <div class="thumbnails" id="thumbGallery">
            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d" class="active" onclick="changeImg(this)">
            <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457" onclick="changeImg(this)">
            <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7" onclick="changeImg(this)">
        </div>

        <div class="hotel-desc" style="margin-top: 25px;">
            <h1>Hotel Deluxe Tirana</h1>
            <p>Eksperience unike në zemër të qytetit. Dhomat tona ofrojnë komoditet maksimal, Wi-Fi falas, dhe pamje panoramike.</p>
        </div>
    </div>

    <div class="booking-side">
        <div class="price-display">
            Totali: <span id="totalPrice">0 €</span><br>
            <small id="nightsCount">Zgjidhni datat dhe dhomat</small>
        </div>
        
        <form action="checkout.php" method="POST" id="bookingForm">
            <input type="hidden" name="booking[selectedHotel][name]" value="Hotel Deluxe Tirana">
            <input type="hidden" name="booking[total]" id="hiddenTotal" value="0">
            <input type="hidden" name="booking[selectedDate]" id="hiddenDate" value="">

            <h2 style="font-size: 20px; color: #0b3c5d; margin-bottom: 20px;">Detajet e Qëndrimit</h2>

            <div style="display: flex; gap: 10px;">
                <div class="input-group" style="flex: 1;">
                    <label>Hyrja</label>
                    <input type="date" name="hyrja" id="checkin" onchange="calculatePrice()" required>
                </div>
                <div class="input-group" style="flex: 1;">
                    <label>Dalja</label>
                    <input type="date" name="dalja" id="checkout" onchange="calculatePrice()" required>
                </div>
            </div>

            <h2 style="font-size: 20px; color: #0b3c5d; margin-top: 25px; margin-bottom: 15px;">Konfigurimi i Dhomave</h2>
            
            <div id="roomsContainer">
                </div>
            
            <button type="button" onclick="addRoom()" style="background: #e9ecef; border: 1px solid #ced4da; padding: 10px; border-radius: 6px; cursor: pointer; width: 100%; margin-bottom: 20px; font-weight: bold; color: #0b3c5d;">+ Shto një dhomë</button>

            <button type="submit" class="confirm-btn">Vazhdo te Checkout</button>
        </form>
    </div>
</div>

<style>
    /* ... stilet e tua ekzistuese ... */
    
    /* RREGULLIMI: Stilet per dhomat me kuti me te vogla */
    .room-config { border: 1px solid #eee; padding: 15px; border-radius: 8px; margin-bottom: 15px; background: #fafafa; position: relative; }
    .room-header { font-weight: bold; color: #0b3c5d; margin-bottom: 10px; display: flex; justify-content: space-between; }
    .remove-room { color: #dc3545; cursor: pointer; font-size: 13px; }
    
    /* Flexbox per rreshtin e mysafireve */
    .guest-row { display: flex; gap: 10px; }
    
    /* RREGULLIMI: Zvogelimi i inputeve */
    .guest-row .input-group { flex: 1; margin-bottom: 0; }
    .guest-row input { padding: 8px !important; font-size: 13px !important; }
    .guest-row label { font-size: 10px !important; }
</style>

<script>
    let roomCount = 0;

    function addRoom() {
        roomCount++;
        const container = document.getElementById('roomsContainer');
        const roomHtml = `
            <div class="room-config" id="room_${roomCount}">
                <div class="room-header">
                    <span>Dhoma #${roomCount}</span>
                    <span class="remove-room" onclick="removeRoom(${roomCount})">Hiqe</span>
                </div>
                <div class="input-group" style="margin-bottom: 10px;">
                    <label>Kategoria</label>
                    <select name="booking[rooms][${roomCount}][type]" class="room-type" onchange="calculatePrice()" style="padding: 8px; font-size: 13px;">
                        <option value="80">Standarde - 80€</option>
                        <option value="120">Premium - 120€</option>
                    </select>
                </div>
                <div class="guest-row">
                    <div class="input-group">
                        <label>Të rritur</label>
                        <input type="number" name="booking[rooms][${roomCount}][adults]" min="1" value="1" onchange="calculatePrice()">
                    </div>
                    <div class="input-group">
                        <label>Fëmijë</label>
                        <input type="number" name="booking[rooms][${roomCount}][children]" min="0" value="0" onchange="calculatePrice()">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', roomHtml);
        calculatePrice();
    }
    
    function removeRoom(id) {
        document.getElementById(`room_${id}`).remove();
        reindexRooms();
        calculatePrice();
    }

    function reindexRooms() {
        const rooms = document.querySelectorAll('.room-config');
        roomCount = 0;
        rooms.forEach((room, index) => {
            roomCount++;
            room.id = `room_${roomCount}`;
            room.querySelector('.room-header span').innerText = `Dhoma #${roomCount}`;
            room.querySelector('.remove-room').setAttribute('onclick', `removeRoom(${roomCount})`);
            
            // Përditëso emrat e inputeve
            room.querySelector('select').name = `booking[rooms][${roomCount}][type]`;
            room.querySelectorAll('.guest-row input')[0].name = `booking[rooms][${roomCount}][adults]`;
            room.querySelectorAll('.guest-row input')[1].name = `booking[rooms][${roomCount}][children]`;
        });
    }

    function calculatePrice() {
        const checkin = document.getElementById('checkin').value;
        const checkout = document.getElementById('checkout').value;
        let total = 0;
        let diffDays = 0;

        if (checkin && checkout) {
            const date1 = new Date(checkin);
            const date2 = new Date(checkout);
            diffDays = Math.ceil((date2 - date1) / (1000 * 60 * 60 * 24));
        }

        if (diffDays > 0) {
            const rooms = document.querySelectorAll('.room-config');
            rooms.forEach(room => {
                // Korrigjim: Gjej select-in me klasen .room-type
                const price = parseInt(room.querySelector('.room-type').value);
                total += price * diffDays;
            });

            document.getElementById('totalPrice').innerText = total + " €";
            document.getElementById('nightsCount').innerText = diffDays + " netë x " + rooms.length + " dhoma";
            document.getElementById('hiddenTotal').value = total + " €";
            document.getElementById('hiddenDate').value = checkin + " - " + checkout;
        } else {
            document.getElementById('totalPrice').innerText = "0 €";
            document.getElementById('nightsCount').innerText = "Zgjidhni datat";
        }
    }

    // Shto nje dhome automatikisht ne fillim
    addRoom();

    // Kontrolli i logimit
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        let isLogged = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
        if (!isLogged) {
            event.preventDefault();
            alert("Ju lutem logohuni.");
            window.location.href = "login.php";
        }
    });

    function changeImg(element) {
        document.getElementById('currentImg').src = element.src;
        document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));
        element.classList.add('active');
    }
</script>

</body>
</html>