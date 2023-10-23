<?php

include 'connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>

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




          
<footer class="footer section has-bg-image text-center" 
    style="background-image: url('./assets/images/footer-bg.jpg')">
   
    <a href="index.php" class="btn btn-primary">
    <span class="text text-1">GO BACK</span>

<span class="text text-2" aria-hidden="true">GO BACK</span>
          </a>
    <section class="form-container">
    <div class="footer-brand has-before has-after">

<form action="" method="post">
      <h3 class="section-subtitle label-2 text-center">login now</h3>
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" autocomplete="off" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" autocomplete="off" oninput="this.value = this.value.replace(/\s/g, '')">
      <button type="submit" value="login now" class="btn" name="submit">
      <span class="text text-1">LOG IN</span>

<span class="text text-2" aria-hidden="true">LOG IN</span>
</button>

</form>

</section>
</footer>
</body>
</html>