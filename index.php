<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>GLASS HOUSE</title>
  <meta name="title" content="glasshouse">
  <meta name="description" content="This is a Restaurant html template ">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/OIP.png" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/front.png">
  <link rel="preload" as="image" href="./assets/images/interior.jpg">
  <link rel="preload" as="image" href="./assets/images/interior1.jpg">

</head>

<body id="top">

  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">GLASS HOUSE</p>
  </div>





  <!-- 
    - #TOP BAR
  -->

  <div class="topbar">
    <div class="container">

      <address class="topbar-item">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">
          Restaurant St, ASPIRE ZONE, DOHA, QATAR
        </span>
        
      </address>

      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">Daily : 6.30 am to 11.00 pm</span>
      </div>

      <a href="tel:+11234567890" class="topbar-item link">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">+974 4445 5536</span>
      </a>

      <div class="separator"></div>

      <a href="mailto:glasshouse@alaziziyahboutique.com" class="topbar-item link">
        <div class="icon">
          <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">glasshouse@alaziziyahboutique.com</span>
      </a>

    </div>
  </div>





  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">
      <a href="#" class="logo">
       
        <img src="./assets/images/OIP.png" width="160" height="50" alt = "GLASS HOUSE - Home">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
        <a href="#home" class="logo">
          <img src="./assets/images/OIP.png" width="160" height="50" alt = "GLASS HOUSE - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#menu" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Menus</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">About Us</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#contact" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Contact</span>
            </a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link hover-underline">
              <div class="separator"></div>
              <a href="admin_login.php" class="fa-solid fa-user-tie" >
              </a>
            
           
             
          
           
              
           
         
         
            </a>
          </li>
        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Visit Us</p>

          <address class="body-4">
            Restaurant St, ASPIRE ZONE, <br>
            DOHA, QATAR
          </address>

          <p class="body-4 navbar-text">Open: 6.30 am - 11.00 pm</p>

          <a href="mailto:glasshouse@alaziziyahboutique.com" class="body-4 sidebar-link">glasshouse@alaziziyahboutique.com</a>


          <a href="tel:+974 4445 5536" class="body-1 contact-number hover-underline">
            +974 4445 5536
          </a>
        </div>

      </nav>


      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
            <?php
     $select_front = $conn->prepare("SELECT * FROM `front` LIMIT 999999"); 
     $select_front->execute();
     if($select_front->rowCount() > 0){
      while($fetch_front = $select_front->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_front['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_front['image_07']; ?>">
     
      
      <img src="uploaded_img1/<?= $fetch_front['image_07']; ?>" width="1300" height="900" loading="lazy" alt="">
      <div class="flex">
     
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                
            </div>

            

            <h1 class="display-1 hero-title slider-reveal">
              For the love of <br>
              delicious food
            </h1>

           

            <a href="https://indd.adobe.com/view/081ca8b2-8111-4254-8741-9ac12854a245" class="btn btn-primary slider-reveal">
      
              <span class="text text-1">View Our Menu</span>

              <span class="text text-2" aria-hidden="true">View Our Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
            <?php
     $select_front = $conn->prepare("SELECT * FROM `front` LIMIT 999999"); 
     $select_front->execute();
     if($select_front->rowCount() > 0){
      while($fetch_front = $select_front->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_front['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_front['image_08']; ?>">
     
      
      <img src="uploaded_img1/<?= $fetch_front['image_08']; ?>" width="1300" height="900" loading="lazy" alt="">
      <div class="flex">
     
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                
            </div>
          

            

            <h1 class="display-1 hero-title slider-reveal">
              Flavours Inspired by <br>
              the Seasons
            </h1>

            

            <a href="https://indd.adobe.com/view/081ca8b2-8111-4254-8741-9ac12854a245" class="btn btn-primary slider-reveal">
     
              <span class="text text-1">View Our Menu</span>

              <span class="text text-2" aria-hidden="true">View Our Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
            <?php
     $select_front = $conn->prepare("SELECT * FROM `front` LIMIT 999999"); 
     $select_front->execute();
     if($select_front->rowCount() > 0){
      while($fetch_front = $select_front->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_front['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_front['image_09']; ?>">
     
      
      <img src="uploaded_img1/<?= $fetch_front['image_09']; ?>" width="1300" height="900" loading="lazy" alt="">
      <div class="flex">
     
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                
            </div>
      

            

            <h1 class="display-1 hero-title slider-reveal">
              Where every flavor <br>
              tells a story
            </h1>

           

            <a href="https://indd.adobe.com/view/081ca8b2-8111-4254-8741-9ac12854a245" class="btn btn-primary slider-reveal">
     
              <span class="text text-1">View Our Menu</span>

              <span class="text text-2" aria-hidden="true">View Our Menu</span>
            </a>

          </li>

        </ul>

        <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="slide to next" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        

      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service bg-black-10 text-center" aria-label="service">
        <div class="container">

          <p class="section-subtitle label-2">Flavours For Royalty</p>

          <h2 class="headline-1 section-title">We Offer Top Notch</h2>

          <p class="section-text">
            WE CAN ADD HERE WHAT WE WANT TO SAY
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_10']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_10']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Breakfast</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_11']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_11']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Appetizers</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_12']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_12']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>
                  
                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Drinks</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>
            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_13']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_13']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#"> After Noon High Tea</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>
            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_14']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_14']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>
                
                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Business Lunch</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>
            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <?php
     $select_top = $conn->prepare("SELECT * FROM `top` LIMIT 999999"); 
     $select_top->execute();
     if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_top['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_top['image_15']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_top['image_15']; ?>" width="285" height="336" loading="lazy" alt="Breakfast">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
   }
   ?> 
                
  
                    
                  </figure>
                </a>
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Main course</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>
          </ul>

          <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="shape"
            class="shape shape-1 move-anim">
          <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">

        </div>
        
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Our Story</p>

            <h2 class="headline-1 section-title">Every Flavour Tells a Story</h2>

            <p class="section-text">
              WE CAN ADD HERE WHAT WE WANT TO SAY
            </p>

            <div class="contact-label">Book Through Call</div>

            <a href="tel:+974 4445 5536" class="body-1 contact-number hover-underline">+974 4445 5536</a>

            <a href="#" class="btn btn-primary">
              <span class="text text-1">Read More</span>

              <span class="text text-2" aria-hidden="true">Read More</span>
            </a>

          </div>

          <figure class="about-banner">
            
          <?php
     $select_story = $conn->prepare("SELECT * FROM `story` LIMIT 999999"); 
     $select_story->execute();
     if($select_story->rowCount() > 0){
      while($fetch_story = $select_story->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_story['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_story['image_16']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_story['image_16']; ?>" width="570" height="570" loading="lazy" alt="about banner"
              class="w-100" data-parallax-item data-parallax-speed="1"> 
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no story added yet!</p>';
   }
   ?> 
                
  
           

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
            <?php
     $select_story = $conn->prepare("SELECT * FROM `story` LIMIT 999999"); 
     $select_story->execute();
     if($select_story->rowCount() > 0){
      while($fetch_story = $select_story->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_story['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_story['image_17']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_story['image_17']; ?>" width="285" height="285" loading="lazy" alt=""
                class="w-100">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no story added yet!</p>';
   }
   ?> 
                
            </div>

            <div class="abs-img abs-img-2 ">
            <?php
     $select_story = $conn->prepare("SELECT * FROM `story` LIMIT 999999"); 
     $select_story->execute();
     if($select_story->rowCount() > 0){
      while($fetch_story = $select_story->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_story['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_story['image_18']; ?>">
     
      
      <img src="uploaded_img/<?= $fetch_story['image_18']; ?>" width="133" height="134" loading="lazy" alt="">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no story added yet!</p>';
   }
   ?>  
            </div>

          </figure>

         

        </div>
      </section>





      <!-- 
        - #SPECIAL DISH
      -->

      <section class="special-dish text-center" aria-labelledby="dish-label">

        <div class="special-dish-banner">
        <?php
     $select_dish = $conn->prepare("SELECT * FROM `dish` LIMIT 999999"); 
     $select_dish->execute();
     if($select_dish->rowCount() > 0){
      while($fetch_dish = $select_dish->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_dish['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_dish['image_19']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      
      <img src="uploaded_img/<?= $fetch_dish['image_19']; ?>" width="940" height="1000" loading="lazy" alt="special dish"
            class="img-cover">
      
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no dish added yet!</p>';
   }
   ?> 
        </div>

        <div class="special-dish-content bg-black-10">
          <div class="container">

            

            <p class="section-subtitle label-2">Special Dish</p>

            <h2 class="headline-1 section-title"></h2>

            <p class="section-text">
              WE CAN ADD WHAT WE WANT TO SAY HERE
            </p>
            <?php
     $select_dish = $conn->prepare("SELECT * FROM `dish` LIMIT 999999"); 
     $select_dish->execute();
     if($select_dish->rowCount() > 0){
      while($fetch_dish = $select_dish->fetch(PDO::FETCH_ASSOC)){
   ?>
    <div class="span title-1"><span>QR</span><?= $fetch_dish['price']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no dish added yet!</p>';
   }
   ?> 
            <div class="wrapper">
         
   
            

            </div>
      
            <a href="#" class="btn btn-primary">
              <span class="text text-1">View All Menu</span>

              <span class="text text-2" aria-hidden="true">View All Menu</span>
            </a>

          </div>
        </div>

        <img src="./assets/images/shape-1.png" width="179" height="359" loading="lazy" alt="" class="shape shape-1">

        <img src="./assets/images/shape-2.png" width="351" height="462" loading="lazy" alt="" class="shape shape-2">

      </section>





      <!-- 
        - #MENU
      -->
      

      <section class="section menu" aria-label="menu-label" id="menu">     
        <div class="container">
          
        
            <h2 class="section-subtitle label-2 text-center">Best Sellers</h2>
            

          <ul class="grid-list">
            
            <li>
              
              <div class="menu-card hover:card">
             
                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                     <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                </figure>
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name']; ?></div>
         <div class="span title-1"><span>QR</span><?= $fetch_product['price']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
   
                <div>
               
                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>
        
                   
                  </div>
                <p class="card-text label-1">
                
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>
           
            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      < <input type="hidden" name="name2" value="<?= $fetch_product['name2']; ?>">
      <input type="hidden" name="price2" value="<?= $fetch_product['price2']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_02']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details2']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_02']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
      </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
   
                </figure>
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name2']; ?></div>
               
         <div class="span title-2"><span>QR</span><?= $fetch_product['price2']; ?></div>
         <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
   
                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>

                    
                  </div>

                  <p class="card-text label-1">
                 
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details2']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name3" value="<?= $fetch_product['name3']; ?>">
      <input type="hidden" name="price3" value="<?= $fetch_product['price3']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_03']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details3']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_03']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
      </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
   
                </figure>
               
<?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name3']; ?></div>
              
         <div class="span title-2"><span>QR</span><?= $fetch_product['price3']; ?></div>
         <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 


     
                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>

              
                  </div>

                  <p class="card-text label-1">
                    
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details3']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name4" value="<?= $fetch_product['name4']; ?>">
      <input type="hidden" name="price4" value="<?= $fetch_product['price4']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_04']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details4']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_04']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
      </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
   
                   
                </figure>
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name4']; ?></div>
               
         <div class="span title-2"><span>QR</span><?= $fetch_product['price4']; ?></div>
         <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>

                    <span class="badge label-1">New</span>

                    
                  </div>

                  <p class="card-text label-1">
                    
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details4']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name5" value="<?= $fetch_product['name5']; ?>">
      <input type="hidden" name="price5" value="<?= $fetch_product['price5']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_05']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details5']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_05']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
      </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                  
                </figure>
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name5']; ?></div>
                
         <div class="span title-2"><span>QR</span><?= $fetch_product['price5']; ?></div>
         <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>

                    
                  </div>

                  <p class="card-text label-1">
                    
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details5']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name6" value="<?= $fetch_product['name6']; ?>">
      <input type="hidden" name="price6" value="<?= $fetch_product['price6']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_06']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_product['details6']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_06']; ?>" width="100" height="100" loading="lazy" alt="">
      <div class="flex">
     
      </div>
      </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                </figure>
                <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="span title-2"><?= $fetch_product['name6']; ?></div>
               
         <div class="span title-2"><span>QR</span><?= $fetch_product['price6']; ?></div>
         <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"></a>
                    </h3>

                   
                  </div>

                  <p class="card-text label-1">
                    
                  </p>

                </div>

              </div>
              <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 999999"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                  <div class="span title-2"><?= $fetch_product['details6']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?> 
            </li>

          </ul>

          <p class="menu-text text-center">
            During winter daily from <span class="span">6:30 am</span> to <span class="span">11:00 pm</span>
          </p>

          <a href="https://indd.adobe.com/view/081ca8b2-8111-4254-8741-9ac12854a245" class="btn btn-primary">
            <span class="text text-1">View All Menu</span>

            <span class="text text-2" aria-hidden="true">View All Menu</span>
          </a>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
      </section>





      <!-- 
        - #TESTIMONIALS
      -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
        <div class="container">

         

        </div>
      </section>





      <!-- 
        - #RESERVATION
      -->

     

            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')" id="contact">

              <h2 class="headline-1 text-center">Contact Us</h2>

              <p class="contact-label">Booking Request</p>

              <a href="tel:+88123123456" class="body-1 contact-number hover-underline">+974 4445 5536</a>

              <div class="separator"></div>

              <p class="contact-label">Location</p>

              <address class="body-4">
                Restaurant St, ASPIRE ZONE, <br>
                DOHA, QATAR
              </address>
              <p class="contact-label">Breakfast Time</p>

              <p class="body-4">
                Sunday to Saturday<br>
                6.30 am - 11.00am
              </p>
              <p class="contact-label">Lunch Time</p>

              <p class="body-4">
                Sunday to Saturday<br>
                12.30 pm - 3.30pm
              </p>
              <p class="contact-label"> After noon high tea Time</p>

              <p class="body-4">
                Sunday to Saturday<br>
                3.30 pm - 6.30pm
              </p>
              <p class="contact-label">Dinner Time</p>

              <p class="body-4">
                Sunday to Saturday<br>
                6.30 pm - 11.00pm
              </p>

            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features text-center" aria-label="features">
        <div class="container">

          <p class="section-subtitle label-2">Why Choose Us</p>

          <h2 class="headline-1 section-title">Our Strength</h2>

          <ul class="grid-list">

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-1.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Hygienic Food</h3>

                <p class="label-1 card-text">we can add what we want here.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-2.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Fresh Environment</h3>

                <p class="label-1 card-text">we can add what we want here.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-3.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Skilled Chefs</h3>

                <p class="label-1 card-text">we can add what we want here.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-4.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Event & Party</h3>

                <p class="label-1 card-text">we can write here what we want.</p>

              </div>
            </li>

          </ul>

          <img src="" width="208" height="178" loading="lazy" alt="shape"
            class="shape shape-1">

          <img src="" width="120" height="115" loading="lazy" alt="shape"
            class="shape shape-2">

        </div>
      </section>





      <!-- 
        - #EVENT
      -->

      <section class="section event bg-black-10" aria-label="event">
        <div class="container">

          <p class="section-subtitle label-2 text-center">Recent Updates</p>

          <h2 class="section-title headline-1 text-center">Upcoming Event</h2>

          <ul class="grid-list">

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_recent['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_recent['image_01']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_recent['details']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_recent['details4']; ?>">

      <img src="uploaded_img/<?= $fetch_recent['image_01']; ?>"width="350" height="450" loading="lazy"
                    alt="Flavour so good you'll try to eat with your eyes." class="img-cover">
    
   <?php
      }
   }else{
      echo '<p class="empty">no recent added yet!</p>';
   }
   ?> 
                
  </div>
                  
                  <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
                
         <div class="publish-date label-2" class="span title-1"><?= $fetch_recent['details4']; ?> </div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no date added yet!</p>';
   }
   ?> 
   
                <div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center"></p>

                  <h3 class="card-title title-2 text-center">
                  <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
                
         <div class="span title-1"><?= $fetch_recent['details']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no detail added yet!</p>';
   }
   ?> 
   
            
                  </h3>
                  <div>
                </div>

              </div>
            </li>

            <div class="separator"></div>
           

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_recent['id']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_recent['image_02']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_recent['details2']; ?>">
      <input type="hidden" name="details" value="<?= $fetch_recent['details5']; ?>">

      <img src="uploaded_img/<?= $fetch_recent['image_02']; ?>"width="350" height="450" loading="lazy"
                    alt="Flavour so good you'll try to eat with your eyes." class="img-cover">
    
   <?php
      }
   }else{
      echo '<p class="empty">no recent added yet!</p>';
   }
   ?> 
                
  </div> 
  
                  
                  <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
                
         <div class="publish-date label-2" class="span title-1"><?= $fetch_recent['details5']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no date added yet!</p>';
   }
   ?> 
   
                <div>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center"></p>

                  <h3 class="card-title title-2 text-center">
                  <?php
     $select_recent = $conn->prepare("SELECT * FROM `recent` LIMIT 999999"); 
     $select_recent->execute();
     if($select_recent->rowCount() > 0){
      while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){
   ?>
                
         <div class="span title-1"><?= $fetch_recent['details2']; ?></div>
         <?php
      
      }
   }else{
      echo '<p class="empty">no details added yet!</p>';
   }
   ?> 
   
                <div>
                  </h3>
                </div>

              </div>
            </li>
          
           
          </ul>


        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/footer-bg.jpg')">
    <div class="container">

      <div class="footer-top grid-list">

        <div class="footer-brand has-before has-after">

          <a href="#" class="logo">
            
            <img src="./assets/images/OIP.png" width="160" height="50" loading="lazy" alt="grilli home">
          </a>

          <address class="body-4">
            Restaurant St, ASPIRE ZONE, DOHA, QATAR
          </address>

          <a href="mailto:glasshouse@alaziziyahboutique.com" class="body-4 contact-link">glasshouse@alaziziyahboutique.com</a>

          <a href="tel:+974 4445 5536" class="body-4 contact-link">Booking Request : +974 4445 5536</a>

          <p class="body-4">
            Open : 06:30 am - 11:00 pm
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>

    



          <form action="" class="input-wrapper">
            <div class="icon-wrapper">
              

              
            </div>

            
          </form>

        </div>

        <ul class="footer-list">

          <li>
            <a href="#home" class="label-2 footer-link hover-underline">Home</a>
          </li>

          <li>
            <a href="#menu" class="label-2 footer-link hover-underline">Menus</a>
          </li>

          <li>
            <a href="#about" class="label-2 footer-link hover-underline">About Us</a>
          </li>


          <li>
            <a href="#contact" class="label-2 footer-link hover-underline">Contact</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Facebook</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Instagram</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Twitter</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Google Map</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">

        <p class="copyright">
          &copy; 2023. All Rights are Reserved |<span> RAMY DIKA </span>
          
        </p>

      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>