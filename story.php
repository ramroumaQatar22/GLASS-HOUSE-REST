<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

    $image_16 = $_FILES['image_16']['name'];
   $image_16 = filter_var($image_16, FILTER_SANITIZE_STRING);
   $image_size_16 = $_FILES['image_16']['size'];
   $image_tmp_name_16 = $_FILES['image_16']['tmp_name'];
   $image_folder_16 = 'uploaded_img/'.$image_16;

   $image_17 = $_FILES['image_17']['name'];
   $image_17 = filter_var($image_17, FILTER_SANITIZE_STRING);
   $image_size_17 = $_FILES['image_17']['size'];
   $image_tmp_name_17 = $_FILES['image_17']['tmp_name'];
   $image_folder_17 = 'uploaded_img/'.$image_17;

   $image_18 = $_FILES['image_18']['name'];
   $image_18 = filter_var($image_18, FILTER_SANITIZE_STRING);
   $image_size_18 = $_FILES['image_18']['size'];
   $image_tmp_name_18 = $_FILES['image_18']['tmp_name'];
   $image_folder_18 = 'uploaded_img/'.$image_18;

   $insert_story = $conn->prepare("INSERT INTO `story`(image_16, image_17, image_18) VALUES(?,?,?)");
   $insert_story->execute([$image_16, $image_17, $image_18]);


   if($insert_story){
    if($image_size_16 > 2000000000 OR $image_size_17 > 20000000000  OR $image_size_18 > 20000000000){
       $message[] = 'image size is too large!';
    }else{
       move_uploaded_file($image_tmp_name_16, $image_folder_16);
       move_uploaded_file($image_tmp_name_17, $image_folder_17);
       move_uploaded_file($image_tmp_name_18, $image_folder_18);
       $message[] = 'new story added!';
    }

 } 
};


if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_story_image = $conn->prepare("SELECT * FROM `story` WHERE id = ?");
    $delete_story_image->execute([$delete_id]);
    $fetch_delete_image = $delete_story_image->fetch(PDO::FETCH_ASSOC);
    unlink('uploaded_img/'.$fetch_delete_image['image_16']);
    unlink('uploaded_img/'.$fetch_delete_image['image_17']);
    unlink('uploaded_img/'.$fetch_delete_image['image_18']);
    $delete_story = $conn->prepare("DELETE FROM `story` WHERE id = ?");
    $delete_story->execute([$delete_id]);
    header('location:story.php');
 }
 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>story</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<section class="add-products">

   <h1 class="heading">add story</h1>

   <form action="" method="post" enctype="multipart/form-data">
   <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_16" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_17" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (required)</span>
            <input type="file" name="image_18" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>
<section class="show-products">

<h1 class="heading">story added</h1>

<div class="box-container">

<?php
$select_story = $conn->prepare("SELECT * FROM `story`");
$select_story->execute();
if($select_story->rowCount() > 0){
while($fetch_story = $select_story->fetch(PDO::FETCH_ASSOC)){ 
?>
<div class="box">
<img src="uploaded_img/'<?= $fetch_story['image_16']; ?>" alt="">
<img src="uploaded_img/'<?= $fetch_story['image_17']; ?>" alt="">
<img src="uploaded_img/'<?= $fetch_story['image_18']; ?>" alt="">
<div class="flex-btn">
     
      <a href="story.php?delete=<?= $fetch_story['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no story added yet!</p>';
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
