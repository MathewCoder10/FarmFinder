<?php

@include 'confige.php';

if(isset($_POST['add_user'])){

   $name = $_POST['name'];
   $email =  $_POST['email'];
   $password = $_POST['password'];
   $user_type = $_POST['user_type'];

   if(empty($name) || empty($email) || empty($password) || empty($user_type))
   {
      $message[] = 'please fill out all';  
   }
   
   else
   {
   $select = " SELECT * FROM user_form WHERE email = '$email'  ";

   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0)
   {

      $message[] = 'user already exist!';

   
   }
     
   else
   {
      $insert = "INSERT INTO user_form(name , email ,  password  , user_type) VALUES('$name', '$email', '$password' ,'$user_type')";
      $upload = mysqli_query($conn,$insert);
      if($upload)
      {
         $message[] = 'new user added successfully';
      }
      else
      {
         $message[] = 'could not add the user';
      }
      
      
   }

};
}
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM user_form WHERE id = $id");
   header('location:admin_user.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin_user</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="csss/stile.css">
   <link rel="stylesheet" href="csss/styles.css">
</head>
<body>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">LUF</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<h2 class="u-name">Admin dashboard</b>
	</header>
	<div class="body">
		<nav class="side-bar">
			<ul>
				<li>
					<a href="admin.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>home</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
		
   
<div class="container">

<div class="admin-product-form-container">

   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <h3>Add a new Admin/Advisor</h3>
      <input type="text"  placeholder="enter your name" name="name" class="box">
      <input type="email"  placeholder="enter your mail" name="email" class="box">
      <input type="password"  placeholder="enter your password" name="password" class="box">
      <select name="user_type" class="box">
      <option value="admin">admin</option>
      <option value="advisor">advisor</option>
      </select>
      <input type="submit" class="btn" name="add_user" value="add_user">
   </form>

</div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM user_form");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>user name</th>
            <th>email</th>
            <th>usertype</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td>
               <a href="admin_userupdate.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_user.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
</body>
</html>