<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="userpage.css">

</head>
<body>

<header>
                <div class="logo">
                    <a href="index.html">Paintvas</a>
                </div>
                <div class="open-icon">
                    <i class='bx bxs-circle-quarter'></i>
                </div>
                <div class="menu">
                    <ul><li><a href="user_page.php">ACCOUNT</a></li>
                        <li><a href="index.html">HOME</a></li>
                        <!-- <li><a href="">PRODUCT</a></li> -->
                        <li><a href="contact.html">CONTACT</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="cart.html">CART</a></li>
                        <div class="close-icon">
                            <i class='bx bx-x'></i>
                        </div>
                    </ul>
                </div>
            </header>
   
<div class="container">

   <div class="content">
      <h3>Welcome to account<span>page</span></h3>
      <h1>Hello,  <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is your account page, select the button below to continue</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
      <a href="index.html" class="btn">home</a>
   </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper",{
            loop:true,
            speed:800,
            effect:"fade",
            autoplay: {
        delay: 5000,
        disableOnInteraction: false
    }

        });
        document.querySelector(".open-icon i").addEventListener("click", function(){
            document.querySelector(".menu").classList.add("active");
        })
        document.querySelector(".close-icon i").addEventListener("click", function(){
            document.querySelector(".menu").classList.remove("active");
        })
        anime({
            targets:'.serial',
            scale:[2,1],
            opacity:[0,1],
            easeing:'easeInOutExpo',
        })
        anime({
            targets:'.info h1',
            translateX:[120,0],
            opacity:[0,1],
            easeing:'easeInOutExpo',
            delay:500,
        })
        swiper.on('slideChangeTransitionStart',function (){

            anime({
            targets:'.serial',
            scale:[2,1],
            opacity:[0,1],
            easeing:'easeInOutExpo',
        })
        anime({
            targets:'.info h1',
            translateX:[120,0],
            opacity:[0,1],
            easeing:'easeInOutExpo',
            delay:500,
        })
        anime({
            targets:'.info a',
            translateX:[-120,0],
            opacity:[0,1],
            easeing:'easeInOutExpo',
            delay:700,
        })
        })
        var swiper = new Swiper(".swiper",{
            loop:true,
            speed:1000,
            effect:"fade",
            autoplay: {
        delay: 5000,
        disableOnInteraction: false
    }
        })
    </script>

</body>
</html>