<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:index.html');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
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
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="loginstyles.css">

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
                        <div class="close-icon">
                            <i class='bx bx-x'></i>
                        </div>
                    </ul>
                </div>
            </header>


   
<!-- <div class="form-container"> -->

   <!-- <form action="" method="post">
      <h3>login now</h3>
      
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form> -->

   <div class="blob"></div>
        
        <div class="wrapper">

   <form action="" method="post">
                <h2>Login</h2>
                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="email" required >
                    <label>email</label>
                </div>

                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="password" required >
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
               
                </div>

                <button type="submit" name="submit" value="login now">Login</button>

            <div class="register-link">
                <p>Don't have an account?<br><a href="register_form.php">Register</a></p>
                
            </div>

            </form>
    </div>

<!-- </div> -->

<script type="module" src="http://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



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