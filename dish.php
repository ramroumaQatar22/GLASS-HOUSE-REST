<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){
    $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $image_19 = $_FILES['image_19']['name'];
   $image_19 = filter_var($image_19, FILTER_SANITIZE_STRING);
   $image_size_19 = $_FILES['image_19']['size'];
   $image_tmp_name_19 = $_FILES['image_19']['tmp_name'];
   $image_folder_19 = 'uploaded_img/'.$image_19;

   $insert_dish = $conn->prepare("INSERT INTO `dish`(price, image_19) VALUES(?,?)");
   $insert_dish->execute([$price, $image_19]);

   if($insert_dish){
    if($image_size_19 > 20000000000){
       $message[] = 'image size is too large!';
    }else{
       move_uploaded_file($image_tmp_name_19, $image_folder_19);
       $message[] = 'new dish added!';
    }

 }

};

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_dish_image = $conn->prepare("SELECT * FROM `dish` WHERE id = ?");
    $delete_dish_image->execute([$delete_id]);
    $fetch_delete_image = $delete_dish_image->fetch(PDO::FETCH_ASSOC);
    unlink('uploaded_img/'.$fetch_delete_image['image_19']);
    $delete_dish = $conn->prepare("DELETE FROM `dish` WHERE id = ?");
    $delete_dish->execute([$delete_id]);
    header('location:dish.php');
 }
 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dish</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">add special dish</h1>
   <form action="" method="post" enctype="multipart/form-data">
   <div class="inputBox">
            <span>product price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
         <div class="inputBox">
            <span>image 19 (required)</span>
            <input type="file" name="image_19" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
</div>
        <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>
   
<section class="show-products">

   <h1 class="heading">dish added</h1>

   <div class="box-container">

   <?php
      $select_dish = $conn->prepare("SELECT * FROM `dish`");
      $select_dish->execute();
      if($select_dish->rowCount() > 0){
         while($fetch_dish = $select_dish->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="uploaded_img/'<?= $fetch_dish['image_19']; ?>" alt="">
      <div class="price">QR<span><?= $fetch_dish['price']; ?></span></div>
 </div>
      <div class="flex-btn">
        
         <a href="dish.php?delete=<?= $fetch_dish['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
       
   <?php
         }
      }else{
         echo '<p class="empty">no dish added yet!</p>';
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