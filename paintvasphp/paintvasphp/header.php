<header class="header">

   <div class="flex">

      <a href="index.html" class="logo">PAINTVAS</a>

      <nav class="navbar">
         <a href="cart_admin.php">add painting</a>
         <a href="products.php">view painting</a>
         <a href="index.html">home</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>