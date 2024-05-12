<?php

@include 'confige.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email =  $_POST['email'];
   $password = $_POST['password'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' || password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   
      }
      else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

;


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
  
   <link rel="stylesheet" href="stl.css">
</head>
<body>
<div id="wrapper">
      <div id="left">
        <div id="signin">
        <div class="logo">
            <h1>Let Us Farm</h1>
          </div>
          <form action="" method="post">
          <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div>
              <label>Username</label>
              <input type="text" class="text-input" name="name" />
            </div>
            <div>
              <label>Email</label>
              <input type="email" class="text-input" name="email" />
            </div>
            <div>
              <label>Password</label>
              <input type="password" class="text-input" name="password"/>
            </div>
            <select name="user_type" class="text-input" >
         <option value="user">user</option>
      </select>
            
            <button type="submit" class="primary-btn" name="submit">Sign Up</button>
          </form>
         
          <div class="or">
            <hr class="bar" />
            <span>OR</span>
            <hr class="bar" />
          </div>
          <a href="login.php" class="secondary-btn">login</a>
        </div>
       
      </div>
      <div id="right">
        <div id="showcase">
          <div class="showcase-content">
          <h1>
              Let us farm <strong>together</strong>
            </h1>
            
          </div>
        </div>
      </div>
    </div>
    </body>
    </html>