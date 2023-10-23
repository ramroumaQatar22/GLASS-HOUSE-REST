<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $name2 = $_POST['name2'];
   $name2 = filter_var($name2, FILTER_SANITIZE_STRING);
   $name3 = $_POST['name3'];
   $name3 = filter_var($name3, FILTER_SANITIZE_STRING);
   $name4 = $_POST['name4'];
   $name4 = filter_var($name4, FILTER_SANITIZE_STRING);
   $name5 = $_POST['name5'];
   $name5 = filter_var($name5, FILTER_SANITIZE_STRING);
   $name6 = $_POST['name6'];
   $name6 = filter_var($name6, FILTER_SANITIZE_STRING);

   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $price2 = $_POST['price2'];
   $price2 = filter_var($price2, FILTER_SANITIZE_STRING);
   $price3 = $_POST['price3'];
   $price3 = filter_var($price3, FILTER_SANITIZE_STRING);
   $price4 = $_POST['price4'];
   $price4 = filter_var($price4, FILTER_SANITIZE_STRING);
   $price5 = $_POST['price5'];
   $price5 = filter_var($price5, FILTER_SANITIZE_STRING);
   $price6 = $_POST['price6'];
   $price6 = filter_var($price6, FILTER_SANITIZE_STRING);


   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $details2 = $_POST['details2'];
   $details2 = filter_var($details2, FILTER_SANITIZE_STRING);
   $details3 = $_POST['details3'];
   $details3 = filter_var($details3, FILTER_SANITIZE_STRING);
   $details4 = $_POST['details4'];
   $details4= filter_var($details4, FILTER_SANITIZE_STRING);
   $details5 = $_POST['details5'];
   $details5 = filter_var($details5, FILTER_SANITIZE_STRING);
   $details6 = $_POST['details6'];
   $details6 = filter_var($details6, FILTER_SANITIZE_STRING);






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

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = 'uploaded_img/'.$image_03;

   $image_04 = $_FILES['image_04']['name'];
   $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
   $image_size_04 = $_FILES['image_04']['size'];
   $image_tmp_name_04 = $_FILES['image_04']['tmp_name'];
   $image_folder_04 = 'uploaded_img/'.$image_04;

   $image_05 = $_FILES['image_05']['name'];
   $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
   $image_size_05 = $_FILES['image_05']['size'];
   $image_tmp_name_05 = $_FILES['image_05']['tmp_name'];
   $image_folder_05 = 'uploaded_img/'.$image_05;

   $image_06 = $_FILES['image_06']['name'];
   $image_06 = filter_var($image_06, FILTER_SANITIZE_STRING);
   $image_size_06 = $_FILES['image_06']['size'];
   $image_tmp_name_06 = $_FILES['image_06']['tmp_name'];
   $image_folder_06 = 'uploaded_img/'.$image_06;

 

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);
   $select_products->execute([$name2]);
   $select_products->execute([$name3]);
   $select_products->execute([$name4]);
   $select_products->execute([$name5]);
   $select_products->execute([$name6]);
   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `products`(name, name2, name3, name4, name5, name6, details, details2, details3, details4, details5, details6, price, price2, price3, price4, price5, price6, image_01, image_02, image_03, image_04, image_05, image_06) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name, $name2, $name3, $name4, $name5, $name6, $details, $details2, $details3, $details4, $details5, $details6, $price, $price2, $price3, $price4, $price5, $price6, $image_01, $image_02, $image_03, $image_04, $image_05, $image_06]);

     


      if($insert_products){
         if($image_size_01 > 2000000000 OR $image_size_02 > 20000000000 OR $image_size_03 > 2000000000 OR $image_size_04 > 20000000000 OR $image_size_05 > 2000000000 OR $image_size_06 > 20000000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            move_uploaded_file($image_tmp_name_04, $image_folder_04);
            move_uploaded_file($image_tmp_name_05, $image_folder_05);
            move_uploaded_file($image_tmp_name_06, $image_folder_06);
            $message[] = 'new product added!';
         }

      }

   }  

};





if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/'.$fetch_delete_image['image_01']);
   unlink('uploaded_img/'.$fetch_delete_image['image_02']);
   unlink('uploaded_img/'.$fetch_delete_image['image_03']);
   unlink('uploaded_img/'.$fetch_delete_image['image_04']);
   unlink('uploaded_img/'.$fetch_delete_image['image_05']);
   unlink('uploaded_img/'.$fetch_delete_image['image_06']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   header('location:products.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="cssadmin/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">add best seller</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>product name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>product name2 (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name2">
         </div>
         <div class="inputBox">
            <span>product name3 (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name3">
         </div>
         <div class="inputBox">
            <span>product name4 (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name4">
         </div>
         <div class="inputBox">
            <span>product name5 (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name5">
         </div>
         <div class="inputBox">
            <span>product name6 (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name6">
         </div>


         <div class="inputBox">
            <span>product price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
         <div class="inputBox">
            <span>product price2 (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price2">
         </div>
         <div class="inputBox">
            <span>product price3 (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price3">
         </div>
         <div class="inputBox">
            <span>product price4 (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price4">
         </div>
         <div class="inputBox">
            <span>product price5 (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price5">
         </div>
         <div class="inputBox">
            <span>product price6 (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price6">
         </div>


        <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (required)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 04 (required)</span>
            <input type="file" name="image_04" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 05 (required)</span>
            <input type="file" name="image_05" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 06 (required)</span>
            <input type="file" name="image_06" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
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
            <span>product details3 (required)</span>
            <textarea name="details3" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>product details4 (required)</span>
            <textarea name="details4" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>product details5 (required)</span>
            <textarea name="details5" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>product details6 (required)</span>
            <textarea name="details6" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>
</section>
   
       

<section class="show-products">

   <h1 class="heading">products added</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="uploaded_img/'<?= $fetch_products['image_01']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_products['image_02']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_products['image_03']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_products['image_04']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_products['image_05']; ?>" alt="">
      <img src="uploaded_img/'<?= $fetch_products['image_06']; ?>" alt="">

      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="name2"><?= $fetch_products['name2']; ?></div>
      <div class="name3"><?= $fetch_products['name3']; ?></div>
      <div class="name4"><?= $fetch_products['name4']; ?></div>
      <div class="name5"><?= $fetch_products['name5']; ?></div>
      <div class="name6"><?= $fetch_products['name6']; ?></div>





      <div class="price">QR<span><?= $fetch_products['price']; ?></span></div>
      <div class="price2">QR<span><?= $fetch_products['price2']; ?></span></div>
      <div class="price3">QR<span><?= $fetch_products['price3']; ?></span></div>
      <div class="price4">QR<span><?= $fetch_products['price4']; ?></span></div>
      <div class="price5">QR<span><?= $fetch_products['price5']; ?></span></div>
      <div class="price6">QR<span><?= $fetch_products['price6']; ?></span></div>

      <div class="details"><span><?= $fetch_products['details']; ?></span></div>
      <div class="details2"><span><?= $fetch_products['details2']; ?></span></div>
      <div class="details3"><span><?= $fetch_products['details3']; ?></span></div>
      <div class="details4"><span><?= $fetch_products['details4']; ?></span></div>
      <div class="details5"><span><?= $fetch_products['details5']; ?></span></div>
      <div class="details6"><span><?= $fetch_products['details6']; ?></span></div> 

      <div class="flex-btn">
        
         <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
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