<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="registerstyles.css">

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
                        <li><a href="cart.php" class="cart">CART</a></li>
                       <li><a href="cart_admin.php" class="cart">Edit product</a></li>
                        <div class="close-icon">
                            <i class='bx bx-x'></i>
                        </div>
                    </ul>
                </div>
            </header>



<div class="container">
    <div class="title">Registration</div>
    <div class="content">
   
<div class="form-container">

   <!-- <form action="" method="post">
      <h3>register now</h3>
      
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form> -->


   <form action="" method="post">
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email"  required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="password"  required>
          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="cpassword"  required>
          </div>
          
          <div class="select">
          <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
          </select>
          </div>

        </div>

        <div class="button">
          <input type="submit" name="submit" value="register now">
        </div>

        <div class="home">
        <a>already have an account?</a>
            <a href="login_form.php" class="btn">Back to login</a>
            
          </div>
      </form>

</div>

</div>

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