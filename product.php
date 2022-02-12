<?php

    include 'conn.php';

    $sql = "SELECT 	productid FROM product";

    $query_run = mysqli_query($con, $sql);

    $row = mysqli_num_rows($query_run);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Asseets/style.css">
</head>
<body>

    <div class="container">

    <div class="banner">
            <div><img src="Asseets/store.jpg" alt="" width="130px" height="100px"></div>
            <div><h1>Mobile Store</h1></div>

            <div id="h4"><h4>Your Card has 0 Item</h4></div>


            <div>Total Item : <?php echo $row; ?></div>
           
            <br>
            <br>
            <div> <hr></div>
            <br><br>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>
        </div>

        
        
          <form action="" method="post" enctype="multipart/form-data">
              <fieldset style="margin:30px;">
              <legend>Mobile Phone Data</legend>
              <div class="form">
                <div class="left" style="margin-left:20px; margin-right:20px;">
                    <div><label for="">Product ID : </label></div>
                    <div><label for="">Product Name : </label></div>
                    <div><label for="">Colour : </label></div>
                    <div><label for="">Ram : </label></div>
                    <div><label for="">Warenty : </label></div>
                    <div><label for="">Price : </label></div>
                    <div><label for="">Image : </label></div>
                    <div></div>
                    
                </div>

                <div class="right">
                    <div><input type="text" name="productID" id="" style="width:250px; height:25px;"></div>
                    <div><input type="text" name="productName" id="" style="width:350px; height:25px;"></div>
                    <div><input type="text" name="Colour" id="" style="width:250px; height:25px;"></div>
                    <div><input type="text" name="Ram" id="" style="width:50px; height:25px;"> GB</div>
                    <div>
                            <input type="Radio" name="warrenty" id="6month" value="6 Month ">
                            <label for="6month">6 Month</label>

                            <input type="Radio" name="warrenty" id="1 Years" value="1 Years">
                            <label for="1 Years">1 Years</label>
                    </div>
                    <div><input type="text" name="Price" id="" style="width:250px; height:25px;"></div>
                    <div><input type="file" name="image" id="" style="width:250px; height:25px;"></div>

                    <button type="submit" name="submit" style="cursor: pointer;">submit</button>
                    <button type="reset" style="cursor: pointer;">clear</button>
                    
                </div>
            </div>
              </fieldset>
              
          </form>
       
        
    </div>


    <?php

        include 'conn.php';

         if (isset($_POST['submit']))
         {
        
             $productID = $_POST["productID"];
             $productName = $_POST["productName"];
             $Colour = $_POST["Colour"];
             $Ram = $_POST["Ram"];
             $warrenty = $_POST["warrenty"];
             $Price =$_POST["Price"];
            

             $image =$_FILES['image']['tmp_name'];
             //$name =$_FILES['name'];
             $image =file_get_contents($image);

             $image =base64_encode($image);
            
             $sql ="INSERT INTO product (productid, productName, colour, ram, warrenty, price, Image) 
                     VALUES ('$productID', '$productName',' $Colour', ' $Ram', '$warrenty', $Price, '$image')";
     
             
     
             if (mysqli_query($con,$sql))
             {
                 ?>
                 <script>
                    alert("Successfully record inserted")
                    window.location.href='product.php?success';
                 </script>
                 <?php
             }
            
             
     
             }
    ?>
</body>
</html>