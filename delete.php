<?php

    include 'conn.php';

    $productid = $_GET['productid'];

    $sql ="DELETE FROM product WHERE productid = '$productid'";

    if(mysqli_query($con,$sql))
    {
        ?>
            <script>
                alert("Record Deleted");
                window.location.href="index.php";
            </script>
        <?php
    }

?>