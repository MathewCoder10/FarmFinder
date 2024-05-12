<?php

@include 'confige.php';


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

   <?php

   $select = mysqli_query($conn, "SELECT * FROM fertilizer");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>fertilizer image</th>
            <th>fertilizer name</th>
            <th>disc</th>
            <th>priceperkg</th>
          
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['disc']; ?></td>
            <td><?php echo $row['price']; ?></td>
         
         
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
</body>
</html>