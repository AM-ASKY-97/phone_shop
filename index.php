<?php
    session_start();
    
    include 'conn.php';

    $sql = "SELECT productid FROM product";

    $query_run = mysqli_query($con, $sql);

    $row = mysqli_num_rows($query_run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop</title>

    <link rel="stylesheet" href="Asseets/style.css">
</head>
<body>
   
    <?php
        include 'conn.php';
    ?>

    <div class="container">

        <div class="banner">
            <div><img src="Asseets/store.jpg" alt="" width="130px" height="100px"></div>
            <div><h1>Mobile Store</h1></div>

            <div id="h4"><h4>Your Card has <span id="num"><?php echo $_SESSION['number']?></span> Item</h4></div>

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

        <div class="contant">
            <?php
            $sql= "SELECT * FROM product";

            $result = $con->query($sql);

            echo "<table style=width:90%>";

            if ($result->num_rows > 0) {

                
                
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                   
                    
                            <tr><td width="20%"><?php echo "<img src='data:image;base64,{$row['Image']}' alt='img' width='100px' height='100px'>"?></td>


                            <td width="60%">
                                <p>Product Name : <?php echo $row["productName"]?></p>
                                <p>Colour : <?php echo $row["colour"]?></p>
                                <p>Ram : <?php echo $row["ram"]?> GB</p>
                                <p>warrenty : <?php echo $row["warrenty"]?></p>
                                <p>Price Rs. :<?php echo $row["price"]?></p>
                                <hr>
                                <br>
                            </td>
                                
                            <td width="20%">
                                <p><button type="button"><a href="add.php?productid=<?php echo $row["productid"];?>">Add To Cart</a></button> | <button><a href="delete.php?productid=<?php echo $row["productid"];?>">Delete Item</a></button></p>
                                
                            </td>
                            
                    <?php
                }
                echo "</table>";
            } 
            ?>
        </div>
    </div>
    
</body>
</html>