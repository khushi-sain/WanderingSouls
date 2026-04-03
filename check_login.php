
<?php
session_start();

// package name get karo
$package = isset($_GET['package']) ? $_GET['package'] : "";

// check karo user login hai ya nahi
if(isset($_SESSION['user_id'])){
    // already login → direct booking page
    header("Location: book.php?package=$package");
} else {
    // login nahi hai → login page bhejo
    header("Location: login.php?package=$package");
}
?>