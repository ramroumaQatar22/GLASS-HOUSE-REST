<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

    $image_10 = $_FILES['image_10']['name'];
   $image_10 = filter_var($image_10, FILTER_SANITIZE_STRING);
   $image_size_10 = $_FILES['image_10']['size'];
   $image_tmp_name_10 = $_FILES['image_10']['tmp_name'];
   $image_folder_10 = 'uploaded_img/'.$image_10;
    
   $image_11 = $_FILES['image_11']['name'];
   $image_11 = filter_var($image_11, FILTER_SANITIZE_STRING);
   $image_size_11 = $_FILES['image_11']['size'];
   $image_tmp_name_11 = $_FILES['image_11']['tmp_name'];
   $image_folder_11 = 'uploaded_img/'.$image_11;

   $image_12 = $_FILES['image_12']['name'];
   $image_12 = filter_var($image_12, FILTER_SANITIZE_STRING);
   $image_size_12 = $_FILES['image_12']['size'];
   $image_tmp_name_12 = $_FILES['image_12']['tmp_name'];
   $image_folder_12 = 'uploaded_img/'.$image_12;

   $image_13 = $_FILES['image_13']['name'];
   $image_13 = filter_var($image_13, FILTER_SANITIZE_STRING);
   $image_size_13 = $_FILES['image_13']['size'];
   $image_tmp_name_13 = $_FILES['image_13']['tmp_name'];
   $image_folder_13 = 'uploaded_img/'.$image_13;

   $image_14 = $_FILES['image_14']['name'];
   $image_14 = filter_var($image_14, FILTER_SANITIZE_STRING);
   $image_size_14 = $_FILES['image_14']['size'];
   $image_tmp_name_14 = $_FILES['image_14']['tmp_name'];
   $image_folder_14 = 'uploaded_img/'.$image_14;

   $image_15 = $_FILES['image_15']['name'];
   $image_15 = filter_var($image_15, FILTER_SANITIZE_STRING);
   $image_size_15 = $_FILES['image_15']['size'];
   $image_tmp_name_15 = $_FILES['image_15']['tmp_name'];
   $image_folder_15 = 'uploaded_img/'.$image_15;

   $insert_top = $conn->prepare("INSERT INTO `top`(image_10, image_11, image_12, image_13, image_14, image_15 ) VALUES(?,?,?,?,?,?)");
   $insert_top->execute([$image_10, $image_11, $image_12, $image_13, $image_14, $image_15]);




if($insert_top){
    if($image_size_10 > 2000000 OR $image_size_11 > 20000000 OR $image_size_12 > 2000000 OR $image_size_13 > 2000000 OR $image_size_14 > 2000000 OR $image_size_15 > 200000000){
       $message[] = 'image size is too large!';
    }else{
       move_uploaded_file($image_tmp_name_10, $image_folder_10);
       move_uploaded_file($image_tmp_name_11, $image_folder_11);
       move_uploaded_file($image_tmp_name_12, $image_folder_12);
       move_uploaded_file($image_tmp_name_12, $image_folder_13);
       move_uploaded_file($image_tmp_name_12, $image_folder_14);
       move_uploaded_file($image_tmp_name_12, $image_folder_15);


       $message[] = 'new TOP added!';
    }
 
 }

};

 if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_top_image = $conn->prepare("SELECT * FROM `top` WHERE id = ?");
    $delete_top_image->execute([$delete_id]);
    $fetch_top_image = $delete_top_image->fetch(PDO::FETCH_ASSOC);
    unlink('uploaded_img/'.$fetch_delete_image['image_10']);
    unlink('uploaded_img/'.$fetch_delete_image['image_11']);
    unlink('uploaded_img/'.$fetch_delete_image['image_12']);
    unlink('uploaded_img/'.$fetch_delete_image['image_13']);
    unlink('uploaded_img/'.$fetch_delete_image['image_14']);
    unlink('uploaded_img/'.$fetch_delete_image['image_15']);


    $delete_top = $conn->prepare("DELETE FROM `top` WHERE id = ?");
    $delete_top->execute([$delete_id]);
    header('location:top.php');
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tops</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<section class="add-products">

   <h1 class="heading">add top</h1>

   <form action="" method="post" enctype="multipart/form-data">
   <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_10" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_11" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (required)</span>
            <input type="file" name="image_12" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 04 (required)</span>
            <input type="file" name="image_13" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 05 (required)</span>
            <input type="file" name="image_14" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 06 (required)</span>
            <input type="file" name="image_15" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        </div>
      
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>
<?php
      $select_top = $conn->prepare("SELECT * FROM `top`");
      $select_top->execute();
      if($select_top->rowCount() > 0){
         while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="uploaded_img/'<?= $fetch_top['image_10']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_top['image_11']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_top['image_12']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_top['image_13']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_top['image_14']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_top['image_15']; ?>" alt="">
         </div>

         <?php
         }
      }
   ?>
   <section class="show-products">

<h1 class="heading">top added</h1>

<div class="box-container">

<?php
   $select_top = $conn->prepare("SELECT * FROM `top`");
   $select_top->execute();
   if($select_top->rowCount() > 0){
      while($fetch_top = $select_top->fetch(PDO::FETCH_ASSOC)){ 
?>
<div class="box">
   <img src="uploaded_img/'<?= $fetch_top['image_10']; ?>" alt="">
   <img src="uploaded_img/'<?= $fetch_top['image_11']; ?>" alt="">
   <img src="uploaded_img/'<?= $fetch_top['image_12']; ?>" alt="">
   <img src="uploaded_img/'<?= $fetch_top['image_13']; ?>" alt="">
   <img src="uploaded_img/'<?= $fetch_top['image_14']; ?>" alt="">
   <img src="uploaded_img/'<?= $fetch_top['image_15']; ?>" alt="">

   <div class="flex-btn">
     
      <a href="top.php?delete=<?= $fetch_top['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no top added yet!</p>';
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
