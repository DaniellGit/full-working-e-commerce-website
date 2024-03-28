<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400'1,500;1,600;1,700&display=swap" rel="stylesheet">

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
                        <li><a href="products.php">product</a></li>
                       <li><a href="cart.php" class="cart">CART</a></li>
                        <div class="close-icon">
                            <i class='bx bx-x'></i>
                        </div>
                    </ul>
                   
                   
                    <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
                </div>




            </header>

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