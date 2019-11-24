<?php 
    session_start();
    include('../connection.php');
    $userID = $_SESSION['userID'];
    $cartName = $userID."cart";
    $userEmail = $_SESSION['userEmail'];
// $productID = $_SESSION['productID'];
// $itemQuantity = $_SESSION['itemQuantity'];

    $sql = "SELECT * FROM userdetails where email = '$userEmail'";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if($row['email']==$userEmail){
        $name = $row['fName']." ".$row['lName'];
        $address = $row['address'];
        $contact = $row['contactNo']; 
    }

    $pid = $_POST['pid'];
    $title_d = $_POST['title_d'];
    $usercolumn = $userID."cart";
    // echo $pid;
    // echo $title_d;
    // echo $userID;
    $deletesql = mysqli_query($connection,"DELETE from `$usercolumn` where `productID` = '$pid'");
    header("location: cart.php");
?>