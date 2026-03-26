<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Nothing+You+Could+Do&family=Poiret+One&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages - Travel India</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
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
      
        .hero {
            background: url('./travel22.jpg') no-repeat center center/cover;
            height: 300px; display: flex; align-items: center; justify-content: center; color: white;
            font-size: 32px; font-weight: bold; text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
        }

    
        .container { width: 90%; margin: auto; padding: 30px 0; }
        .section-title { text-align: center; font-size: 28px; margin-bottom: 20px; color: #333; }

        .packages-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .package-card {
            background: white; padding: 15px; border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .package-card img { width: 100%; height: 180px; border-radius: 10px; object-fit: cover; }
        .package-card h3 { font-size: 20px; margin: 10px 0; }
        .package-card p { font-size: 14px; color: #555; }


        .package-button {
            background-color:  #034C53;
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 20px; 
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .package-button:hover {
            background-color: #005f8a; 
        }

        .trend-card:nth-child(1) { grid-column: span 2; grid-row: span 2; }
        .trend-card:nth-child(2) { grid-column: span 1; grid-row: span 1; }
        .trend-card:nth-child(3) { grid-column: span 1; grid-row: span 1; }
        .trend-card:nth-child(4) { grid-column: span 1; grid-row: span 2; }
        .trend-card:nth-child(5) { grid-column: span 2; grid-row: span 1; }
        .trend-card:nth-child(6) { grid-column: span 1; grid-row: span 2; }

        footer {
            text-align: center; padding: 15px; background: #007074; color: white; margin-top: 30px;
        }
    </style>
</head>
<body>

    <header>
    <div class="logo"><img src="tripzy2.png" alt="Travel India Logo" width="175" height="60"></div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
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

    <!-- Hero Section -->
    <div class="hero" style="  font-family: Nothing You Could Do, cursive;
  font-weight: 400;
  font-style: normal;
	font-size: 50px;
    color: black;
	" >
        Explore the Best Tour Packages
    </div>

    <div class="container">
    <h2 class="section-title">Top 20 Travel Packages</h2>
    <div class="packages-grid">
        <?php
            $packages = [
                ["Goa Beach Escape", "goa.jpg", "Enjoy the sun, sand, and sea in Goa.", "goa.php"],
                ["Manali Snow Retreat", "manali.jpg", "A perfect winter getaway to Manali.", "manali.php"],
                ["Himalayan Adventure", "mountain.jpg", "Experience the beauty of the Himalayas.", "himalayas.php"],
                ["Kerala Backwaters", "kerala.jpg", "Cruise through the scenic backwaters of Kerala.", "kerala.php"],
                ["Rajasthan Heritage Tour", "rajasthan.jpg", "Explore the rich history of Rajasthan.", "rajasthan.php"],
                ["Kashmir Paradise", "Kashmir.jpg", "Witness the heavenly beauty of Kashmir.", "kashmir.php"],
             
                ["Andaman Islands", "beach.jpg", "Discover pristine beaches and coral reefs.", "andaman.php"],
                ["Ladakh Road Trip", "pexels-sanket-barik-2808574-7846490.jpg", "Adventure through the highest motorable roads.", "ladakh.php"],
                ["Udaipur Luxury Escape", "Udaipur.jpg", "Enjoy a royal stay in Udaipur.", "udaipur.php"],
                ["Darjeeling Tea Tour", "pexels-parimoofarhaan-31044093.jpg", "Experience the tea gardens of Darjeeling.", "darjeeling.php"],
                ["Ooty Hill Station", "mountain22.jpg", "A peaceful retreat in the Nilgiris.", "ooty.php"],
                ["Varanasi Spiritual Tour", "Varanasi.jpg", "A spiritual experience at the Ganges.", "varanasi.php"],
                ["Rishikesh Adventure", "pexels-shreyas-kc46-944395.jpg", "Thrill-seekers paradise with river rafting.", "rishikesh.php"],
                ["Jaipur Royal Getaway", "Udaipur.jpg", "Explore the royal palaces of Jaipur.", "jaipur.php"],
                ["Mysore Heritage Trip", "jungle.jpg", "Experience the grandeur of Mysore.", "mysore.php"],
                ["Sundarbans Wildlife Safari", "pexels-deepak-murali-437548-1273246.jpg", "Explore the mangrove forests of Sundarbans.", "sundarbans.php"],
                ["Shimla Winter Wonderland", "pexels-shovan-datta-3275479-6147968.jpg", "Enjoy snow-covered landscapes in Shimla.", "shimla.php"],
                ["Meghalaya Rainforest Tour", "beach.jpg", "Explore the lush greenery of Meghalaya.", "meghalaya.php"],
                ["Amritsar Golden Temple", "goldentemple.jpg", "A spiritual retreat in Amritsar.", "amritsar.php"],
                ["Taj Mahal Agra Tour", "taj.jpg", "Visit the iconic wonder of the world.", "agra.php"]
            ];

            foreach ($packages as $package) {
                echo "
                    <div class='package-card'>
                        <img src='{$package[1]}' alt='{$package[0]}'>
                        <h3>{$package[0]}</h3>
                        <p>{$package[2]}</p>
                        <a href='{$package[3]}' class='package-button'>View Details</a>
                    </div>
                ";
            }
        ?>
    </div>
</div>

        <footer>
        <p>© 2025 Wandering Souls | Designed by Satyam & Khushi</p>
    </footer>
</html>







































