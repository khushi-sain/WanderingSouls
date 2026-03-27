<?php
include("connection.php");
session_start(); 

$msg = '';


if (isset($_POST['submit']) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];

  
    $select = "SELECT * FROM `users` WHERE email = '$email'";
    $select_user = mysqli_query($conn, $select);

    if (mysqli_num_rows($select_user) > 0) {
        $msg = "User already exists!";
    } else {
        if ($password !== $confirmpassword) {
            $msg = "Passwords do not match!";
        } else {
            $insert = "INSERT INTO `users`(`name`, `email`, `password`, `user_type`) VALUES ('$name','$email','$password','$user_type')";
            mysqli_query($conn, $insert);
            
         
            $_SESSION['success'] = "Account successfully created!";

          
            if ($user_type === 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: home.php');
            }
            exit();
        }
    }
}






























if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select1 = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $select_user = mysqli_query($conn, $select1 );

    if (mysqli_num_rows($select_user) > 0) {
        $rows = mysqli_fetch_assoc($select_user);
        if ($rows['user_type'] == 'user') {
            $_SESSION['user'] = $rows['email'];
            header('location:home.php');
            exit();
        } elseif ($rows['user_type'] == 'admin') {
            $_SESSION['admin'] = $rows['email'];
            header('location:admin.php');
            exit();
        }
    } else {
        header('location:home.php');
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandering.souls</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Nothing+You+Could+Do&family=Poiret+One&display=swap" rel="stylesheet">

    <style>
        body {  
            margin: 0;
            padding: 0;
        }
       
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #034C53;
            padding: 10px 0;
            z-index: 10;
            height: 70px;
        }
        .navbar a {
            text-decoration: none;
            color: white;
            font-size: 33px;
            font-weight: bold;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }
        .navbar a:hover {
            color: #FFC1B4;
            
        }

        .video-container {
            position: relative;
            width: 98vw;
            height: 100vh;
            overflow: hidden;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        .tagline-text {
            font-size: 3em;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            margin-top:110px;
        } 
        
        .highlight-section {
            text-align: center;
        }
        
        .highlight-text {
            font-family: Nothing You Could Do, cursive;
  font-weight: 600;
  font-style: normal;
	font-size: 35px;
            text-align: center;
           margin-top:100px;
            color: rgb(0, 0, 0);
            margin-bottom: 30px;

        }

        .create-account-btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2em;
            font-weight: bold;
            color: #fff;
            background:  #007074;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-bottom:100px;
        }
        .create-account-btn:hover {
            background:  #034C53;
        }

        footer {
            height:180px;
            background:  #007074;
            color: #fff;
        }
        .footer-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            font-size:20px;
        }
        .footer-section div {
            margin: 20px;
        }
        .footer-icons i {
            font-size: 1.5em;
            margin: 0 10px;
            cursor: pointer;
           
        }
        .modal-content {
        background:  #B4EBE6;
        padding: 30px;
        border-radius: 20px;
        border: 4px solid #80CBC4;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: left;
        
        
      
    }

    .modal-content h5 {
        font-size: 2em;
        color:rgb(16, 13, 12) ;
        margin-bottom: 20px;
        
    }

    input {
        border: 2px solid  rgb(0, 0, 0);
        border-radius: 30px;
        font-size: 16px;
        box-shadow: 0 3px 10px rgba(255, 165, 0, 0.2);
    }

    button {
            padding: 15px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(90deg,rgb(109, 187, 108),rgb(44, 136, 55));
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(255, 71, 87, 0.2);
            
    }


    button:hover {
        background: linear-gradient(135deg, #ff6b81, #ff7f50);
        transform: translateY(-2px);
    }

    .close {
            color: #ff4757;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom:20px;
        }

        .close:hover {
            color:rgb(25, 15, 16);
        }
        
footer {
    margin-top:50px;
   
    color:white;
    padding: 30px 0;


    background: #007074; 
}
.footer-icons a {
    font-size: 1.5em;
    
    color: #f8f9fa;
   
}


    </style>
</head><body>


<?php if (!empty($msg)) : ?>
<script>
    alert("<?= $msg ?>");
</script>
<?php endif; ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">
    <img src="tripzy2.png" alt="Tripzy Logo" width="170" height="60" class="d-inline-block align-text-top">
</a>

            <div class="d-flex gap-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#joinModal">Join</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </div>
        </div>
    </nav>

    <div class="video-container">
        <video autoplay muted loop>
            <source src="travel.mp4" type="video/mp4">
        </video>
        <div class="overlay">
            <div class="tagline-text">Travel ✦ Discover ✦ Belong</div>
        </div>
    </div>

    <div class="highlight-section">
        <div class="highlight-text">
            Your journey starts here — Let <br>  wandering souls be your guide.
        </div>
        <button class="create-account-btn" href="#" data-bs-toggle="modal" data-bs-target="#joinModal">Create Account</button>

    </div>
    <div class="highlight-section">
        <div class="highlight-text">
        Start Journey to Enlightenment With Best-Selling Packages
        </div>
        <p>At Wandering Souls, we are dedicated to making your spiritual journey as seamless and fulfilling as possible. Founded with vision to simplify the pilgrimage <br>
         experience for devotees, we focus on providing hassle-free access to some of the most revered temples and sacred sites across India.<br>
          Whether it's ensuring priority darshan, comfortable travel, or personalized rituals, we are here to handle all the details,<br>
          so you can focus on your spiritual connection. With deep respect for Indian traditions and values, Wandering Souls <br>
           offers tailored pilgrimage packages designed to meet the needs of modern-day travelers seeking a <br> 
           divine experience. Our expert team takes care of all the logistics — from fast-track <br>
            temple entries to comfortable accommodations and special pooja arrangements.<br>
             We also provide dedicated assistance at every step of the journey,<br>
              ensuring your trip is both peaceful and spiritually enriching.</p>
    </div>

    <footer>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4 text-center">
            <h5>About Us</h5>
                <p>At wandering souls, we provide unforgettable travel experiences with customized packages.</p>
               
            </div>
            <div class="col-md-4 text-center">
                <h5>Contact</h5>
                <p>Email: info@wanderingsouls.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="col-md-4 text-center">
                <h5>Follow Us</h5>
                <div class="footer-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
      
    </div>
</footer>
<div class="modal fade" id="joinModal">
  <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create your Tripzy account</h5>
        <span class="close" data-bs-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <form onsubmit="return validateForm()" action="" method="post"> 


          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label for="user_type" class="form-label">User Type</label>
            <select name="user_type" id="user_type" class="form-control" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>

          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
          </div>

          <div class="d-flex justify-content-center align-items-center">
            <button name="submit" class="button">Create Account</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>

 
    <script>
        function validateForm() {
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            if (!name || !email || !password || !confirmPassword) {
                alert("All fields are mandatory!");
                return false;
            }

           
          
        }


        function validateLoginForm() {

    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;

    if (!email || !password) {
        alert("All fields are mandatory!");
        return false;
    }

        }

    </script>
   

   
   <div class="modal fade" id="loginModal">
    <div class="modal-dialog d-flex justify-content-center align-items-center" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100">Login</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form onsubmit="return validateLoginForm()"action="" method="POST">

                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3"> 
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button name="submit" class="button px-5 py-3 fs-5">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
