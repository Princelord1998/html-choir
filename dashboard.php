<?php
session_start();
include "dbconnect.php";
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{
    header('location:index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            align-content: center;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="document">
    <header class="header"><h1 style="font-family: 'Droid Serif'">Our Choir</h1></header>
    <div class="profile-icon">
        <img src="images/logo.png" class="img-fluid rounded-circle" alt="Profile Icon" width="50">
    </div>
    <div class="profile-icon1">
        <img src="images/logo.png" class="img-fluid rounded-circle" alt="Profile Icon" width="50">
    </div>
    <?php include('admin/session_message.php'); ?>
    <nav style="margin-top: 90px">
        <ul>
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Manage</button>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="sidebar">
        <ul>
            <li><a href="dashboard.php" style="background-color: red">Home</a></li>
            <li><a href="alto.php">Alto</a></li>
            <li><a href="bass.php">Bass</a></li>
            <li><a href="soprano.php">Soprano</a></li>
            <li><a href="unisson.php">Unisson</a></li>
            <li><a href="tenor.php">Tenor</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Welcome To Our Choir</h2>

        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="slider_images/ensemble.jpeg" style="width:50%;height: 40%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="slider_images/ensemble1.jpeg" style="width:50%;height: 40%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="slider_images/celeste.jpeg" style="width:50%;height: 40%">
            </div>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
<script src="functions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Our Choir. All rights reserved.</p>
    </div>
</footer>
</html>

