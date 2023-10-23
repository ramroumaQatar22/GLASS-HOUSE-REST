<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">
   
           
  
       <a href="index.php" class="logo">Admin<span>Panel</span></a>
 
      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="products.php">products</a>
         <a href="front.php">front</a>
         <a href="top.php">top</a>
         <a href="story.php">story</a>
         <a href="dish.php">dish</a>
         <a href="recent.php">recent</a>
         <a href="admin_accounts.php">admins</a>
         
      
        
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
         </div>
         <a href="admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>