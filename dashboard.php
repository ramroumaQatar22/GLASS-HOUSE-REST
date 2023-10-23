<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div>

      

      

      

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>products added</p>
         <a href="products.php" class="btn">see products</a>
      </div>

      <div class="box">
         <?php
            $select_front = $conn->prepare("SELECT * FROM `front`");
            $select_front->execute();
            $number_of_front = $select_front->rowCount()
         ?>
         <h3><?= $number_of_front; ?></h3>
         <p>front added</p>
         <a href="front.php" class="btn">see fronts</a>
      </div>
      <div class="box">
         <?php
            $select_top = $conn->prepare("SELECT * FROM `top`");
            $select_top->execute();
            $number_of_top = $select_top->rowCount()
         ?>
         <h3><?= $number_of_top; ?></h3>
         <p>top</p>
         <a href="top.php" class="btn">see top</a>
      </div>

      <div class="box">
         <?php
            $select_recent = $conn->prepare("SELECT * FROM `recent`");
            $select_recent->execute();
            $number_of_recent = $select_recent->rowCount()
         ?>
         <h3><?= $number_of_recent; ?></h3>
         <p>recent</p>
         <a href="recent.php" class="btn">see recent</a>
      </div>

      <div class="box">
         <?php
            $select_dish = $conn->prepare("SELECT * FROM `dish`");
            $select_dish->execute();
            $number_of_dish = $select_dish->rowCount()
         ?>
         <h3><?= $number_of_dish; ?></h3>
         <p>dish</p>
         <a href="dish.php" class="btn">see dish</a>
      </div>

      <div class="box">
         <?php
            $select_story = $conn->prepare("SELECT * FROM `story`");
            $select_story->execute();
            $number_of_story = $select_story->rowCount()
         ?>
         <h3><?= $number_of_story; ?></h3>
         <p>story</p>
         <a href="story.php" class="btn">see story</a>
      </div>
      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>admin users</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>

      

   </div>

</section>












<script src="./assets/js/script.js"></script>

<!-- 
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
</body>
</html>