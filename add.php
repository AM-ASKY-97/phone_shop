<?php
    session_start();
    include 'conn.php';
    
    $_SESSION['number']++;

    $productid = $_GET['productid'];
    $num = session_id();

    $sql ="INSERT INTO tbltempcart (sessionID, productid) 
    VALUES ('$num', '$productid')";

    if (mysqli_query($con, $sql))
    {
        ?>
        <script>
          alert ("Your prodect Added")
          window.location.href="index.php";
        </script>
        <?php
    }

    else 
    {
        echo "Error creating table : ". $sql. mysqli_error($con);
    }
?>
