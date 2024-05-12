<?php

@include 'confige.php';

session_start();

if(!isset($_SESSION['advisor_name'])){
   header('location:login_form.php');
}

?>
<?php



if(isset($_POST['add_product']))
{
   $product_name = $_POST['product_name'];
   $area = $_POST['area'];
   $disc = $_POST['disc'];
   $type = $_POST['type'];
   $helper = $_POST['helper'];
   $tymspent = $_POST['tymspent'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
    $hide=3;
   if(empty($product_name) || empty($area) || empty($disc) || empty($type) || empty($helper) || empty($tymspent) || empty($product_image)){
      $message[] = 'please fill out all';
   }
   else{
      $insert = "INSERT INTO products(name , area , disc , type , helper , tymspent ,image) VALUES('$product_name', '$area', '$disc' , '$type', '$helper', '$tymspent','$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:advisor.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>advisor page</title>

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
		<h2 class="u-name">Advisor dashboard</b>
	</header>
	<div class="body">
		<nav class="side-bar">
			<ul>
         <li>
					<a href="advisor_fertilizer.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>fertilizer</span>
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
   
   <?php if(!isset($hide)) { ?>
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new farm</h3>
         <label class="form-label"><h2>Enter the name of farm?</h2></label>
         <input type="text" placeholder="enter farm name" name="product_name" class="box">
         <label class="form-label"><h2>How much area available?</h2></label>
         <select name="area" class="box">
         <option value="1">area of 1 to 2 cent </option>
         <option value="2">area of 3 to 10 cent</option>
         <option value="3">area of 10 to 15 cent</option>
         </select>
         <label class="form-label"><h2>Enter the discription of farm?</h2></label>
         <input type="text" placeholder="discribe the farm" name="disc" class="box">
         <label class="form-label"><h2>Which type of farming you prefer?</h2></label>
         <select name="type" class="box">
         <option value="ground">Ground</option>
         <option value="terus">Terrace</option>
         <option value="aqua">Aqua</option>
         </select>
         <label class="form-label"><h2>Do you have any helper?</h2></label>
         <select name="helper" class="box">
         <option value="yes">Yes</option>
         <option value="no">No</option>
         </select>
         <label class="form-label"><h2>How much time you spent in each day?</h2></label>
         <select name="tymspent" class="box">
         <option value="30">30 minutes</option>
         <option value="45">45 minutes</option>
         <option value="60">60 minutes</option>
         </select>
         <label class="form-label"><h2>Place image here..</h2></label>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
  
   <?php }?>
   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>farm image</th>
            <th>farm name</th>
            <th>area</th>
            <th>disc</th>
            <th>type</th>
            <th>helper</th>
            <th>timespent</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['area']; ?></td>
            <td><?php echo $row['disc']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['helper']; ?></td>
            <td><?php echo $row['tymspent']; ?></td>
            <td>
               <a href="advisor_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="advisor.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
</body>
</html>