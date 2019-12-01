<?php
session_start();
include('../connection.php');

$salesID = $_POST['dStatus'];
$userID = $_POST['dInvoice'];
$userPurchases = $userID.'purchases';

$updateSales = mysqli_query($connection, "UPDATE sales set `deliveryStatus` = 'Delivered'  where `salesID` = '$salesID'");
$updateUserPurchases = mysqli_query($connection, "UPDATE `$userPurchases` set `orderStatus` = 'Delivered'  where `salesID` = '$salesID'");

echo "<script>window.location.href='sales.php';</script>";

?>