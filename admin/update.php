<?php
    session_start();
    include('../connection.php');
    //THIS IS JUST A TEST. XD
    $pp_Name = $_POST['p_name'];
    $pStock = $_POST['stock'];
    $pPrice = $_POST['price'];
    echo $pp_Name;
    echo $pStock;
    echo $pPrice;
    $updateBoth = mysqli_query($connection, "UPDATE `products` set `productStock` = '$pStock' and `productPrice` = '$pPrice' where `productTitle` = '$pp_Name'");
    // echo "success";
    
    //header("location: index.php");
    //exit;
?>