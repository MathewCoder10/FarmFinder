<?php

@include 'confige.php';

$id = $_GET['edit'];

if(isset($_POST['update_user'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $user_type = $_POST['user_type'];
   if(empty($name) || empty($email) || empty($password) || empty($user_type))
   {
      $message[] = 'please fill out all';  
   }
   else
   {

      $update_data = "UPDATE user_form SET name='$name', email='$email' , password = '$password', user_type='$user_type' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload)
      {
         header('location:admin_user.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="csss/stile.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the admin/advisor</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter user name">
      <input type="email" class="box" name="email" value="<?php echo $row['email']; ?>" placeholder="enter user email">
      <input type="password"  class="box" name="password" value="<?php echo $row['password']; ?>" placeholder="enter user password">
      <select name="user_type" class="box">
      <option value="admin">admin</option>
      <option value="advisor">advisor</option>
      </select>
      <input type="submit" value="update user" name="update_user" class="btn">
      <a href="admin_user.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>