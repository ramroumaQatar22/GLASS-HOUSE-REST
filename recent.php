<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){
    
    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);
    $details2 = $_POST['details2'];
    $details2 = filter_var($details2, FILTER_SANITIZE_STRING);
    
    $details4 = $_POST['details4'];
    $details4 = filter_var($details4, FILTER_SANITIZE_STRING);
    $details5 = $_POST['details5'];
    $details5 = filter_var($details5, FILTER_SANITIZE_STRING);


    $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img/'.$image_02;

  

   $insert_recent = $conn->prepare("INSERT INTO `recent`(details, details2, details4, details5,  image_01, image_02) VALUES(?,?,?,?,?,?)");
      $insert_recent->execute([$details, $details2, $details4, $details5,  $image_01, $image_02]);

      if($insert_recent){
        if($image_size_01 > 2000000000 OR $image_size_02 > 20000000000 ){
           $message[] = 'image size is too large!';
        }else{
           move_uploaded_file($image_tmp_name_01, $image_folder_01);
           move_uploaded_file($image_tmp_name_02, $image_folder_02);
           $message[] = 'new product added!';

        }

    }

 };
 if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_recent_image = $conn->prepare("SELECT * FROM `recent` WHERE id = ?");
    $delete_recent_image->execute([$delete_id]);
    $fetch_delete_image = $delete_recent_image->fetch(PDO::FETCH_ASSOC);
    unlink('uploaded_img/'.$fetch_delete_image['image_01']);
    unlink('uploaded_img/'.$fetch_delete_image['image_02']);
  
    $delete_recent = $conn->prepare("DELETE FROM `recent` WHERE id = ?");
    $delete_recent->execute([$delete_id]);
    header('location:recent.php');
 }

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>recent</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">add recent</h1>

   <form action="" method="post" enctype="multipart/form-data">

   <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
       

        <div class="inputBox">
            <span>product details (required)</span>
            <textarea name="details" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>product details2 (required)</span>
            <textarea name="details2" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         
         <div class="inputBox">
            <span>product details4 (required)</span>
            <textarea name="details4" placeholder="enter date " class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>

         <div class="inputBox">
            <span>product details5 (required)</span>
            <textarea name="details5" placeholder="enter date" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>


         <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>

<section class="show-products">

   <h1 class="heading">recent added</h1>

   <div class="box-container">

   <?php
      $select_recent = $conn->prepare("SELECT * FROM `recent`");
      $select_recent->execute();
      if($select_recent->rowCount() > 0){
         while($fetch_recent = $select_recent->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="uploaded_img/'<?= $fetch_recent['image_01']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_recent['image_02']; ?>" alt="">
   
      <div class="details"><span><?= $fetch_recent['details']; ?></span></div>
      <div class="details2"><span><?= $fetch_recent['details2']; ?></span></div>
      
      <div class="details4"><span><?= $fetch_recent['details4']; ?></span></div>
      <div class="details5"><span><?= $fetch_recent['details5']; ?></span></div>

      <div class="flex-btn">
         <a href="recent.php?delete=<?= $fetch_recent['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no recent added yet!</p>';
      }
   ?>
   </div>
   </section>

   <script src="assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
</body>
</html>