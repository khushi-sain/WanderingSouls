<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Nothing+You+Could+Do&family=Poiret+One&display=swap" rel="stylesheet">

<!-- Slick Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

<!-- jQuery & Slick Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel India - Book Your Package</title>
    <style>
        body { font-family: Arial, sans-serif;
 margin: 0; padding: 0; background-color:  #f4f4f4; }
        header { display: flex; justify-content: space-between; align-items: center; background:  #034C53; color: white; padding: 15px 50px; }
        .logo { font-size: 24px; font-weight: bold; }
        nav ul { list-style: none; display: flex; gap: 20px; padding: 0; }
        nav ul li { display: inline; }
        nav ul li a { text-decoration: none; color: white; font-size: 18px; }
        .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        width: 220px;
        left: -125px;
        top: 40px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        border: 1px solid black;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:focus-within .dropdown-content {
        display: block;
    }

    .dropdown input {
        display: none;
    }

 
    .dropbtn {
        cursor: pointer;
        display: inline-block;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 18px;
    }

    .dropbtn:focus {
        outline: none;
    }
        .hero { text-align: center; background: url('back88.jpg') no-repeat center center/cover; color: white; padding: 100px 20px; }
        .hero h1 { font-size: 42px; margin-bottom: 10px; }

        .search-container { 
            background: transparent; backdrop-filter: blur(5px); padding: 20px; width: 90%; margin: 30px auto;
            border-radius: 10px; box-shadow: 0 4px 10px #000000;
        }
        .search-container h2 {color: white}
        .search-box { display: flex; gap: 15px; align-items: center; justify-content: space-between; flex-wrap: wrap; }
        select, input, button { 
            padding: 12px; font-size: 16px; border: 1px solid #ccc; 
            border-radius: 5px; flex: 1; min-width: 150px;
        }
        button { background: #007074; color: white; cursor: pointer; border: none; }
        button:hover { background: #034C53; }
        .packages, .trending { text-align: center; padding: 50px 20px; background: white; }
        .package-container { display: flex; justify-content: center; gap: 20px; }
        .package { background: #fff; padding: 20px; width: 300px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .package img { width: 100%; border-radius: 10px; }
        .package h3 { margin: 15px 0 10px; }
        .package button { padding: 10px 15px; background: #007074; color: white; border: none; cursor: pointer; }
        .trending { text-align: center; padding: 50px 20px; background: white; }
        .trending-container { 
            display: grid; 
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(2, 250px);
            gap: 10px; 
            padding: 20px; 
            max-width: 1200px; 
            margin: auto;
        }
        .trend-card { 
            position: relative; 
            overflow: hidden; 
            border-radius: 10px;
        }
        .trend-card img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform 0.3s ease-in-out;
        }
        .trend-card:hover img { 
            transform: scale(1.1);
            filter: brightness(80%);
        }
        .trend-card:hover .place-name {
            opacity: 1;
        }
        .place-name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            padding: 5px;
            border-radius: 5px;
            opacity: 0;
            font-size: 35px;
            font-family:georgia, serif;;
            transition: opacity 0.3s ease-in-out;
        }

        .trend-card:nth-child(1) { grid-column: span 2; grid-row: span 2; }
        .trend-card:nth-child(2) { grid-column: span 1; grid-row: span 1; }
        .trend-card:nth-child(3) { grid-column: span 1; grid-row: span 1; }
        .trend-card:nth-child(4) { grid-column: span 1; grid-row: span 2; }
        .trend-card:nth-child(5) { grid-column: span 2; grid-row: span 1; }


        

        .card-container {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 200px;
}

.card img {
    display: flex;
    width: 200px;
    height: 200px;
    border-radius: 5%;
    margin-bottom: 15px;
}

.card h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.card p {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 15px;
}

.card button {
    background-color: #007074;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.card button:hover {
    background-color: #F38C79;
}


 



.carousel-container {
    width: 80%;
    max-width: 1400px;
    margin: 50px auto; /* Adds margin on top and bottom */
}

.carousel-item {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    width: 1500px;
    height: 450px;
}

.carousel-item img {
    width: 100%;
    border-radius: 20px;
    height: auto;
}

.carousel-text {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    border-radius: 10px;
}

.carousel-text h3 {
    font-family: cursive;
    font-size: 20px;
    margin: 0;
}

.carousel-text h2 {
    font-size: 24px;
    font-weight: bold;
    margin: 5px 0;
}

.carousel-text p {
    font-size: 18px;
}





        .container {
            
            margin-left: 50px; /* Adjust as needed */
            margin-right: 50px; /* Adjust as needed */
            display: grid;
            background-color: #E8F9FF;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 20px;
        }

        .destination {

            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgb(153, 153, 153);
        }
        .destination h2 {
            font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 40px;
 
        }
        .destination p {
            font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 20px;
        }
        .destination li {
            font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 20px;
        }
        @media (max-width: 500px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                gap: 10px; 
                padding: 20px; 
                margin: auto;
            }
        }




        footer { text-align: center; padding: 15px; background: #007074; color: white; margin-top: 30px; }
    </style>



<script>
    $(document).ready(function(){
        $('.carousel').slick({
            dots: true,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            adaptiveHeight: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 1500,
        });
    });
</script>






</head>
<body>

    <header>
        <div class="logo"><img src="tripzy2.png" alt="Travel India Logo" width="175" height="60"></div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="Customize.php">Customize</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="dropdown" tabindex="0">
                <label for="dropdown-toggle" class="dropbtn"><i class="fas fa-user"></i> Menu</label>
                <input type="checkbox" id="dropdown-toggle">
                <div class="dropdown-content">
                    <a href="Aboutus.php" >About Us</a>
                    <a href="traveller_stories.php" d>Traveller Stories</a>
                    <a href="experience.php">Share your experience</a>
                    <a href="contact.php">Help center</a>
                    <a href="booking.php">Your booking</a>
    </div>
</li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1 style="  font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 50px;
	" >Book Your Dream Trip</h1>
        <p style="  font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 20px;
	" >Explore the best travel packages in India !</p>

    <div class="search-container">

        <h2>Select Travel Package</h2>
        <form action="results.php" method="GET" class="search-box">
            <select name="trip_type">
                <option value="one-way">One Way</option>
                <option value="round-trip">Round Trip</option>
            </select>

            <select name="from">
                <?php
                    $locations = ["Mumbai ", "Delhi ", "Hyderabad ", "Ahmedabad ", "Chennai ", "Kolkata ", "Surat ", "Pune ", "Jaipur ", "Lucknow ", "Kanpur ", "Nagpur ", "Indore ", "Thane ", "Bhopal ", "Visakhapatnam ", "Patna ", "Ghaziabad "];
                    foreach ($locations as $location) {
                        echo "<option value='$location'>$location</option>";
                    }
                ?>
            </select>

            <select name="to">
            <?php
                    $locations = [" Maharashtra", " Bengaluru", " Telangana", " Gujarat", " Tamil Nadu", " West Bengal", " Gujarat", " Maharashtra", " Rajasthan", " Uttar Pradesh", " Uttar Pradesh", " Maharashtra", " Madhya Pradesh", " Maharashtra", " Madhya Pradesh"];
                    foreach ($locations as $location) {
                        echo "<option value='$location'>$location</option>";
                    }
                    ?>
            </select>

            <input type="date" name="departure" required>

            <input type="date" name="return" placeholder="Return Date (Optional)">

            <input type="number" name="travellers" min="1" value="1" placeholder="Travellers">

            <button type="submit">Search Packages</button>
        </form>
    </div>

       </section>

    <section class="packages">
        <h2 style="  font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 40px;
	">Featured Travel Packages</h2>
        
        <div class="package-container">
    <?php
        $packages = [
            ["Taj Mahal", "taj.jpg", "Experience the beauty of the Taj Mahal with a guided tour.", "taj.php"],
            ["Goa Beach Tour", "goa.jpg", "Relax on the stunning beaches of Goa with fun activities.", "goa.php"],
            ["Manali Adventure", "manali.jpg", "Enjoy snow activities and breathtaking views in Manali.", "manali.php"]
        ];
        foreach ($packages as $package) {
            echo "<div class='package'>
                    <img src='{$package[1]}' alt='{$package[0]}'>
                    <h3>{$package[0]}</h3>
                    <p>{$package[2]}</p>
                    <a href='{$package[3]}'><button>View Package</button></a>
                  </div>";
        }
    ?>
</div>


    </section>

    <section class="trending">
        <h2 style="font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 40px;">Trending Destinations</h2>
        <div class="trending-container">
    <?php
        $trendingPlaces = [
            ["name" => "Jaipur", "image" => "Udaipur.jpg", "link" => "jaipur.php"],
            ["name" => "Leh Ladakh", "image" => "ladakh.jpg", "link" => "leh-ladakh.php"],
            ["name" => "Kerala", "image" => "kerala.jpg", "link" => "kerala.php"],
            ["name" => "Rajasthan", "image" => "rajasthan.jpg", "link" => "rajasthan.php"],
            ["name" => "Andaman & Nicobar", "image" => "beach.jpg", "link" => "andaman.php"],
        ];
        foreach ($trendingPlaces as $place) {
            echo "<div class='trend-card'>";
            if ($place['image']) {
                echo "<a href='{$place['link']}'><img src='{$place['image']}' alt='{$place['name']}'></a>";
                echo "<span class='place-name'>{$place['name']}</span>";
            } else {
                echo "<span>{$place['name']}</span>";
            }
            echo "</div>";
        }
    ?>
</div>


    </section>







    <div class="card-container">
        <div class="card">
            <img src="mountain.jpg" alt="Mountain">
            <h3>Explore Mountains</h3>
            <p>Discover breathtaking mountain trails and scenic views.</p>
            <button>Learn More</button>
        </div>

        <div class="card">
            <img src="beach.jpg" alt="Beach">
            <h3>Beach Paradise</h3>
            <p>Relax on beautiful sandy beaches with crystal-clear water.</p>
            <button>Learn More</button>
        </div>

        <div class="card">
            <img src="city.jpg" alt="City">
            <h3>City Adventures</h3>
            <p>Experience the vibrant life and culture of bustling cities.</p>
            <button>Learn More</button>
        </div>

        <div class="card">
            <img src="jungle.jpg" alt="Jungle">
            <h3>Jungle Safari</h3>
            <p>Get close to nature with an exciting jungle safari.</p>
            <button>Learn More</button>
        </div>

        <div class="card">
            <img src="historic.jpg" alt="Historic">
            <h3>Historic Wonders</h3>
            <p>Explore ancient ruins and historical landmarks.</p>
            <button>Learn More</button>
        </div>
    </div>




    <div class="carousel-container">
    <h2 style="font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 40px;">Explore The Hidden Gems</h2>
    <p> Tap into the untapped tourist spots for amazing vacations.</p>

    <div class="carousel">
        <div class="carousel-item">
            <img src="south.jpg" alt="Cambodia Holiday Package">
            <div class="carousel-text">
                <h3>Enchanting</h3>
                <h2>Incredible South India</h2>
                <p>Starting From <strong>₹ 32,890</strong></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="mountain.jpg" alt="Bali Holiday Package">
            <div class="carousel-text">
                <h3>Tropical</h3>
                <h2>Honeymoon in Himachal</h2>
                <p>Starting From <strong>₹ 25,490</strong></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="jaisalmer.jpeg" alt="Maldives Holiday Package">
            <div class="carousel-text">
                <h3>Luxury</h3>
                <h2>Historic Trip to Jaipur</h2>
                <p>Starting From <strong>₹ 45,000</strong></p>
            </div>
        </div>
    </div>
</div>



   
    



    <h2 style="font-family: Nothing You Could Do, cursive;
  font-weight: 700;
  font-style: normal;
	font-size: 40px; text-align: center; padding: 50px 20px; background: white;
	">best places to visti in india</h2>

    <div class="container">

        
        <div class="destination">
            <h2>Goa</h2>
            <p>The unofficial party place of India, Goa is more than that. It has a great legacy, history, and culture that are yet to be explored...</p>
            <p><strong>Best time to visit:</strong> November to February</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Calangute</li>
                <li>Baga</li>
                <li>Anjuna</li>
                <li>Miramar</li>
                <li>Palolem</li>
                <li>Panjim</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Kerala</h2>
            <p>God's own country, Kerala has been a popular tourist destination in India. You can explore it all with India tours to this marvellous destination...</p>
            <p><strong>Best time to visit:</strong> September to March</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Sree Padmanabhaswamy Temple</li>
                <li>Francis CSI Church</li>
                <li>Paradesi Synagogue</li>
                <li>Eravikulam National Park</li>
                <li>Varkala Beach</li>
                <li>Athirappilly Waterfalls</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Kashmir</h2>
            <p>For decades, the Kashmir valley has attracted tourists from all over the world. If you can't plan a vacation on your own, you should check out India tours for Kashmir...</p>
            <p><strong>Best time to visit:</strong> March to August</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Gulmarg</li>
                <li>Srinagar</li>
                <li>Dal Lake</li>
                <li>Sonamarg</li>
                <li>Indira Gandhi Tulip Garden</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Rajasthan</h2>
            <p>If you are looking for mesmerising India tours, then Rajasthan is undoubtedly your destination of choice. From its sprawling forts and historical landmarks...</p>
            <p><strong>Best time to visit:</strong> November to February</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Jaipur</li>
                <li>Udaipur</li>
                <li>Chittor</li>
                <li>Jodhpur</li>
                <li>Jaisalmer</li>
                <li>Mount Abu</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Sikkim</h2>
            <p>If you are looking for an Indian destination that is fit for a world tour package, then look no further than Sikkim. You can plan amazing India tours to this mountain marvel, which is home to the country's highest peak, Kanchenjunga. It is certainly a great destination for quality international tour packages. Check out Sikkim tour packages for a trip to this charming Indian state.</p>
            <p><strong>Best time to visit:</strong> March to May</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Gangtok</li>
                <li>Nathu La Pass</li>
                <li>Tsomgo Lake</li>
                <li>Rumtek Monastery</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Shimla</h2>
            <p>Shimla, the Queen of the Hills, is the stuff that dreamy India tours are made of! Shimla is a great destination for international honeymoon packages, with its pristine landscape, mountains, greenery and romantic weather. A Shimla tour also means checking out the delightful cafes and eateries here.</p>
            <p><strong>Best time to visit:</strong> May to June/December to January</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>The Ridge</li>
                <li>Green Valleys</li>
                <li>Mall Road</li>
                <li>Jakhoo Hilly</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Uttarakhand</h2>
            <p>There are many India tours which keep Uttarakhand at the forefront and why not? The state is blessed with unmatched natural beauty. Find Uttarakhand tour packages covering several popular destinations. The state offers the right mix of spirituality, trekking, adventure, beautiful mountain landscapes and welcoming locals.</p>
            <p><strong>Best time to visit:</strong> March to April/September to October</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Dehradun</li>
                <li>Mussoorie</li>
                <li>Nainital</li>
                <li>Auli</li>
                <li>Rishikesh</li>
            </ul>
        </div>
        <div class="destination">
            <h2>Ooty</h2>
            <p>Those looking for soothing India tours may also consider Ooty. Your Ooty tour should include some of the region’s signature attractions. Ooty is also famous for its tea and coffee plantations. It is also one of the top choices for international honeymoon packages.</p>
            <p><strong>Best time to visit:</strong> October to June</p>
            <p><strong>Best places to visit:</strong></p>
            <ul>
                <li>Ooty Botanical Garden</li>
                <li>Emerald Lake</li>
                <li>Ooty Lake</li>
                <li>Doddabetta Peak</li>
                <li>Kalhatty Waterfalls</li>
                <li>Deer Park</li>
            </ul>
        </div>
    </div>
<!-- ================== YOUR FULL CODE ABOVE (UNCHANGED) ================== -->


<!-- ================== CHATBOT START ================== -->

<style>
/* Chat button */
.chatbot-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #007074;
    color: white;
    border: none;
    padding: 15px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    z-index: 999;
}

/* Chat container */
.chatbot-container {
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 999;
}

/* Header */
.chatbot-header {
    background: #034C53;
    color: white;
    padding: 10px;
    text-align: center;
}

/* Messages */
.chatbot-messages {
    height: 250px;
    overflow-y: auto;
    padding: 10px;
    font-size: 14px;
}

/* Input area */
.chatbot-input {
    display: flex;
    border-top: 1px solid #ccc;
}

.chatbot-input input {
    flex: 1;
    border: none;
    padding: 10px;
}

.chatbot-input button {
    background: #007074;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}
</style>

<!-- Chat Button -->
<button class="chatbot-btn" onclick="toggleChat()">💬</button>

<!-- Chat Box -->
<div class="chatbot-container" id="chatbot">
    <div class="chatbot-header">Travel Assistant</div>

    <div class="chatbot-messages" id="messages">
        <p><b>Bot:</b> Hello! How can I help you? 😊</p>
    </div>

    <div class="chatbot-input">
        <input type="text" id="userInput" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
function toggleChat() {
    let chat = document.getElementById("chatbot");
    chat.style.display = chat.style.display === "flex" ? "none" : "flex";
}

function sendMessage() {
    let input = document.getElementById("userInput");
    let message = input.value.trim();

    if (message === "") return;

    let messages = document.getElementById("messages");

    // User message
    messages.innerHTML += "<p><b>You:</b> " + message + "</p>";

    // Simple bot reply logic
    let reply = "Sorry, I didn't understand.";

    if (message.toLowerCase().includes("hello")) {
        reply = "Hi! 👋 How can I assist you with your trip?";
    } 
    else if (message.toLowerCase().includes("package")) {
        reply = "We offer packages for Goa, Manali, Taj Mahal and more!";
    } 
    else if (message.toLowerCase().includes("price")) {
        reply = "Prices start from ₹25,000 depending on destination.";
    } 
    else if (message.toLowerCase().includes("goa")) {
        reply = "Goa is perfect for beaches 🌊 and nightlife!";
    } 
    else if (message.toLowerCase().includes("contact")) {
        reply = "You can visit our Contact page for support.";
    }

    // Bot message
    messages.innerHTML += "<p><b>Bot:</b> " + reply + "</p>";

    // Scroll to bottom
    messages.scrollTop = messages.scrollHeight;

    input.value = "";
}
</script>

<!-- ================== CHATBOT END ================== -->

    <footer>
        <p>© 2025 Wandering Souls | Designed by Satyam & Khushi</p>
    </footer>

</body>
</html>
