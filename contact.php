<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Travel India</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Nothing+You+Could+Do&family=Poiret+One&display=swap" rel="stylesheet">

    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
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
    
    .hero { background: url('contact1.jpg') no-repeat center/cover; height: 250px; display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold; }
        .contact-info i { color: #0077b6; margin-right: 10px; }
        .contact-form { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .social-links a { margin: 0 10px; font-size: 24px; }
        .map iframe { width: 200%; height: 600px; border-radius: 10px; }
        footer { text-align: center; padding: 35px; background: #007074; color: white; margin-top: 30px; }
    </style>
</head>
<body>
<header>
<div class="logo"><img src="tripzy2.png" alt="Travel India Logo" width="175" height="60"></div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="customize.php">Customize</a></li>
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
    
    <div class="hero" style="  font-family: Nothing You Could Do, cursive;
  font-weight: 500;
  font-style: normal;
	font-size: 60px;
    color: black;
	">Contact Us !</div>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 contact-info">
                <h3>Contact Information</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Travel Lane, City, State, ZIP</p>
                <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                <p><i class="fas fa-envelope"></i> support@travelindia.com</p>
                <p><i class="fas fa-clock"></i> Mon-Fri, 9 AM - 5 PM</p>
                <h4 class="mt-4">Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form>
                        <input type="text" class="form-control mb-3" placeholder="Full Name" required>
                        <input type="email" class="form-control mb-3" placeholder="Email" required>
                        <input type="text" class="form-control mb-3" placeholder="Phone Number (Optional)">
                        <select class="form-control mb-3" required>
                            <option value="">Select Subject</option>
                            <option value="Booking Inquiry">Booking Inquiry</option>
                            <option value="Custom Package Request">Custom Package Request</option>
                            <option value="Complaint">Complaint</option>
                            <option value="General Inquiry">General Inquiry</option>
                        </select>
                        <textarea class="form-control mb-3" placeholder="Your Message" rows="5" required></textarea>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h3 class="text-center">Our Location</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509123!2d144.9537353153163!3d-37.81627997975157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0f0f0f%3A0x0!2sYour%20Office%20Location!5e0!3m2!1sen!2sin!4v1616161616161!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
    <footer>
        <p>&copy; 2025 wandering souls. All rights reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
