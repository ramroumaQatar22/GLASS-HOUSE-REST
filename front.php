<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $image_07 = $_FILES['image_07']['name'];
   $image_07 = filter_var($image_07, FILTER_SANITIZE_STRING);
   $image_size_07 = $_FILES['image_07']['size'];
   $image_tmp_name_07 = $_FILES['image_07']['tmp_name'];
   $image_folder_07 = 'uploaded_img1/'.$image_07;
    
   $image_08 = $_FILES['image_08']['name'];
   $image_08 = filter_var($image_08, FILTER_SANITIZE_STRING);
   $image_size_08 = $_FILES['image_08']['size'];
   $image_tmp_name_08 = $_FILES['image_08']['tmp_name'];
   $image_folder_08 = 'uploaded_img1/'.$image_08;

   $image_09 = $_FILES['image_09']['name'];
   $image_09 = filter_var($image_09, FILTER_SANITIZE_STRING);
   $image_size_09 = $_FILES['image_09']['size'];
   $image_tmp_name_09 = $_FILES['image_09']['tmp_name'];
   $image_folder_09 = 'uploaded_img1/'.$image_09;

   $insert_front = $conn->prepare("INSERT INTO `front`(image_07, image_08, image_09) VALUES(?,?,?)");
   $insert_front->execute([$image_07, $image_08, $image_09]);




if($insert_front){
    if($image_size_07 > 200000000 OR $image_size_08 > 200000000 OR $image_size_09 > 20000000){
       $message[] = 'image size is too large!';
    }else{
       move_uploaded_file($image_tmp_name_07, $image_folder_07);
       move_uploaded_file($image_tmp_name_08, $image_folder_08);
       move_uploaded_file($image_tmp_name_09, $image_folder_09);
       $message[] = 'new front added!';
    }
 
 }

};

 if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_front_image = $conn->prepare("SELECT * FROM `front` WHERE id = ?");
    $delete_front_image->execute([$delete_id]);
    $fetch_delete_image = $delete_front_image->fetch(PDO::FETCH_ASSOC);
    unlink('uploaded_img1/'.$fetch_delete_image['image_07']);
    unlink('uploaded_img1/'.$fetch_delete_image['image_08']);
    unlink('uploaded_img1/'.$fetch_delete_image['image_09']);
    $delete_front = $conn->prepare("DELETE FROM `front` WHERE id = ?");
    $delete_front->execute([$delete_id]);
    header('location:front.php');
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>fronts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<section class="add-products">

   <h1 class="heading">add front</h1>

   <form action="" method="post" enctype="multipart/form-data">
   <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_07" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_08" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (required)</span>
            <input type="file" name="image_09" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        </div>
      
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>
<?php
      $select_front = $conn->prepare("SELECT * FROM `front`");
      $select_front->execute();
      if($select_front->rowCount() > 0){
         while($fetch_front = $select_front->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="uploaded_img1/'<?= $fetch_front['image_07']; ?>" alt="">
      <img src="uploaded_img1/'<?= $fetch_front['image_08']; ?>" alt="">
      <img src="uploaded_img1/'<?= $fetch_front['image_09']; ?>" alt="">
         </div>

         <?php
         }
      }
   ?>
   <section class="show-products">

<h1 class="heading">front added</h1>

<div class="box-container">

<?php
   $select_front = $conn->prepare("SELECT * FROM `front`");
   $select_front->execute();
   if($select_front->rowCount() > 0){
      while($fetch_front = $select_front->fetch(PDO::FETCH_ASSOC)){ 
?>
<div class="box">
   <img src="uploaded_img1/'<?= $fetch_front['image_07']; ?>" alt="">
   <img src="uploaded_img1/'<?= $fetch_front['image_08']; ?>" alt="">
   <img src="uploaded_img1/'<?= $fetch_front['image_09']; ?>" alt="">

   <div class="flex-btn">
   
      <a href="front.php?delete=<?= $fetch_front['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no front added yet!</p>';
   }
?>

</div>





<script src="assets/js/script.js"></script>

<!-- 
 - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
